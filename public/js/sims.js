/*
 *
 *   SIMS - Student Information Manangement System
 *   version 1.0
 *
 */

	var App = {
		name: "SIMS",
		api: "http://localhost:8000",
		dev:  "Axel Roz"
	}

	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

	function ucwords (str) {
	    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
	        return $1.toUpperCase();
	    });
	}

	/*College*/
	$('#college-create-form').submit(function (event){
		event.preventDefault();

		var college_abrr = $('input[name=college-abrr]').val();
		var college_name = $('input[name=college-name]').val();

		$.ajax({
			url: App.api + '/college',
			type: 'POST',
			data: {
				college_abrr: college_abrr,
				college_name: college_name
			},
			success: function (data) {
				window.location = App.api + "/college";

			},
			error: function (err) {
				/*var errors = $.parseJSON(err.responseText);*/
				console.log('error');
				/*$.each(errors, function(i, data){
					console.log(data);
				});*/
			}
		});
	});

	$('#college-edit-form').submit(function (event){
		event.preventDefault();

		var form = $('#college-edit-form');
		var college_abrr = $('input[name=college-abrr]').val();
		var college_name = $('input[name=college-name]').val();
		var college_status = $('select[name=college-status]').val();

		console.log(form.prop('action'));

		
		$.ajax({
			url: form.prop('action'),
			type: 'PUT',
			data: {
				college_name: college_name,
				college_status: college_status
			},
			success: function (data) {
				window.location = App.api + "/college";		
			},
			error: function (err) {
				/*var errors = $.parseJSON(err.responseText);
				console.log('error');
				/*$.each(errors, function(i, data){
					console.log(data);
				});*/
			}
		});
	});