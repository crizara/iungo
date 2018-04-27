<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller {

    public function index() {
        return \View::make('config_page');
    }

    public function save(Request $request) {
    	dd("porfin");
    }

}
