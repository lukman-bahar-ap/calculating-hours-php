<?php
function differenceInHours($startdate,$enddate){
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$difference = abs($endtimestamp - $starttimestamp)/3600;
	return $difference;
}
function timeDiff($firstTime,$lastTime) {
	$firstTime=strtotime($firstTime);
	$lastTime=strtotime($lastTime);
	$timeDiff=$lastTime-$firstTime;
	//return ($timeDiff/60)/60;
	$result = ($timeDiff/60)/60;
	if(is_double($result)){
		
		$decimal = explode(".", $result);
		$explodedDate = $decimal[1] * 6;
		
		if(strlen($explodedDate)>2){
			$explodedDate = substr($explodedDate,0,2);
		}
		
		$result = $decimal[0].":".$explodedDate;
	
	}else{
		$result .= ":00";
	}
	
	return $result;
}
if(!empty($_POST["submit"])) {
	$hours_difference = differenceInHours($_POST["startdate"],$_POST["enddate"]);	
	$hours_difference1 = timeDiff($_POST["startdate"],$_POST["enddate"]);	
	echo "The Difference is " . $hours_difference . " hours, or :" . $hours_difference1 ;
}
?>
<html>
<head>
<title>Calculating hours difference - PHP</title>
<style>
	#frmDate {
		border-top:#F0F0F0 2px solid;
		background:#FAF8F8;
		padding:10px;}
	#frmDate div { margin-bottom: 15px }
	#frmDate div label { margin-left: 5px }
	.inputBox{
		padding:10px; 
		border:#F0F0F0 1px solid; 
		border-radius:4px;
		background-color:#FFF;
		width:50%;}
	.btnAction {
		background-color:#2FC332;
		border:0;
		padding:10px 40px;
		color:#FFF;
		border:#F0F0F0 1px solid; 
		border-radius:4px;}
</style>
</head>
<body>
<form id="frmDate" action="" method="post">
	<div>
		<label style="padding-top:20px;">Start Date</label><br/>
		<input type="text" name="startdate" 
		value="<?php if(!empty($_POST["startdate"])) { echo $_POST["startdate"]; } ?>" 
		class="inputBox">
	</div>
	<div>
		<label>End Date</label>
		<span id="userEmail-info" class="info"></span><br>
		<input type="text" name="enddate" 
		value="<?php if(!empty($_POST["startdate"])) { echo $_POST["enddate"]; } ?>" 
		class="inputBox">
	</div>
	<div>
		<input type="submit" name="submit" value="Find Difference" class="btnAction">
	</div>
</form>
</body>
</html>