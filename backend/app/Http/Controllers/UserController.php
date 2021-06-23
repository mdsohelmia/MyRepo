<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = Http::timeout(3)
                ->retry(3)
                ->get('https://jsonplaceholder.typicode.com/users')
                ->collect();
            return view('welcome', compact('users'));
        } catch (\Throwable $exception) {
            abort(500);
        }
    }

}
