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
            <form method="POST" action="/admin/panel/cities/add" class="form-group" >
                {{ csrf_field() }}
                <div class="form-group" >
                    <input class="form-control" type="text" id="cityname" name="cityname" placeholder="إسم المدينة" required  >
                </div>
                <div class="form-group" >
                    <select class="form-control" name="provinceid" required >
                        <option disabled selected value="">إختار المحافظة</option>
                        @foreach ($getAllProvinces as $province)
                            <option value="{{$province->id}}">{{ $province->p_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <input class="form-control" type="text" id="order" name="cityorder" placeholder="الترتيب"  >
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

            <h4 class="maintitle">التعديل على المدن</h4>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>إسم المدينة</th>
                    <th>إسم المحافظة</th>
                    <th>الترتيب</th>
                    <th>حذف وتعديل</th>
                </thead>
                <tbody>
                    @include('admin.panel.pages.includes.getcities') 
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >التعديل على المدينة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/admin/panel/cities/edit" class="form-group inlineblock" >
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name="editcityid" id="editcityid"  >
                            <input class="form-control form-group" type="text" id="editcityname" name="cityname" placeholder="إسم المدينة" required >
                            <input class="form-control form-group" type="number" id="editcityorder" name="cityorder" placeholder="الترتيب" >
                            <select class="form-control form-group" name="provinceid" id="editprovincename">
                                <option disabled value="">إختار المحافظة</option>
                                @foreach ($getAllProvinces as $province)
                                    <option value="{{$province->id}}">{{ $province->p_name }}</option>
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
            var check = confirm("هل أنت متأكد؟ هذا سوف يقوم بحذف جميع المدن الخاصة بهذه المدينة");

            if (check == false) {
                e.preventDefault();
            }
        })

        $(".editbtn").click(function(){
            $("#editcityid").val($(this).attr("data-editid"));
            $("#editcityname").val($(this).attr("data-cname"));
            $("#editcityorder").val($(this).attr("data-order"));

            var editprovincename = document.getElementById("editprovincename"),
                provincename = $(this).attr("data-pname");

            for (let i = 0; i < editprovincename.options.length; i = i + 1) {
                if (editprovincename.options[i].textContent == provincename) {
                    editprovincename.options[i].selected = true
                }
            }
            $("#editmodal").modal('show')
        })
    })


</script>
@endsection