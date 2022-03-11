<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;//category model
class CategoryController extends Controller
{
    //
    function store(Request $request)
    {
        //validation
        /*$validator=Validator::make($request ->all(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        //validation fails
        if($validator->fails())
        {
            return response()->json([
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {*/
            $category=new Category;
            $category->name=$request ->input('name');//$category->name = table feild  , input('name') = front end input value
            $category->description=$request ->input('>description');
            $category->save();
            return response()->json([
                'message'=>'Category added sucessfully.',
            ]);
        //}




        
    }
}
