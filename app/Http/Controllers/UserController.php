<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Inertia\Response as InertiaResponse;


class UserController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::paginate()
        ]);
    }


}
