<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => [
                ['name' => 'Owner Parkir', 'email' => 'owner@parkirpremium.com', 'role' => 'owner'],
                ['name' => 'Admin Parkir', 'email' => 'admin@parkirpremium.com', 'role' => 'admin'],
                ['name' => 'Petugas Parkir', 'email' => 'petugas@parkirpremium.com', 'role' => 'petugas'],
            ],
        ]);
    }
}
