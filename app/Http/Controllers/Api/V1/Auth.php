<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\ForgotPassword;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Form;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Auth extends Controller
{
    public function loginAsUser(Request $request)
    {
        $user = User::where('id', $request->id)->where('email', $request->email)->first();
        $token = $user->createToken('UserToken')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // return $credentials;
        if (FacadesAuth::attempt($credentials)) {
            $user = $request->user();
            if ($user->verify_token) {
                return response()->json([
                    'message' => 'verify your email'
                ]);
            }
            $token = $user->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
        $register = Form::where('name', 'register')->first();
        $rules = [];
        foreach ($register->inputs as $input) {
            $rules[$input->name] = $input->require ? 'required' : '';
        }
        $request->validate($rules);
        $token = Str::random(32);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'verify_token' => $token,
        ]);

        event(new UserRegistered($user, $token));
        return response()->json([
            'message' => 'a verification email has send to you'
        ]);
    }

    public function emailVerification(Request $request)
    {
        $user = User::where('verify_token', $request->token)->first();
        $user->update([
            'verify_token' => null
        ]);
        return response()->json([
            'message' => 'you email has been verified'
        ]);
    }

    public function logout()
    {
        FacadesAuth::user()->tokens()->delete();

        return response()->json([
            'message' => 'logout successful'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        try {
            if ( User::where('email', $request->email)->doesntExist()) {
                return response()->json([
                    'message' => 'invalid email'
                ]);
            }
            $token = Str::random(32);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
            ]);
            
            event(new ForgotPassword($request->email, $token));

            // Mail::to($request->email)->send(new ResetMail($token));

            return response()->json([
                'message' => 'An email containing the link to set a new password has been sent to you.

                If you have not received it yet, please check your spam folder. You can also retry resetting your password here.
                
                Please note that no email will be sent if your email is not in our database.',
            ]);

        } catch (Exception $e) {
            return response(['message' => $e->getMessage()]);
        }
    }

      public function resetPassword(Request $request){
        $token = $request->token;
        $email = $request->email;
        $password = Hash::make($request->password);

        $token_check = DB::table('password_reset_tokens')->where('token',$token)->first();
        $email_check = DB::table('password_reset_tokens')->where('email',$email)->first();

        if (!$token_check) {
            return response()->json([
                'message' => 'Invalid token'
            ]); 
        }
        if (!$email_check) {
            return response()->json([
                'message' => 'Invalid email'
            ]);
        }

        $user = User::where('email', $email)->first();
        $user->update([
            'password' => $password
        ]);
        $email_check = DB::table('password_reset_tokens')->where('email',$email)->delete();
        return response()->json([
            'message' => 'your password has been updated'
        ]);
    }

    public function profile()
    {
        $user = FacadesAuth::user();
        $cart_total = collect(Cart::where('user_id', $user->id)->get())->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
        
        return response()->json([
            'userInfo' => [
                //...collect($user),
                'id' => $user->id,
                'name' => $user->first_name.' '. $user->last_name ,
                'first_name' => $user->first_name ,
                'last_name' =>  $user->last_name ,
                'email' => $user->email,
                'image' => $user->image_url,
                'cart' => ['items' => $user->cart()->with('product:id,name,price,image')->get(), 'total' => $cart_total],
                'wishlist' => $user->wishlist()->with('product')->get(),
                'orders' => $user->orders()->with('products:id,name,image','shipping_addr','billing_addr')->get(),
                'addresses' => collect($user->addresses)->groupBy('type')
            ]
        ]);
    } 
}