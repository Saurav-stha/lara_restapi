<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'to' =>'roronoasaurav@gmail.com',
            'title' => 'Mail from saurav-stha.github.io/portfolio',
            'body' => 'This is for testing email using smtp.',
        ];

        $username = strstr($mailData['to'], '@', true);

        Mail::to($mailData['to'])->send(new DemoMail($mailData,$username));
           
        dd("Email is sent successfully.");
    }
}
