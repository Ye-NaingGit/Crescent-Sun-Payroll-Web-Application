<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function create()
    {
        $occupations = Occupation::all();
        return view('users.create', ['occupations' => $occupations]);
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required|regex:/(09)[0-9]{9}/',
                'bankAccount' => 'required|digits:16',
                'occupation_id' => 'required',
                'address' => 'required',
            ]
        );

        $user = User::create(
            [
                'name' => $validated['name'],
                'password' => $validated['password'],
                'bankAccount' => $validated['bankAccount'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'occupation_id' => $validated['occupation_id'],
                'address' => $validated['address']
            ]
        );
        return redirect()->route('users.create')->with('success', 'User Created Successfully');
    }
    public function login()
    {
        $validated = request()->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]
        );
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            if (auth()->user()->occupation->permission == true) {
                return redirect()->route('dashboard');
            }
            $user = auth()->user();
            return view('users.profile', ['user' => $user]);
        }

        return redirect()->route('start')->withErrors(
            ['error' => "Incorrect Information"]
        );
    }

    public function show(User $user)
    {
        return view('users.profile', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {

        if (Hash::check(request('old_password'), $user->password)) {
            $validated = request()->validate(
                [
                    'name' => 'required|min:3',
                    'email' => 'required',
                    'password' => 'required',
                    'phone' => 'required|regex:/(09)[0-9]{9}/',
                    'bankAccount' => 'required|digits:16',
                    'address' => 'required',
                    'image' => 'image'
                ]
            );

            if(request()->has('image')){
                $imagePath = request()->file('image')->store('profile','public');
                $validated['image'] = $imagePath;

                Storage::disk('public')->delete($user->image ?? '');
            }

            $user->update($validated);
            return redirect()->route('users.show', ['user' => $user]);
        }

        return redirect()->route('users.edit', ['user' => $user])->withErrors(
            ['old_password' => "Incorrect Password"]
        );
    }

    public function listEdit(User $user)
    {
        $occupations = Occupation::all();
        return view('users.list-edit', ['user' => $user, 'occupations' => $occupations]);
    }

    public function listUpdate(User $user)
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required|regex:/(09)[0-9]{9}/',
                'bankAccount' => 'required|digits:16',
                'occupation_id' => 'required',
                'address' => 'required',
            ]
        );

        $user->update($validated);
        return redirect()->route('users.list')->with('success', 'User Updated Successfully');
    }

    public function history(User $user)
    {
        $salaries = Salary::where('employeeID', '=', $user->id)->orderby('created_at', 'DESC');
        $count = Salary::where('employeeID', '=', $user->id)->count();
        return view('users.history', ['user' => $user, 'salaries' => $salaries->paginate(6), 'count' => $count]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.list');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('start');
    }
}
