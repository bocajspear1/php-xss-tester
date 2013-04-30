<?php
$input = '';
$input1 = '';
$input2 = '';
$qgval = '';
$qpval = '';
$igval = '';
$ipval = '';
$message='';
if (array_key_exists('q',$_GET))
	{
		$input = $_GET['q'];
		
	}else if (array_key_exists('q',$_POST)) {
		$input = $_POST['q'];
		
	}else{
		
	}
	
if ($input == "")
	{
		
	}else{
		if (array_key_exists('i',$_GET))
			{
				$i = $_GET['i'];
				
				// If blank, set to 0
				if (trim($i) == '')
					{
						$i = 0;
					}
				
				// Setup for textboxes
				$igval = $_GET['i'];
				$message = "Using mitigation #$i<br>";
				include_once("mit" . $i . ".sec.php");
				
			}else if (array_key_exists('i',$_POST)) {
				$i = $_POST['i'];
				
				// If blank, set to 0
				if (trim($i) == '')
					{
						$i = 0;
					}
				
				// Setup for textboxes
				$ipval = $i;
				
				$message = "Using mitigation #$i<br>";
				include_once("mit" . $i . ".sec.php");
			}else{
				$message = "Using no mitigation<br>";
				include_once("mit0.sec.php");
			}
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>XSS Tester</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
</head>

<body>
	<?php

	echo $message;

	?>
	<div style="overflow:auto;padding:7px;">
	<div style="float:left;margin:5px;">
	<strong>Get:</strong>
	<form name="getform" method="get" action="./xss.php">
		Mitigation #: <input type="text" name="i" id="i" size="4" maxlength="3" value="<?php echo $igval; ?>"><br>
		Input: <input type="text" name="q" id="q" value="<?php echo $qgval; ?>"><br>
		<input type="submit" value="XSS Me">
	</form>
	</div>
	
	<div style="float:left;margin:5px;">
	<strong>Post:</strong>
	<form name="postform" method="post" action="./xss.php">
		Mitigation #: <input type="text" name="i" id="i" size="4" maxlength="3" value="<?php echo $ipval; ?>"><br>
		Input: <input type="text" name="q" id="q" value="<?php echo $qpval; ?>"><br>
		<input type="submit" value="XSS Me">
	</form>
	</div>
	</div>
	<div style="border:1px solid grey;margin:15px;padding:20px;">
	<h3>Data Test:</h3>	
	--&gt;<?php echo $input1;?>&lt;--
	</div>
	
	<div style="border:1px solid grey;margin:15px;padding:20px;">
		<h3>Link Test:</h3>
	<a href="<?php echo $input1 ?>">Link</a>
	</div>
	
	<div style="border:1px solid grey;margin:15px;padding:20px;">
		<h3>Attribute Test: (id)</h3>
	<div id="<?php echo $input1 ?>">Inside Div</div>
	</div>

	

</body>

</html>
