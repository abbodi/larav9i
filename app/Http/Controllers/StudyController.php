<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function index(){
        $resultat = Study::get();
        return view('home', compact('resultat'));
    }

    public function store(Request $request){
        // dd($request->input());
        // echo $request->name;

        $request->validate([
            //'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = date('YmdHis').'.'.$ext;
        
        $request->file('photo')->move(public_path('upload/'),$final_name);

        $study = new Study();
        $study->sname = $request->name;
        $study->sphoto = $final_name;
        $study->semail = $request->email;
        $study->save();

        return redirect()->route('home')->with('success','Data added successfuly');
    }

    public function edit($id){
        $study_single = Study::where('id',$id)->first();
        return view('edit', compact('study_single') );
    }

    public function update(Request $request, $id){
        
        $study = Study::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);

            if(file_exists(public_path('upload/'.$study->photo)) and !empty($study->sphoto)){
                unlink(public_path('upload/'.$study->sphoto));
            }
            

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('photo')->move(public_path('upload/'),$final_name);

            $study->sphoto = $final_name;
        }
       
        $study->sname = $request->name;
        $study->semail = $request->email;
        $study->update();

        return redirect()->route('home')->with('success','Data updated successfuly');
    }

    public function delete($id)
    {
        $study = Study::where('id',$id)->first();

        if(file_exists(public_path('upload/'.$study->photo)) and !empty($study->sphoto)){
            unlink(public_path('upload/'.$study->sphoto));
        }
        
        $study->delete();

        return redirect()->route('home')->with('success','Data deleted successfuly');
    }
}
