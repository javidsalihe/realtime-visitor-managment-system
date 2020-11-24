<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;

class MeetingRoomController extends Controller
{

    public function index()
    {
        $meeting_room_list = MeetingRoom::all();
        return view('meeting-room.index',compact('meeting_room_list'));
    }

    public function store(Request $request)
    {
        $add_meeting_room = MeetingRoom::create($request->all());
        return redirect()->back();
    }

    public function MeetingRoomData($id){

        $exists =   MeetingRoom::where('meeting_room_id',$id)->get();
        return $exists;
    }

    public function UpdateMeetingRoom(Request $request)
    {
        $update = MeetingRoom::find($request['meetingroomid'])->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $delete = MeetingRoom::where('meeting_room_id',$id)->delete();
        return redirect()->back();

    }

}
