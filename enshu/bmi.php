<?php
	echo "身長を入力してください：";
	$tall = fgets(STDIN);
	echo "体重を入力してください：";
        $weight = fgets(STDIN);
	$bmi=$weight/(($tall/100)*($tall/100));
	if($bmi<18.5)
		echo "あなたは、低体重です。\n";
        else if($bmi>=18.5&&$bmi<25)
                echo "あなたは、普通体重です。\n";
	else if($bmi>=25)
                echo "あなたは、肥満です。\n";
?>
