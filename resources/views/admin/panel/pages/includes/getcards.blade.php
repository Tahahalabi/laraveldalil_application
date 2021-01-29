<?php $i = 0; ?>
@foreach ($getAllCards as $card)
    <?php $i = $i + 1; ?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$card->title}}</td>
        <td>{{$card->categoryname}}</td>
        <td>{{$card->smallCategoryname}}</td>
        <td>{{$card->location}}</td>
        <td>{{$card->p_name}}</td>
        <td>{{$card->c_name}}</td>
        <td>{{$card->sm_name}}</td>
        <td>
            <form method="POST" action="/admin/panel/cards/delete" class="form-group deletebtn inlineblock" >
                {{ csrf_field() }}
                <input type="hidden" name="cardid" value="{{$card->cardid}}" >
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
            
            <button class="btn btn-primary editbtn" 
            data-cardid="{{$card->cardid}}"
            data-smname="{{$card->sm_name}}"
            data-showfirst="{{$card->showfirst}}"
            data-cname="{{$card->c_name}}"
            data-pname="{{$card->p_name}}"
            data-caname="{{$card->categoryname}}"
            data-smcaname="{{$card->smallCategoryname}}"
            data-photo="{{$card->photo}}" 
            data-title="{{$card->title}}" 
            data-description="{{$card->description}}" 
            data-location="{{$card->location}}" 
            data-phone1="{{$card->phone1}}" 
            data-phone2="{{$card->phone2}}" 
            data-phone3="{{$card->phone3}}" 
            data-link="{{$card->link}}" 
            data-facebook="{{$card->facebook}}" 
            data-gmail="{{$card->gmail}}" 
            data-instagram="{{$card->instagram}}" 
            data-twitter="{{$card->twitter}}" 
            data-youtube="{{$card->youtube}}" 
            data-topleftword="{{$card->topleftword}}" 
            data-bottomrightword="{{$card->bottomrightword}}" 
            data-map="{{$card->map}}" 
            
            >تعديل</button>
        </td>
    </tr>
@endforeach