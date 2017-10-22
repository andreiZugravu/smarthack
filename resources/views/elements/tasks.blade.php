@foreach($tasks->chunk(2) as $collection)
    <div class="row">
        @foreach($collection as $task)
            <div class="col-md-6">
                <div class="panel border-left-lg border-left-@php
                    if ($task->priority == 'high')
                        echo 'danger';
                    else if ($task->priority == 'medium')
                        echo 'warning';
                    else if ($task->priority == 'low')
                        echo 'success';
                @endphp">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="no-margin-top"><a href="#">{{ $task->name }}</a></h6>
                                <p class="mb-15">{{ $task->description }}.</p>

                                @foreach($task->users as $user)
                                    <a data-popup="tooltip" title="{{ $user->name }}" href="#"><img
                                                src="{{ $user->avatar }}" class="img-circle img-xs" alt=""></a>
                                @endforeach
                                <a href="#" class="text-default">&nbsp;<i class="icon-plus22"></i></a>
                            </div>

                            <div class="col-md-4">
                                <ul class="list task-details">
                                    @if(isset($task->created_at))
                                        <li>{{ $task->created_at }}</li>
                                    @endif

                                    &nbsp;
                                    @if ($task->priority == 'high')
                                        <span class="status-mark position-left bg-danger"></span> High priority
                                    @elseif ($task->priority == 'medium')
                                        <span class="status-mark position-left bg-info"></span> Medium priority
                                    @elseif ($task->priority == 'low')
                                            <span class="status-mark position-left bg-success"></span> Low priority
                                        @endif


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a>
                        <div class="heading-elements">
                            <span class="heading-text">Due: <span
                                        class="text-semibold">{{ $task->deadline ?? 'No deadline' }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach