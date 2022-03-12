<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

use Validator;

class BooksController extends Controller
{
    //
    /*function getBooks()
    {
        return["name"=>"Happy"];
    }*/

    //get books from database
    function viewBooks()
    {
        return Books::all();
        
    }

    //add books
    function addBooks(Request $request)//because export use Illuminate\Http\Request;
    {
        $Books=new Books;

        $Books->name=$request->name;
        $Books->author=$request->author;
        $Books->publisher=$request->publisher;
        $Books->category=$request->category;
         $Books->file=$request->file;
        $result=$Books->save();
       
        
        
        
        
        if($result)
        {
            return["Result"=>"Book detail has been saved"];

        }
        else
        {
            return["Result"=>"Book detail has not been saved"];
        }
        
    }

    //save books with validation
    function saveBooks(Request $request)
    {
        $rules=array(
            "category"=>"required"
            //"name"=>"required"
        );

        $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $validator->errors();
            //return response()->json($validator->errors(),401);
        }
        else
        {
            $Books=new Books;
            $Books->name=$request->name;
            $Books->author=$request->author;
            $Books->publisher=$request->publisher;
            $Books->category=$request->category;
            $Books->file=$request->file;
            
            $result=$Books->save();
            if($result)
            {
                return["Result"=>"Book detail has been saved"];

            }
            else
            {
                return["Result"=>"Book detail has not been saved"];
            }
        
        }

    }

    //update book details
    function updateBooks(Request $request)
    {
        $Books=Books::find($request->id);
        $Books->name=$request->name;
        $Books->author=$request->author;
        $Books->publisher=$request->publisher;
        $Books->category=$request->category;
       // $Books->category=$request->description;
        $Books->file=$request->file;
        $result=$Books->save();
        if($result)
        {
            return["Result"=>"Book detail has been updated"];
        }
        else
        {
            return["Result"=>"Book detail has not been updated"];
        }
        
    }
    //delete books
    function deleteBooks($id)
    {
        $Books=Books::find($id);
        if($Books)
        {
            $result=$Books->delete();
            if($result)
            return["Result"=>"Book detail has been deleted"];
            else
            return["Result"=>"Book detail has not been deleted"];
        }
        else{
            return response()->json([
                'message'=>'Books is not find' 
            ]);
        }
        
    }

    //serach book
    function serachBooks($name)
    {
        return Books::where("name","like","%".$name."%")->get();
    }

    
    
}
