function displayAll()
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageJourney.php",true);
  OAjax.onreadystatechange = function()
  {
      if (OAjax.readyState == 4 && OAjax.status==200)
      {
          if (document.getElementById)
          {   
			 document.getElementById('title').innerHTML='All journey logs';
             document.getElementById('result').innerHTML=OAjax.responseText;
          }     
      }
  }
  OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  OAjax.send('displayAll='+'true');                 
} 

function displayByDate(date)
{
  var OAjax;
  if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
  else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
  OAjax.open('POST',"manageJourney.php",true);
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
  OAjax.open('POST',"manageJourney.php",true);
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
  OAjax.open('POST',"manageJourney.php",true);
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
  OAjax.open('POST',"manageJourney.php",true);
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
  OAjax.open('POST',"manageJourney.php",true);
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