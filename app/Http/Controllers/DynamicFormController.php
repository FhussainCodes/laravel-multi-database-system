<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DynamicFormController extends Controller
{
    public function showForm()
    {
        return view('dynamic_form');
    }

    public function storeData(Request $request)
    {
     $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'db_connection' => 'required',
    ]);

     $database = $request->db_connection;

      DB::connection($request->db_connection)->table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $request->password,
        'email_verified_at' => $request->email_verified_at,
        'remember_token' => $request->remember_token,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with(
        'success',
        'User saved successfully in selected database.'
    );
}

public function displayUsers(Request $request)
    {
        // Agar request mein db_connection nahi hai to default 'mysql' select hoga
        $selectedDb = $request->get('db_connection');

        // Selected database se 'users' table ka saara data fetch karein
        $users_data = DB::connection($selectedDb)->table('users')->get();

        // Data ko blade view par pass karein saath mein selected DB bhi bheinjein
        return view('display_users', compact('users_data', 'selectedDb'));
    }
    

}