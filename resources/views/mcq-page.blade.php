
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MCQ Page</title>
    @vite('resources/css/app.css')

</head>
<body>
   <x-user-navbar ></x-user-navbar>
  
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
  
        <h1 class="text-2xl text-center text-green-800 mb-6 font-bold"> Java 10 question for interview preparation
        </h1>

        <h2 class="text-2xl text-center text-green-800 mb-6 font-bold"> Question 1 of 10.
        </h2>

        <div class="mt-4 p-4 bg-white rounded-xl border-4 shadow-4xl w-180 max-w-2xl">
            <h3 class="text-green-900 font-semibold text-xl mb-4">Q.1 What is the default value of a local variable in Java?
            </h3>
            <form action="" class="space-y-4" method="get">
                <label for="option_1" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_1"class="form-radio text-blue-500" type="radio">
                    <span class="text-green-900 pl-2">0</span>
                </label>

                <label for="option_2" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_2"class="form-radio text-blue-500" type="radio">
                    <span class="text-green-900 pl-2">null</span>
                </label>

                <label for="option_3" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_3"class="form-radio text-blue-500" type="radio">
                    <span class="text-green-900 pl-2">Depends upon the type of variable</span>
                </label>

                <label for="option_4" class="flex border-2 p-3 mt-2 rounded-2xl shadow-2xl hover:bg-green-50 cursor-pointer">
                    <input  id="option_4"class="form-radio text-blue-500" type="radio">
                    <span class="text-green-900 pl-2">No default value for local variables</span>
                </label>
                <button type="submit" class="bg-green-500 w-full text-white py-2 px-4 rounded-xl hover:bg-green-900">Submit Answer and Next</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>

