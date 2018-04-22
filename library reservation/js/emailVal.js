function recipient(validate){
	var sendBtn = document.getElementById("sendBtn");
	var emailResult = document.getElementById("emailResult");
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(validate.value.length >= 1){ 
		sendBtn.disabled=false;	
		sendBtn.value = " Send To "+validate.value+" ";	
		sendBtn.style.opacity = 1;
	}else{
		sendBtn.value = " Send To Recipient ";	
		sendBtn.disabled=true;	
		sendBtn.style.opacity = .7;
	}

    if (!filter.test(validate.value)) {
		emailResult.style.color = "#F00";
		emailResult.innerHTML=" Invalid email address.";
		sendBtn.disabled=true;	
		sendBtn.style.opacity = .7;
    email.focus;
    return false;
 	}else{
		emailResult.style.color = "#063";
		emailResult.innerHTML=" Valid email address.";
		sendBtn.disabled=false;	
		sendBtn.style.opacity = 1;
	}
}