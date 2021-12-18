<?php

namespace App\Models;

use App\Http\Traits\Manage\AdminUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, AdminUser;

    protected $table = 'roles';

    //primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function manageUsers()
    {
        return $this->belongsToMany('App\Models\Admin', 'App\Models\AdminRole');
    }
}
