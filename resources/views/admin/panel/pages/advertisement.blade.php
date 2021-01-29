@extends('layouts.adminlayout')

@section('title')
الإعلانات
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="" class="form-group" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" >
                <input type="submit" value="حفظ" >
            </form>

            
            <img src="{{$getAdvvertisementImage->src}}" class="advertisementimage" >
        </div>
    </div>
</div>
<script src="{{asset('js/panel/panel.js')}}"></script>
@endsection