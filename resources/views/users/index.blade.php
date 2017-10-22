<html>

    <body>


        <h1> Hello </h1>
        {!! Form::open(['url' => route('users.store'), 'method' => 'PUT' ]) !!}
        {!! Form::text('name') !!}
        {!! Form::text('email') !!}
        {!! Form::password('password') !!}
        {!! Form::close() !!}

    </body>

</html>