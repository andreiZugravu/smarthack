@extends('layouts.app')

@section('content')

    @if($teams ?? false)
        @foreach($teams->chunk(4) as $collection)
            <div class="row">
                @foreach($collection as $team)
                <div class="col-xs-6 col-md-3">
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
    @else
        <h1>You are not working in any team</h1>
    @endif


@endsection