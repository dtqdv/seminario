<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Requests;

class TorneosController extends Controller
{
    public function ViewCreate()
    {
    	$user = Auth::User()->toArray();
    	$section = 'Crear Torneo';
    	return view('sections.crear_torneo' , compact('user' , 'section'));
    	
    }
}
