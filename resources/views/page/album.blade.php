@extends('layouts.master')
@push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content') 
<section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-fontutama">Album</h3>
        </div>
    </section>
    <div class="items-center max-w-screen-md mx-auto ml-72 mt-4">
        <a href="/buat"><button class="bg-blue-800 py-1 mt-4 text-white rounded-full bg-biru"> + Buat Album</button></a>
    </div>
    <section class="mt-8">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container">

                @foreach ($albums as $album)

                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="/detail-album/{{ $album->id }}">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="{{asset('/asset/'.$album->foto)}}" alt="" class="w-full transition duration-500 hover:scale-105">
                            </div>
                        </a>
                        <div class="text-center font-semibold shadow-xl">
                            {{ $album->nama_album }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endsection
@push('footerjsexternal')
 <script src="/javascript/explore.js"></script> 
@endpush