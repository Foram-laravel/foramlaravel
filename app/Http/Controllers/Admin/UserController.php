<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
           $users = DB::table('users')->orderBy('created_at', 'asc')->paginate(10);
           return view('admin.users.index', compact('users'));
    }
    public function create()
    {
       return view('admin.users.create'); 
    }    
    public function store(Request $request){
      $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }    
    

    
}