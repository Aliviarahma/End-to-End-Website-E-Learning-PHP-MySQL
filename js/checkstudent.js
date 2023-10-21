function checkEmail2(){
        var IDNO =  document.forms["student"]["idno"].value;
        var ID = document.getElementById('idno');
		var divemail = document.getElementById('divemail');
		var reemail = document.getElementById("reemail").value;
		//check if the re enter the email address is equal to the inputted email
		if(IDNO == ''){
			ID.className = "form-group has-error";
			
		}
}