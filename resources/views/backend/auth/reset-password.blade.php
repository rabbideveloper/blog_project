@extends('backend.auth.layouts.master')
@section('page_title','Reset Password')

@section('content')
    {!! Form::open(['method' => 'post', 'route' => 'password.store']) !!}
    {!! Form::label('email','Email') !!}
    {!! Form::email('email',$request->email,['class'=> $errors->has('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm','placeholder'=>'Enter your email']) !!}
    @error('email')
    <p class="text-danger">{{$message}}</p>
    @enderror
    {!! Form::hidden('token',$request->route('token')) !!}

    {!! Form::label('password','Password',['class' => 'mt-2']) !!}
    {!! Form::password('password',['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm','placeholder'=>'Enter your password']) !!}
    @error('password')
    <p class="text-danger">{{$message}}</p>
    @enderror
    {!! Form::label('password_confirmation','Password Confirmation',['class' => 'mt-2']) !!}
    {!! Form::password('password_confirmation',['class'=>$errors->has('password_confirmation') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm','placeholder'=>'Enter your confirm password']) !!}
    @error('password_confirmation')
    <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="d-grid">
        {!! Form::button('Update Password',['type' => 'submit','class'=>'btn btn-sm btn-info mt-3']) !!}
    </div>
    {!! Form::close() !!}
    <p class="mt-2" >Already Registered? <a href="{{route('login')}}">Login Here</a></p>
    <p>Not registered? <a href="{{route('register')}}">Register Here</a></p>
@endsection
