@extends('layouts.adminlayout')

@section('title')
المناطق
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="/admin/panel/smallcities/add" class="form-group" >
                {{ csrf_field() }}
                <div class="form-group" >
                    <input class="form-control" type="text" id="cityname" name="cityname" placeholder="إسم المنطقة" required  >
                </div>
                <div class="form-group" >
                    <select class="form-control" name="cityid" required >
                        <option disabled selected value="">إختار المنطقة</option>
                        @foreach ($getAllCities as $city)
                            <option value="{{$city->id}}">{{ $city->c_name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="إضافة" >
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4 class="maintitle">التعديل على المناطق</h4>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>إسم المنطقة</th>
                    <th>إسم المدينة</th>
                    <th>حذف وتعديل</th>
                </thead>
                <tbody>
                    @include('admin.panel.pages.includes.getsmallcities') 
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >التعديل على المنطقة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/admin/panel/smallcities/edit" class="form-group inlineblock" >
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name="editsmallcityid" id="editsmallcityid"  >
                            <input class="form-control form-group" type="text" id="editsmallcityname" name="editsmallcityname" placeholder="إسم المنطقة" required >
                            <select class="form-control form-group" name="editcityid" required id="editcityname">
                                <option disabled value="">إختار المدينة</option>
                                @foreach ($getAllCities as $city)
                                    <option value="{{$city->id}}">{{ $city->c_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">حفظ التعديل</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<script src="{{asset('js/panel/panel.js')}}"></script>
<script>
    $(document).ready(function(){
        $(".deletebtn").submit(function(e) {
            var check = confirm("هل أنت متأكد؟ هذا سوف يقوم بحذف جميع البطاقات الخاصة بهذه المنطقة");

            if (check == false) {
                e.preventDefault();
            }
        })

        $(".editbtn").click(function(){
            $("#editsmallcityid").val($(this).attr("data-editid"));
            $("#editsmallcityname").val($(this).attr("data-smname"));

            var editcityname = document.getElementById("editcityname"),
                provincename = $(this).attr("data-cname");

            for (let i = 0; i < editcityname.options.length; i = i + 1) {
                if (editcityname.options[i].textContent == provincename) {
                    editcityname.options[i].selected = true
                }
            }
            $("#editmodal").modal('show')
        })
    })


</script>
@endsection