<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deputy extends Model
{

    use HasFactory;
    public $timestamps = true;
    protected $table = 'deputies';
    protected $primaryKey = 'deputy_id';
    protected $fillable = ['deputy_name'];


    public function directorates()
    {
        return $this->hasMany('app\Models\Directorate');
    }

}
