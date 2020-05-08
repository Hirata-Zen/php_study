<?php
	$check=38.1;
	if($check<=37)
		echo "平熱です";
	else if($check>37&&$check<37.5)
		echo "微熱です";
	else if($check>=37.5)
		echo "コロナの可能性あり";
?>
