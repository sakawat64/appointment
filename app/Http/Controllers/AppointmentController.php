<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Division;
use App\Category;
use App\Doctor;
use App\User;
use App\Appointment;
use Auth;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $divisions = Division::all();
        $categories = Category::all();
        return view('appointment.index')->with('divisions',$divisions)->with('categories',$categories);
    }
    public function Getdistrict($id)
    {
        $district = District::with('division')->where('division_id',$id)->get();;
        return json_encode($district);

    }
    public function doctorlist(Request $request)
    {
        if(Auth::user()){
        $category = $request->category;
        $district = $request->district;
        if($category != null && $district == null ){
        $doctors = Doctor::with('category','district')
                 ->where('category_id',$category)
                 ->get();
               //  echo "cat";
        }
        if($district != null && $category == null)
        {
            $doctors = Doctor::with('category','district')
            ->Where('district_id', $district)
            ->get();
           // echo "dis";
        }
        if($district != null && $category != null)
        {
            $doctors = Doctor::with('category','district')
            ->Where('district_id', $district)
            ->Where('category_id', $category)
            ->get();
           // echo "cat+dis";
        }
        if($district == null && $category == null)
        {
            $doctors = Doctor::with('category','district')->get();
        }
        return view('appointment.doctorlist')->with('doctors',$doctors);
        }
        else
        {
            return redirect()->route('register');
        }

    }
    public function doctorlistall(Request $request)
    {
        if(Auth::user()){
            $doctors = Doctor::with('category','district')->get();
            return view('appointment.doctorlist')->with('doctors',$doctors);
        }
        else
        {
            return redirect()->route('register');
        }
    }
    public function appointment(Request $request)
    {
        $this->validate($request,[
            'doctor' => 'required',
            'date' => 'required',
        ]);
        $doctor_id = $request->doctor;
        $appointment_date = $request->date;
        $data = [
            'doctor_id' => $doctor_id,
            'user_id'=> Auth::user()->id,
            'appointment_date'=>$appointment_date,
        ];
        Appointment::create($data);
        return redirect()->route('home');
    }
}
