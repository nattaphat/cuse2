<!-- <form action="{{ url('handle-form') }}"
	method="POST"
	enctype="multipart/form-data">
	<input type="file" name="book" />
	<input type="submit">
	{{ Form::token() }}
</form> -->

<!-- <form action="{{ url('our/target/route') }}" method="POST">

</form> -->
{{-- 
{{ Form::open(array(
	'url' => 'our/target/route',
	'method' => 'POST',
	'accept-charset' => 'UTF-8'
	)) }}
	{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', 'Taylor Otwell',
					array('id' => 'first_name')) }}
	</br>
	{{ Form::label('text_area', 'Text Area') }}
	{{ Form::textarea('description', 'Best field ever!') }}
	</br>
	{{ Form::label('secret', 'Super Secret') }}
	{{ Form::password('secret') }}
	</br>
	{{ Form::label('pandas_are_cute', 'Are pandas cute?') }}
	{{ Form::checkbox('pandas_are_cute', '1', true) }}
	</br>
	{{ Form::label('panda_colour', 'Pandas are?') }}
	{{ Form::radio('panda_colour', 'red', true) }} Red
	{{ Form::radio('panda_colour', 'black') }} Black
	{{ Form::radio('panda_colour', 'white') }} White
	</br>
	{{ Form::label('panda_colour', 'Pandas are?') }}
	{{ Form::select('panda_colour', array(
		'red'
		=> 'Red',
		'black'
		=> 'Black',
		'white'
		=> 'White'
	), 'red') }}
	</br>
	{{ Form::label('bear', 'Bears are?') }}
	{{ Form::select('bear', array(
	'Panda' => array(
		'red'
		=> 'Red',
		'black'
		=> 'Black',
		'white'
		=> 'White'
	),
	'Character' => array(
		'pooh'
		=> 'Pooh',
		'baloo'
		=> 'Baloo'
		)
	), 'black') }}
	</br>
	{{ Form::label('email', 'E-Mail Address') }}
	{{ Form::email('email', 'me@daylerees.com') }}

	{{ Form::hidden('panda', 'luishi') }}

{{ Form::close() }}

{{ Form::open(array('url' => 'my/route')) }}
	{{ Form::submit('Save') }}
	</br>
	{{ Form::button('Smile') }}
	</br>
	{{ Form::image(asset('my/image.gif', 'submit')) }}
	{{ Form::reset('Clear') }}
{{ Form::close() }}


{{ Form::open(array(
	'url' => 'our/target/route',
	'files' => true
)) }}

{{ Form::close() }}

{{ Form::open(array(
	'route'=> 'my_route'
)) }}

{{ Form::close() }}

{{ Form::open(array(
	'action'=> 'MyController@myAction'
)) }}

{{ Form::close() }}
--}}

<h1>Registration form for Phill's Parks</h1>

{{ Form::open(array('url' => 'registration')) }}
	<ul class="errors">
	@foreach($errors->all('<li>:message</li>') as $message)
		{{ $message }}
	@endforeach
	</ul>

	{{-- Username field. ------------------------}}
<!-- 	<ul class="errors">
	@foreach($errors->get('username') as $message)
		<li>{{ $message }}</li>
	@endforeach
	</ul> -->
	<ul class="errors">
	@if($errors->has('username'))
		<li>Yey, an error!</li>
	@endif
	</ul>
	<!-- <span class="error">{{ $errors->first('username') }}</span> -->
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username') }}
	</br>
	{{-- Email address field. -------------------}}
	<ul class="errors">
	@foreach($errors->get('email') as $message)
		<li>{{ $message }}</li>
	@endforeach
	</ul>
	{{ Form::label('email', 'Email address') }}
	{{ Form::email('email') }}
	</br>
	{{-- Password field. ------------------------}}
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
	</br>
	{{-- Password confirmation field. -----------}}
	{{ Form::label('password_confirmation', 'Password confirmation') }}
	{{ Form::password('password_confirmation') }}
	</br>
	{{-- Form submit button. --------------------}}
	{{ Form::submit('Register') }}

{{ Form::close() }}