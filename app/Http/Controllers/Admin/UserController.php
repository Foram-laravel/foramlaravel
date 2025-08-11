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
    public function make()
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
    
    public function display(User $user)
    {
        return view('admin.users.display', compact('user'));
    }
    public function change(User $user)
    {
       
      return view('admin.users.change', compact('user'));
        
    }
    public function update(Request $request, User $user)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // If password is blank, remove it from data to avoid overwriting with null
    if (empty($data['password'])) {
        unset($data['password']);
    } else {
        // Hash the password if it's provided
        $data['password'] = bcrypt($data['password']);
    }

    $user->update($data);

    return redirect()->route('admin.users.index', $user->id)
        ->with('success', 'User updated successfully!');
}

    public function remove(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    

    
}