<?php $i = 0; ?>
@foreach ($getAllSmallCategories as $smallcategory)
    <?php $i = $i + 1; ?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$smallcategory->smc_name}}</td>
        <td>{{$smallcategory->name}}</td>
        <td>
            <form method="POST" action="/admin/panel/smallcategories/delete" class="form-group deletebtn inlineblock" >
                {{ csrf_field() }}
                <input type="hidden" name="smallcategoryid" value="{{$smallcategory->smallcategoryid}}" >
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
            
            <button class="btn btn-primary editbtn" data-smcname="{{$smallcategory->smc_name}}" data-cname="{{$smallcategory->name}}" data-editid="{{$smallcategory->smallcategoryid}}" >تعديل</button>
        </td>
    </tr>
@endforeach