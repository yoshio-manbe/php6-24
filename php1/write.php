<?php
    // Initialize $data variable to an empty string
    $data = "";
    
    // Use the $name, $mail, and $password variables inside the loop to concatenate their values to the $data variable
    for ($i = 1; $i <= 5; $i++) {
        // Check if the $_POST data exists for each value of $i
        if(isset($_POST['place' . $i], $_POST['latitude' . $i], $_POST['longitude' . $i], $_POST['color' . $i])) {
            $place = $_POST['place' . $i];
            $latitude = $_POST['latitude' . $i];
            $longitude = $_POST['longitude' . $i];
            $color = $_POST['color' . $i];

            // 変数を用意
            $time = date("Y-m-d H:i:s");
            $data = $time . ',' . $place . ',' . $latitude . ',' . $longitude. ',' . $color . "\n";
            
            // 住宅の時
            if ($color === "#ff0000" ){ 
                file_put_contents('data/data1.txt', $data , FILE_APPEND);
            } 
            // 飲食店の時
            elseif ($color === "#008000"){
                file_put_contents('data/data2.txt', $data , FILE_APPEND);
            } 
            // 娯楽施設の時
            elseif ($color === "#0000ff"){
                file_put_contents('data/data3.txt', $data , FILE_APPEND);
            } 
            // 仕事用の時
            elseif ($color === "#ffff00"){
                file_put_contents('data/data4.txt', $data , FILE_APPEND);
            }

            // その他の時
            elseif ($color === "#ffa500" || $color === "#000000"){
                file_put_contents('data/data5.txt', $data , FILE_APPEND);
            }            
        }

    }
?>
<html>

<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    <p>送信完了！</p>
    <ul>
        <li><a href="index1.php">戻る</a></li>
    </ul>
</body>

</html>
