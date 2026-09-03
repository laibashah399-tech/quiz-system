
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')

</head>
<body>
    <x-user-navbar></x-user-navbar>
 <div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-3xl font-bold text-green-900 p-5 ">TEST YOUR KNOWLEDGE AND CHALLENGE YOURSELF WITH OUR QUIZZES.</h1>

    <div class="w-full max-w-md">
        <div class="relative">
             <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow" type="text" placeholder="Search for quizzes...">
             <button class="absolute right-2 top-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
             </button>
        </div>
    </div>
    <div class="w-200">
        <h1 class="text-2xl  font-semibold text-green-900 text-center my-5">Category List</h1>
       <ul class="border border-gray-200">
         <li class="p-2 font-bold">
          <ul class="flex justify-between">
            <li class="w-30">S.No</li>
            <li class="w-70">Name</li>  
            <li class="w-70">Quiz Count</li>  
            <li class="w-30">Action</li>

         </ul>
        </li>
           @foreach($categories as $key=>$category)
        <li class="even:bg-gray-200 p-2">
          <ul class="flex justify-between">
            <li class="w-30"> {{ $key+1}} </li>
            <li class="w-70"> {{ $category->name }} </li> 
            <li class="w-30"> {{ $category->quizzes_count}} </li>
             <li class="w-30 flex items-center gap-1">
              
                <a href="/user-quiz-list/{{ $category->id }}/{{ $category->name }}">
                 <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0000F5"><path d="M599-361q49-49 49-119t-49-119q-49-49-119-49t-119 49q-49 49-49 119t49 119q49 49 119 49t119-49Zm-187-51q-28-28-28-68t28-68q28-28 68-28t68 28q28 28 28 68t-28 68q-28 28-68 28t-68-28ZM220-270.5Q103-349 48-480q55-131 172-209.5T480-768q143 0 260 78.5T912-480q-55 131-172 209.5T480-192q-143 0-260-78.5ZM480-480Zm207 158q95-58 146-158-51-100-146-15 eight" viewBox="0 -960 960 960" width=" twentypx" fill="#BB twentypx"></svg>
                </a>
                
            </li>

         </ul>
        </li>
        @endforeach
       </ul>
    </div>
</div>

 </div>
 <x-footer-user></x-footer-user>       
</body>
