<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['role_id','permission'];
}
