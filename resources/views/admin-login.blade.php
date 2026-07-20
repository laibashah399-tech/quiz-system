<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    
    <div class="bg-white p-12"> 
        <h2> Admin Login </h2>
        <form action="" method="POST">
            <div>
                <label for="">Admin name:</label>
                <input type="text" placeholder="Enter Admin name">
            </div>
         <div>
            <label for="">Admin Password:</label>
            <input type="password" placeholder="Enter Admin Password">
         </div>
         <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
