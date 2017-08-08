<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Theme;


class HomeController extends Controller
{
    public function homePage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('homepage')->render();

    }

}