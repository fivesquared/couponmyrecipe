<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title></title>

  <!-- Included CSS Files -->
  <link rel="stylesheet" href="stylesheets/foundation.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
  <br/>
  <div class="row collapse" align="center" style="position: fixed; top: 0; left: 0; z-index: 9999; background: #fff; width: 100%; margin: 0; padding-top: 10px;">
    <div class="one column"></div>
    <div class="one column">
      <span class="prefix">http://</span>
    </div>
    <div class="eight columns">
      <input id="browserURLInput" class="inline" type="text" placeholder="www.epicurious.com" onkeydown="if (event.keyCode == 13) document.getElementById('goButton').click()" />
    </div>
    <div class="one column" style="margin-top:2px; text-align:center;">
      <a id="goButton" class="small button" onclick="loadURL()">Go!</a>
    </div>
    <div class="one column"></div>
    <hr/>
  </div>
  <br/>
  <br/>
  <br/>
  <br/>
  <div id="browserPageDiv" width="100%" height="4500px">
  	<iframe width="100%" height="4500px" src="http://www.epicurious.com" frameborder="none"></iframe> 
  </div>


  <div class="row collapse" align="center" style="position: fixed; bottom: 0; left: 0; z-index: 9999; background: #fff; width: 100%; margin: 0; padding: 10px;">
    <div class="two columns"></div>
    <div class="eight columns">
    	<a class="button alert small" onclick="window.open('http://www.thinkminutes.com/coupons-app/smartcfi.php?curi='+document.location,'myRef','left=20,top=20,width=360,height=480,toolbar=0,resizable=0,menubar=0,status=0');">view coupons</a>
    </div>
    <div class="two columns"></div>
  </div>  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="javascripts/modernizr.foundation.js"></script>
  
  <script src="javascripts/jquery.js"></script>
  
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="javascripts/jquery.foundation.forms.js"></script>
  
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="javascripts/jquery.placeholder.js"></script>
  
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
  
  <script>
	function loadURL(){
  		browserPageDiv.innerHTML = '<iframe width="100%" height="4500px" src="http://'+browserURLInput.value+'" frameborder="none"></iframe>';
  	}
  </script>
</body>
</html>
