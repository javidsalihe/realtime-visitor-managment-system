<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use App\Models\Directorate;
use Illuminate\Http\Request;

class DirectorateController extends Controller
{

    public function index()
    {
        $directorylist = Deputy::join('directorates','directorates.deputy_id','=','deputies.deputy_id')->get();
        $deputies = Deputy::all();
        return view('directore.index',compact('directorylist','deputies'));
    }

    public function store(Request $request)
    {
        $add_directory = Directorate::create($request->all());
        return redirect()->back();
    }

    public function DirectoryData($id){

        $exists =   Directorate::where('directorate_id',$id)->get();
        return $exists;
    }

    public function UpdateDirectory(Request $request)
    {
        $update = Directorate::find($request['directoryid'])->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $delete = Directorate::where('directorate_id',$id)->delete();
        return redirect()->back();

    }

}
