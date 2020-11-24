<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'meeting_rooms';
    protected $primaryKey = 'meeting_room_id';
    protected $fillable = ['name','capacity','building','floor','room_number','more_info'];
}
