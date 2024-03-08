<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/build.css" rel="stylesheet">
</head>

<body>
  <nav class="bg-white border-gray-200 bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <div> <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span></div>
      <div>
        <button
          class="self-center text-l font-semibold whitespace-nowrap dark:text-white bg-gray-500 py-1 rounded-full px-4 text-white mt-1 hover:bg-gray-700"><a
            href="/login">Login</a></button>
        <button
          class="self-center text-l font-semibold whitespace-nowrap dark:text-white bg-blue-500 py-1 rounded-full px-4 text-black hover:bg-gray-400"><a
            href="/Register">Sign Up</a></button>
      </div>
    </div>
  </nav>
  <nav>
    <div class="flex justify-center shadow-md max-w-screen-sm mx-auto mt-2 mb-9 ">
      <div class="bg-white p-4">
        <div class="font-fontutama text-5xl text-center gap-5">Register</div>
        
        <form action="Registered" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mx-auto">
         
        </div>
        <div class="flex flex-col gap-2">

        @if ($message = Session::get('success'))
                    <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only"></span>
                            <div class="text-sm font-medium ms-3">
                            {{ $message }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                <span class="sr-only"></span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                
                        </div>

                    @endif
          Username
       <input type="text" class="border border-gray-400 py-2 rounded-2xl" name="username"/>

          Password
          <input type="password" class="border border-gray-400 py-2 rounded-2xl" name="password" />
          
          
          Tanggal Lahir
          <input type="date" class="border border-gray-400 py-2 rounded-2xl text-gray-400" name="tanggal_lahir"/>

          Alamat
          <input type="text" class="border border-gray-400 py-2 rounded-2xl" name="alamat"/>
          <div class="flex flex-col gap-2">
            Email
            <input type="text" class="border border-gray-400 py-2 rounded-2xl" name="email"/>
            Nama Lengkap
            <input type="text" class="border border-gray-400 py-2 rounded-2xl" name="nama_lengkap"/>
            <input class="border border-black w-full py-2 rounded-xl mt-4 items-center px-4" type="file" name="picture" placeholder="Picture" />
            <div class="flex flex-col gap-2">

              <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">

                  <button type="submit" class="bg-blue-800 py-2 rounded-full text-white mt">Register</button>
</form>
</section>
</body>
</html>