
<html>

    <body>


        <h1> Hello </h1>

        {{ Form::open(['route' => ['channels.store'], 'method' => 'put']) }}
        {!! Form::text('display_name', 'teams') !!}
        {!! Form::text('description', 'ceva') !!}

        {!! Form::submit('Click Me!') !!}

        {!! Form::close() !!}

    </body>

</html>


