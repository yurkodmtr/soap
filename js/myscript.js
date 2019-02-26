"use strict";

var myFunc = function(){

	var getHotelsByCity = function(id){

		$.ajax({
            url: "/getHotelsByCity.php",
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
            	$('select._hotel_name option').remove();
            	if ( data !== undefined && data.hotel !== undefined ) {
            		var data = data.hotel;
					$.each(data, function(index, value) { 						
						$('select._hotel_name')
							.append($("<option></option>")
								.attr("value",value.id)
								.text(value.name)
							);
					});

            	} else {
	            	$('select._hotel_name')
						.append($("<option></option>")
							.attr("value",'')
							.text('no result')
						);
            	}
            	
            	
            },
            error: function (data) {
                console.log('dataaa - ', data);
            }
        });

	}

	var _citySelectInit = function(id, name, ){
		$('select._city')
			.append($("<option></option>")
				.attr("value",id)
				.text(name)
			); 
	}

	var loadHotels = function(){
		$('select._city').change(function(){
			var val = $(this).val();
			var hotels = getHotelsByCity(val);
		});
	}

	var getLocaleListLocal = function(){
		var data;
		$.ajax({
            url: "/country.json",
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                data = data.location;
				$.each(data, function(index, value) {
					if ( 
						value.type === 'city' && 
						value.parent_id == '118593' && 
						value.status == 'active'
					) { 
						_citySelectInit(value.id, value.names.en);
					}
				});
            },
            error: function (data) {
                console.log(data);
            }
        });        
	}

	var submitForm = function(){
		$('.search_form form').on('submit', function (event) {
        	event.preventDefault();

        	var city = $('select._city').val();
        	var hotelCategory = $('._hotel_category').val();
        	var hotelName = $('._hotel_name').val();
        	var checkInDate = $('._check_in_date').val();
        	var checkOutDate = $('._check_out_date').val();
        	var boardType = $('._board_type').val();
        	var adults = $('._adults').val();
        	var children = $('._children').val();
        	var hotelName = $('select._hotel_name').val();
        	var nightDuration = 1;

        	if (checkInDate == '') {
        		var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var output = d.getFullYear() + '-' +
				    ((''+month).length<2 ? '0' : '') + month + '-' +
				    ((''+day).length<2 ? '0' : '') + day;
				checkInDate = output;
        	}

        	console.log(checkInDate);

        	function showDays(firstDate,secondDate){
				var startDay = new Date(firstDate);
				var endDay = new Date(secondDate);
				var millisecondsPerDay = 1000 * 60 * 60 * 24;

				var millisBetween = startDay.getTime() - endDay.getTime();
				var days = millisBetween / millisecondsPerDay;

				nightDuration = Math.floor(days);
			}

			showDays(checkOutDate,checkInDate);


        	


        	$('.loader').show();
        	$.ajax({
	            url: "/searchHotel.php",
	            type: 'POST',
	            dataType: 'json',
	            data : {
	            	city: city,
	            	hotelCategory: hotelCategory,
	            	hotelName: hotelName,
	            	checkInDate: checkInDate,
	            	nightDuration: nightDuration,
	            	boardType: boardType,
	            	adults: adults,
	            	children: children,
	            	hotelName: hotelName
	            },
	            success: function (data) {
	            	console.log('data - ', data);
	            	$('.table').html('');
	            	if ( data.hotelOffers === null || data.hotelOffers === undefined || data.hotelOffers == '' ) {
	            		$('.table').append($('<tr><td>Empty</td></tr>'));
	            		$('.loader').hide();
	            		return false;
	            	}
	                $.each(data.hotelOffers, function( index, value ) {
	                	console.log(value); 
					  	var name = value.hotel.name;
					  	var category = value.hotel.hotelCategory.id;
					  	switch(category) {
						  case 7:
						    category = 'Villa';
						    break;
						  case 8:
						    category = "Appartment";
						    break;
						}
					  	$('.table').append($('<tr><td>' + name + '</td><td>' + category + '*</td></tr>'));
					});
					$('.loader').hide();
	            },
	            error: function (data) {
	                console.log(data);

	            }
	        });
        });
	}

	$(document).ready(function(){
		loadHotels();
		getLocaleListLocal();
		submitForm();
	});

}

myFunc();