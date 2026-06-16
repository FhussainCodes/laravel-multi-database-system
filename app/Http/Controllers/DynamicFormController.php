<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicFormController extends Controller
{
    public function showForm()
    {
        return view('dynamic_form');
    }
}
