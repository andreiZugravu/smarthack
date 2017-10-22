{{ Form::open(['route' => ['teams.store'], 'method' => 'put']) }} 
{!! Form::text('display_name', 'teamos') !!}
{!! Form::text('description', 'ceva') !!}
{!! Form::submit('Click Me!') !!}

{!! Form::close() !!}
