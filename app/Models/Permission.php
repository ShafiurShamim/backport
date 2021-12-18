<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    protected $table = 'permissions';

    //primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public const PERMISSION_TYPES = ['browse', 'read', 'add', 'edit', 'delete'];

    protected $fillable = [
        'key',
        'table_name',
    ];
    
    public function permissionRoles()
    {
        return $this->belongsToMany('App\Models\Permission')->using('App\Models\PermissionRole');
    }
}
