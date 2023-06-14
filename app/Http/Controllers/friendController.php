<?php

namespace App\Http\Controllers;

use App\Models\friend;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class friendController extends Controller
{
    public function create()
    {
        return view('friends.create');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => ['required', 'max:255'],
            'second_name' => ['max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique('friends', 'email')],
            'number' => ['numeric', 'regex:/^[0-9]{10,11}$/', Rule::unique('friends', 'number')],
            'dob' => ['date', 'max:255'],
            'notes' => [''],
        ]);

        if ($request->hasFile('pic')) {
            $formFields['img'] = $request->file('pic')->store('images', 'public');
        }

        friend::create($formFields);

        return redirect('/home')->with('success', 'New friend created successfully');
    }

    public function show(friend $friend)
    {
        return view('friends.show', ['friend' => $friend]);
    }

    public function update(friend $friend)
    {
        return view('friends.update', ['friend' => $friend]);
    }

    public function edit(Request $request, friend $friend)
    {

        $formFields = $request->validate([
            'name' => 'required|max:255',
            'second_name' => ['max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['email', Rule::unique('users', 'email')->ignore($friend->id)],
            'number' => ['numeric', 'regex:/^[0-9]{10,11}$/'],
            'dob' => ['date'],
            'notes' => '',
        ]);


        if ($request->hasFile('pic')) {
            $formFields['img'] = $request->file('pic')->store('images', 'public');
        }

        $friend->update($formFields);

        return redirect()->route('show_friend', $friend->id)->with('success', "$friend->name update successfully");
    }

    public function destroy()
    {
        $friend = friend::find(request('id'));

        $friend->delete();
        return redirect('/home')->with('success', "Your friend $friend->name was deleted");
    }
}
