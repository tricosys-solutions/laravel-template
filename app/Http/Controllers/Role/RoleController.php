<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role\RoleService;
use App\Models\Role\RoleCreateDTO;
use App\Models\Role\RoleUpdateDTO;
use App\Models\Permission\Permission;

class RoleController extends Controller {

    public function index() {
        try {
            $roles = RoleService::getAll();
            return view('admin.role.roleIndex', compact('roles'));
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function find($id) {
        try {
            $role = RoleService::find($id);
            return view('admin.role.editRole', compact('role'));
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function newRole() {
        try {
            $permissions = config("app.permissions");
            return view('admin.role.createRole', compact('permissions'));
        } catch (Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function create(Request $request) {
        try {
            $data = $request->all();
            $permissions = json_decode($data['hdnPermissions']);
            $role = new RoleCreateDTO();
            $role->description = $data['description'];
            $role_r = RoleService::create($role);
            if (!empty($role_r)) {
                foreach ($permissions as $permission) {
                    $per['role_id'] = $role_r->id;
                    $per['permission'] = $permission;
                    $permission_r = Permission::create($per);
                }
                return redirect('admin_role_new')->with('createRoleMessage', 'Role Created Successfully');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $data = $request->all();
            $role = new RoleUpdateDTO();
            $role->description = $data['description'];
            $role_r = RoleService::update($role, $id);
            if (!empty($role_r)) {
                return redirect('admin_roles')->with('updateRoleMessage', 'Role Updated Successfully');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function delete($id) {
        try {
            $role = RoleService::delete($id);
            if ($role) {
                return redirect('admin_roles')->with('deleteRoleMessage', 'Role Deleted successfully!');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

}
