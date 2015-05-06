@extends('layouts.front')

@section('css')
<!-- Custom styles for this template -->
<link href="css/signin.css" rel="stylesheet">
@stop

@section('content')

<div class="container">

  {{Form::open(array('url'=>'login','class' =>'form-signin'))}}

    <h2 class="form-signin-heading">{{ trans('login.title') }}</h2>
    <label for="inputEmail" class="sr-only">{{ trans('login.email.label') }}</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="{{ trans('login.email.placeholder') }}" name='email' required autofocus>
    <label for="inputPassword" class="sr-only">{{ trans('login.password.label') }}</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="{{ trans('login.password.placeholder') }}" name='password' required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> {{ trans('login.remember.label') }}
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('login.button') }}</button>
  {{ Form::close() }}

</div> <!-- /container -->

@stop