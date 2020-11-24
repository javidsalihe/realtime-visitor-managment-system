<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{

        public function GuestForm(){

            $userid= Auth::getUser()->id;
            $organization = Organization::all();
            $guest = Guest::leftjoin('organizations','organizations.organization_id','=','guests.organization_id')
                ->where('id',$userid)
                ->where('status','no')
                ->orderby('guest_id','asc')
                ->get();
            return view('guest.form',compact('organization','userid','guest'));

        }



        function StoreGuest(Request $request){

            $userid = Auth::getUser()->id;

            $guest = new Guest();
            $guest->guest_name =trim($request["guest_name"]);
            $guest->guest_email =trim($request["guest_email"]);
            $guest->guest_phone =trim($request["guest_phone"]);
            $guest->guest_position =trim($request["guest_position"]);
            $guest->guest_type =trim($request["guest_type"]);
            $guest->visit_date =trim($request["visit_date"]);
            $guest->visit_time =trim($request["visit_time"]);
            $guest->visit_purpose =trim($request["visit_purpose"]);
            $guest->vehicle_info =trim($request["vehicle_info"]);
            $guest->door  =trim($request["door"]);
            $guest->status = 'no';
            $guest->organization_id  =trim($request["organization_id"]);
            $guest->id= $userid;
            $guest->save();
            if ($guest){
                return redirect()->back();
            }

        }

        public function RemoveGuest($id){

            $delete = Guest::find($id)->delete();
            if ($delete){
                return redirect()->back();
            }
        }

        public function ApproveToAop(Request $request){

            $id_count = count($request['guest_ids']);
            for($i = 0; $i < $id_count; $i++){

                $result = Guest::where('guest_id', $request['guest_ids'][$i])
                    ->update(['status' => 'ok']);
            }

            if ($result){
                return redirect()->back();
            }

        }
}
