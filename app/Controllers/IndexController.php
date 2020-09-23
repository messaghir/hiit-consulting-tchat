<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        $auth = new Auth();

        if (false === $auth->isLogged()) {
            Redirect::to('/login');
        }
        
        $this->render('index');
    }
    
    public function json()
    {
        $this->render('index');
    }
}
