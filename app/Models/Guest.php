<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{


    use HasFactory;
    public $timestamps = true;
    protected $table = 'guests';
    protected $primaryKey = 'guest_id';
    protected $fillable = ['guest_name','guest_position','guest_type','visit_date','visit_time'];


    public function users(){
        return $this->belongsTo('App\Models\User');
    }
    public function organizations(){
        return $this->belongsTo('App\Models\Organization');
    }

}
