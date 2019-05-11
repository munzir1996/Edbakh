<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MailController extends Controller
{
    public function mail()
    {
        $name = 'Krunal';
        Mail::to('munzirmukhtar996@gmail.com')->send(new SendMailable($name));
        
        return 'Email was sent';
    }
}
