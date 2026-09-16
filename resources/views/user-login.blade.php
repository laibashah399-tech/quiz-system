<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    @vite('resources/css/app.css')
</head>
<body>

    <x-user-navbar></x-user-navbar>

<div class="bg-green-100 flex items-center justify-center min-h-screen">
    

    
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm"> 
        <h2 class="text-2xl text-center text-gray-800 mb-6"> User Login </h2>
         @error('user')
            <div class="text-red-500">{{ $message }}</div>
             @enderror
         
        <form action="/user-login" method="post" class="space-y-4">
            @csrf
           


              <div>
                <label for="" class="text-gray-800 mb-1">User Email:</label>
                <input type="text" placeholder="example12@email.com" name="email"  class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @error('email')
                <div class="text-red-500">{{ $message }}</div>
                 @enderror
            </div>


         <div>
            <label for="" class="text-gray-800 mb-1">User password:</label>
            <input type="password" placeholder="Enter User password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            @error('password')
            <div class="text-red-500">{{ $message }}</div>
             @enderror
         </div>

          

         <button type="submit" class="bg-blue-500 w-full text-white py-2 px-4 rounded-xl hover:bg-blue-600">Login</button>
        </form>
    </div>
    </div>
</body>
</html>


