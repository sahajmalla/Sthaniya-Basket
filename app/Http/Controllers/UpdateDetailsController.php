<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateDetailsController extends Controller
{
    public function index() {
        return view('updateDetails');
    }
}
