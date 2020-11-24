<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'organizations';
    protected $primaryKey = 'organization_id';
    protected $fillable = ['organization_name'];

    public function guests(){
        return $this->hasMany('App\Models\Guest','organization_id');
    }

}
