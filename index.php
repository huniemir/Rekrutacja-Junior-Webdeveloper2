<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>Zadania rekrutacyjne</title>
	</head>
	<body>
		<?php

			include "PhoneKeyboardConverter.class.php";

			$result1 = PhoneKeyboardConverter::convertToNumeric("E","l","a"," ","n","i","e"," ","m","a"," ","k","o","t","a");
			$result2 = PhoneKeyboardConverter::convertToString(5,2,22,555,33,222,9999,66,444,55);

			$result1_string = "";
			foreach($result1 as $num){
				$result1_string = $result1_string.$num.",";
			}
			


		?>
		<table>
			<tr>
				<th>Metoda</th>
				<th>Dane wejściowe</th>
				<th>Zwrócone przez metodę</th>
			</tr>
			<tr>
				<td>convertToNumeric</td>
				<td>Ela nie ma kota</td>
				<td><?php echo $result1_string;  ?></td>
			</tr>
			<tr>
				<td>convertToString</td>
				<td>5,2,22,555,33,222,9999,66,444,55</td>
				<td><?php echo $result2;  ?></td>
			</tr>
		</table>
		<p>Działanie zadania 2 zaprezentowano w konsoli</p> 

		<script src="users.js"></script>
	</body>
</html>
