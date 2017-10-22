<html>

    <body>


        <h1> Hello </h1>

        {{ Form::open(['route' => ['messages.index', 4], 'method' => 'get']) }}


        {!! Form::submit('Click Me!') !!}

        {!! Form::close() !!}

    </body>

</html>