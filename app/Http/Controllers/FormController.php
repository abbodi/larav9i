<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function form_submit(Request $request)
    {
        // echo $request->mail_username ;

        // composer require imliam/laravel-env-set-command:^1.0 must be instaled

        Artisan::call("env:set MAIL_HOST=".$request->mail_host);
        Artisan::call("env:set MAIL_PORT=".$request->mail_port);
        Artisan::call("env:set MAIL_USERNAME=".$request->mail_username);
        Artisan::call("env:set MAIL_PASSWORD=".$request->mail_password);

        return redirect()->back();
    }
}
