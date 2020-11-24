<?php

namespace App\Http\Controllers;

use App\MeetingRoom;
use Illuminate\Http\Request;

class CalendarController extends Controller
{


    public function Calendar(){

        $meeting_room = MeetingRoom::all();
        return view('calendars.calendar',compact('meeting_room'));

    }
}
