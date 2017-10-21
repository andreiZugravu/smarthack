@extends('layouts.app')

@section('content')

    @php($teams = collect(['']))

    @foreach($teams->chunk(3) as $collection)
    <div class="row">
        @foreach($collection as $team)
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="thumb">
                    <img src="assets/images/placeholder.jpg" alt="">

                    <a href="#" class="caption-overflow"></a>
                </div>

                <div class="caption text-center">
                    <h5 class="text-semibold no-margin">{{ $team->display_name }}</h5>
                    <p class="text-muted mb-15 mt-5">{{ $team->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

@endsection