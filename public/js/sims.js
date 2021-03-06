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

	var displayValidationError = function (errors){
		var markup = "<div class='alert alert-danger'>";
		markup += "<button data-dismiss='alert' class='close close-sm' type='button'>";
        markup += "<i class='fa fa-times'></i></button>";
        markup += "<strong>Oh snap!</strong> Change a few things up and try submitting again."
		markup += "<ul>";
		$.each(errors, function(i, data){
			markup += "<li>" + data + "</li>";
		});
		markup += "</ul></div>";
		$('#validation-message').html(markup);
	}

	/*
	*	College
	*/

	$('#college-create-form').submit(function (event){
		event.preventDefault();

		var form = $('#college-create-form');
		var college_abrr = $('input[name=college-abrr]').val();
		var college_name = $('input[name=college-name]').val();

		$.ajax({
			url: form.prop('action'),
			type: 'POST',
			dataType: 'JSON',
			data: {
				college_abrr: college_abrr,
				college_name: college_name
			},
			success: function (data) {
				localStorage.setItem('response', JSON.stringify(data));
				window.location = App.api + "/college";
			},
			error: function (err) {
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	$('#college-edit-form').submit(function (event){
		event.preventDefault();

		var form = $('#college-edit-form');
		var college_abrr = $('input[name=college-abrr]').val();
		var college_name = $('input[name=college-name]').val();
		var college_status = $('select[name=college-status]').val();

		$.ajax({
			url: form.prop('action'),
			type: 'PUT',
			dataType: 'JSON',
			data: {
				college_name: college_name,
				college_status: college_status
			},
			success: function (data) {
				localStorage.setItem('response', JSON.stringify(data));
				window.location = App.api + "/college";		
			},
			error: function (err) {
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	/*
	*	Course & Major
	*/
	var addMajor = 2;

	$('#add-major-btn').click(function(){
		addMajor++;
		var markup = "<div class='form-group'>";
            markup += "<label class='col-sm-2 control-label'></label>";
            markup += "<div class='col-sm-10'>";
            markup += "<input type='text' name='major-name-" + addMajor + "' class='form-control' minlength='5' maxlength='50' />"; 
            markup += "</div></div>";
		$('#add-major').append(markup);
	});

	$('#course-create-form').submit(function (event){
		event.preventDefault();

		var form = $('#course-create-form');
		var college = $('select[name=college]').val();
		var course_abrr = $('input[name=course-abrr]').val();
		var course_name = $('input[name=course-name]').val();

		var majorList = [], ctr = 0;
		for (var i = 1; i <= addMajor; i++) {
            var temp = $("input[name=major-name-"+i+"]").val();
            if (temp != "" && temp != undefined && temp != null) {
                majorList.push(temp); ctr++; 
            }
        }
        var majorString = JSON.stringify(majorList);
        
		$.ajax({
			url: form.prop('action'),
			type: 'POST',
			dataType: 'JSON',
			data: {
				college: college,
				course_abrr: course_abrr,
				course_name: course_name,
				majors: majorString
			},
			success: function (data){
				addMajor = 2;
				localStorage.setItem('response', JSON.stringify(data));
				window.location = App.api + "/course";
			},
			error: function (err){
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	$('#course-edit-form').submit(function (event){
		event.preventDefault();

		var form = $('#course-edit-form');
		var college_id = $('select[name=college]').val();
		var course_name = $('input[name=course-name]').val();
		var course_status = $('select[name=course-status]').val();

		$.ajax({
			url: form.prop('action'),
			type: 'PUT',
			dataType: 'JSON',
			data: {
				college_id: college_id,
				course_name: course_name,
				course_status: course_status
			},
			success: function (data) {
				localStorage.setItem('response', JSON.stringify(data));
				window.location = App.api + "/course";
			},
			error: function (err) {
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	$('#major-create-form').submit(function (event){
		event.preventDefault();

		var form = $('#major-create-form');
		var course_id = $('select[name=course]').val();
		var major_name = $('input[name=major-name]').val();
		
		$.ajax({
			url: form.prop('action'),
			type: 'POST',
			dataType: 'JSON',
			data: {
				course_id: course_id,
				major_name: major_name
			},
			success: function (data) {
       		 	localStorage.setItem('response', JSON.stringify(data));	
				window.location = App.api + "/major";
			},
			error: function (err) {
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	$('#major-edit-form').submit(function (event){
		event.preventDefault();

		var form = $('#major-edit-form');
		var course_id = $('select[name=course]').val();
		var major_name = $('input[name=major-name]').val();
		var major_status = $('select[name=major-status]').val();
		
		$.ajax({
			url: form.prop('action'),
			type: 'PUT',
			dataType: 'JSON',
			data: {
				course_id: course_id,
				major_name: major_name,
				major_status: major_status
			},
			success: function (data) {
       		 	localStorage.setItem('response', JSON.stringify(data));
				window.location = App.api + "/major";
			},
			error: function (err) {
				console.log(err.responseText);
				displayValidationError($.parseJSON(err.responseText));
			}
		});
	});

	