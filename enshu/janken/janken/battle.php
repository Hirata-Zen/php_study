<?php
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$player_handに代入してください
(3) コンピューターの手は$pc_handに代入してください
**/
$player_hand=array("ぐー","ちょき","ぱー");
$pc_hand=array("ぐー","ちょき","ぱー");
$a = range(0, 2);//randamな数値の作成
shuffle($a);

if(($_POST['playerHand']-$a[0]+3)%3==0)
    $result="あいこ！";
else if(($_POST['playerHand']-$a[0]+3)%3==1)
    $result="負け！";
else if(($_POST['playerHand']-$a[0]+3)%3==2)
    $result="勝ち！";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <!-- じゃんけんの結果を表示しましょう -->
            <p class="result-word"><?php echo $result; ?></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた：<?php echo $player_hand[$_POST['playerHand']] ?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<?php echo $pc_hand[$a[0]] ?><br>
            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
            
        </div>
    </body>
</html>