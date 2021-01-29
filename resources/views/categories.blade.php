@extends('layouts.adminlayout')

@section('title')
التصنيفات
@endsection

@section('content')
<style>
body
{
    background: #C0C0C0;
}
</style>
<div class="categories">
    <div class="container">
        <img class="advertisementbigimage" src="{{$getAdvertisement->src}}" >

        <div class="parentselect">
            <div class="row">
                <div class="col-sm-6 col-6">
                    <h4 class="selecttitle">إختار المدينة</h4>
                    <select class="form-control form-group" id="cityselect">
                        <option value="" selected>الكل</option>
                        @foreach ($getCities as $city)
                            <option value="{{$city->id}}">{{$city->c_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 col-6">
                    <div class="smallselect" id="smallselect" >
                        <h4 class="selecttitle">إختار المنطقة</h4>
                        <select class="form-control form-group" id="smallcityselect"></select>
                    </div>
                </div>
                <div class="col-sm-12 col-12">
                    <div class="smallcategory" id="" >
                        <h4 class="selecttitle">إختار التصنيف الفرعي</h4>
                        <?php if(count($getSmallCategories) != 0) { ?>
                        <select class="form-control form-group" id="smallcategory">
                            <option value="" selected>الكل</option>
                            @foreach ($getSmallCategories as $smallCategory)
                                <option value="{{$smallCategory->id}}">{{$smallCategory->smc_name}}</option>
                            @endforeach
                        </select>
                        <?php } else { ?>
                        <input type="hidden" id="smallcategory" value="" >
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="parentviewcards" >
            @include('includes.categoriescards')
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click', '.page-link', function(e){
        e.preventDefault();
        

        var href = $(this).attr("href");

        var link = window.location.href.split("?")[1];

        link = href + "&" + link + "&json=true";

        if ($("#smallcityselect").val() != null) {
            link = link.split("smid=").join("smid=" + $("#smallcityselect").val())
        }

        if ($("#cityselect").val() != "") {
            link = link + "&cityid=" + $("#cityselect").val();
        }

        if ($("#smallcategory").val() != "") {
            link = link + "&smallcategory=" + $("#smallcategory").val();
        }

        $.ajax({
            type: 'get',
            contentType: 'application/json',
            url: link,
            success: function (res) {
                //console.log(res);
    
                $("#parentviewcards").html(res)
                $([document.documentElement, document.body]).animate({
                    scrollTop: 0
                }, 1000);
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    })

    // City Select
    $("#cityselect").change(function(){
        if ($(this).val() != "") {
            
            var myDataObject = {
                cityid: this.value
            }
         

            $.ajax({
                type: 'get',
                contentType: 'application/json',
                data: myDataObject,
                url: '/admin/panel/api/getsmallcitiesforcity',
                success: function (res) {

                    if (res.length > 0) {
                        var smallcityselect = document.getElementById("smallcityselect");

                        smallcityselect.innerHTML = `<option value="" selected>إختار منطقة</option>`
                        for (let t = 0; t < res.length; t = t + 1) {
                            var createOption = `
                                <option value="${res[t]['smallcityid']}">${res[t]['sm_name']}</option>
                            `

                            smallcityselect.innerHTML += createOption;
                        }

                        $("#smallselect").show(500);
                    } else {
                        $("#smallselect").hide(500);
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                }
            });

            var link = window.location.href;
            //link.split("cityid=").join("cityid=" + $(this).val())

            link = link + "&cityid=" + $(this).val() +"&json=true";
            
            if ($("#smallcategory").val() != "") {
                link = link + "&smallcategory=" + $("#smallcategory").val();
            }
            
            console.log(link)

            $.ajax({
                type: 'get',
                contentType: 'application/json',
                url: link,
                success: function (res) {
        
                    $("#parentviewcards").html(res)
                    
                },
                error: function (err) {
                    console.log(err)
                }
            });

        } else {
            $("#smallselect").hide(500);
            $("#smallcityselect").val(0);
            

            var link = window.location.href;
            
            if ($("#smallcategory").val() != "") {
                link = link + "&smallcategory=" + $("#smallcategory").val();
            }
            
            
            link = link + "&json=true";

            $.ajax({
                type: 'get',
                contentType: 'application/json',
                url: link,
                success: function (res) {
        
                    $("#parentviewcards").html(res)
                    
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    })


    $("#smallcityselect").change(function(){
        var link = window.location.href;

        link = link.split("smid=").join("smid=" + $(this).val() + "&json=true");

        link = link + "&cityid=" + $("#cityselect").val();

        if ($("#smallcategory").val() != "") {
            link = link + "&smallcategory=" + $("#smallcategory").val();
        }


        console.log("taha")
        console.log(link)

        $.ajax({
            type: 'get',
            contentType: 'application/json',
            url: link,
            success: function (res) {

                $("#parentviewcards").html(res)
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    })

    // smallcategory
    $("#smallcategory").change(function(){
        var link = window.location.href;

        if ($("#smallcityselect").val() != null) {
            link = link.split("smid=").join("smid=" + $("#smallcityselect").val())
        }

        if ($("#cityselect").val() != "") {
            link = link + "&cityid=" + $("#cityselect").val();
        }

        link = link + "&smallcategory=" + $(this).val() + "&json=true";


        $.ajax({
            type: 'get',
            contentType: 'application/json',
            url: link,
            success: function (res) {

                $("#parentviewcards").html(res)
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    })

})
</script>
@endsection