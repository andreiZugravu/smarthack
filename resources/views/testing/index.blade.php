<html>

    <body>


        <h1> Hello </h1>

        {{ Form::open(['route' => ['teams.removeUser', 1], 'method' => 'put']) }}
        {!! Form::text('user_id') !!}

        {!! Form::submit('Click Me!') !!}

        {!! Form::close() !!}

    </body>

</html>