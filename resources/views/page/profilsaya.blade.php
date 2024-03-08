@extends('layouts.master')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane"></h3>
        </div>
    </section>
    <section>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="" alt="" class="w-20h h-20 rounded-full w-24" id="fotoprofile">
            </div>
            <a href="/ubahprofil">
                <h3 class="text-xl font-semibold" id="nama">
                    
                </h3>
                <div>
                <a href="/ubahprofil"><button class="px-4 mt-4 text-white bg-black rounded-full">ubah profil</button></a>
              
            </div>

            <a href="/buat">
                <h3 class="text-xl font-semibold" id="nama"></h3>
                <div>  
            </div>

            <div class="flex flex-row mt-3">
                <div class="flex flex-wrap items-center flex container" id="dataprofil">
                    
                </div>
            </div>
        </div>
    </section>

    @endsection
@push('footerjsexternal')
<script src="/javascript/profil.js"></script>
@endpush