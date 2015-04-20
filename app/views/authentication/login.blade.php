@extends('layouts.front')

@section('css')
<!-- Custom styles for this template -->
<link href="css/signin.css" rel="stylesheet">
@stop

@section('content')

<div class="container">

  {{Form::open(array('url'=>'login','class' =>'form-signin'))}}

    <h2 class="form-signin-heading">Silahkan Login</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="masukkan email" name='email' required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="password" name='password' required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Ingat Password
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
  {{ Form::close() }}

</div> <!-- /container -->

@stop