<?php

namespace App\Models\User;

use App\Admin;
use Hash;
/**
 * Description of userService
 *
 * @author abhijitnaik
 */
class UserService {
    
    public static function getAll(){
        return $users = Admin::all();
    }
    
    public static function find($id){
        return $user = Admin::find($id);
    }
    
    public static function create(UserCreateDTO $user){
        $user_r['name'] = $user->name;
        $user_r['email'] = $user->email;
        $user_r['password'] = Hash::make($user->password);
        return Admin::create($user_r);
    }
    
    public static function update(UserUpdateDTO $user,$id){
        $user_r = Admin::find($id);
        $user_r['name'] = $user->name;
        $user_r['email'] = $user->email;
        return $user_r->update();
    }
    
    public static function delete($id){
        $user = Admin::find($id);
        return $user->delete();
    }
}