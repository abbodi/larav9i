<?php

namespace App\Http\Controllers;

use App\Mail\webmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_email()
    {
        $subject = 'This is a test email';
        $message = 'hello i send this email to test';

        Mail::to('abidsalah2000@yahoo.fr')->send(new webmail($subject,$message));

        echo 'Email is sent';
    }
}
