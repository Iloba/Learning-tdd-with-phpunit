<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);

        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->password = Hash::make($request->password);
        $teacher->save();

        return redirect()->back()->with('success', 'Registration Successful');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return view('teacher-edit', [
            'teacher' => $teacher
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'string',
            'phone' => 'min:11',
            'password' => 'required|confirmed'
        ]);

        $teacher = Teacher::find($id);

        if (!$teacher) {
            throw ValidationException::withMessages(['email' => 'Unable to find user']);
        }

        $teacher->update([
            'name' => is_null($request->name) ? $teacher->name : $request->name,
            'email' => is_null($request->email) ? $teacher->email : $request->email,
            'phone' => is_null($request->phone) ? $teacher->phone : $request->phone,
            'password' => is_null($request->password) ? $teacher->password : Hash::make($request->password),
        ]);

        return redirect('/teachers')->with('success', 'Update Successful');
    }

    public function calculateWage()
    {
        $count = Teacher::count();

        $amountEarned = $count * 100;

        return $amountEarned;
    }

    public function calculateTotalPrice()
    {
        $price = Product::select('price')->get()->count();
        return $price;
    }

    public function deleteTeacher($id)
    {
       $teacher = Teacher::find($id);

       if(!$teacher){
        throw ValidationException::withMessages(['teacher' => 'Could not find teacher']);
       }

       $teacher->delete();
       return redirect('/teachers')->with('success', 'Delete Successful');
    }

   
}
