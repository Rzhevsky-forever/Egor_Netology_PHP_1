<?php
$x = $_GET['x'];
echo 'Введенное вами число ' . $x;

$a = 1;
$b = 1;
$c = 0;


for ($i=0; $i < $x; $i++) {
	switch ($x) {
		case ($x < $a) :
			echo " НЕ ВХОДИТ в последовательность ";
			break 2;
		case ($x == $a) :
			echo " ВХОДИТ в последовательность ";
			break 2;
		case ($x != $a) :
			$c = $a;
			$a = $a + $b;
			$b = $c;
		}
 }
	
		
echo " <br> Конец прорграммы";

?>
<!-- 
if ($x < $a) {
		echo "Задуманное число НЕ ВХОДИТ в последовательность ";
		$i = 9;
		} else {
			if ($x == $a) {
				echo "Задуманное число ВХОДИТ в последовательность ";
				break;
				} else {
					$c = $a;
					$a = $a + $b;
					$b = $c;
					}
			} -->