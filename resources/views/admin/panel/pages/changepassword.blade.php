@extends('layouts.adminlayout')

@section('title')
المدن
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="" class="form-group" >
                {{ csrf_field() }}
                <input type="hidden" value="{{$userinfo->id}}" name="userid" >
                <div class="form-group" >
                    <input class="form-control" value="{{$userinfo->email}}" type="email" name="email" placeholder="الإميل"  >
                </div>
                <div class="form-group" >
                    <input class="form-control" value="" type="password" name="password" placeholder="كلمة سر جديدة"  >
                </div>
                <input type="submit" class="btn btn-primary" value="حفظ" >
            </form>

            <h4>{{$success}}</h4>
        </div>
    </div>

    
</div>
<script src="{{asset('js/panel/panel.js')}}"></script>
@endsection