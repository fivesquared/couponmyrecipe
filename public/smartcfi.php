<?php
	ini_set('display_errors', 'Off');
	
	// SQL data
	mysql_connect(
	  $server = "a.db.shared.orchestra.io",
	  $username = "user_71647a53",
	  $password = "Innt(YS89FfRr1");
	mysql_select_db("db_71647a53");
	// we have a connection to the database opened
	//
	//
	//
	//
	// the only thing this page needs is the url to the epicurious site
	$recipeURL = $_GET["curi"];
	$menu_page = file_get_contents($recipeURL);
	//
	$urlParser = explode("/",$recipeURL);
	//
	$tailDelim = "</li>";
	//
	if (stripos($recipeURL,"epicurious.com") > 0){
		$delim = 'class="ingredient">';
		$startIndex = 1;
	}else if (stripos($recipeURL,"allrecipes.com") > 0){
		$delim = 'class="plaincharacterwrap ingredient">';
		$startIndex = 1;
	}else if (stripos($recipeURL,"foodnetwork.com") > 0){
		$delim = 'class="ingredient">';
		$startIndex = 1;
	}else if (stripos($recipeURL,"punchfork.com") > 0){
		$delim = 'itemprop="ingredients">';
		$startIndex = 1;
	}
	else if (stripos($recipeURL,"cooks.com") > 0){
		$delim = 'class="ingredient">';
		$tailDelim = "</SPAN><BR>";
		$startIndex = 1;
		echo "cooks.com recipes are not supported!";
		die();
	}
	else{
		echo "site not supported :(!<br/>try epicurious.com, allrecipes.com, foodnetwork.com or punchfork.com";
		die();
	}
	//
	$ingredient_array = explode($delim, $menu_page);
	//
	$dealList = array();
	$di=0;
	// only assuming Epicurious right now!
	for ($i=$startIndex;$i<count($ingredient_array);$i++){
		//
		$temp_arr = explode($tailDelim,$ingredient_array[$i]);
		// now let's find the ingredient line
		$ingredLine = $temp_arr[0]."";
		// now we must go through the sql magic :)
		$table = "coupon_deals";
		//
		$query = "SELECT id, ingredient, isactive from ".$table." WHERE LOCATE(LOWER(ingredient),LOWER('".$ingredLine."'))>0  ORDER BY LENGTH(ingredient) DESC";
		//	
		$result = mysql_query($query);
		//
		if ($row = mysql_fetch_array($result)){
			//
			$dealList[$di] = $row['ingredient'];
			$di++;
			// we can look up ids and isactives and put them in objects == LATER! :)
		}
	}
?>

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

  <title>Coupons for this Recipe</title>

  <!-- Included CSS Files -->
  <link rel="stylesheet" href="stylesheets/foundation.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-34689305-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</head>
<body>
  <br/>
  <div class="row" align="center" style="position: fixed; top: 0; left: 0; z-index: 9999; background: #fff; width: 100%; margin: 0; padding: 5px;">
  	<span class="secondary label" style="font-size:18pt;" id="couponHeader"><?php echo "".count($dealList)." coupons found!"; ?></span><br/><br/><input type="text" placeholder="type your zipcode"/>
  </div>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <div id="mainBodyElement">
	<?php
		for ($i=1;$i<=count($dealList);$i++){
			$rowText = '<div class="row" id="row'.$i.'"><div class="two columns"></div>';
			$rowText = $rowText.'<div class="eight columns" id="coupon'.$i.'"></div>';
			$rowText = $rowText.'<div class="two columns"></div></div>';
			echo $rowText;
		}
	?>
  </div>
  <br/>
  <br/>
  <div class="row" style="position: fixed;
			bottom: 0; 
			left: 0;
			z-index: 9999;
			background: #555;
			width: 100%;
			margin: 0;
			padding: 5px;">
    <div class="four columns"></div>
    <div class="four columns" id="printButtonTag">
    	<a class="postfix button" onclick="printDeals()">print selected coupons</a>
    </div>
    <div class="four columns"></div>
  </div>
  <br/>
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
  
  <?php
	echo "<script>";
	// array set
	echo "var dealListArray = new Array();";
	//
	$vendorArray = array('Jewel Osco', 'Super Target', 'Dominicks');
	//
	for ($i=0;$i<count($dealList);$i++){
		//
		$upc = round(rand(10000,99999));
		//
		echo "dealListArray[".$i."] = {ingredient:'".ucwords($dealList[$i])."', deal:'".round(rand(5,25))."% off', vendor:'".$vendorArray[round(rand(0,2))]."', upc:'".$upc."000000'};";
		//
	}
	//
	echo "</script>";
  ?>

  <script>
  
  	var selectCount = 0;
  	function printButtonToggle(){
  		if (selectCount <= 0){
  			printButtonTag.innerHTML = '<a class="postfix alert button">select atleast 1 coupon to print</a>';
  		}else{
  			printButtonTag.innerHTML = '<a class="postfix success button" onclick="printDeals()">print selected coupons ('+selectCount+')</a>';
  		}
  	}
	printButtonToggle();
	//
  	function deselectCoupon(id){
  		selectCount--;
  		printButtonToggle();
		eval("coupon"+id).innerHTML = "<div class='panel radius' onclick='selectCoupon(\""+id+"\")'><h5>"+dealListArray[id-1].ingredient+"</h5><p>"+dealListArray[id-1].deal+" @"+dealListArray[id-1].vendor+"</p><img id='barcode"+id+"' style='display:none;' src='barcode.php?upc="+dealListArray[id-1].upc+"'/><br/><br/><input type='checkbox' id='checkbox"+id+"' onclick='selectCoupon(\""+id+"\")'>&nbsp;print?</input></div>";
  	}
  
	function selectCoupon(id){
		selectCount++;
		printButtonToggle();
		eval("coupon"+id).innerHTML = "<div class='panel callout radius' onclick='deselectCoupon(\""+id+"\")'><h5>"+dealListArray[id-1].ingredient+"</h5><p>"+dealListArray[id-1].deal+" @"+dealListArray[id-1].vendor+"</p><img id='barcode"+id+"' style='display:none;' src='barcode.php?upc="+dealListArray[id-1].upc+"'/><br/><br/><input type='checkbox' id='checkbox"+id+"' checked='true' onclick='deselectCoupon(\""+id+"\")'>&nbsp;print?</input></div>";
	}
	
	
	//
	function printDeals(){
		printButtonTag.innerHTML = '';
		couponHeader.innerHTML = "Printing " + selectCount + " coupon(s)...";
		//
		for (i=1;i<=totalCoupons;i++){
			if(!eval("checkbox"+i).checked){
				eval("row"+i).style.display = "none";
			}
			eval("barcode"+i).style.display = "block";
		}
		//
		window.print();
		//
	}
	
	
  </script>
  <?php	echo "<script>var totalCoupons=".count($dealList)."; </script>"; ?>
  <script>
	
	//
	selectCount = totalCoupons;
	for (i=1;i<=totalCoupons;i++){
		deselectCoupon(i);
	}

	//
  </script>
</body>
</html>

<?php
	mysql_close();
?>