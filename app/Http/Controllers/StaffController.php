<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use File;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Staff::all();
        return view('staff.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view('staff.create', ['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imgPath=$request->file('photo')->move('public/imgs');

        $data = new Staff;        
        $data->full_name = $request->full_name ;
        $data->department_id = $request->department_id;
        $data->photo = $imgPath;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
        $data->save();

        return redirect('admin/staff/create')->with('success', 'Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Staff::find($id);
        return view('staff.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::all();
        $data=Staff::find($id);
        return view('staff.edit', ['data'=>$data, 'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
        if($request->hasFile('photo')){
            File::delete($request->prev_photo);  
            $imgPath=$request->file('photo')->move('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        } 

        $data=Staff::find($id);        
        $data->full_name = $request->full_name ;
        $data->department_id = $request->department_id;
        $data->photo = $imgPath;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
        $data->save();

        return redirect('admin/staff/'.$id.'/edit')->with('success', 'Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Staff::where('id',$id)->first();
        File::delete($data->photo);
        Staff::where('id',$id)->delete();
        return redirect('admin/staff')->with('success', 'Data has been deleted.');
    }

    //Add Payment
    function add_payment($staff_id){
        return view('staffpayment.create', ['staff_id'=>$staff_id]);
    }

    function save_payment($staff_id, Request $request){
        $data = new StaffPayment;
        $data->staff_id = $staff_id;
        $data->amount = $request->amount;
        $data->payment_date = $request->payment_date;
        $data->save();

        return redirect('admin/staff/payment/'.$staff_id.'/add')->with('success', 'Data has been added.');
    }

    function all_payment(Request $request, $staff_id){
        $data = StaffPayment::where('staff_id',$staff_id)->get();
        $staff = Staff::find($staff_id);
        return view('staffpayment.index', ['staff_id'=>$staff_id, 'data'=>$data, 'staff'=>$staff]);
    }

    function delete_payment($id, $staff_id){
        StaffPayment::where('id',$id)->delete();
        return redirect('admin/staff/payment/'.$staff_id)->with('success', 'Data has been deleted.');
    }
}
