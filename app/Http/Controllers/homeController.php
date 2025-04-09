<?php

namespace App\Http\Controllers;
use App\Mail\profileMail;
use Illuminate\Http\Request;
use Mail;

class homeController extends Controller
{
    public function index(Request $request){
        $compteur = $request->session()->increment('compteur',1);
        Mail::to('205mriniabir@gmail.com')->send(new profileMail());
        return view('home',compact('compteur'));
     
    }
}
