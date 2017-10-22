
<html>

    <body>


        <h1> Hello </h1>
        {{ Form::open(['url' => route('teams.addUser', 2), 'method' => 'put']) }}
        {!! Form::text('text', 'messages') !!}
        {!! Form::submit('Click Me!') !!}
        {!! Form::text('channel_id', 1) !!}
        {!! Form::text('parent_id', 1) !!}
        {!! Form::close() !!}

    </body>

</html>
=======
{{ Form::open(['route' => ['channels.store'], 'method' => 'put']) }} 
{!! Form::text('display_name', 'teamos') !!}
{!! Form::text('description', 'ceva') !!}

{!! Form::submit('Click Me!') !!}

{!! Form::close() !!}
