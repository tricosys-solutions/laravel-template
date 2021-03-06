<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Role;

use App\Models\Role\Role;
use App\Models\Permission\Permission;
/**
 * Description of RoleService
 *
 * @author abhijitnaik
 */
class RoleService {
    
    public static function getAll(){
        return $roles = Role::all();
    }
    
    public static function find($id){
        $data = [];
        $data['role'] = Role::find($id);
        $data['permission'] = Permission::where("role_id",$id)->get();
        return $data;
    }
    
    public static function create(RoleCreateDTO $role){
        $role_r['description'] = $role->description;
        return Role::create($role_r);
    }
    
    public static function update(RoleUpdateDTO $role,$id){
        $role_r = Role::find($id);
        $role_r['description'] = $role->description;
        return $role_r->update();
    }
    
    public static function delete($id){
        return Role::find($id)->delete();
    }
}