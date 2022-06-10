<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function User()
    {
        $user = Auth::user();
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];
        return response()->json([$data], 200);
    }
}
