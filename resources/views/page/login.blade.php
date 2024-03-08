<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/build.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-white border-gray-200 bg-black">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div> <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span></div>
            <div>
                <button class="self-center text-l font-semibold whitespace-nowrap dark:text-white bg-blue-400 py-1 rounded-full px-4 text-white mt-1 hover:bg-gray-700"><a href ="/login">Login</a></button>
                <button class="self-center text-l font-semibold whitespace-nowrap dark:text-white bg-gray-400 py-1 rounded-full px-4 text-black hover:bg-gray-500"><a href="/Register">Sign Up</a></button>
              </div>
          </div>
        </div>
        </nav>
          <nav>
          <div class="flex justify-center shadow-md max-w-screen-sm mx-auto mt-20">
          <div class="bg-white">
           <div class="font-fontutama text-5xl text-center gap5">LOGIN</div>
           <div class="mx-auto">
 <form action="/auth" method="POST">
   @csrf
            </div>
            <div class="flex flex-col gap-2">
             username
              <input type="text" class="border border-gray-400 py-2 rounded-2xl" name="username"/>
              Password
              <input type="password" class="border border-gray-400 py-2 rounded-2xl" name="password"/>
               <div class="flex flex-col gap-4">
                  <div class="flex flex-col gap-8">
                    <button type="submit" class="bg-blue-800 py-3 rounded-full text-white mt-2 mb-9"><a href ="/login">Login</a></button>
                    <h5 class="mx-auto mt-4">belum punya akun?<a href="/Register" class="text-blue-500">di sini!</a></h5>
                    
                    </div>
                </button>
</form>
                </html>

             
            