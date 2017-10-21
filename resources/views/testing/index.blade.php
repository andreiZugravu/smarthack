<html>

    <body>


        <h1> Hello </h1>
        {{ Form::open(['url' => route('m.store', 2), 'method' => 'put']) }}
        {!! Form::text('text', 'messages') !!}
        {!! Form::submit('Click Me!') !!}

        {!! Form::close() !!}

    </body>

</html>