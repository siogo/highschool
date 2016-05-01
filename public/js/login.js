var oLogin = document.getElementById('login');
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	var radio = document.getElementById('radio');
	var groups = radio.getElementsByTagName('input');
	var group = '';

	//alert(group[1].getAttribute('checked'));
	for(var i=0;i<groups.length;i++){
		if(groups[i].checked == true) {
			group = groups[i].getAttribute('value');
		}
	}
	function radio_change(num){
		group = document.login_form.group.value;
	}
	oLogin.onclick = function(){
		var data = 'username'+'='+username.value+'&'+'password'+'='+password.value+'&'+'group'+'='+group;
		var xhr = new XMLHttpRequest();
		xhr.open('POST','login_check.php',true);
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
		xhr.send(data);

		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var json = JSON.parse(xhr.responseText);				
				if(json.success == 1) {
					window.location.href='index.php';
				}else {
					alert(json.msg);
				}
			}
		};
	};