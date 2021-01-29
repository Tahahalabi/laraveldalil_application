{{ csrf_field() }}
<div class="row">

    <div class="col-sm-6">
        <div class="form-group" >
            <select class="form-control cardcategoryid" data-class="smallcardcategoryid" name="categoryid" >
                <option disabled selected value="">إختار التصنيف الرئيسي</option>
                @foreach ($getAllCategoreis as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <select class="form-control smallcardcategoryid" name="smallcategoryid" >
            
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group" >
            <select class="form-control provinceselect" data-class="selectcities" name="provinceid" >
                <option disabled selected value="">إختار المحافظة</option>
                @foreach ($getAllProvinces as $province)
                    <option value="{{$province->id}}">{{ $province->p_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group" >
            <select class="form-control cityselect selectcities" name="cityid" data-class="selectsmallcities" id="selectcities" >
            
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group" >
            <select class="form-control smallcitiesselect selectsmallcities" name="smallcityid" id="selectsmallcities" >
            
            </select>
        </div>
    </div>
</div>

<div class="form-group" >
    <input class="form-control cardtitle" type="text" name="title" placeholder="إسم البطاقة"  >
</div>
<div class="form-group" >
    <textarea class="form-control carddescription" type="text" name="description" placeholder="وصف البطاقة"  ></textarea>
</div>
<div class="form-group" >
    <h4>صورة البطاقة</h4>
    <input type="file" name="photo" >
    <img class="cardphoto" alt="لاتوجد صورة" width="100%" height="75px" >
</div>
<div class="form-group" >
    <input class="form-control cardlocation" type="text" name="location" placeholder="مكان البطاقة"  >
</div>
<div class="row">
    <div class="col-sm-4 col-12">
        <div class="form-group" >
            <input class="form-control cardphone1" type="text" name="phone1" placeholder="رقم هاتف واحد"  >
        </div>
    </div>
    <div class="col-sm-4 col-12">
        <div class="form-group" >
            <input class="form-control cardphone2" type="text" name="phone2" placeholder="رقم هاتف ثاني"  >
        </div>
    </div>
    <div class="col-sm-4 col-12">
        <div class="form-group" >
            <input class="form-control cardphone3" type="text" name="phone3" placeholder="رقم هاتف ثالث"  >
        </div>
    </div>


    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardfacebook" type="text" name="facebook" placeholder="facebook"  >
        </div>
    </div>
    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardgmail" type="text" name="gmail" placeholder="gmail"  >
        </div>
    </div>
    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardinstagram" type="text" name="instagram" placeholder="instagram"  >
        </div>
    </div>
    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardtwitter" type="text" name="twitter" placeholder="twitter"  >
        </div>
    </div>
    <div class="col-sm-12 col-12">
        <div class="form-group" >
            <input class="form-control cardyoutube" type="text" name="youtube" placeholder="youtube"  >
        </div>
    </div>

    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardtopleftword" type="text" name="topleftword" placeholder="كلام عالصورة الصفراء فوق عاليسار"  >
        </div>
    </div>
    <div class="col-sm-6 col-12">
        <div class="form-group" >
            <input class="form-control cardbottomrightword" type="text" name="bottomrightword" placeholder="كلام عالصورة الصفراء تحت عاليمين"  >
        </div>
    </div>

    <div class="col-sm-12 col-12">
        <div class="form-group" >
            <input class="form-control cardlink" type="text" name="link" placeholder="رابط"  >
        </div>
    </div>

    <div class="col-sm-12 col-12">
        <div class="form-group" >
            <textarea class="form-control cardmap" type="text" name="map" placeholder="رابط الخريطة"  ></textarea>
        </div>
    </div>

    <div class="col-sm-4">
        <!-- <h5 style="display: inline-block">الإظهار أولا</h5> -->
        <div class="form-group" >
            <input class="form-control" type="number" name="showfirst" placeholder="الترتيب"  >
        </div>
        <!-- <input type="checkbox" class="showfirst" name="showfirst" value="0" > -->
    </div>
    
</div>
                
                
                
                
                
                
                
                
                
                
                