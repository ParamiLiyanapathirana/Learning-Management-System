<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
class UploadedBooksController extends Controller
{
    //
    function uploadedFiles(Request $request)
    {
        $result=$request->file('file')->store('LibraryBooks');//E:\LMS\storage\app\LibraryBooks
        return ["result"=>$result];
    }
}
