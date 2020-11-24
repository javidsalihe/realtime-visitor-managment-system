<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deputy;

class DeputyController extends Controller
{


    public function index()
    {
        $deputylist = Deputy::orderBy('created_at','desc')->get();
        return view('deputy.index',compact('deputylist'));
    }

    public function store(Request $request)
    {
        $add_deputy = Deputy::create($request->all());
        return redirect()->back();
    }

    public function DeputyData($id){

        $exists = Deputy::where('deputy_id',$id)->get();
        return $exists;
    }

    public function UpdateDeputy(Request $request)
    {
        $update = Deputy::find($request['deputyid'])->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $delete = Deputy::where('deputy_id',$id)->delete();
        return redirect()->back();

    }

}
