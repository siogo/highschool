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
var xhr = null;
var f_pass = 0;
var f_tel = 0;
var f_email = 0;
var f_pass_comfirm = 0;

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
telephone.onblur = function(){
	setXMLHttpRequest();
	data = 'telephone='+telephone.value;
	xhr.open('POST', 'register_check.php?telephone', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);
			if(json.success == 1)
			{
				f_tel = 1;	
				document.getElementById('phone').style = 'color:blue;font-size:10px;position:absolute;left:860px;top:534px;';
				document.getElementById('phone').innerHTML = json.msg;	
			}else{
				f_tel = 0;
				document.getElementById('phone').style = 'color:#f00;font-size:10px;position:absolute;left:860px;top:534px;';				
				document.getElementById('phone').innerHTML = json.msg;	
			}
			
		}
	};
}
email.onblur = function(){	
	setXMLHttpRequest();
	data = 'email='+email.value;
	xhr.open('POST', 'register_check.php?email', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);
			if(json.success == 1)
			{
				f_email = 1;	
				document.getElementById('email_text').style = 'color:blue;font-size:10px;position:absolute;left:860px;top:195px;';
				document.getElementById('email_text').innerHTML = json.msg;	
			}else{
				f_email = 0;	
				document.getElementById('email_text').style = 'color:#f00;font-size:10px;position:absolute;left:860px;top:195px;';
				document.getElementById('email_text').innerHTML = json.msg;	
			}
			
		}
	};
}
pass_confirm.onblur = function(){
	setXMLHttpRequest();
	if(password.value == '')
	{
		alert('请先输入密码');
		return;	
	}
	data = 'password='+password.value+'&pass_confirm='+pass_confirm.value;
	xhr.open('POST', 'register_check.php?password', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);
			if(json.success == 1)
			{				
				f_pass_comfirm = 1;
				document.getElementById('comfirm').style = 'color:blue;font-size:10px;position:absolute;left:860px;top:308px;';
				document.getElementById('comfirm').innerHTML = json.msg;
				return;
			}else{
				f_pass_comfirm = 0;
				document.getElementById('comfirm').style = 'color:#f00;font-size:10px;position:absolute;left:860px;top:308px;';
				document.getElementById('comfirm').innerHTML = json.msg;
				return;
			}			
		}
	};
}
password.onblur = function(){
	setXMLHttpRequest();
	data = 'password='+password.value;
	xhr.open('POST', 'register_check.php?password', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);
			if(json.strong < 5)
			{
				f_pass = 0;
				document.getElementById('strong').style = 'color:#f00;font-size:10px;position:absolute;left:860px;top:250px;';
				document.getElementById('strong').innerHTML = '当前密码强度:'+json.strong+' 密码强度过低';				
				return;
			}
			if(json.success == 1)
			{
				f_pass = 1;
				document.getElementById('strong').style = 'color:blue;font-size:10px;position:absolute;left:860px;top:250px;';
				document.getElementById('strong').innerHTML = json.msg;
				return;
			}else{
				f_pass = 0;
				document.getElementById('strong').style = 'color:#f00;font-size:10px;position:absolute;left:860px;top:250px;';
				document.getElementById('strong').innerHTML = '当前密码强度:'+json.strong+' 满分10';
				return;
			}						
		}
	};
}
function setXMLHttpRequest(){
	if(window.XMLHttpRequest)
	{
		xhr = new XMLHttpRequest();
	}
	else{
		try{
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(err){
			try{
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(err2){
				xhr = null;
			}
		}
	}
}
register.onclick = function(){	
	var data = 'f_email='+f_email+'&f_pass='+f_pass+'&f_tel='+f_tel+'&f_pass_comfirm='+f_pass_comfirm+'&email='+email.value+'&password='+password.value
				+'&name='+names.value+'&sex='+sex+'&group='+group+'&telephone='+telephone.value+'&pass_confirm='+pass_confirm.value;

	setXMLHttpRequest();
	xhr.open('POST','register_check.php?register',true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
	xhr.send(data);

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){			
			var json = JSON.parse(xhr.responseText);
			//document.getElementById('strong').innerHTML = '当前密码强度:'+json.strong+' 满分10';
			if(json.success == 1) {
				var bool = confirm(json.msg);
				if(bool)
				{
					window.location.href='login.php';
				}else{
					window.location.href='index.php';
				}
			}else {
				alert(json.msg);
			}
		}
	};
};