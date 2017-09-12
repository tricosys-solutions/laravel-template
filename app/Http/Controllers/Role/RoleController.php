<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role\RoleService;
use App\Models\Role\RoleCreateDTO;
use App\Models\Role\RoleUpdateDTO;

class RoleController extends Controller {

    public function index() {
        $roles = RoleService::getAll();
        return view('admin.role.roleIndex', compact('roles'));
    }

    public function find($id) {
        $role = RoleService::find($id);
        return view('admin.role.editRole', compact('role'));
    }

    public function newRole() {
        return view('admin.role.createRole');
    }

    public function create(Request $request) {
        $data = $request->all();
        $role = new RoleCreateDTO();
        $role->description = $data['description'];
        $role_r = RoleService::create($role);
        if (!empty($role_r)) {
            return redirect('admin_role_new')->with('createRoleMessage', 'Role Created Successfully');
        }
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $role = new RoleUpdateDTO();
        $role->description = $data['description'];
        $role_r = RoleService::update($role, $id);
        if (!empty($role_r)) {
            return redirect('admin_roles')->with('updateRoleMessage', 'Role Updated Successfully');
        }
    }

    public function delete($id) {
        $role = RoleService::delete($id);
        if ($role) {
            return redirect('admin_roles')->with('deleteRoleMessage', 'Role Deleted successfully!');
        }
    }

}
