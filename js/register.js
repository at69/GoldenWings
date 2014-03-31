function signin(fname, lname, address, gender, phone, email, pass, pass2, typeMember, proof, FInum, isAdmin, proof2)
{
	
				var canRegister = true;
				
				if(gender == 'true') {
					gender = 'male';
				}else gender = 'female';
				
				if(isAdmin == 'true') {
					isAdmin = '0';
				}else isAdmin = '1';
				
				if (fname == '') {
					document.getElementById('fn').style.display = 'block';
					document.getElementById('er_msg_fname').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('fn').style.display == 'block'){
				
					document.getElementById('fn').style.display = 'none';
				}
				
				if (lname == '') {
					document.getElementById('ln').style.display = 'block';
					document.getElementById('er_msg_lname').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('ln').style.display == 'block'){
					
					document.getElementById('ln').style.display = 'none';
				} 
				if (address == '') {
					document.getElementById('adr').style.display = 'block';
					document.getElementById('er_msg_adr').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('adr').style.display == 'block'){
					
					document.getElementById('adr').style.display = 'none';
				} 
				if (phone == '') {
					document.getElementById('ph').style.display = 'block';
					document.getElementById('er_msg_phone').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('ph').style.display == 'block'){
					
					document.getElementById('ph').style.display = 'none';
				} 
				if (email == '') {
					document.getElementById('eml').style.display = 'block';
					document.getElementById('er_msg_eml').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('eml').style.display == 'block'){
					
					document.getElementById('eml').style.display = 'none';
				} 
				if (pass == '') {
					document.getElementById('passw').style.display = 'block';
					document.getElementById('er_msg_pass').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('passw').style.display == 'block'){
					
					document.getElementById('passw').style.display = 'none';
				} 
				if (pass2 == '') {
					document.getElementById('passw2').style.display = 'block';
					document.getElementById('er_msg_pass2').innerHTML= 'Field required';
					canRegister = false;
				} else if(document.getElementById('passw2').style.display == 'block'){
					
					document.getElementById('passw2').style.display = 'none';
				}
				
				if (typeMember == 'Pilot') {
					if (proof == '') {
						document.getElementById('p_pass').style.display = 'block';
						document.getElementById('er_msg_p_pass').innerHTML= 'Field required';
						canRegister = false;
					}else if (proof != 'P170T') {
						document.getElementById('p_pass').style.display = 'block';
						document.getElementById('er_msg_p_pass').innerHTML= 'Wrong password';
						canRegister = false;
					}else if(document.getElementById('p_pass').style.display == 'block'){
						
						document.getElementById('p_pass').style.display = 'none';
					}	
					
					if (FInum == '') {
						document.getElementById('fi').style.display = 'block';
						document.getElementById('er_msg_fi').innerHTML= 'Field required';
						canRegister = false;
					}else if(document.getElementById('fi').style.display == 'block') {
						
						document.getElementById('fi').style.display = 'none';
					}
				}
				
				if (isAdmin == '1') {
					if (proof2 == '') {
						document.getElementById('s_pass').style.display = 'block';
						document.getElementById('er_msg_s_pass').innerHTML= 'Field required';
						canRegister = false;
					}else if (proof2 != 'S74Ff') {
						document.getElementById('s_pass').style.display = 'block';
						document.getElementById('er_msg_s_pass').innerHTML= 'Wrong password';
						canRegister = false;
					}else if(document.getElementById('s_pass').style.display == 'block'){
						
						document.getElementById('s_pass').style.display = 'none';
					}
				}
				
				if (fname == pass || lname == pass) {
					document.getElementById('passw').style.display = 'block';
					document.getElementById('er_msg_pass').innerHTML= 'Password mustn\'t be the same than first or last name';
					canRegister = false;
				}else if(document.getElementById('passw').style.display == 'block') {
				
					document.getElementById('passw').style.display = 'none';
				}
				
				if (email.length() > 30) {
					document.getElementById('eml').style.display = 'block';
					document.getElementById('er_msg_eml').innerHTML= 'Email too long. 30 characters max.';
					canRegister = false;
				} else if(document.getElementById('eml').style.display == 'block'){
					
					document.getElementById('eml').style.display = 'none';
				} 
				
				if (pass.length() > 60) {
					document.getElementById('passw').style.display = 'block';
					document.getElementById('er_msg_pass').innerHTML= 'Password too long. 60 characters max.';
					canRegister = false;
				} else if(document.getElementById('passw').style.display == 'block'){
					
					document.getElementById('passw').style.display = 'none';
				}
				
				if (fname.length() > 60) {
					document.getElementById('fn').style.display = 'block';
					document.getElementById('er_msg_fname').innerHTML= 'First name too long. 60 characters max.';
					canRegister = false;
				} else if(document.getElementById('fn').style.display == 'block'){
				
					document.getElementById('fn').style.display = 'none';
				}
				
				if (lname.length() > 60) {
					document.getElementById('ln').style.display = 'block';
					document.getElementById('er_msg_lname').innerHTML= 'Last name too long. 60 characters max.';
					canRegister = false;
				} else if(document.getElementById('ln').style.display == 'block'){
					
					document.getElementById('ln').style.display = 'none';
				}
				
				if (~^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$~.test(email)) {
					document.getElementById('eml').style.display = 'block';
					document.getElementById('er_msg_eml').innerHTML= 'Email invalid.';
					canRegister = false;
				} else if(document.getElementById('eml').style.display == 'block'){
					
					document.getElementById('eml').style.display = 'none';
				} 
				
				if (pass2 != pass) {
					document.getElementById('passw').style.display = 'block';
					document.getElementById('er_msg_pass').innerHTML= 'Passwords don\'t match.';
					canRegister = false;
				} else if(document.getElementById('passw').style.display == 'block'){
					
					document.getElementById('passw').style.display = 'none';
				} 
				
				if (fname != '' && lname != '' && address != '' && phone != '' && email != '' && pass != '' && pass2 != '') {
				
					if (fname.lenght() < 30 && lname.lenght() < 30 && pass.lenght() < 60 && fname != pass && lname != pass && email.lenght() < 60  && ~^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$~.test(email) && pass == pass2) {
						canRegister = true;
						if(typeMember == 'Pilot') {
							if (proof == 'P170T' && FInum != '') {
								canRegister = true;
							}else canRegister = false;
						}
						if(isAdmin == '1') {
							if (proof2 == 'S74Ff') {
								canRegister = true;
							}else canRegister = false;
						}
					}else canRegister = false;
				
				}else canRegister = false;
				
	var OAjax;
	if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
	else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP'); 
	OAjax.open('POST',"signin.php",true);
	OAjax.onreadystatechange = function()
	{
		if (OAjax.readyState == 4 && OAjax.status==200)
		{
			if (document.getElementById) 
			{	
				if (OAjax.responseText =='true') {
					document.getElementById('msg').innerHTML= 'You\'re now registered. Please log in.';		
				}else{
					document.write(OAjax.responseText);
				}
			}
		}
	}

	if (canRegister == true) {
		OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		OAjax.send('fname='+fname+'&lname='+lname+'&address='+address+'&gender='+gender+'&phone='+phone+'&email='+email+'&pass='+pass+'&pass2='+pass2+'&typeMember='+typeMember+'&proof='+proof+'&FInum='+FInum+'&isAdmin='+isAdmin+'&proof2='+proof2);
	}else document.write('non');