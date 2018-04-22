function firstname(validate){
	var resultReg = document.getElementById("resultReg");
	var fnameRes = document.getElementById("fnameRes");
	var regBtn = document.getElementById("regBtn");
	
	if(validate.value.length == 1){ 
		fnameRes.style.color = "#F00";
		fnameRes.innerHTML=" First name at least 2 characters length.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		fnameRes.style.color = "#F00";
		fnameRes.innerHTML=" *Please input first name.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length > 1){ 
		fnameRes.style.color = "#063";
		fnameRes.innerHTML=" First name is valid.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;	
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 25){
		fnameRes.style.color = "#F00";
		fnameRes.innerHTML=" *First name too long. Up to 25 characters length. <br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "!^*|,\":<>[	]{}`\';()@&$/?,.~#%_+1234567890";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		fnameRes.style.color = "#F00";
		fnameRes.innerHTML=" *Special/numeric characters for first name are not allowed.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}
	
}

function middlename(validate){
	var resultReg = document.getElementById("resultReg");
	var mnameRes = document.getElementById("mnameRes");
	var regBtn = document.getElementById("regBtn");
	
	if(validate.value.length == 1){ 
		mnameRes.style.color = "#F00";
		mnameRes.innerHTML=" Middle name at least 2 characters length.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		mnameRes.style.color = "#F00";
		mnameRes.innerHTML="";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;	
		regBtn.style.opacity = 1;
	}
	if(validate.value.length > 1){ 
		mnameRes.style.color = "#063";
		mnameRes.innerHTML=" Middle name is valid.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;	
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 25){
		mnameRes.style.color = "#F00";
		mnameRes.innerHTML=" *Middle name too long. Up to 25 characters length. <br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
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


function lastname(validate){
	var resultReg = document.getElementById("resultReg");
	var lnameRes = document.getElementById("lnameRes");
	var regBtn = document.getElementById("regBtn");
	
	if(validate.value.length == 1){ 
		lnameRes.style.color = "#F00";
		lnameRes.innerHTML=" Last name at least 2 characters length.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		lnameRes.style.color = "#F00";
		lnameRes.innerHTML=" *Please input last name.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length > 1){ 
		lnameRes.style.color = "#063";
		lnameRes.innerHTML=" Last name is valid.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;	
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 25){
		lnameRes.style.color = "#F00";
		lnameRes.innerHTML=" *Last name too long. Up to 25 characters length. <br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "!^*|,\":<>[	]{}`\';()@&$/?,.~#%_+1234567890";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		lnameRes.style.color = "#F00";
		lnameRes.innerHTML=" *Special/numeric characters for last name are not allowed.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}
	
}

function addr(validate){
	var resultReg = document.getElementById("resultReg");
	var stRes = document.getElementById("addRes");
	var regBtn = document.getElementById("regBtn");
	
	if(validate.value.length <= 5){ 
		stRes.style.color = "#F00";
		stRes.innerHTML=" Invalid Address.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		stRes.style.color = "#F00";
		stRes.innerHTML=" *Please input address.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}
	if(validate.value.length >= 6){ 
		stRes.style.color = "#063";
		stRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;	
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 50){
		stRes.style.color = "#F00";
		stRes.innerHTML=" *Invalid address. <br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;	
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "!^*|\":<>[	]{}`\';@&$/?~#%_+";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		stRes.style.color = "#F00";
		stRes.innerHTML=" *Invalid address.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}
	
}

function password(validate){
	var resultReg = document.getElementById("resultReg");
	var passRes = document.getElementById("passRes");
	var regBtn = document.getElementById("regBtn");

	if(validate.value.length <= 5){
		passRes.style.color = "#F00";
		passRes.innerHTML=" *Password too short. Atleast 6 character length.<br>";
		resultReg.style.visibility="visible";
		regBtn.disabled=true;
		resultReg.style.opacity = 1;
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		passRes.style.color = "#F00";
		passRes.innerHTML=" *Please input password.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}
	if(validate.value.length > 5){ 
		passRes.style.color = "#063";
		passRes.innerHTML=" Password is valid.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
		
	}
	if(validate.value.length >= 25){
		passRes.style.color = "#063";
		passRes.innerHTML=" Password too strong!<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "^*|,\":<> [	]{}`\';()&$/?,.~#%_+";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		passRes.style.color = "#F00";
		passRes.innerHTML=" *Special characters for password not allowed.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}
	
}

function mob(validate){
	var resultReg = document.getElementById("resultReg");
	var mobRes = document.getElementById("mobRes");
	var regBtn = document.getElementById("regBtn");

	if(validate.value.length <= 1){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Invalid contact number.<br>";
		resultReg.style.visibility="visible";
		regBtn.disabled=true;
		resultReg.style.opacity = 1;
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 4){ 
		mobRes.style.color = "#063";
		mobRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
		
	}
	if(validate.value.length >= 20){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Invalid contact number.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "^*|,\":<> [	]{}`\';()&$/?,.~#%_qwertyuioplkjhgfdsazxcvbnm";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Contact number must be numeric.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}	
}

function pho(validate){
	var resultReg = document.getElementById("resultReg");
	var mobRes = document.getElementById("phoRes");
	var regBtn = document.getElementById("regBtn");

	if(validate.value.length <= 1){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Invalid contact number.<br>";
		resultReg.style.visibility="visible";
		regBtn.disabled=true;
		resultReg.style.opacity = 1;
		regBtn.style.opacity = .7;
	}
	if(validate.value.length == 0){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
	}
	if(validate.value.length >= 4){ 
		mobRes.style.color = "#063";
		mobRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
		
	}
	if(validate.value.length >= 20){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Invalid contact number.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "^*|,\":<> [	]{}`\';()&$/?,.~#%_qwertyuioplkjhgfdsazxcvbnm";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		mobRes.style.color = "#F00";
		mobRes.innerHTML=" Contact number must be numeric.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}	
}

function repeat(validate){
	var resultReg = document.getElementById("resultReg");
	var repRes = document.getElementById("repRes");
	var regBtn = document.getElementById("regBtn");
	var pass = document.getElementById("pass");

	if(validate.value == pass.value){
		repRes.style.color = "#063";
		repRes.innerHTML=" Password matched.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
	}else{
		repRes.style.color = "#F00";
		repRes.innerHTML=" Password do not matched.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}
}

function age(validate){
	var resultReg = document.getElementById("resultReg");
	var ageRes = document.getElementById("ageRes");
	var regBtn = document.getElementById("regBtn");

	if(validate.value == 0){
		ageRes.style.color = "#F00";
		ageRes.innerHTML=" *Please input your age.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}
	if(validate.value <= 12){ 
		ageRes.style.color = "#F00";
		ageRes.innerHTML=" Your age must be 13 & above to register.";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
		
	}
	if(validate.value >= 11){ 
		ageRes.style.color = "#063";
		ageRes.innerHTML=" ";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=false;
		regBtn.style.opacity = 1;
		
	}
	if(validate.value >= 95){
		ageRes.style.color = "#F00";
		ageRes.innerHTML=" You are too old to register here.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
	}	
		if(validate.value == " "){
		validate.value = "";	
	}
	var splChars = "^*|,\":<> [	]{}`\';()&$/?,.~#%_qwertyuioplkjhgfdsazxcvbnm";
for (var i = 0; i < validate.value.length; i++) {
    if (splChars.indexOf(validate.value.charAt(i)) != -1){
		ageRes.style.color = "#F00";
		ageRes.innerHTML=" Age must be numbers.<br>";
		resultReg.style.visibility="visible";
		resultReg.style.opacity = 1;
		regBtn.disabled=true;
		regBtn.style.opacity = .7;
}}	
}