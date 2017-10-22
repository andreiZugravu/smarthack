<<<<<<< HEAD
{{ Form::open(['route' => ['teams.store'], 'method' => 'put']) }} 
=======

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
>>>>>>> b17ccdc4e2a77c4864865a51015721a27b967591
{!! Form::text('display_name', 'teamos') !!}
{!! Form::text('description', 'ceva') !!}
{!! Form::submit('Click Me!') !!}

{!! Form::close() !!}
