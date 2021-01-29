<?php $i = 0; ?>
@foreach ($getAllCities as $cities)
    <?php $i = $i + 1; ?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$cities->c_name}}</td>
        <td>{{$cities->p_name}}</td>
        <td>{{$cities->ordernum}}</td>
        <td>
            <form method="POST" action="/admin/panel/cities/delete" class="form-group deletebtn inlineblock" >
                {{ csrf_field() }}
                <input type="hidden" name="cityid" value="{{$cities->cityid}}" >
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
            
            <button class="btn btn-primary editbtn" data-cname="{{$cities->c_name}}" data-pname="{{$cities->p_name}}" data-order="{{$cities->ordernum}}" data-editid="{{$cities->cityid}}" >تعديل</button>
        </td>
    </tr>
@endforeach