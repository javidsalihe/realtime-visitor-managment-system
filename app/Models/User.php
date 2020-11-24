<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,HasRoles;
    protected $guard_name = 'web';
    public $timestamps = true;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','position','directory_name','deputy_name'];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function directorates()
    {
        return $this->belongsTo('app\Models\Directorate');
    }


    public function guests(){
        return $this->hasMany('app\Models\Guest');
    }
}
