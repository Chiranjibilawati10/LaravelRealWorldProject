<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyHabbit;
use Validator;

class MyHabbitController extends Controller
{
    function index()
    {
      
      $habbitData = MyHabbit::orderBy('created_at', 'DESC')->where(['softDelete'=>0])->get();
    
        return view('habbit_list', compact(['habbitData']));
    }

    function store(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'name.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $name = $request->name;
     
      for($count = 0; $count < count($name); $count++)
      {
       $data = array(
        'name' => $name[$count]
       );
       $insert_data[] = $data; 
      }

      MyHabbit::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }

    function edit($id){

      $habbitData = MyHabbit::findOrFail($id);
    
      return view('habbit_edit', compact(['habbitData']));
    }

    function update(Request $request, $id){
      
      $update = MyHabbit::findOrFail($id);
    
        $update->name = $request->name;
        $updateData = $update->update();
        
        return redirect('habbit_list');
        
    }

    function delete($id){

      $delete = MyHabbit::findOrFail($id);
           $delete->softDelete = 1;
           $myDel = $delete->update();
           
           return back();
    }
}
