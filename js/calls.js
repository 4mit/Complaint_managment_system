
$(document).ajaxStart(function(){

	//Show Loader Now 

});

$('#saveF').click(function(e){
	e.preventDefault();
	var fn	 = $('#firstName').val();
	var mail = $('#email').val();
	var desc =$('#description').val();
	var roll =$('#roll').val();
	desc =$.trim(desc);
	var data = 'Savefeedback=true&firsename='+fn+'&email='+mail+'&desc='+desc+"&roll="+roll;
	console.log(data);
	$.ajax({
		url:'saveFeedback.php',
		method:'POST',
		data:data,
		success:function(responseText){
			$('#error').html(responseText).addClass("alert alert-danger animated jello");

			console.log('Responce is - '+responseText);
		},
		error:function(responseError){

			console.log('oops.! Error'+responseError+'occured');
		}
	});
});

