<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (
            'message' => 'See you soon!',
            'alert-type' => 'info'
        );

        return view('admin.admin_logout')->with($notification);
        // return redirect()->route('admin.logout.page')->with($notification);
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
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
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

    /////////////////////////// Admin User ///////////////////////

    public function au_all() {
       
        $allAdminUsers = User::latest()->get();

        return view('backend.admin.all_admin',compact('allAdminUsers'));
    }

    public function au_add(){
        
        $roles = Role::all();

        return view('backend.admin.add_admin',compact('roles'));
    }

    public function au_store(Request $request) {
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $request->photo;
        $user->password = Hash::make($request->password);
        $user->save();

        if($request->roles) {
            $user->assignRole($request->roles);
        }
        
        $notification = array (
            'message' => 'Admin User Created!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function au_edit($id) {
        
        $roles = Role::all();
        $user = User::findOrFail($id);

        return view('backend.admin.edit_admin',compact('user','roles'));
    }

    public function au_update(Request $request) {

        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $request->photo;
        $user->save();

        $user->roles()->detach();

        if($request->roles) {
            $user->assignRole($request->roles);
        }
        
        $notification = array (
            'message' => 'Admin User Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }

    public function au_delete($id) {
        
        $user = User::findOrFail($id);
        if(!is_null($user)){
            $user->delete();
        }

        $notification = array(
            'message' => 'User Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
