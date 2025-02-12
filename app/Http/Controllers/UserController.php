<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Unisender\UnisenderApiService;

class UserController extends Controller
{
    protected $unisenderApi;

    public function __construct()
    {
        $this->unisenderApi = UnisenderApiService::getInstance();
    }

    public function sendEmail($userId)
    {
        $user = User::findOrFail($userId);

        $emailMessageData = [
            'sender_name' => 'Collaba',
            'sender_email' => 'borashek@inbox.ru',
            'subject' => 'Notification for ' . $user->name,
            'body' => '<b>Hello, ' . $user->name . '</b>',
            'list_id' => 1
        ];

        $createEmailResponse = $this->unisenderApi->sendEmail($emailMessageData);

        if (isset($createEmailResponse['error'])) {
            return response()->json($createEmailResponse, 400);
        }
        
        return response()->json($createEmailResponse, 200);
    }
}
