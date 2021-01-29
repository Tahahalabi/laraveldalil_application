var provinceselect = document.getElementsByClassName("provinceselect");

for (let i = 0; i < provinceselect.length; i = i + 1) {
    provinceselect[i].onchange = function (editname, secondeditname) {

        var myDataObject = {
            provinceid: this.value
        }

        var whichresult = document.getElementsByClassName(this.getAttribute("data-class"))[i];


        $.ajax({
            type: 'get',
            contentType: 'application/json',
            data: myDataObject,
            url: '/admin/panel/api/getcitiesforprovince',
            success: function (res) {
                console.log(res);
    
                whichresult.innerHTML = `<option selected value="" >إختار مدينة</option>`
                for (let t = 0; t < res.length; t = t + 1) {
                    var createOption;

                    if (editname == res[t]['c_name']) {
                        createOption = `
                            <option value="${res[t]['cityid']}" selected>${res[t]['c_name']}</option>
                        `
                    } else {
                        createOption = `
                            <option value="${res[t]['cityid']}">${res[t]['c_name']}</option>
                        `
                    }
                    

                    whichresult.innerHTML += createOption;
                }

                cityselect[1].onchange(secondeditname);

              
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    }
}



var cityselect = document.getElementsByClassName("cityselect");

for (let i = 0; i < cityselect.length; i = i + 1) {
    cityselect[i].onchange = function (editname) {

        var myDataObject = {
            cityid: this.value
        }

        var whichresult = document.getElementsByClassName(this.getAttribute("data-class"))[i];


        $.ajax({
            type: 'get',
            contentType: 'application/json',
            data: myDataObject,
            url: '/admin/panel/api/getsmallcitiesforcity',
            success: function (res) {
                console.log(res);
    
                if (res.length > 0) {
                    whichresult.innerHTML = `<option selected value="" disabled>إختار منطقة</option>`
                    for (let t = 0; t < res.length; t = t + 1) {
                        var createOption;
                        if (editname == res[t]['sm_name']) {
                            createOption = `
                                <option value="${res[t]['smallcityid']}" selected>${res[t]['sm_name']}</option>
                            `
                        } else {
                            createOption = `
                                <option value="${res[t]['smallcityid']}">${res[t]['sm_name']}</option>
                            `
                        }
    
                        whichresult.innerHTML += createOption;
                    }
                } else {
                    whichresult.innerHTML = `<option selected value="">لاتوجد مناطق</option>`
                }
                
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    }
}



// Category
var editsmallcategory = document.getElementsByClassName("cardcategoryid");

for (let i = 0; i < editsmallcategory.length; i = i + 1) {
    editsmallcategory[i].onchange = function (editname, secondeditname) {

        var myDataObject = {
            caid: this.value
        }

        var whichresult = document.getElementsByClassName(this.getAttribute("data-class"))[i];


        $.ajax({
            type: 'get',
            contentType: 'application/json',
            data: myDataObject,
            url: '/admin/panel/api/getsmallcategoriesforcategory',
            success: function (res) {
                console.log(res);
    
                whichresult.innerHTML = `<option selected value="">إختار تصنيف فرعي</option>`
                for (let t = 0; t < res.length; t = t + 1) {
                    var createOption;

                    if (editname == res[t]['smc_name']) {
                        createOption = `
                            <option value="${res[t]['smallcategoriesid']}" selected>${res[t]['smc_name']}</option>
                        `
                    } else {
                        createOption = `
                            <option value="${res[t]['smallcategoriesid']}">${res[t]['smc_name']}</option>
                        `
                    }
                    

                    whichresult.innerHTML += createOption;
                }
                
            },
            error: function (err) {
                console.log(err)
            }
        });
    }
}



// Search 

$("#searchselectcategory").change(function(){
    var link = window.location.href;

    link = link + "?catid=" + $(this).val() + "&api=true";

    $.ajax({
        type: 'get',
        contentType: 'application/json',
        url: link,
        success: function (res) {

            $("#cardstabledata").html("");
            $("#cardstabledata").html(res);
            
        },
        error: function (err) {
            console.log(err)
        }
    });
})