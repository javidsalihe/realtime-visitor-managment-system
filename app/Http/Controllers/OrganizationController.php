<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function index()
    {
        $organizationlist = Organization::orderBy('created_at','desc')->get();
        return view('organization.index',compact('organizationlist'));
    }

    public function store(Request $request)
    {
            $add_oranization = Organization::create($request->all());
            return redirect()->back();
    }

    public function OrganizationData($id){

        $exists = Organization::where('organization_id',$id)->get();
        return $exists;
    }

    public function UpdateOrganization(Request $request)
    {
        $update = Organization::find($request['organizationid'])->update($request->all());
        return redirect()->back();
    }


    public function destroy($id)
    {
        $delete = Organization::where('organization_id',$id)->delete();
        return redirect()->back();

    }

}
