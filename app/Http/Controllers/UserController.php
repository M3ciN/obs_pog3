<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRTwo()
    {
        $users = User::where('role_id', 2)->get();

        return view('users.index', ['users' => $users]);
    }

    public function editRTwo($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function updateRTwo(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        // Inne pola, które chcesz edytować
        $user->save();
        return redirect()->route('users.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        // Ustawienie innych pól, które chcesz dodać
        $role = Role::findOrFail(2);
        $user->role()->associate($role);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Użytkownik został dodany.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Użytkownik został usunięty.');
    }

    public function show()
    {
        $user = Auth::user();
        return view('profil.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }

        $user->save();

        return redirect()->route('profil.show')->with('success', 'Użytkownik');
    }

}
