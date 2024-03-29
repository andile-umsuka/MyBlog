<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('for');
            $table->timestamps();
        });

        Schema::create('permission_role', function($table){
            $table->integer('role_id');
            $table->integer('permission_id');
        });

        // Schema::create('permission_user', function($table){
        //     $table->integer('user_id');
        //     $table->integer('permission_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
