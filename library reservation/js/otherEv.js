function inputEv(details){
	var otherForm = document.getElementById("otherForm");
	
	if(details.value.length == 0){ 
		otherForm.innerHTML="Please";
	}
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "!^*|,\":<>[	]{}`\';()@&$/?,.~#%_+1234567890";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		mnameRes.style.color = "#F00";
		mnameRes.innerHTML=" *Special/numeric characters for middle name are not allowed.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}
	
}