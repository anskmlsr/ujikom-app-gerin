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
        @csrf
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="exploredata">
              

            </div>
        </div>
    </section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endpush
