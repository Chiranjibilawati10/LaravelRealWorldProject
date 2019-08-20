<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyHabbit;
use Validator;

class MyHabbitController extends Controller
{
    function index()
    {
     return view('habbit_list');
    }

    function insert(Request $request)
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
}
