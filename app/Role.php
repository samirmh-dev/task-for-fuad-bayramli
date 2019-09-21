<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

//    protected $guarded = ['id'];


    public function users(){
        return $this->hasOne('App\User');
    }

    public function role_items(){
        return $this->belongsToMany('App\RoleItem', 'role_items_roles');
    }




}
