
    @extends('layouts.master')
    @push('cssjsexternal')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
    @section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane">a came</h3>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap px-2 flex-container">
                <div class="w-3/5 max-[480px]:w-full">
                    <div class="flex justify-center overflow-hidden">
                        <img src="" id="fotodetail" alt=""
                            class="w-full h-auto max-w-xl px-2 transition duration-500 ease-in-out hover:scale-105">
</div>
                            <div class="flex flex-col px-2">
                        <div class="font-semibold">
                            Judul Foto
                        </div>
                        <div>
                            <small class="text-abuabu"> Bawah </small>
                        </div>
                    </div>
                </div>
                <div class="w-2/5  max-[480px]:w-full">
                    <div class="flex flex-wrap items-center justify-between ">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <img src="/asset/came1.png" class="w-10" alt="">
                            </div>
                            <div class="flex flex-col">
                                <a href="/profilsaya" class="text-md">gecylaa</a>
                            </div>
                        </div>
                        <div>
                            <button class="px-4 rounded-full bg-bgcolor2">Ikuti</button>
                        </div>
                    </div>
                    <div class="mt-[33px]">
                        Comments
                    </div>
                    <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="listkomentar">

                        <!-- <div class="flex flex-row justify-start mt-4">
                            <div class="w-1/4">
                                <img src="/asset/user.jpeg" class="w-8 h-auto" alt="">
                            </div>
                            <div class="flex flex-col mr-2">
                                <h5 class="text-sm">Atas</h5>
                                <small class="text-xs text-abuabu">Bawah</small>
                            </div>
                            <h5 class="text-sm">Fotonya sangat Bagus Sekali, apakah saya bisa memintanya</h5>
                        </div> -->
                  
                       
                        <button class="px-4 rounded-full bg-biru"><span class="text-white bi bi-send"></span></button>
                    </div>
<!--                 
                    <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="listkomentar"> -->
                    <div class="flex gap-2 mt-4 flex-col">
                       
                    <div class="w-3/4 relative bottom-12"> 
                        <div class="flex gap-2 mt-4 flex-row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="text" name="isi_komentar" id="" class="w-full px-2 py-1 rounded-full border-slate-500">
                            <button type="submit" class="bg-blue-800 px-2 rounded-full bg-biru" onclick="kirimkankomentar()"><span class="text-white bi bi-send"></span></button>
                 </div>                       
                </section>
                    @endsection
                @push('footerjsexternal')
                <script src="{{asset('/javascript/exploredetail.js')}}"></script>
                @endpush











    
