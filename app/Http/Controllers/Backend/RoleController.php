<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    ////////////// Permission Functions ////////////////////
    public function per_all(){
        
        $permissions = Permission::all();
        return view('backend.rp_pages.permission.all_permission',compact('permissions'));
    }
    
    public function per_add(){
        
        return view('backend.rp_pages.permission.add_permission');
    }

    public function per_store(Request $request){
       
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
         
        $notification = array(
            'message' => 'Permission Created!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permissions')->with($notification);
    }

    public function per_edit($id){
       
        $permission = Permission::findOrfail($id);

        return view('backend.rp_pages.permission.edit_permission',compact('permission'));
    }

    public function per_update(Request $request) {
        
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
         
        $notification = array(
            'message' => 'Permission Updated!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permissions')->with($notification);
    }

    public function per_delete($id){
        
        
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    ////////////// Role Functions ////////////////////
    public function role_all() {
        
        $roles = Role::all();

        return view('backend.rp_pages.role.all_role',compact('roles'));
    }

    public function role_add(){
        
        return view('backend.rp_pages.role.add_roles');
    }

    public function role_store(Request $request){
        
        $role = Role::create([
            'name' => $request->name
        ]);
         
        $notification = array(
            'message' => 'Role Created!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function role_edit($id) {
        
        $role = Role::findOrFail($id);

        return view('backend.rp_pages.role.edit_role',compact('role'));
    }

    public function role_update(Request $request){
        
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function role_delete($id){
        
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
     ////////////// Role Permission Functions ////////////////////

    public function rp_add(){
        
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backend.rp_pages.rp.add_roles_permission',compact('roles','permissions','permission_groups'));
    }

    public function rp_store(Request $request) {

        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item) {

            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }
        
        $notification = array(
            'message' => 'Role Permission Added!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function rp_all() {

        $roles = Role::all();
        return view('backend.rp_pages.rp.all_roles_permissions',compact('roles'));
    }

    public function rp_edit($id){
        
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backend.rp_pages.rp.edit_roles_permission',compact('role','permissions','permission_groups'));
    }

    public function rp_update(Request $request, $id) {
        
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if(!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        
        $notification = array(
            'message' => 'Role Permission Updated!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function rp_delete($id) {
       
        $role = Role::findOrFail($id);

        if(!is_null($role)){
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }
}
