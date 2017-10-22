<html>

    <body>


        <h1> Hello </h1>

        {{ Form::open(['route' => ['messages.store'], 'method' => 'put']) }}
        {!! Form::text('text', 'teams') !!}
        {!! Form::text('channel_id', 4) !!}
        {!! Form::text('parent_id', 0) !!}
        {!! Form::submit('Click Me!') !!}

        {!! Form::close() !!}

    </body>

</html>