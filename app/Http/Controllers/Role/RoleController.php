<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role\RoleService;
use App\Models\Role\RoleCreateDTO;
use App\Models\Role\RoleUpdateDTO;
use App\Models\Permission\PermissionService;
use App\Models\Permission\PermissionCreateDTO;

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
            $data = RoleService::find($id);
            $permissions = config("app.permissions");
            $role = $data['role'];
            $editPermissions = [];
            $rolePermissions = [];
            foreach ($data['permission'] as $per) {
                $str = $per['permission'];
                array_push($rolePermissions, $str);
                $arr = explode("-", $str);
                $rolePer['controller'] = $arr[0];
                $rolePer['action'] = $arr[1];
                array_push($editPermissions, $rolePer);
            }
            $rolePermissions = json_encode($rolePermissions);
            return view('admin.role.editRole', compact('role', 'permissions', 'rolePermissions', 'editPermissions'));
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
            $per_r = new PermissionCreateDTO;
            if (!empty($role_r)) {
                foreach ($permissions as $permission) {
                    $per_r->role_id = $role_r->id;
                    $per_r->permission = $permission;
                    $permission_r = PermissionService::create($per_r);
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
            $permissions = json_decode($data['hdnEditPermissions']);
            $role = new RoleUpdateDTO();
            $role->description = $data['description'];
            $role_r = RoleService::update($role, $id);
            $per_r = new PermissionCreateDTO;
            $perByRoles = PermissionService::getByRoleId($id);
            if (!empty($role_r)) {
                foreach ($perByRoles as $perByRole) {
                    PermissionService::delete($perByRole->id);
                }
                foreach ($permissions as $permission) {
                    $per_r->role_id = $id;
                    $per_r->permission = $permission;
                    $permission_r = PermissionService::create($per_r);
                }
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
                $perByRoles = PermissionService::getByRoleId($id);
                foreach ($perByRoles as $perByRole) {
                    PermissionService::delete($perByRole->id);
                }
            }
            if ($role) {
                return redirect('admin_roles')->with('deleteRoleMessage', 'Role Deleted successfully!');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

}
