$(document).ready(function(){
	$('#idContra2').change(function () {
		const idContra =  $('#idContra').val();
		const idContra2 = $('#idContra2').val();
		if (idContra !=  "" || Contra2 !=  "") {
			if (idContra !=  idContra2) {
				
				$('#idContra2').css("border-bottom", " 2px solid #F44336");
			}	
		} 
		if (idContra ==  "") {
			
			$('#idContra2').css("border-bottom", "1px solid #9e9e9e");
		}
		if (idContra2 ==  "") {
			
			$('#idContra2').css("border-bottom", "1px solid #9e9e9e");
		}
	})
})
	    	