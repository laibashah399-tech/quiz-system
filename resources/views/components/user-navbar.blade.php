  
  
  <nav class="bg-green-900 shadow-md px-4 py-3">
  
       <div class="flex justify-between items-center">
         <div class="text-2xl text-white hover:text-green-300 cursor-pointer">
            Quiz System
        </div>
        <div class="space-x-4">
            <a class="text-white hover:text-green-300" href="/">Home</a>
            <a class="text-white hover:text-green-300" href="/admin-categories">Categories</a>
            @if(Session::has('user'))
            <a class="text-white hover:text-green-300" href="/">Welcome {{ session::get('user')->name }}</a>
            <a class="text-white hover:text-green-300" href="/user-logout">Logout</a>
            @else
              <a class="text-white hover:text-green-300" href="/user-signup">Signup</a>
            <a class="text-white hover:text-green-300" href="/user-login">Login</a>
            @endif
            <a class="text-white hover:text-green-300" href="/admin-logout">Blog</a>

        </div>
       </div>

    </nav>