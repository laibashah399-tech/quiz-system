<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Quiz;

class UserController extends Controller
{
    function welcome(){

        $categories=Category::withcount('quizzes')->get();

        // $categories=Category::get();
        return view('welcome',["categories"=>$categories]);
    }

      function userQuizList($id,$category){
    
         $quizData=Quiz::where('category_id',$id)->get();  
         

            return view('quiz-list',["quizData"=>$quizData,"category"=>$category]);

    }
}
