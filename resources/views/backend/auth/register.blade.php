@extends('backend.auth.layouts.master')
@section('page_title','Register')

@section('content')
    {!! Form::open(['method' => 'post','route'=>'register']) !!}
    {!! Form::label('name','Name') !!}
    {!! Form::text('name',null,['class'=>'form-control form-control-sm','placeholder'=>'Enter your name']) !!}
    {!! Form::label('email','Email') !!}
    {!! Form::email('email',null,['class'=>'form-control form-control-sm','placeholder'=>'Enter your email']) !!}
    {!! Form::label('password','Password',['class' => 'mt-2']) !!}
    {!! Form::password('password',['class'=>'form-control form-control-sm','placeholder'=>'Enter your password']) !!}
    {!! Form::label('password_confirmation','Password Confirmation',['class' => 'mt-2']) !!}
    {!! Form::password('password_confirmation',['class'=>'form-control form-control-sm','placeholder'=>'Enter your confirm password']) !!}
    <div class="d-grid">
        {!! Form::button('Login',['type' => 'submit','class'=>'btn btn-sm btn-info mt-3']) !!}
    </div>
    {!! Form::close() !!}
    <p class="mt-2" >Forgot Password? <a href="{{route('password.request')}}">Forgot Password</a></p>
    <p>Not registered? <a href="{{route('register')}}">Register Here</a></p>
@endsection
