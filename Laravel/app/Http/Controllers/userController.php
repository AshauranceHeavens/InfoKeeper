<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\friend;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    //

    public function login()
    {
        return view('users.login');
    }

    public function destroy()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['email', 'required'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields, $request->remember)) {
            $request->session()->regenerate();
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect()->route('home');
    }

    public function home()
    {
        return view('users.home', [
            'friends' => friend::orderBy('name')
                ->filter(request(['name']))
                ->paginate(15)
        ]);
    }
}
