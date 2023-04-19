<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Design;
use App\Models\Form;
use App\Models\Input;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function forms()
    {
        $forms = Form::with('inputs')->get();
        return view('forms.index', compact('forms'));
    }


    public function addForm(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:forms,name'
        ]);

        Form::create([
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function addInput(Request $request)
    {
        $data = $request->except('require');
        $data['require'] = $request->require === 'on' ? 1 : 0; 
        Input::create($data);

        return redirect()->back();
    }

    public function editInput($id)
    {
        $input = Input::findOrFail($id);
        $forms = Form::with('inputs')->get();
        return view('forms.editInput', compact('input', 'forms'));
    } 

    public function updateInput(Request $request, $id)
    {
        $input = Input::findOrFail($id);
        $data = $request->except('require');
        $data['require'] = $request->require === 'on' ? 1 : 0; 
        $input->update($data);

        return redirect()->route('admin.app.forms');
    }


    public function getDesign()
    {
        $design = Design::all();
        return view('design.index', compact('design'));
    }

    public function addDesign(Request $request)
    {
        Design::create($request->all());

        return redirect()->back();
    }
}