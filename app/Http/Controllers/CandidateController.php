<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | string',
            'phone' => 'required',
            'password' => 'required | confirmed'
        ]);

        $candidate = Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

      

        if($candidate){
           
            return redirect()->back()->with('success', 'Registration Successful');
        }

      
    }
}
