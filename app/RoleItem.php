<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleItem extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];


    public function roles(){
        return $this->belongsToMany('App\Role', 'role_items_roles');
    }






}
