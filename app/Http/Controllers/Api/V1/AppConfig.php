<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Design;
use App\Models\Form;
use Illuminate\Http\Request;

class AppConfig extends Controller
{
    public function getConfig()
    {
        $forms = Form::with('inputs')->get();
        $design = Design::all();

        $object = new \stdClass();
        foreach ($forms as $form) {
            $object->{$form['name']} = $form->inputs;
        }

        return response()->json([
            'forms' => $object,
            'template' => $design
        ]);
    }
}