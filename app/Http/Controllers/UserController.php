<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;



class UserController extends Controller
{
    function welcome(){

        $categories=Category::withcount('quizzes')->get();

        // $categories=Category::get();
        return view('welcome',["categories"=>$categories]);
    }

      function userQuizList($id,$category){
    
         $quizData=Quiz::withCount('Mcqs')->where('category_id',$id)->get();  
         

            return view('user-quiz-list',["quizData"=>$quizData,"category"=>$category]);

    }

    function startQuiz($id,$name){
        $quizcount=Mcq::where('quiz_id',$id)->count();
        $quizName=$name;

        return view('start-quiz',["quizcount"=>$quizcount,"quizName"=>$quizName]);
    }

     function userSignup(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);
     }
}
