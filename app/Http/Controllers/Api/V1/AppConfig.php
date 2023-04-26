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

        $frs = new \stdClass();
        foreach ($forms as $form) {
            $frs->{$form['name']} = $form->inputs;
        }
        $dsg = new \stdClass();
        foreach ($design as $d) {
            $dsg->{$d['property']} = $d->value;
        }

        return response()->json([
            'forms' => $frs,
            'template' => $dsg
        ]);
    }
}