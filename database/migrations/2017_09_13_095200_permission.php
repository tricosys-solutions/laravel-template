<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permission extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('permission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
