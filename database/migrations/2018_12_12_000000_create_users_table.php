<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('role_id')->nullable();
            $table->string('img')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Fuad',
            'role_id' => 1,
            'img' => '1555180218.jpg',
            'email' => 'f@mail.ru',
            'email_verified_at' => NULL,
            'password' => '$2y$10$wazhSeKKlRK9qlPpUxPipO7tuqk2KCSysWR0AAZLzvM0h.8Vx5DDG',
            'remember_token' => 'AB3gOcPZsvqLo1DAWF7KOxeHyxBPwcmmKHwYR32AvXwY8ayWuS0uo4s6bMHl',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'SITE USER',
            'role_id' => 2,
            'img' => NULL,
            'email' => 'fuadbayramli94@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$wazhSeKKlRK9qlPpUxPipO7tuqk2KCSysWR0AAZLzvM0h.8Vx5DDG',
            'remember_token' => NULL,
            'created_at' => now(),
            'updated_at' => now(),
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
