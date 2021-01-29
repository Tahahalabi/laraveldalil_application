<?php $i = 0; ?>
@foreach ($getAllSmallCities as $cities)
    <?php $i = $i + 1; ?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$cities->sm_name}}</td>
        <td>{{$cities->c_name}}</td>
        <td>
            <form method="POST" action="/admin/panel/smallcities/delete" class="form-group deletebtn inlineblock" >
                {{ csrf_field() }}
                <input type="hidden" name="cityid" value="{{$cities->smallcityid}}" >
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
            
            <button class="btn btn-primary editbtn" data-smname="{{$cities->sm_name}}" data-cname="{{$cities->c_name}}" data-editid="{{$cities->smallcityid}}" >تعديل</button>
        </td>
    </tr>
@endforeach