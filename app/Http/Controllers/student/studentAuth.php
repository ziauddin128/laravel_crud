<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentAuth extends Controller
{
    function list()
    {
       $data['result'] = DB::table('students')->get();

       return view('student.list',$data);
    }

    function submit(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "age"=>"required",
            "class"=>"required",
            "image"=>"required|mimes:jpg,jpeg,png,webp",
        ]);

        $image = $request->file('image');
        $extension = $image->extension();
        $file = time().".".$extension;
        $image->storeAs('public/students/',$file);

        $data = [
            "name"=>$request->input('name'),
            "age"=>$request->input('age'),
            "class"=>$request->input('class'),
            "image"=>$file,
            "added_on"=>date('Y-m-d h:i:s')
        ];

        DB::table('students')->insert($data);
        $request->session()->flash('msg2','Student Added Succssfully');
        return redirect('student/list');
    }


    function delete($id)
    {
        DB::table('students')->where('id',$id)->delete();
        session()->flash('msg2','Student Deleted Succssfully');
        return redirect('student/list');
    }

    function edit($id)
    {
        $data['result'] = DB::table('students')->where('id',$id)->get();
        if(isset($data['result'][0]->id))
        {
          return view('student/edit',$data);
        }
        else 
        {
            return redirect('student/list');
        }
    }

    function update($id,Request $request)
    {
        $request->validate([
            "name"=>"required",
            "age"=>"required",
            "class"=>"required",
            "image"=>"mimes:jpg,jpeg,png,webp",
        ]);

       
        $data = [
            "name"=>$request->input('name'),
            "age"=>$request->input('age'),
            "class"=>$request->input('class'),
        ];

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $extension = $image->extension();
            $file = time().".".$extension;
            $image->storeAs('public/students/',$file);
            $data['image']=$file;
        }

        DB::table('students')->where('id',$id)->update($data);
        session()->flash('msg2','Student Details Update Succssfully');
        return redirect('student/list');
     
    }
}
