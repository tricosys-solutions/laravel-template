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
    
    public static function getById($id){
        return $user = Admin::find($id);
    }
    
    public static function create(UserCreateDTO $user){
        $user_r['name'] = $user->name;
        $user_r['email'] = $user->email;
        $user_r['password'] = Hash::make($user->password);
        return Admin::create($user_r);
    }
}