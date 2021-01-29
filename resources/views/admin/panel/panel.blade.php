@extends('layouts.adminlayout')

@section('title')
لوحة التحكم
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-ad fa-2x"></i>
                        <h5 class="title">التعديل على الإعلانات</h5>
                        <a href="/admin/panel/advertisement">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-keyboard fa-2x"></i>
                        <h5 class="title">التعديل على التصنيفات</h5>
                        <a href="/admin/panel/categories">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-keyboard fa-2x"></i>
                        <h5 class="title">التعديل على التصنيفات الصغيرة</h5>
                        <a href="/admin/panel/smallcategories">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-city fa-2x"></i>
                        <h5 class="title">التعديل على المحافظات</h5>
                        <a href="/admin/panel/provinces">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-city fa-2x"></i>
                        <h5 class="title">التعديل على المدن</h5>
                        <a href="/admin/panel/cities">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-city fa-2x"></i>
                        <h5 class="title">التعديل على المناطق</h5>
                        <a href="/admin/panel/smallcities">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-address-card fa-2x"></i>
                        <h5 class="title">التعديل على البطاقات</h5>
                        <a href="/admin/panel/cards">إضغط للعرض</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="boxpanel">
                    <div class="boxpanelcontent">
                        <i class="fas fa-key fa-2x"></i>
                        <h5 class="title">التعديل على بياناتي</h5>
                        <a href="/admin/panel/changepassword">إضغط للعرض</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/panel/panel.js')}}"></script>
@endsection