<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionRoleModel;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';

    // Define the relationship with PermissionRoleModel
    public function permissions()
    {
        return $this->hasMany(PermissionRoleModel::class, 'role_id', 'id');
    }

    // Trigger cascade delete on related permissions
    protected static function booted()
    {
        static::deleting(function ($role) {
            $role->permissions()->delete();
        });
    }

    // Fetch a single role by ID
    static public function getSingle($id)
    {
        return RoleModel::find($id);
    }

    // Fetch all roles
    static public function getRecord()
    {
        return RoleModel::get();
    }
    
}
