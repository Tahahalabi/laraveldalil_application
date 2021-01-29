@extends('layouts.adminlayout')

@section('title')
المحافظات
@endsection

@section('content')
<div class="panel">
    <div class="rightnav" id="rightnav">
        @include('admin.includes.adminnavbar')
    </div>
    <div class="content" id="content">
        <div class="samestyle">
            <form method="POST" action="/admin/panel/provinces/add" class="form-group" >
                {{ csrf_field() }}
                <div class="form-group" >
                    <input class="form-control" type="text" id="provincename" name="provincename" placeholder="إسم المحافظة"  >
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

            <h4 class="maintitle">التعديل على المحافظات</h4>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>إسم المحافظة</th>
                    <th>حذف وتعديل</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($getAllProvinces as $province)
                        <?php $i = $i + 1; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$province->p_name}}</td>
                            <td>
                                <form method="POST" action="/admin/panel/provinces/delete" class="form-group deletebtn inlineblock" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="provinceid" value="{{$province->id}}" >
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                                
                                <button class="btn btn-primary editbtn" data-name="{{$province->p_name}}" data-editid="{{$province->id}}" >تعديل</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >التعديل على المحافظات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/admin/panel/provinces/edit" class="form-group inlineblock" >
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" name="provinceid" id="editprovinceid"  >
                            <input class="form-control" type="text" id="editprovincename" name="provincename" placeholder="إسم المحافظة" required >
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
            var check = confirm("هل أنت متأكد؟ هذا سوف يقوم بحذف جميع مدن هذه المحافظة");

            if (check == false) {
                e.preventDefault();
            }
        })

        $(".editbtn").click(function(){
            $("#editprovinceid").val($(this).attr("data-editid"));
            $("#editprovincename").val($(this).attr("data-name"));
            $("#editmodal").modal('show')
        })
    })


</script>
@endsection