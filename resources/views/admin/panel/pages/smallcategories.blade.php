@extends('layouts.adminlayout')

@section('title')
التصنيفات الصغيرة
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="/admin/panel/smallcategories/add" class="form-group" >
                {{ csrf_field() }}
                <div class="form-group" >
                    <input class="form-control" type="text" id="smallcategoryname" name="smallcategoryname" placeholder="إسم التصنيف" required  >
                </div>
                <div class="form-group" >
                    <select class="form-control" name="categoryid" required >
                        <option disabled selected value="">إختار التصنيف الرئيسي</option>
                        @foreach ($getAllCategories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
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

            <h4 class="maintitle">التعديل على التصنيفات الصغيرة</h4>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>إسم التصنيف الصغير</th>
                    <th>إسم التصنيف الرئيسي</th>
                    <th>حذف وتعديل</th>
                </thead>
                <tbody>
                    @include('admin.panel.pages.includes.getsmallcategories') 
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >التعديل على التصنيف الصغير</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/admin/panel/smallcategories/edit" class="form-group inlineblock" >
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name="editsmallcategoriesid" id="editsmallcategoriesid"  >
                            <input class="form-control form-group" type="text" id="editsmallcategoryname" name="smallcategoryname" placeholder="إسم المدينة" required >
                            <select class="form-control form-group" name="categoryid" required id="editcategoryname">
                                <option disabled value="">إختار المحافظة</option>
                                @foreach ($getAllCategories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
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
            var check = confirm("هل أنت متأكد؟ هذا سوف يقوم بحذف جميع البطاقات الخاصة بهذه التصنيفة");

            if (check == false) {
                e.preventDefault();
            }
        })

        $(".editbtn").click(function(){
            $("#editsmallcategoriesid").val($(this).attr("data-editid"));
            $("#editsmallcategoryname").val($(this).attr("data-smcname"));

            var editcategoryname = document.getElementById("editcategoryname"),
                categoryname = $(this).attr("data-cname");

            for (let i = 0; i < editcategoryname.options.length; i = i + 1) {
                if (editcategoryname.options[i].textContent == categoryname) {
                    editcategoryname.options[i].selected = true
                }
            }
            $("#editmodal").modal('show')
        })
    })


</script>
@endsection