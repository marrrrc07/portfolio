<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Theme;
use \Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function homePage(){
        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('homepage')->render();
    }

    public function messageSubmit(Request $request){
        Mail::send('email.email',['senderName'=> $request->fullname,'senderMessage'=> $request->message],function($message){
            $message->to("marcianbrozo@gmail.com",null)->subject('User Verification');
        });
    }
}