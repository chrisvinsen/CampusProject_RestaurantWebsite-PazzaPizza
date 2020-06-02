<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateModelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email'>unique();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('photo_profile')->nullable();
            $table->string('password');
            $table->string('type')->default('user');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'firstname'        => 'Developer', 
            'email'            => 'pazza@pizza.com',
            'birthdate'        => '2000-10-17',
            'gender'           => 'Male',
            'password'         => Hash::make("dev_pazzapizza"),
            'type'             => 'admin'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
