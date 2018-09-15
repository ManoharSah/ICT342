

$('#wizard').smartWizard({
	onLeaveStep:leaveAStepCallback
});

function leaveAStepCallback(obj, context) {
	if(context.fromStep == 2) {
		show_fields();
		if(validateSteps(context.fromStep)){
			$('.buttonNext').html("Submit");
			$('.buttonPrevious').hide();
		}
	}
	if(context.fromStep == 3) {
		// show summary
		show_summary();
		if(validateSteps(context.fromStep)){
			$('.buttonNext').hide();
			$('.buttonFinish').addClass('btn btn-primary').hide();
		}
	}
	return validateSteps(context.fromStep);
}

function validateSteps(stepnumber) {
    var isStepValid = true;
    if(stepnumber == 1){
    	var validateFields = [
    		'name',
    		// 'bus_name',
    		// 'position',
    		// 'owner',
    		// 'phone',
    		// 'email'
    	];
    	isStepValid = isValid(validateFields);
    	if(isStepValid) {
    		$.post(
    			'libs/ajax.php?action=save_step_1',
				$('input[name^="step_1"]').serialize()
	    	);
    	}
    }
    if(stepnumber == 2){
    	var validateFields = [
    		'how-many',
    		'how-many-now'
    	];
    	if (isStepValid) {
    		isStepValid = isValid(validateFields);
    	}
    	if (isStepValid) {
	    	if($('#how-many').find('input').val() <= 0) {
	    		$('#how-many').addClass('bad');
	    		$('#how-many').find('.col-md-6.col-sm-6.col-xs-12').after('<div class="alert">Insert enter more than 0</div>');
	    		isStepValid = false;
	    	}
	    	if($('#how-many-now').find('input').val() <= 0) {
	    		$('#how-many-now').addClass('bad');
	    		$('#how-many-now').find('.col-md-6.col-sm-6.col-xs-12').after('<div class="alert">Insert enter more than 0</div>');
	    		isStepValid = false;
	    	}
    	}
    	if (isStepValid) {
    		$.post(
    			'libs/ajax.php?action=save_step_2',
				$('input[name^="step_2"]').serialize()
	    	);
    	}
    }
    if(stepnumber == 3) {
    	var validateFields = [];
    	var how_many = $('#how-many').find('input').val();
		for(var i = 1; i<=how_many; i++) {
			validateFields.push('technician_'+i+'_wage');
			validateFields.push('technician_'+i+'_productivity');
			validateFields.push('technician_'+i+'_efficiency');
			validateFields.push('technician_'+i+'_hourly_rate');
			validateFields.push('technician_'+i+'_no_of_days');
		}
    	isStepValid = isValid(validateFields);
    	if (isStepValid) {
    		$.post(
    			'libs/ajax.php?action=save_step_3',
				$('input[name^="technician"],select[name^="technician"]').serialize()
	    	);
    	}
    }
    return isStepValid;
}

function isValid(validateFields){
	var valid = true;
	$.each(validateFields, function(k,v){
		var elem = $('#'+v);
		elem.removeClass('bad');
		elem.find('.alert').remove();
		if (elem.find('input').val() == ''){
			elem.addClass('bad');
			elem.find('.col-md-6.col-sm-6.col-xs-12').after('<div class="alert">Insert appropriate value</div>');
			valid = false;
		}
	});
	return valid;
}

$('#wizard_verticle').smartWizard({
  transitionEffect: 'slide'
});

$('.buttonNext').addClass('btn btn-primary');
$('.buttonPrevious').addClass('btn btn-primary');
$('.buttonFinish').addClass('btn btn-default').hide();

