<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;




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
        $mcqs=Mcq::where('quiz_id',$id)->get();
        session::put('firstMCQ',$mcqs[0]->id);
        

        $quizName=$name;
        return view('start-quiz',["quizcount"=>$quizcount,"quizName"=>$quizName]);
    }

     function userSignup(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);

        $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=> Hash::make($request->password)
     ]);
        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-url'))
            {
                $url=Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message', 'User Signup Successfully');
            }
            return redirect('/')->with('message', 'User Registered Successfully');
        }
     }

     function userLogout(){
        Session::forget('user');
        return redirect('/');
     }

     function userSignupQuiz(){
        Session::put('quiz-url',url()->previous());
        return view('user-signup');
     }

      function userLogin(Request $request){

        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required'
        ]);

         $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return "user not valid ,please check your email and password";
        }
        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-url'))
            {
                $url=Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message', 'User Login Successfully');
            }else
            return redirect('/');
        }
     }

      function userLoginQuiz(){
        Session::put('quiz-url',url()->previous());
        return view('user-login');
     }

     function mcq($id,$name){
     return view('mcq-page');

   }
}
