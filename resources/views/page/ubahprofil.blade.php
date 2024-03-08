@extends('layouts.master')
   @section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane"></h3>
        </div>
    </section>
    <section class="max-w-screen-md mx-auto ">
    <form action="/ubahprofil/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="flex flex-wrap justify-between flex-container">
            <div class="flex flex-col items-center w-2/6 bg-white rounded-md shadow-md max-[480px]:w-full">
                <img src="{{asset('asset/'.$user->picture)}}" alt="" class="rounded-full w-36 h-36">
                <input type="file" name="picture" class="items-center w-48 h-10 mt-4 border rounded-md">
                <button class="w-48 py-1 mt-4 text-white rounded-md bg-biru">Ubah Photo</button>
            </div>
            <div class="w-3/5 max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">
                        <h5 class="text-3xl text-center font-hurricane">Your Profile</h5>
                        <h5>Nama Lengkap</h5>
                        <input type="text"  name="nama_lengkap" class="py-1 rounded-md border border-black-900" value="{{$user->nama_lengkap}}">
                        <h5>email</h5>
                        <input type="text"  name="email" class="py-1 rounded-md border border-black-900" value="{{$user->email}}">    
                        <h5>Alamat</h5>
                        <input type="text" name="alamat" class="py-1 rounded-md border border-black-900" value="{{$user->alamat}}">
                        <button class="py-2 mt-4 text-blue rounded-md bg-blue-500">Perbaharui</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>