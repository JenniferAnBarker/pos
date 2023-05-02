<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (
            'message' => 'See you soon!',
            'alert-type' => 'info'
        );

        return redirect('/logout')->with($notification);
    }

    public function logoutPage() {
        return view('admin.admin_logout');
    }

    public function profile() {
        $id = Auth::user()->id;

        $adminData = User::find($id);

        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function store(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_image/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalExtension();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array (
            'message' => 'Changes Saved!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changePassword() {
        return view('admin.change_password');
    }

    public function updatePassword(Request $request) {

        /// Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        /// Match Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = array (
                'message' => 'Old password is incorrect',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        };

        ///Update New User Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array (
            'message' => 'Password changed successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
        
    }
}
