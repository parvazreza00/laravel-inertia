<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactmessage;

class ContactController extends Controller
{
    public function index(){
        return inertia('Contact/Index');
    }
    public function create(){
        return inertia('Contact/Create');
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'image' => 'required',
         ]);
         if($request->hasFile('image')){
            $file = $request->File('image');        
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/'),$fileName);
            $save = 'images/'.$fileName;
         }        
        
        Contactmessage::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'image' => $save,
        ]);
        return redirect()->to('/contact')->with('message','Contact Created Successfully');
    }
}
