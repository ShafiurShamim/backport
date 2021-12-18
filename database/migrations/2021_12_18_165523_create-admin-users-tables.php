<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTables extends Migration
{
    /**
      * Run the migrations.
      *
      * @return void
      */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token')->unique();
            $table->string('display_name')->default('');
            // $table->string('salt')->nullable();
            $table->string('activation_hash')->nullable();
            $table->tinyInteger('status')->default(0);
            // $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('table_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
  
        Schema::create('admin_role', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['admin_id', 'role_id']);
        });

        Schema::create('admin_permission', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['admin_id', 'permission_id']);
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('admin_role');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('admin_permission');
        Schema::dropIfExists('permissions');
    }
}
