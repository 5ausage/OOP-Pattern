<?php
	$num = "";
	$op = "";
	$result = "";
	$cookie_name1 = "num";
	$cookie_value1 = "";
	$cookie_name2 = "op";
	$cookie_value2 = "";


	if(isset($_POST['submit']))
	{
		if(is_numeric($_POST['display']))
		{
			$num = $_POST['display'] . $_POST['submit'];
		}
		else
		{
			$_POST['display']="";
			$num = $_POST['display'] . $_POST['submit'];
		}
	}
	else
	{
		$num = "";
	}

	if(isset($_POST['op']))
	{
		$cookie_value1 = $_POST['display'];
		setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/");

		$cookie_value2 = $_POST['op'];
		setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");

		switch($_POST['op'])
		{
			case "+":
				$num = $_POST['op'];
				break;
			case "-":
				$num = $_POST['op'];
				break;
			case "/":
				$num = $_POST['op'];
				break;
			case "x":
				$num = $_POST['op'];
				break;
			case "√":
				$num = $_POST['op'];
				break;
			case "^":
				$num = $_POST['op'];
				break;
		}
	}

	if(isset($_POST['equals']))
	{
		$num = $_POST['display'];
		switch($_COOKIE['op'])
		{
			case "+":
				if(is_numeric($_COOKIE['num']) && is_numeric($num))
				{
					$result = $_COOKIE['num'] + $num;
				}
					else
				{
					$result = "WRONG";
				}
				break;

			case "-":
				if(is_numeric($_COOKIE['num']) && is_numeric($num))
				{
					$result = $_COOKIE['num'] - $num;
				}
				else
				{
					$result = "WRONG";
				}
				break;

			case "/":
				if($num == 0)
				{
					$result = "ERROR";
				}
				elseif(is_numeric($_COOKIE['num']) && is_numeric($num))
				{
					$result = $_COOKIE['num'] / $num;
				}
					else
				{
					$result = "WRONG";
				}
				break;

			case "x":
				if(is_numeric($_COOKIE['num']) && is_numeric($num))
				{
					$result = $_COOKIE['num'] * $num;
				}
				else
				{
					$result = "WRONG";
				}
				break;

			case "√":
				if(is_numeric($_COOKIE['num']))
				{
					$result = sqrt($_COOKIE['num']);
				}
				else
				{
					$result = "WRONG";
				}
				break;

			case "^":
				if(is_numeric($_COOKIE['num']) && is_numeric($num))
				{
					$result = $_COOKIE['num'] ** $num;
				}
				else
				{
					$result = "WRONG";
				}
				break;
		}
		$num = $result;
	}

	if(isset($_POST['clear']))
	{
		$num = "";
		$result = "";
	}
?>

<html>
	<head>
		<title>CALCULATOR</title>
	</head>

	<body>
		<center>
		<form action="#" method="post" >
		<table border="0" width="30%" height="50%">
			<tr>
				<td colspan="3">
					<input type="text" name="display" style="height: 100%; width: 100%; font-size:2vmax" value = <?php echo $num ?>>
				</td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="1" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="2" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="3" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="4" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="5" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="6" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="7" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="8" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="submit" value="9" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="0" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="clear" value="C" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="equals" value="=" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

			<tr>
				<td><input type="submit" name="op" value="+" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="op" value="-" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="op" value="^" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

			<tr>
				<td><input type="submit" name="op" value="x" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="op" value="/" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
				<td><input type="submit" name="op" value="√" style="height: 100%; width: 100%; font-size:1.5vmax"></td>
			</tr>

		</table>
		</form>
		</center>
	</body>
</html>