function show_summary() {
	var how_many = $('#how-many').find('input').val();
	var html = '';
	var total_total = 0;
	for(var i = 1; i<=how_many; i++) {
		var wage = $('#technician_'+i+'_wage').find('input').val();
		var productivity = $('#technician_'+i+'_productivity').find('input').val();
		var efficiency = $('#technician_'+i+'_efficiency').find('input').val();
		var hourly_rate = $('#technician_'+i+'_hourly_rate').find('input').val();
		var no_of_days = $('#technician_'+i+'_no_of_days').find('input').val();
		var lost_retail_labour = 7.6 * hourly_rate * (productivity/100) * (efficiency/100) * no_of_days;
		var recruitment_cost = ( wage * 0.1 );
		var onboarding_cost = 7.6 * ( hourly_rate * 0.2 ) * 22.7;
		var technician_total = lost_retail_labour + recruitment_cost + onboarding_cost;
		total_total += technician_total;
		html += '<tr>'
				+'<td>Technician '+i+'</td>'
				+'<td><input disabled type="text" class="form-control" value="'+currency_format(lost_retail_labour)+'"></td>'
				+'<td><input disabled type="text" class="form-control" value="'+currency_format(recruitment_cost)+'"></td>'
				+'<td><input disabled type="text" class="form-control" value="'+currency_format(onboarding_cost)+'"></td>'
				+'<td><input disabled type="text" class="form-control" value="'+currency_format(technician_total)+'"></td>'
				+'</tr>';
	}
	html += '<tr><td></td><td></td><td></td><td></td><td><input disabled type="text" class="form-control" value="'+currency_format(total_total)+'"></td></tr>'
	$('#summary').find('tbody').html(html);
}

function currency_format(number){
	return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
}

function show_fields(){
	var how_many = $('#how-many').find('input').val();
	var html = '';
	for(var i = 1; i<=how_many; i++) {
	html += '<div id="technician_'+i+'><div class="form-group">'
		+'<label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align: center">'
		+'Technician:'+i+'</label>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_type">'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Technician Type <span class="required">*</span>'
		+'</label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<select name="technician['+i+'][type]" required="required" class="form-control col-md-7 col-xs-12">'
		+'<option value="1">Diagnostic Technician</option>'
		+'<option value="2">Service Technician</option>'
		+'<option value="3">General/Repair Technician</option>'
		+'</select>'
		+'</div>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_wage">'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Technician Annual Wage ($) <span class="required">*</span>'
		+'</label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<input type="number" name="technician['+i+'][wage]" required="required" class="form-control col-md-7 col-xs-12">'
		+'<span class="help-block">Annual Salary of a Technician.</span></div>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_productivity">'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Technicians Productivity (%) <span class="required">*</span></label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<input type="number" name="technician['+i+'][productivity]" required="required" class="form-control col-md-7 col-xs-12"><span class="help-block">A block of help text</span></div>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_efficiency">'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Technicians Efficiency (%) <span class="required">*</span>'
		+'</label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<input type="number" name="technician['+i+'][efficiency]" required="required" class="form-control col-md-7 col-xs-12">'
		+'<span class="help-block">Productivity of a Technician.</span></div>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_hourly_rate" >'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Retail Labour Rate ($) <span class="required">*</span>'
		+'</label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<input type="number" name="technician['+i+'][hourly_rate]" required="required" class="form-control col-md-7 col-xs-12">'
		+'<span class="help-block">Hourly rate of a retail Labour.</span></div>'
		+'</div>'
		+'<div class="item form-group" id="technician_'+i+'_no_of_days" >'
		+'<label class="control-label col-md-3 col-sm-3 col-xs-12">'
		+'Number of Days Position Vacant <span class="required">*</span>'
		+'</label>'
		+'<div class="col-md-6 col-sm-6 col-xs-12">'
		+'<input type="number" name="technician['+i+'][no_of_days]" required="required" class="form-control col-md-7 col-xs-12">'
		+'<span class="help-block">How long the position is vacant for in days?</span></div>'
		+'</div></div>';
	}
	$('#show_techician').html(html);
}

function printToPdf() {

	var doc = new jsPDF();
	doc.fromHTML($('#summary').html());
	doc.save();

}

function printdiv(printdivname) {
	
	var headstr = "<html><head><title>Booking Details</title></head><body>";
	var footstr = "</body>";
	var newstr = document.getElementById(printdivname).innerHTML;
	var oldstr = document.body.innerHTML;
	
	document.body.innerHTML = headstr+newstr+footstr;
	
	window.print();

	document.body.innerHTML = oldstr;
	
	return false;

}