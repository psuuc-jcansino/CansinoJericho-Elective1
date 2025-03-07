<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'sex'          => 'required|in:Male,Female',
            'mobile_phone' => 'required|regex:/^09\d{9}$/',
            'tel_no'       => 'nullable|regex:/^\d{3}-\d{4}$/',
            'birth_date'   => 'required|date',
            'address'      => 'required|string|max:255',
            'email'        => 'required|email',
            'website'      => 'nullable|url',
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }
}
