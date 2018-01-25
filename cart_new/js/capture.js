$(document).ready(function() { captureRegistrations(); } );

var sendToServerScheduled = false;
var ajaxCaptureRequest;

function captureRegistrations(evt)
{	
	//attach events on these fields    
	$('#firstName').keypress(function() { onCaptureItemCompleted(); } );      
	$('#lastName').keypress(function() { onCaptureItemCompleted(); } );      
	$('#address').keypress(function() { onCaptureItemCompleted(); } );      
	$('#city').keypress(function() { onCaptureItemCompleted(); } );      
	$('#state').keypress(function() { onCaptureItemCompleted(); } );      
	$('#zip').keypress(function() { onCaptureItemCompleted(); } );            
	$('#phone').keypress(function() { onCaptureItemCompleted(); } );           
	$('#shipEmail').keypress(function() { onCaptureItemCompleted(); } );      
	
    $('#shipFirstName').keypress(function() { onCaptureItemCompleted(); } );      
    $('#shipLastName').keypress(function() { onCaptureItemCompleted(); } );      
    $('#shipAddress').keypress(function() { onCaptureItemCompleted(); } );      
    $('#shipCity').keypress(function() { onCaptureItemCompleted(); } );      
    $('#shipState').keypress(function() { onCaptureItemCompleted(); } );      
    $('#shipZip').keypress(function() { onCaptureItemCompleted(); } );      
}

function onCaptureItemCompleted(evt)
{
	document.title += ".";
	if (sendToServerScheduled == false)
	{
		setTimeout(sendCaptureItemsToServer, 3000); //send in 5 seconds
		sendToServerScheduled = true;
	}
}

function sendCaptureItemsToServer()
{
	//alert("sending to server now");   
	sendToServerScheduled = false;
	var ajaxURL = $('#ajaxURL').val();
	ajaxCaptureRequest = $.post( ajaxURL, { cart_action: "capture", firstName: $('#firstName').val(), lastName: $('#lastName').val(), address: $('#address').val(), city: $('#city').val(), state: $('#state').val(), zip: $('#zip').val(), country: $('#country').val(), phone: $('#phone').val(), shipEmail: $('#shipEmail').val(), shipFirstName: $('#shipFirstName').val(), shipLastName: $('#shipLastName').val(), shipAddress: $('#shipAddress').val(), shipCity: $('#shipCity').val(), shipState: $('#shipState').val(), shipZip: $('#shipZip').val(), shipCountry: $('#shipCountry').val(), totalShip: $('#totalShip').val(), totalTax: $('#tax').val(), totalSub: $('#totalSub').val() }, function(data){});
}

function checkFeedbackForm() {      
    var pass = true;
    var errors = '';
    if ( $('#Name').val() == '' ) {
        errors = errors+"Name is Required.\n\r";
        pass = false;
    }
    if ( $('#Question').val() == '' ) {
        errors = errors+"Question is Required.\n\r";
        pass = false;
    }
    if ( $('#From').val() == '' ) {
        errors = errors+"Email Address is Required.\n\r";
        pass = false;
    }              
    if ( !isValidEmailAddress( $('#From').val() ) ) {
        errors = errors+"Valid Email Address is Required.\n\r";
        pass = false;
    }              
    if ( errors ) {                                                                      
        alert(errors);                
    }
    else {
        $('#submit').attr('disabled', 'disabled');
    }
    return pass;
}



function checkOrderForm() {      
    var pass = true;
    var errors = '';
    if ( $('#shipFirstName').val() == '' ) {
        errors = errors+"Shipping First Name is Required.\n\r";
        pass = false;
    }
    if ( $('#shipLastName').val() == '' ) {
        errors = errors+"Shipping Last Name is Required.\n\r";
        pass = false;
    }
    if ( $('#shipAddress').val() == '' ) {
        errors = errors+"Shipping Address is Required.\n\r";
        pass = false;
    }
    if ( $('#shipCity').val() == '' ) {
        errors = errors+"Shipping City is Required.\n\r";
        pass = false;
    }
    if ( $('#shipState').val() == '-1' ) {
        errors = errors+"Shipping State is Required.\n\r";
        pass = false;
    }
    if ( $('#shipZip').val() == '' ) {
        errors = errors+"Shipping Zip is Required.\n\r";
        pass = false;
    }
    if ( $('#phone').val() == '' ) {
        errors = errors+"Shipping Phone Number is Required.\n\r";
        pass = false;
    }  
    if ( $('#shipEmail').val() == '' ) {
        errors = errors+"Shipping Email Address is Required.\n\r";
        pass = false;
    }              
    if ( !isValidEmailAddress( $('#shipEmail').val() ) ) {
        errors = errors+"Valid Email Address is Required.\n\r";
        pass = false;
    }              
    if ( $('#firstName').val() == '' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing First Name is Required.\n\r";
        pass = false;
    }
    if ( $('#lastName').val() == '' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing Last Name is Required.\n\r";
        pass = false;
    }
    if ( $('#address').val() == '' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing Address is Required.\n\r";
        pass = false;
    }
    if ( $('#city').val() == '' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing City is Required.\n\r";
        pass = false;
    }
    if ( $('#state').val() == '-1' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing State is Required.\n\r";
        pass = false;
    }
    if ( $('#zip').val() == '' && $('#useShipping').attr("checked") != 'checked' ) {
        errors = errors+"Billing Zip is Required.\n\r";
        pass = false;
    }   
    if ( $('#cardNumber').val() == '' && $('#PaymentTypeCC').attr("checked") == 'checked' ) {
        errors = errors+"Credit Card Number is Required.\n\r";
        pass = false;
    }                     
    if ( $('#cvv').val() == '' && $('#PaymentTypeCC').attr("checked") == 'checked' ) {
        errors = errors+"Credit Card CVV is Required.\n\r";
        pass = false;
    } 
	if($('#PaymentTypePP').attr("checked") == 'checked')
	{
		return true;
	}
    if ( errors ) {                                                                      
        alert(errors);                
    }
    else {
        $('#submit').attr('disabled', 'disabled');
    }
    return pass;
}


