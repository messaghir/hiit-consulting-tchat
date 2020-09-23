<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Redirect;
use App\Core\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $auth = new Auth();

        if (false === $auth->isLogged()) {
            Redirect::to('/login');
        }
        
        $message = new Message();
        $result = $message->getMessage($auth->getUser()->id, $request->get('otherUser'));
        
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok', 'result' => $result]);
    }
    
    public function store(Request $request)
    {
        $auth = new Auth();

        if (false === $auth->isLogged()) {
            Redirect::to('/login');
        }
        
        $message = new Message();
        $message->from_user = $auth->getUser()->id;
        $message->to_user = $request->post('otherUser');
        $message->message = $request->post('message');
        $message->create();
        
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok']);
    }
    
    public function markAsRead(Request $request)
    {
        $auth = new Auth();

        if (false === $auth->isLogged()) {
            Redirect::to('/login');
        }
        
        $message = new Message();
        $message->markAsRead($auth->getUser()->id, $request->get('otherUser'));
    }
}
