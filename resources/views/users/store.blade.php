
<html>

    <body>

        {!! Form::open(['url' => route('users.store'), 'method' => 'PUT' ]) !!}
            {!! Form::text('name') !!}
            {!! Form::text('email') !!}
            {!! Form::password('password') !!}
            {!! Form::submit('Submit') !!}
        {!! Form::close() !!}

    </body>

</html>