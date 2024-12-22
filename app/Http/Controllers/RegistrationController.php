<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    private $users = [];

    public function showRegistrationForm()
    {
        return view('registration');
    }
}