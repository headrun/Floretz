@extends('layout.loginmain')

@section('title')
Admin | Floretz
@stop
@section('libraryCSS')

<link href="{{url()}}/assets/css/custom.css" rel='stylesheet' type='text/css' />	
<link rel="stylesheet" href="{{url()}}/assets/css/custom.css" type='text/css'/>	
<link rel="stylesheet" href="{{url()}}/assets/css/login.css" type='text/css'/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@stop

@section('body')

<br>
    
	{{Form::open(array('url'=>'/vault/login'))}}
	
	 <div class="group">
             <div class="icon"><i class="fa fa-user fa-3x"></i></div>
             {{Form::text('email')}}<span class="highlight"></span><span class="bar"></span>
	<label>Email</label>
	</div>
	<div class="group">
	{{Form::password('password','',array('placeholder'=>'Password'))}}<span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
    </div>
	{{ Form::button('Login<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>', array('class' => 'button buttonBlue','type'=>'submit')) }}
	{{Form::close()}}

@stop


@section('libraryJquery')
<script src="{{URL::asset('assets/js/login.js')}}"></script>
@stop


