<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Permission;

use App\Models\Permission\Permission;

/**
 * Description of PermissionService
 *
 * @author abhijitnaik
 */
class PermissionService {

    public static function getAll() {
        return Permission::all();
    }

    public static function getByRoleId($role_id) {
        return Permission::where("role_id",$role_id)->get();
    }

    public static function create(PermissionCreateDTO $per) {
        $per_r['role_id'] = $per->role_id;
        $per_r['permission'] = $per->permission;
        return Permission::create($per_r);
    }

    public static function update(PermissionUpdateDTO $per, $id) {
        $permission = Permission::find($id);
        $permission['role_id'] = $per->role_id;
        $permission['permission'] = $per->permission;
        return $permission->update();
    }

    public static function delete($per_id){
        return Permission::find($per_id)->delete();
    }
}
