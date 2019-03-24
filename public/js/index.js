function addUser(){
	var name = $('#name').val();
	var email = $('#email').val();
	var password = $('#password').val();

	if(name === ''){
		alert('Please fill in your name');
	}
	if(email === ''){
		alert('Please fill in your email');
	}

	if(password === ''){
		alert('Please fill in your password');
	}
	var data = new FormData();
	data.append('name', name);
	data.append('email', email);
	// data.append('password', password);
	$.ajax({
		url: "/add_user",
		type: "POST",
		data:data,
		timeout: 5000,
        contentType: false,
        cache: false,
        processData: false,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
        success: function(response){
        	if(response.code === 200){
        		alert(response.message);
        		window.location.href = "/questions";	
        	}
        	else{
        		alert(response.message)
        	}
        	
        },
        error: function(){
        	alert('Failed to perform operation');
        }

	})
}