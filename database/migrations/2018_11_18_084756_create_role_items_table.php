<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('role_items')->insert([
            'name' => 'site-informations-manage',
            'slug' => 'site-informations-manage',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_items')->insert([
            'name' => 'users-manage',
            'slug' => 'users-manage',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_items')->insert([
            'name' => 'index',
            'slug' => 'index',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_items')->insert([
            'name' => 'create',
            'slug' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_items')->insert([
            'name' => 'update',
            'slug' => 'update',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('role_items')->insert([
            'name' => 'delete',
            'slug' => 'delete',
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
        Schema::dropIfExists('role_items');
    }
}
