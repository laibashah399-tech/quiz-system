
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')

</head>
<body>
   <x-user-navbar ></x-user-navbar>
  
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
  
        <h1 class="text-4xl text-center text-green-800 mb-6 font-bold">  {{ $quizName }}  
             
        </h1>
        <h2 class="text-lg text-center text-green-800 mb-6 font-bold">This quiz contain {{ $quizcount }} questions and no limit to attempt this quiz.</h2>

        <h3 class="text-2xl text-center text-green-800 mb-6 font-bold">Good Luck!</h3>

        @if(session('user'))


            <a type="submit" href="/mcq/{{ session('firstMCQ') }}/{{ $quizName }}" class="bg-green-500  text-white py-2 my-5 px-4 rounded-md hover:bg-green-800"> Start Quiz</a>
         @else
         <a type="submit" href="/user-signup-quiz" class="bg-green-500  text-white py-2 my-5 px-4 rounded-md hover:bg-green-800">Signup to start quiz</a>

          <a type="submit" href="/user-login-quiz" class="bg-green-500  text-white py-2 my-5 px-4 rounded-md hover:bg-green-800">Login to start quiz</a>

            @endif


</div>
</body>
</html>

