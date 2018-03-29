"use strict";

var myFunc = function(){

	var getLocaleList = function(){
		$('.qqq').click(function(){
			$.ajax({
                url: "/syncLocation.php",
                type: 'POST',
                dataType: 'json',
                data: {
                    email: '111'
                },
                success: function (data) {
                    var responce = data.location;
                    //console.log(typeof responce);
                    countrySelectInit(responce);
                },
                error: function (data) {
                    console.log(data);
                }
            });
		});
	}

	var countrySelectInit = function(data){
		$.each(data, function(index, value) { 
			if (index > 10) {
				return false;
			}  		
			$('.select')
				.append($("<option></option>")
				.attr("value",value['id'])
				.text(value['names']['en'])); 
		});
	}

	$(document).ready(function(){
		getLocaleList();
	});

}

myFunc();