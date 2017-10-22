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
                    <h6 class="text-semibold no-margin"><span id="team-name">{{ $team->display_name }}</span>
                        @permission('edit-team')
                        <a href="#" data-popup="tooltip"
                           title="Edit team"
                           data-toggle="modal"
                           data-target="#edit_modal"><i
                                    class="icon-gear"></i></a>
                        @endpermission

                        @permission('delete-team')
                        <a href="#" data-popup="tooltip"
                           title="Delete team"><i class="icon-trash"></i></a>
                        @endpermission
                        <small class="display-block"><span id="team-description">{{ $team->description }}</span></small>
                    </h6>
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
                            <div class="media-left"><img src="{{ $team->leader->avatar }}" class="img-circle" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">{{ $team->leader->name }}</span>
                                <span class="media-annotation">{{ $team->leader->email }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="media-header">Members</li>

                    @foreach($team->users->diff([Auth::user()]) ?? [] as $user)
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

                    @permission('add-user')
                    <li class="media">
                        <div class="form-group">
                            {!! Form::open(['url' => route('teams.addUser', $team->id), 'method' => 'PUT']) !!}
                            <div class="input-group">
                                <select name="user_id" class="select-search">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                        <button data-popup="tooltip" title="Add member" class="btn btn-default btn-icon"
                                                type="submit"><i class="icon-user-plus"></i></button>
                                    </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </li>
                    @endpermission
                </ul>
            </div>
            <!-- /connections -->

        </div>
    </div>

    <div id="edit_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(['url' => route('teams.store', $team->id), 'method' => 'PUT']) !!}
                {{--                {!! Form::hidden('id', $team->id) !!}--}}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit team</h5>
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
                                <td><input type="text" name="display_name" class="form-control"></td>
                                <td><input type="text" name="description" class="form-control"></td>
                                <td>
                                    <div class="uploader"><input name="avatar" accept="image/*" type="file"
                                                                 class="file-styled">
                                        <span class="filename" style="user-select: none;">No file selected</span><span
                                                class="action btn btn-default"
                                                style="user-select: none;">Choose File</span></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection

@push('scripts')

    <script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
    {!! Html::script('/assets/js/smarthack/teams/show.js') !!}

@endpush