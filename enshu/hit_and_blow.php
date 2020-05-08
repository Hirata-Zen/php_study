<?php
	$flag=1;
	$counter=1;
	$Blow=0;
	$Hit=0;
	$a = range(1, 9);//randamな数値の作成(使うのは最初の3つ)
	shuffle($a);
	echo $a[0].$a[1].$a[2];

	while($flag){
		echo "-------------------------------------------\n";
		echo $counter."回目のチャレンジ！\n";
		echo "3桁の半角数字を重複なしで入力してください：";
        	$user = trim(fgets(STDIN));//文字入力の改行をなくした
		if(is_numeric($user)){//文字での入力の禁止
			$arr = str_split($user);//配列に分割
			if(count($arr)!=3)//文字数判定
				echo "エラー:3桁の半角数字を重複なしで入力してください!\n";
			else{
				if($arr[0]==$arr[1]||$arr[0]==$arr[2]||$arr[1]==$arr[2])//かぶり判定
					echo "エラー:3桁の半角数字を重複なしで入力してください！\n";
				else {
					if($a[0]==$arr[0] && $a[1]==$arr[1] && $a[2]==$arr[2]){
						$flag=0;
						echo "正解です！".$counter."回目でクリアです！！\n";
					}else{
						for($i=0;$i<3;$i++){
							for($j=0;$j<3;$j++){
								if($a[$i]==$arr[$j])
									if($i==$j)
										$Hit++;
									else
										$Blow++;
							}
						}
						echo"Hit:".$Hit.",Blow:".$Blow."です\n";
					}
				}
			}
		}else
			echo "エラー:3桁の半角数字を重複なしで入力してください!\n";
		$counter++;
		$Hit=0;
		$Blow=0;
	}
?>
