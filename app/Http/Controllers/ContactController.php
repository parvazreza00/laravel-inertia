<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactmessage;
use App\Http\Resources\StudentResource;

class ContactController extends Controller
{
    public function index(){
        return inertia('Contact/Index', [
            'students' => StudentResource::collection(
                Contactmessage::latest()->paginate(5)
            ),
        ]);
       
    }
    public function create(){
        
        return inertia('Contact/Create');
    }

    
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric|min:7|max:150',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',            
            'image' => 'required|mimes:jpg,jpeg,png|size:2048',            
         ]);

         if($request->hasFile('image')){
            $file = $request->File('image');        
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/'),$fileName);
            $save = 'images/'.$fileName;
         }        
        
        Contactmessage::insert([
            'student_id' => 'SID'.random_int(100000, 999999),
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'image' => $save,
        ]);
        return redirect()->to('/students')->with('message','Student Created Successfully');
    }

    public function student_destroy($id){
        Contactmessage::findOrFail($id)->delete();
        return redirect()->to('/students')->with('message','Student Deleted Successfully');
    }

    public function student_edit($id){
        return inertia('Contact/Edit',[
            'student' => Contactmessage::findOrFail($id),
        ]);
    }

    public function update_student(Request $request,$id)
    {     
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric|min:7|max:150',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',            
         ]);

        if($request->hasFile('image')){
            $file = $request->File('image');        
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/'),$fileName);
            $save = 'images/'.$fileName;
         }    

        Contactmessage::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'image' => $save,
        ]);

        return redirect()->to('/students')->with('message', 'Student Updated Successfully');
    }

    public function student_view($id){
        return inertia('Contact/View',[
            'student' => Contactmessage::findOrFail($id),
        ]);
    }
}
