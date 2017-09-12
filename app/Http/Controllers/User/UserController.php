<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Models\User\UserService;
use App\Models\User\UserCreateDTO;
use App\Models\User\userUpdateDTO;

class UserController extends Controller {

    public function index() {
        try {
            $users = UserService::getAll();
            return view('admin.user.userIndex', compact('users'));
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function find($id) {
        try {
            $user = UserService::find($id);
            return view('admin.user.editUser', compact('user'));
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]], IlluminateResponse::HTTP_BAD_REQUEST);
        }
    }

    public function newUser() {
        return view('admin.user.createUser');
    }

    public function create(Request $request) {
        try {
            $data = $request->all();
            $user = new UserCreateDTO;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user_r = UserService::create($user);
            if (!empty($user_r)) {
                $user_r['message'] = "User Created successfully!";
            }
            return redirect('admin_user_new')->with('createMessage', $user_r['message']);
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function update($id, Request $request) {
        try {
            $data = $request->all();
            $user  = new userUpdateDTO();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user_r = UserService::update($user, $id);
            if (!empty($user_r)) {
                return redirect('admin_users')->with('updateMessage', 'User Updated successfully!');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]]);
        }
    }

    public function delete($id) {
        try {
            $user_d = UserService::delete($id);
            if ($user_d) {
                return redirect('admin_users')->with('deleteMessage', 'User Deleted successfully!');
            }
        } catch (\Exception $ex) {
            return Response::json(["error" => ["code" => 400, "messages" => [$ex->getMessage()]]], IlluminateResponse::HTTP_BAD_REQUEST);
        }
    }

}
