@extends('layouts.app')

@section('content')

    @if(isset($teams))
        @foreach($teams->chunk(4) as $collection)
            <div class="row">
                @foreach($collection as $team)
                    <div class="col-xs-6 col-md-3">
                        <div class="thumbnail">
                            <div class="thumb">
                                <img src="{{ $team->avatar }}" alt="">

                                <a href="{{ route('teams.show', $team->id) }}" class="caption-overflow"></a>
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

    <ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
        <li>
            <a href="#" data-popup="tooltip" title="Create team" data-toggle="modal" data-target="#store_modal"
               class="fab-menu-btn btn bg-success btn-float btn-rounded btn-icon">
                <i class="fab-icon-open icon-plus3"></i>
                <i class="fab-icon-close icon-cross2"></i>
            </a>
        </li>
    </ul>

    <div id="store_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Create team</h5>
                </div>

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Avatar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                {!! Form::open(['url' => route('teams.store'), 'method' => 'PUT']) !!}
                                <td><input type="text" class="form-control" value="Mark"></td>
                                <td><input type="text" class="form-control" value="Otto"></td>
                                <td>
                                    <div class="uploader"><input accept="image/*" type="file" class="file-styled">
                                        <span class="filename" style="user-select: none;">No file selected</span><span
                                                class="action btn btn-default"
                                                style="user-select: none;">Choose File</span></div>
                                </td>
                                {!! Form::close() !!}
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Create</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

    {!! Html::script('/assets/js/smarthack/teams/index.js') !!}

@endpush