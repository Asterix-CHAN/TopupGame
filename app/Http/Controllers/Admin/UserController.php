<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(){
        $users = User::paginate(10);
        return view('pages.admin.users.index', compact('users'));
    }

    public function destroy(string $id){
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }
    
        return redirect()->route('users.index')->with('error', 'User not found');
    }
}
