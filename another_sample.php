<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.9.2.custom.min"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#suggest').keyup(function(){
				$.get('ihelp_db.php', {person : $(this).val()}, function(data){
					$("datalist").empty();
					$("datalist").html(data);
				});
			});
		});
	</script>
</head>
<body>
<form method="POST">
	<input type="text" list="myPersonnel" name="person"/>
	<datalist id="myPersonnel">
		
	</datalist>
</form>
</body>
</html>