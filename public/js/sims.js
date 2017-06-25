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

	/*
	*	College
	*/

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
        addMajor = 2;

		$.ajax({
			url: form.prop('action'),
			type: 'POST',
			data: {
				college: college,
				course_abrr: course_abrr,
				course_name: course_name
			},
			success: function (data){
				if(ctr!=0){
					$.ajax({
						url: App.api + '/major',
						type: 'POST',
						data: {
							course_abrr: course_abrr,
							majors: majorString
						},
						success: function(data){
							window.location = App.api + "/course";
						},
						error: function(err){
							console.log(err);
						}
					});
				}else{
					window.location = App.api + "/course";
				}
			},
			error: function (err){
				window.location = App.api + "/course";
				console.log(err);
			}
		});
	});