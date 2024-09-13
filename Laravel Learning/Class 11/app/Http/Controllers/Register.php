<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function index(){
        return view("register");
    }
    
}
