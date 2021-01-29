<div class="form-group parentcontentnavleft" id="parentcontentnavleft">
    <i class="fas fa-arrow-left fa-2x openclosenav" id="openclosenav"></i>
    <div class="profilephoto text-center form-group" id="profilephoto">
        <img src="{{asset('images/userimage.png')}}">
    </div>
    <h4 class="title" id="profilename">{{$userinfo->name}}</h4>
    <ul class="leftnavcontent">
        <li><i class="fas fa-tachometer-alt liicon"></i> <a href="/admin/panel">لوحة الإعدادت</a></li>
        <li><i class="fas fa-ad liicon"></i> <a href="/admin/panel/advertisement">التعديل على الإعلانات</a></li>
        <li><i class="fas fa-keyboard liicon"></i> <a href="/admin/panel/categories">التعديل على التصنيفات</a></li>
        <li><i class="fas fa-keyboard liicon"></i> <a href="/admin/panel/smallcategories">التعديل على التصنيفات الصغيرة</a></li>
        <li><i class="fas fa-city liicon"></i> <a href="/admin/panel/provinces">التعديل على المحافظات</a></li>
        <li><i class="fas fa-city liicon"></i> <a href="/admin/panel/cities">التعديل على المدن</a></li>
        <li><i class="fas fa-city liicon"></i> <a href="/admin/panel/smallcities">التعديل على المناطق</a></li>
        <li><i class="fas fa-address-card liicon"></i> <a href="/admin/panel/cards">التعديل على البطاقات</a></li>
        <li><i class="fas fa-key liicon"></i> <a href="/admin/panel/changepassword">تعديل بياناتي</a></li>
        <li><i class="fas fa-sign-out-alt liicon"></i> <a href="/logout">تسجيل الخروج</a></li>
    </ul>
</div>