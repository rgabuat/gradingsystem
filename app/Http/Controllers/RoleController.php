<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // $roles = Role::all()->pluck('name');

        $roles_permission = Role::with('permissions')->get();

        
        // foreach($roles_permission as $permission)
        // {
        //     $perm = $permission->permissions;
            
        //     foreach($perm as $per)
        //     {
        //         echo $per->id;
        //     }

        // }

        return view('admin.RolesList',compact('roles_permission'));
    }
}
