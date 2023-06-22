<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>

<body onload='loadMapScenario();'>
    <p class="title">物件メモ</p>

    <form action="write.php" method="post" id="member">
        <ol>
            <li>
                <input id="place1" name="place1" type="text" placeholder="物件名">
                <textarea id="latitude1" name="latitude1" placeholder="緯度"></textarea>
                <textarea id="longitude1" name="longitude1" placeholder="経度"></textarea>
                <select name="color1" id="color1">
                    <option value="#000000">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
            <li>
                <input id="place2" name="place2" type="text" placeholder="物件名">
                <textarea id="latitude2" name="latitude2" placeholder="緯度"></textarea>
                <textarea id="longitude2" name="longitude2" placeholder="経度"></textarea>
                <select name="color2" id="color2">
                    <option value="#000000">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
            <li>
                <input id="place3" name="place3" type="text" placeholder="物件名">
                <textarea id="latitude3" name="latitude3" placeholder="緯度"></textarea>
                <textarea id="longitude3" name="longitude3" placeholder="経度"></textarea>
                <select name="color3" id="color3">
                    <option value="#000000">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
            <li>
                <input id="place4" name="place4" type="text" placeholder="物件名">
                <textarea id="latitude4" name="latitude4" placeholder="緯度"></textarea>
                <textarea id="longitude4" name="longitude4" placeholder="経度"></textarea>
                <select name="color4" id="color4">
                    <option value="#000000">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
            <li>
                <input id="place5" name="place5" type="text" placeholder="物件名">
                <textarea id="latitude5" name="latitude5" placeholder="緯度"></textarea>
                <textarea id="longitude5" name="longitude5" placeholder="経度"></textarea>
                <select name="color5" id="color5">
                    <option value="#000000">--物件の種類--</option>
                    <option value="#ff0000">住宅</option>
                    <option value="#008000">飲食店</option>
                    <option value="#0000ff">娯楽施設</option>
                    <option value="#ffff00">仕事用</option>
                    <option value="#ffa500">その他</option>
                </select>
            </li>
        </ol>

        <input type="submit" value="保存する" id="check" style="margin-left: -100px; margin-top: -100px; position: relative;  ">
    </form>

    <div style="position: relative; margin-left: 550px; top: 150px; ">
        <select name="result" id="result" style="position: relative; ">
            <option value="無所属">--種類--</option>
            <option value="#ff0000">住宅</option>
            <option value="#008000">飲食店</option>
            <option value="#0000ff">娯楽施設</option>
            <option value="ffff00">仕事用</option>
            <option value="その他">その他</option>
        </select>
        <button id="open">履歴を確認</button>
    </div>
    

    <div class="output" style="position: relative; margin-left:250px; top: 150px;">
        <?php
            // ファイルを読み込む
            $data1 = file_get_contents('data/data1.txt');
            $data2 = file_get_contents('data/data2.txt');
            $data3 = file_get_contents('data/data3.txt');
            $data4 = file_get_contents('data/data4.txt');
            $data5 = file_get_contents('data/data5.txt');

        ?>

        <div class="house" style="display: none;">
            <p>住宅</p>
            <textarea rows="5" cols="90">
                <?php echo $data1; ?>
            </textarea>

            <?php
                // ファイルを配列に読み込む
                $lines1 = file('data/data1.txt');
                // 最後の行を取得
                $lastLine1 = end($lines1);
                // 必要に応じて改行コードを削除
                $lastLine1 = rtrim($lastLine1, "\r\n");
                // 最初の20文字を削除
                $modifiedLine1 = substr($lastLine1, 20);
            ?>    

            <div class="lastHouse">
                <p>最後に追加した住宅</p>
                <textarea rows="1" cols="80">
                    <?php echo $modifiedLine1; ?>
                </textarea>
            </div>
        </div>
        
        <div class="food" style="display: none;">
            <p>飲食店</p>
            <textarea rows="5" cols="90">
                <?php echo $data2; ?>
            </textarea>

            <?php
                // ファイルを配列に読み込む
                $lines2 = file('data/data2.txt');
                // 最後の行を取得
                $lastLine2 = end($lines2);
                // 必要に応じて改行コードを削除
                $lastLine2 = rtrim($lastLine2, "\r\n");
                // 最初の20文字を削除
                $modifiedLine2 = substr($lastLine2, 20);
            ?>    

            <div class="lastFood">
                <p>最後に追加した飲食店</p>
                <textarea rows="1" cols="80">
                    <?php echo $modifiedLine2; ?>
                </textarea>
            </div>
        </div>

        <div class="work" style="display: none;">
            <p>娯楽施設</p>
            <textarea rows="5" cols="90">
                <?php echo $data3; ?>
            </textarea>

            <?php
                // ファイルを配列に読み込む
                $lines3 = file('data/data3.txt');
                // 最後の行を取得
                $lastLine3 = end($lines3);
                // 必要に応じて改行コードを削除
                $lastLine3 = rtrim($lastLine3, "\r\n");
                // 最初の20文字を削除
                $modifiedLine3 = substr($lastLine3, 20);
            ?>    

            <div class="lastWork">
                <p>最後に追加した娯楽施設</p>
                <textarea rows="1" cols="80">
                    <?php echo $modifiedLine3; ?>
                </textarea>
            </div>
        </div>

        <div class="job" style="display: none;">
            <p>仕事用</p>
            <textarea rows="5" cols="90">
                <?php echo $data4; ?>
            </textarea>

            <?php
                // ファイルを配列に読み込む
                $lines4 = file('data/data4.txt');
                // 最後の行を取得
                $lastLine4 = end($lines4);
                // 必要に応じて改行コードを削除
                $lastLine4 = rtrim($lastLine4, "\r\n");
                // 最初の20文字を削除
                $modifiedLine4 = substr($lastLine4, 20);
            ?>    

            <div class="lastWork">
                <p>最後に追加した仕事用</p>
                <textarea rows="1" cols="80">
                    <?php echo $modifiedLine4; ?>
                </textarea>
            </div>
        </div>

        <div class="others" style="display: none;">
            <p>その他</p>
            <textarea rows="5" cols="90">
                <?php echo $data5; ?>
            </textarea>

            <?php
                // ファイルを配列に読み込む
                $lines5 = file('data/data5.txt');
                // 最後の行を取得
                $lastLine5 = end($lines5);
                // 必要に応じて改行コードを削除
                $lastLine5 = rtrim($lastLine5, "\r\n");
                // 最初の20文字を削除
                $modifiedLine5 = substr($lastLine5, 20);
            ?>    

            <div class="lastOthers">
                <p>最後に追加したその他</p>
                <textarea rows="1" cols="80">
                    <?php echo $modifiedLine5; ?>
                </textarea>
            </div>
        </div>
    </div>
    
    
    <div id='myMap' style='width: 800px; height: 600px; margin: 0 auto; top: 200px;'></div>
    
    <div id="route" style="position: relative; top: 300px;">
        <select name="" id="one">
            <option value="">--地点を選ぶ--</option>
            <option value="1">--地点１--</option>
            <option value="2">--地点２--</option>
            <option value="3">--地点３--</option>
            <option value="4">--地点４--</option>
            <option value="5">--地点５--</option>
        </select>
        <p>⬇️</p>
        <select name="" id="two">
            <option value="">--地点を選ぶ--</option>
            <option value="1">--地点１--</option>
            <option value="2">--地点２--</option>
            <option value="3">--地点３--</option>
            <option value="4">--地点４--</option>
            <option value="5">--地点５--</option>
        </select>
        <p>⬇️</p>
        <select name="" id="three">
            <option value="">--地点を選ぶ--</option>
            <option value="1">--地点１--</option>
            <option value="2">--地点２--</option>
            <option value="3">--地点３--</option>
            <option value="4">--地点４--</option>
            <option value="5">--地点５--</option>
        </select>
        
        <div class="button">
            <button id="calculate">検索</button>
            <button id="clear">クリア</button>
        </div>
        
        
    </div>

    <div id="printoutPanel" style="position: relative; top: 300px;">

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=####' async defer></script>
    <script src="js/BmapQuery.js"></script>
    <script src="js/script1.js"></script>
</body>
</html>