<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm"> 
        <h2 class="text-2xl text-center text-gray-800 mb-6"> Admin Login </h2>
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="" class="text-gray-600 mb-1">Admin name:</label>
                <input type="text" placeholder="Enter Admin name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
            </div>
         <div>
            <label for="" class="text-gray-600 mb-1">Admin Password:</label>
            <input type="password" placeholder="Enter Admin Password"  class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
         </div>
         <button type="submit" class="bg-blue-500 w-full text-white py-2 px-4 rounded-xl hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>
