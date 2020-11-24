<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'directorates';
    protected $primaryKey = 'directorate_id';
    protected $fillable = ['directorate_name','deputy_id'];


    public function users()
    {
        return $this->hasMany('app\Models\User');
    }

    public function deputies()
    {
        return $this->belongsTo('app\Models\Deputy');
    }
}
