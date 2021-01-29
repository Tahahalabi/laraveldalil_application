@extends('layouts.adminlayout')

@section('title')
البطاقات
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="/admin/panel/cards/addedit" enctype="multipart/form-data" class="form-group" >
                @include('admin.panel.pages.includes.cardsform')
                <input type="hidden" name="type" value="add" >
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

            <h4 class="maintitle">التعديل على البطاقات</h4>
            <div class="form-group">
                <select class="form-control" id="searchselectcategory" >
                    <option selected value="">إختار التصنيف</option>
                    @foreach ($getAllCategoreis as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="parenttable">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>إسم البطاقة</th>
                        <th>التصنيف الرئيسي</th>
                        <th>التصنيف الفرعي</th>
                        <th>مكان البطاقة</th>
                        <th>المحافظة</th>
                        <th>المدينة</th>
                        <th>المنطقة</th>
                        <th>حذف وتعديل</th>
                    </thead>
                    <tbody id="cardstabledata">
                        @include('admin.panel.pages.includes.getcards') 
                    </tbody>
                </table>
            </div>    

            <!-- Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >التعديل على البطاقة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/admin/panel/cards/addedit" enctype="multipart/form-data" class="form-group inlineblock" id="editform">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name="editcardid" id="editcardid"  >
                            <input type="hidden" name="type" value="edit" >
                            @include('admin.panel.pages.includes.cardsform')
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
<script src="{{asset('js/panel/cards.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('submit', '.deletebtn', function(e) {
            var check = confirm("هل أنت متأكد؟");

            if (check == false) {
                e.preventDefault();
            }
        })

        $(document).on("click", ".editbtn", function(){


            //document.getElementById("editform").reset()

            $(".cardtitle").eq(1).val($(this).attr("data-title"));
            $(".carddescription").eq(1).val($(this).attr("data-description"));
            $(".cardphoto").eq(1).val($(this).attr("data-photo"));
            $(".cardlocation").eq(1).val($(this).attr("data-location"));
            $(".cardphone1").eq(1).val($(this).attr("data-phone1"));
            $(".cardphone2").eq(1).val($(this).attr("data-phone2"));
            $(".cardphone3").eq(1).val($(this).attr("data-phone3"));
            $(".cardfacebook").eq(1).val($(this).attr("data-facebook"));
            $(".cardgmail").eq(1).val($(this).attr("data-gmail"));
            $(".cardinstagram").eq(1).val($(this).attr("data-instagram"));
            $(".cardtwitter").eq(1).val($(this).attr("data-twitter"));
            $(".cardyoutube").eq(1).val($(this).attr("data-youtube"));
            $(".cardtopleftword").eq(1).val($(this).attr("data-topleftword"));
            $(".cardbottomrightword").eq(1).val($(this).attr("data-bottomrightword"));
            $(".cardlink").eq(1).val($(this).attr("data-link"));
            $(".cardmap").eq(1).val($(this).attr("data-map"));
            $("#editcardid").val($(this).attr("data-cardid"))

            console.log($(this).attr("data-map"))


            // Category
            var editcategory = document.getElementsByClassName("cardcategoryid")[1],
                smallcategoryname = $(this).attr("data-caname");

                console.log(smallcategoryname)

            for (let i = 0; i < editcategory.options.length; i = i + 1) {
                if (editcategory.options[i].textContent == smallcategoryname) {
                    editcategory.options[i].selected = true
                }
            }

            // Small Category smallcardcategoryid
            var editsmallcategory = document.getElementsByClassName("cardcategoryid"),
                smallcategoryname = $(this).attr("data-smcid");

            // for (let i = 0; i < editsmallcategory.options.length; i = i + 1) {
            //     if (editsmallcategory.options[i].textContent == categoryname) {
            //         editsmallcategory.options[i].selected = true
            //     }
            // }

            editsmallcategory[1].onchange($(this).attr("data-smcaname"));


            // Province
            var editprovince = document.getElementsByClassName("provinceselect")[1],
                provincename = $(this).attr("data-pname");

            for (let i = 0; i < editprovince.options.length; i = i + 1) {
                if (editprovince.options[i].textContent == provincename) {
                    editprovince.options[i].selected = true
                }
            }

            provinceselect[1].onchange($(this).attr("data-cname"), $(this).attr("data-smname"));
            
            $(".cardphoto").eq(1).attr("src", $(this).attr("data-photo"))
            
            // document.getElementsByClassName("showfirst")[1].checked = false;
            // if($(this).attr("data-showfirst") == "0") {
            //     document.getElementsByClassName("showfirst")[1].checked = true;
            // }
            $(".showfirst").eq(1).value = $(this).attr("data-showfirst");

            $("#editmodal").modal('show')
        })
    })


</script>
@endsection