$(document).ready(function() {
	$(".error").hide();
	$("form#login").submit(function(e) {
	    	e.preventDefault();
	    
    	$("p#errorp").empty();
		

	    var username = $("input#username").val();
	    var password = $("input#password").val();

	    

	    
	    if (username.length==0) {
	        $("p#errorp").text("You must fill Username/email");$(".error").show();
	        $("input#username").focus();
	        return false;
	      }
	    if (password.length==0) {
		    $("p#errorp").text("You must fill Password");$(".error").show();
		    $("input#password").focus();
		    return false;
		  }
		  var formData = new FormData(this);
		$.ajax({
		    type: "POST",
		    url: BASE_URL+"/account/proses_login",
			data:formData, //this is formData
			
			success: function(data) {
			if(data == 1)
			{
				window.location.assign(BASE_URL);
			}
			else {$("p#errorp").text("Username/email and Password did not Match");$(".error").show();}
			
			},
			processData:false,
			contentType:false,
			cache:false,

		    error: function() {
		                
		                  alert("mohon maaf terjadi kesalahan sistem");}
		                
		  });

	});

});