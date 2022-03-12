<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;//category model
class CategoryController extends Controller
{
    //add category
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
    //view categories
    function viewCategory()
    {
        return Category::all();
        
    }

    //edit
    function editCategory($id)
    {
        $category=Category::find($id);
        if($category)
        {
            return response()->json([
                'category'=>$category 
            ]);
        }
        else
        {
            return response()->json([
                'category'=>'Category ID is not find' 
            ]);
        }

    }

    //update
    function updateCategory(Request $request)
    {
        $category=Category::find($request->id);
        if($category)
        {
            $category->name=$request ->input('name');//$category->name = table feild  , input('name') = front end input value
            $category->description=$request ->input('description');
            $category->save();
            return response()->json([
                'message'=>'Category updated sucessfully.',
            ]);
        }
        else
        {
            return response()->json([
                'message'=>'No record found.',
            ]);
        }
        
    }

    //delete category
    function deleteCategory($id)
    {
        $category=Category::find($id);
        if($category)
        {
            $result=-$category->delete();
            if($result)
            return["Result"=>"Category has been deleted"];
            else
            return["Result"=>"Category  has not been deleted"];
        }
        else{
            return response()->json([
                'message'=>'Category  has not found' 
            ]);
        }
        
    }

    
}
