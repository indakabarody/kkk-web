<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.pages.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
        ]);

        $image = $user->image;
        $path = public_path('storage/user-images/' . $user->id);

        if ($request->image != NULL) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            if ($user->image != NULL) {
                File::delete($path . '/' . $user->image);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file)->save($path . '/' . $fileName);

            $img->fit(600);
            $img->save($path . '/' . $fileName);

            $image = $fileName;
        }

        if ($request->image_remove != NULL) {
            if ($user->image != NULL) {
                File::delete(storage_path($path . $user->image));
            }

            $image = NULL;
        }

        $user->update([
            'name' => $request->name,
            'image' => $image,
            'email' => $request->email,
        ]);

        return back()->with('toast_success', 'Berhasil menyimpan profil');
    }
}
