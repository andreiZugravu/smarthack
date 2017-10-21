@extends('layouts.app')

@push('styles')

@endpush

@section('content')

    <div class="row">
        <div class="col-lg-9">

        </div>

        <div class="col-lg-3">

            <!-- User thumbnail -->
            <div class="thumbnail">
                <div class="thumb thumb-rounded thumb-slide">
                    <img src="{{ $team->avatar }}" alt="">
                </div>

                <div class="caption text-center">
                    <h6 class="text-semibold no-margin">{{ $team->display_name }} <small class="display-block">{{ $team->description }}</small></h6>
                </div>
            </div>
            <!-- /user thumbnail -->

            <!-- Connections -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Team members</h6>
                </div>

                <ul class="media-list media-list-linked pb-5">
                    <li class="media-header">Team Lead</li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="/assets/images/placeholder.jpg" class="img-circle" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">James Alexander</span>
                                <span class="media-annotation">UI/UX expert</span>
                            </div>
                        </a>
                    </li>

                    <li class="media-header">Members</li>

                    @foreach($team->users ?? [] as $user)
                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="{{ $user->avatar }}" class="img-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading text-semibold">{{ $user->name }}</span>
                                    <span class="media-annotation">{{ $user->email }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /connections -->

        </div>
    </div>

@endsection