@extends('layouts.adminlayout')

@section('title')
تسجيل الدخول
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/readypages/signin.css')}}">
<form class="form-signin" method="post" action="" >
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">تسجيل الدخول</h1>
    <input type="" name="email" id="inputEmail" class="form-control" value="{{old('email')}}" required placeholder="الإميل"  autofocus="">
    <input type="password" name="password" id="inputPassword" class="form-control" required placeholder="كلمة السر" >
    <button class="btn btn-lg btn-primary btn-block form-group" type="submit">دخول</button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection