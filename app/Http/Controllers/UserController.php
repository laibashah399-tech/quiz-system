<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;





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
        Session::put('firstMCQ',$mcqs[0]->id);
        

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

function mcq($id, $name)
{
    $firstMCQ = Mcq::find(Session::get('firstMCQ'));

    $record = new Record();

    $record->user_id = Session::get('user')->id;
    $record->quiz_id = $firstMCQ->quiz_id;
    $record->status = 1;

    if ($record->save()) {

        $currentQuiz = [];

        $currentQuiz['totalMcq'] = Mcq::where(
            'quiz_id',
            $firstMCQ->quiz_id
        )->count();

        $currentQuiz['currentMcq'] = 1;
        $currentQuiz['quizName'] = $name;
        $currentQuiz['quizId'] = $firstMCQ->quiz_id;

        Session::put('currentQuiz', $currentQuiz);

        $mcqData = Mcq::find($id);

        return view('mcq-page', [
            'quizName' => $name,
            'mcqData' => $mcqData
        ]);

    } else {

        return "something wents wrong";
    }
}

          function submitAndNext($id){
            $currentQuiz=Session::get('currentQuiz');
            $currentQuiz['currentMcq'] += 1;
            $mcqData=Mcq::where([
                ['id','>',$id],
                ['quiz_id','=',$currentQuiz['quizId']]
            ])->first();

    Session::put('currentQuiz', $currentQuiz);
      
    if($mcqData){
          return view('mcq-page', [
        'quizName' => $currentQuiz['quizName'],
        'mcqData' => $mcqData
    ]);
    }
     else{
        return "result page";
     }
            
         }


   }