function checkOrderFormPP() {      
    var pass = true;
    var errors = '';
    if ( $('#shipFirstName').val() == '' ) {
        errors = errors+"Shipping First Name is Required.\n\r";
        pass = false;
    }
    if ( $('#shipLastName').val() == '' ) {
        errors = errors+"Shipping Last Name is Required.\n\r";
        pass = false;
    }
    if ( $('#shipAddress').val() == '' ) {
        errors = errors+"Shipping Address is Required.\n\r";
        pass = false;
    }
    if ( $('#shipCity').val() == '' ) {
        errors = errors+"Shipping City is Required.\n\r";
        pass = false;
    }
    if ( $('#shipState').val() == '-1' ) {
        errors = errors+"Shipping State is Required.\n\r";
        pass = false;
    }
    if ( $('#shipZip').val() == '' ) {
        errors = errors+"Shipping Zip is Required.\n\r";
        pass = false;
    }
    if ( $('#phone').val() == '' ) {
        errors = errors+"Shipping Phone Number is Required.\n\r";
        pass = false;
    }  
    if ( $('#shipEmail').val() == '' ) {
        errors = errors+"Shipping Email Address is Required.\n\r";
        pass = false;
    }  
	pass = true;
   // if ( errors )                                                                      
        //alert(errors);  
    if ( $('#PaymentTypePP').attr("checked") == 'checked' )
        $('#frmOrder').submit();
}

function useShip( shipCountry ) {
    if ( shipCountry == 'United States' || shipCountry == 'Dominican Republic' || shipCountry == 'Virgin Islands, U.S.' ) {
        $('#shipType_US').show();
        $('#shipType_US input:radio:not(:disabled):first').attr('checked',true);
        var pp = "#shipID"+$('#shipType_US input:radio:not(:disabled):first').val()+"Price";
        var pd = "#shipID"+$('#shipType_US input:radio:not(:disabled):first').val()+"Desc";
        var total=parseFloat( parseFloat($("#subTotal").val()) + parseFloat($(pp).val()) ).toFixed(2);
        $("#totalCharges").html("$"+total);
        $("#ShipRate").html("$"+$(pp).val());
        $("#totalShip").value = $(pp).val(); 
        $('#shipType_Canada').hide();
        $('#shipType_International').hide();
    }
    else if ( shipCountry == 'Canada' ) {
        $('#shipType_Canada').show(); 
        $('#shipType_Canada input:radio:not(:disabled):first').attr('checked',true);
        var pp = "#shipID"+$('#shipType_Canada input:radio:not(:disabled):first').val()+"Price";
        var pd = "#shipID"+$('#shipType_Canada input:radio:not(:disabled):first').val()+"Desc";
        var total=parseFloat( parseFloat($("#subTotal").val()) + parseFloat($(pp).val()) ).toFixed(2);
        $("#totalCharges").html("$"+total);
        $("#ShipRate").html("$"+$(pp).val());
        $("#totalShip").value = $(pp).val();                                                                                        
        $('#shipType_US').hide();
        $('#shipType_International').hide();
    }
    else {                                
        $('#shipType_International').show();
        $('#shipType_International input:radio:not(:disabled):first').attr('checked',true); 
        var pp = "#shipID"+$('#shipType_International input:radio:not(:disabled):first').val()+"Price";
        var pd = "#shipID"+$('#shipType_International input:radio:not(:disabled):first').val()+"Desc";
        var total=parseFloat( parseFloat($("#subTotal").val()) + parseFloat($(pp).val()) ).toFixed(2);
        $("#totalCharges").html("$"+total);
        $("#ShipRate").html("$"+$(pp).val()); 
        $("#totalShip").value = $(pp).val();                                                                                                                                                                               
        $('#shipType_Canada').hide();                                                                                         
        $('#shipType_US').hide();
    }
}  

function updateStateCombo(countrySel,stateField, updateField) {                                                          
    var ajaxURL = $('#ajaxURL').val();                        
    $.post( ajaxURL, { ajaxAction: "updateStates", country: countrySel, fieldname: stateField}, function(data){$('#'+updateField).html(data);});
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};