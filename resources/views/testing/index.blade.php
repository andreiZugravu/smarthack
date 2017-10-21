{{ Form::open(['route' => ['channels.store'], 'method' => 'put']) }} 
{!! Form::text('display_name', 'teamos') !!}
{!! Form::text('description', 'ceva') !!}
{!! Form::text('created_by', 1) !!}
{!! Form::submit('Click Me!') !!}

{!! Form::close() !!}