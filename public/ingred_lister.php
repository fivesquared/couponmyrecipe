<?php
	$recipeURL = $_GET["r"];
	$menu_page = file_get_contents($recipeURL);
	//
	$urlParser = explode("/",$recipeURL);
	echo "<b>Only showing epicurious.com ingredients for:</b> " . $urlParser[count($urlParser)-1];
	echo "<hr/>";
	//
	$delim = 'class="ingredient">';
	$ingredient_array = explode($delim, $menu_page);
	// only assuming Epicurious right now! 
	for ($i=1;$i<count($ingredient_array);$i++){
		$temp_arr = explode("</li>",$ingredient_array[$i]);
		if ($_GET["fullView"] == 1){
			echo $temp_arr[0] . "<br/>";
		}else{
			$temp2_arr = explode(",",$temp_arr[0]);
			$ingred_arr = explode(" ", trim($temp2_arr[0]));
			echo $ingred_arr[count($ingred_arr)-1] . "<br/>";
		}
	}
	//
?>