<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasswordController extends Controller
{
    /**
     * Show password editing form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.pages.password.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('toast_success', 'Berhasil menyimpan kata sandi.');
    }
}
