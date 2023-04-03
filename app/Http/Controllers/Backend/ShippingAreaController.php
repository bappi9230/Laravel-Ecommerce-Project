<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.division_view',compact('divisions'));
    }//end method

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
            'division_name' =>$request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Name Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function DivisionEdit($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.division_edit',compact('division'));
    }//end method

    public function DivisionUpdate(Request $request, $id){

        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Division Name Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);

    } // end mehtod

    public function DivisionDelete($id){

        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Name Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    ////////////////////////ship district/////////////////////////////




    public function DistrictView(){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        return view('backend.ship.district.district_view',compact('divisions','districts'));
    }//end method

    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
            'division_id' =>$request->division_id,
            'district_name' =>$request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Name Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method

    public function DistrictEdit($id){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('district','divisions'));

    }//end method

    public function DistrictUpdate(Request $request, $id){

        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'District Name Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);

    } // end mehtod

    public function DistrictDelete($id){

        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Name Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }

///////////////////////   state manage //////////////////////////////

    public function StateView(){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $states = ShipState::orderBy('id','DESC')->get();
        return view('backend.ship.state.state_view',compact('divisions','districts','states'));
    }  //end method

    ////District Selection ajax method
    public function DistrictSelection($division_id){

        $districts = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','DESC')->get();
        return json_encode($districts);

    }  //end method


     ////District Selection ajax method
    public function StateSelection($district_id){

        $states = ShipState::where('district_id',$district_id)->orderBy('state_name','DESC')->get();
        return json_encode($states);

    }  //end method

    public function StateStore(Request $request){

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShipState::insert([
            'division_id' =>$request->division_id,
            'district_id' =>$request->district_id,
            'state_name' =>$request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Name Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method

    public function StateEdit($id){

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts =  ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.state_edit',compact('state','divisions','districts'));

    } //end method


    public function StateUpdate(Request $request,$id){

        ShipState::findOrFail($id)->update([
            'division_id' =>$request->division_id,
            'district_id' =>$request->district_id,
            'state_name' =>$request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-state')->with($notification);
    }//end method

    public function StateDelete($id){

        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method
}
