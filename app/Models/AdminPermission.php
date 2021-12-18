<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    protected $table = 'admin_permission';

    // public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = false;
}
