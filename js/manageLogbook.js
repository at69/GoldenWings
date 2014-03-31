/* Admin functions */

function displayAll()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='All Logbooks';
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('displayAll='+'true');                 
} 

function displayByMember(idMember)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='For member with ID '+idMember;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByMember='+idMember); 
}

function displayByMemberNames(fName, lName)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='For member '+fName+' '+lName;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('firstName='+fName+'&lastName='+lName); 
}

function displayByDate(date)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='For the day '+date;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByFlightDate='+date);   
}

function displayByAirfield(airfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='With airfield '+airfield;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByAirfield='+airfield);
}

function displayByDepartureAirfield(dAirfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='With departure airfield '+dAirfield;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByDepartureAirfield='+dAirfield);
}

function displayByArrivalAirfield(aAirfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='With arrival airfield '+aAirfield;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByArrivalAirfield='+aAirfield);
}

function displayByPlane(idPlane)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='With Plane ID '+idPlane;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByPlane='+idPlane);
}

function displayByPICName(picName)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='For pilot in command named '+picName;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByPICName='+picName); 
}

function displayByFINumber(fiNum)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='For Flight Instructor number '+fiNum;
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByFINum='+fiNum); 
}

/* Pilot functions */

function pilot_displayAllMine()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='All my Logbooks';
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('pilot_displayAll='+'true');                 
} 

function pilot_displayWhereIamPilot()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='Where I am pilot';
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('pilot_displayWhereIamPilot='+'true');                 
} 

function pilot_displayWhereIamInstructor()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='Where I am instructor';
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('pilot_displayWhereIamInstructor='+'true');                 
} 

function pilot_displayMineByFINumber(FInum)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='For Flight Instructor Number '+FInum;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('pilot_displayMineByFINumber='+FInum);                 
} 

/* Members only functions */

function member_displayAllMine()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='All my Logbooks';
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('member_displayAll='+'true');                 
} 

/* Members functions */

function displayByMember2(idMember)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='For member with ID '+idMember;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispByMember2='+idMember); 
}

function displayMineByDate(date)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the day '+date;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByDate='+date); 
}

function displayMineByPlane(idPlane)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the plane '+idPlane;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByPlane='+idPlane); 
}

function displayMineByAirfield(airfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the airfield '+airfield;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByAirfield='+airfield); 
}

function displayMineByDepartureAirfield(airfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the departure airfield '+airfield;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByDAirfield='+airfield); 
}

function displayMineByArrivalAirfield(airfield)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the arrival airfield '+airfield;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByAAirfield='+airfield); 
}

function displayMineByPICName(PICname)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageLogbooks.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title2').innerHTML='My logbooks for the pilot '+PICname;
             document.getElementById('result2').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('dispMineByPICName='+PICname); 
}


