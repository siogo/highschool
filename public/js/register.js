var register = document.getElementById('register');
var radio = document.getElementById('radio');
var email = document.getElementById('email');
var password = document.getElementById('pass');
var pass_confirm = document.getElementById('pass_confirm');
var telephone = document.getElementById('tel');
var oSex = document.getElementById('sex');
var sexs = oSex.getElementsByTagName('input');
var groups = radio.getElementsByTagName('input');
var names = document.getElementById('user_name');
var group = '';

for(var i=0;i<groups.length;i++){
	if(groups[i].checked == true) {
		group = groups[i].getAttribute('value');
	}
}

for(var i=0;i<sexs.length;i++){
	if(sexs[i].checked == true) {
		sex = sexs[i].getAttribute('value');
	}
}

function radio_u(){
	group = document.register_form.group.value;
}

function radio_sex(){
	sex = document.register_form.sex.value;
}
register.onclick = function(){
	var data = 'email'+'='+email.value+'&'+'password'+'='+password.value+'&'+'pass_confirm'+'='+pass_confirm.value
				+'&'+'name'+'='+names.value+'&'+'sex'+'='+sex+'&'+'group'+'='+group+'&'+'telephone'+'='+telephone.value;

	var xhr = new XMLHttpRequest();
	xhr.open('POST','register_check.php',true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);				
			if(json.success == 1) {
				if(confirm(json.msg)){
					window.location.href='login.php';
				}	
			}else {
				alert(json.msg);
			}
		}
	};
};