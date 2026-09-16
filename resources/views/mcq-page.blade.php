
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MCQ Page</title>
    @vite('resources/css/app.css')

</head>
<body>
   <x-user-navbar ></x-user-navbar>
  
    <div class="bg-green-100 flex flex-col items-center min-h-screen pt-5">
  
        <h1 class="text-2xl text-center text-green-800 mb-3 font-bold"> {{ $quizName }}
        </h1>

        <h2 class="text-2xl text-center text-green-800 mb-3 font-bold"> Question No:{{session('currentQuiz')['totalMcq']}}
        </h2>

        
        <h2 class="text-xl text-center text-green-800 mb-3 font-semibold">{{session('currentQuiz')['currentMcq']}} of {{session('currentQuiz')['totalMcq']}}
        </h2>

        <div class="mt-4 p-4 bg-white rounded-xl border-4 shadow-4xl w-180 max-w-2xl">
            <h3 class="text-green-900 font-semibold text-xl mb-4">{{$mcqData->question}}
            </h3>
            <form action="/submit-next/{{$mcqData->id}}" class="space-y-4" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$mcqData->id}}">
                <label for="option_1" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_1"class="form-radio text-blue-500" type="radio" value="a" name="option">
                    <span class="text-green-900 pl-2">{{$mcqData->a}}</span>
                </label>

                <label for="option_2" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_2"class="form-radio text-blue-500" type="radio" value="b" name="option">
                    <span class="text-green-900 pl-2">{{$mcqData->b}}</span>
                </label>

                <label for="option_3" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_3"class="form-radio text-blue-500" type="radio" value="c" name="option">
                    <span class="text-green-900 pl-2">{{$mcqData->c}}</span>
                </label>

                <label for="option_4" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_4"class="form-radio text-blue-500" type="radio" value="d" name="option">
                    <span class="text-green-900 pl-2">{{$mcqData->d}}</span>
                </label>
                <button type="submit" class="bg-green-900 w-full text-white py-2 px-4 rounded-xl hover:bg-green-500">Submit Answer and Next</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>

