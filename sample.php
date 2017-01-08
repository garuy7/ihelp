<?php
	include 'ihelp_db.php';
	include 'ihelp_functions.php';

	$query = "SELECT * FROM `personnel` WHERE `p_position`='carpenter' AND `p_status`='1'";
	$query_run = mysql_query($query);
	$rows=mysql_fetch_array($query_run);
	$p_fname=$rows['p_fname'];
	$p_lname=$rows['p_lname'];

	if(isset($_POST['btnPer']))
	{
		$query = "SELECT * FROM `personnel` WHERE `p_position`='carpenter' AND `p_status`='1'";
		$query_run = mysql_query($query);
		$rows=mysql_fetch_array($query_run);
		$p_fname=$rows['p_fname'];
		$p_lname=$rows['p_lname'];
	}	

	if(isset($_POST['btnSubmit']))
	{
		$perlist="";
		$boolean=true;
		$per=1;

		while($boolean)
		{
			if((isset($_POST['per_'.$per])) && ($_POST['per_'.$per] != ""))
			{
				$perlist .= $_POST['per_'.$per];
				$perlist .= ", ";
			}
			else
			{
				$boolean = false;
			}
			$per++;
		}

		
		
			echo $perlist;
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
    	var per=1;

    	function addPer()
    	{
    		per++;
    		var div = document.createElement('div');
    		div.innerHTML = 'Personnel assigned: <input type="text" name="per_'+per+'" id="nametxt" value="<?php echo $p_fname?> <?php echo $p_lname?>" /> <input type="submit" name="btnPer" value="check" /> <input type="button" onclick="removePer(this)" value="Remove" />';
    		document.getElementById('ass_personnel').appendChild(div);
    	}
    	
    	function removePer(div)
    	{
    		document.getElementById('ass_personnel').removeChild(div.parentNode);
    		per--;
    	}
    </script>
</head>
<body>
<form method="POST">
<input type="text" name="postxt" id="postxt" placeholder="position" />
<br />
<input type="text" name="buildtxt" id="buildtxt" placeholder="building" />
<br />
<input type="text" name="statustxt" id="statustxt" placeholder="status" />
<br />
<input type="text" name="idtxt" id="idtxt" placeholder="Request No." />
<br />
<div id="ass_personnel">
Personnel assigned: 
<input type="text" name="per_1" id="nametxt" value="<?php echo $p_fname?> <?php echo $p_lname?>" /> 
<input type="button" name="btnPer" id="add_per()" onclick="addPer()" value="Add" />
</div>
<br />
<input type="submit" name="btnSubmit" id="idbtn" value="View">
</form>
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
</html>

