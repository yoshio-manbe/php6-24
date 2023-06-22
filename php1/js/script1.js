$("#check").click(function(){
    for (let i = 1; i <= 5; i++) {
        const place = $("#place" + i).val();
        const latitude = $("#latitude" + i).val();
        const longitude = $("#longitude" + i).val();
        const color = $("#color" + i).val();
        const myObj = {
            name: place,
            latitude: latitude,
            longitude: longitude,
            color: color
        };
        localStorage.setItem("myData" + i, JSON.stringify(myObj));
    }

    location.reload();
})

$(document).ready(function() {
    // ページの読み込み時に保存されたデータを取得して表示する
    for (let i = 1; i <= 5; i++) {
        const storedData = JSON.parse(localStorage.getItem("myData" + i));
        if (storedData) {
        $("#place" + i).val(storedData.name);
        $("#latitude" + i).val(storedData.latitude);
        $("#longitude" + i).val(storedData.longitude);
        $("#color" + i).val(storedData.color);
        }
    }
})

var map;
function loadMapScenario() {
    map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        /* No need to set credentials if already passed in URL */
        showSearchBar: true,
    /* No need to set credentials if already passed in URL */
        center: new Microsoft.Maps.Location(43.07166, 141.31392),
        zoom: 16
    });

    document.getElementById('printoutPanel').innerHTML =
        '<b>Map center</b> <br>' + map.getCenter() + '<br>';
    document.getElementById('printoutPanel').innerHTML +=
        '<b>Map bounds</b> <br>' + map.getBounds() + '<br>';
    document.getElementById('printoutPanel').innerHTML +=
        '<b>Map type id</b> <br>' + map.getMapTypeId() + '<br>';
    document.getElementById('printoutPanel').innerHTML +=
        '<b>Map zoom level</b> <br>' + map.getZoom() + '<br>';

    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
        var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
        directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
        directionsManager.showInputPanel('directionsInputContainer');
    });

    var pushpin = new Microsoft.Maps.Pushpin(map.getCenter(), {
        icon: 'https://www.bingmapsportal.com/Content/images/poi_custom.png',
    });
    map.entities.push(pushpin);
    document.getElementById('printoutPanel').innerHTML =
        '<b>Location:</b> <br>' + pushpin.getLocation() + '<br>';
    document.getElementById('printoutPanel').innerHTML =
        '<b>Icon:</b> <br>' + pushpin.getIcon() + '<br>';
    document.getElementById('printoutPanel').innerHTML +=
        '<b>Anchor:</b> <br>' + pushpin.getAnchor() + '<br>';
    document.getElementById('printoutPanel').innerHTML +=
        '<b>Text:</b> <br>' + pushpin.getText() + '<br>';
    
    document.addEventListener('DOMContentLoaded', function() {
        // コードをここに追加する
    });
        

    var center = map.getCenter();
    var Events = Microsoft.Maps.Events;
    var Location = Microsoft.Maps.Location;
    var Pushpin = Microsoft.Maps.Pushpin;
    var pins = [
        new Pushpin(new Location(center.latitude, center.longitude), { color: '#f00' }),
        new Pushpin(new Location(center.latitude, center.longitude ), { color: '#0f0', draggable: true }),
        new Pushpin(new Location(center.latitude, center.longitude ), { color: '#00f', draggable: true }),
    ];
    map.entities.push(pins);
    
    for (let i = 1; i <= 5; i++) {
        const place = $("#place" + i).val();
        const latitude = $("#latitude" + i).val();
        const longitude = $("#longitude" + i).val();
        const color = $("#color" + i).val();
        const myObj = {
            name: place,
            latitude: latitude,
            longitude: longitude,
            color: color,
        };
        // ピンを作成
        const pin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(latitude, longitude), {
            title: place,
            draggable: true,
            color: color
        });
    
        // ピンを地図に追加
        map.entities.push(pin);
    
        // ピンのクリックイベントのハンドラを設定
        Microsoft.Maps.Events.addHandler(pin, 'dragend', function (e) {
            // ピンがドラッグ終了した時の処理
            const newLocation = e.target.getLocation();
            const newLatitude = newLocation.latitude;
            const newLongitude = newLocation.longitude;
        
            // 緯度経度をtextareaに反映
            $("#latitude" + i ).val(`${newLatitude}`);
            $("#longitude" + i ).val(`${newLongitude}`);
        });

        $("#route").ready(function() {
            $('#one').change(function() {
                var selectedGender = $(this).val();
                // 場所の値を取得し、選択肢に反映させる
                $('ol li').each(function(index) {
                    var memberId = '#place' + (index + 1);
                    var memberName = $(memberId).val();
                    // 選択肢に反映させる
                    var optionText = memberName ;
            
                    $("#one option:eq(" + (index + 1) + ")").text(optionText);
                });
            });
    
            $('#two').change(function() {
                var selectedGender = $(this).val();
                // 場所の値を取得し、選択肢に反映させる
                $('ol li').each(function(index) {
                    var memberId = '#place' + (index + 1);
                    var memberName = $(memberId).val();
                    // 選択肢に反映させる
                    var optionText = memberName ;
            
                    $("#two option:eq(" + (index + 1) + ")").text(optionText);
                });
            });
        
            $('#three').change(function() {
                var selectedGender = $(this).val();
                // 場所の値を取得し、選択肢に反映させる
                $('ol li').each(function(index) {
                    var memberId = '#place' + (index + 1);
                    var memberName = $(memberId).val();
                    // 選択肢に反映させる
                    var optionText = memberName ;
            
                    $("#three option:eq(" + (index + 1) + ")").text(optionText);
                });
            });


        });

    }

    $(document).ready(function(){
        var selectOne = document.getElementById('one');
        var selectTwo = document.getElementById('two');
        var selectThree = document.getElementById('three');
    
        var oneplace, twoplace, threeplace;
        var onelatitude, twolatitude, threelatitude;
        var onelongitude, twolongitude, threelongitude;

        selectOne.addEventListener('change', function() {
            var selectedValue1 = selectOne.options[selectOne.selectedIndex].value;
            console.log(selectedValue1);
        
            for (var i = 1; i <= 5; i++) {
                if (selectedValue1 === i.toString()) {
                    oneplace = $("#place" + i).val();
                    onelatitude = $("#latitude" + i).val();
                    onelongitude = $("#longitude" + i).val();
                    break;
                }
            }
        });

        selectTwo.addEventListener('change', function() {
            var selectedValue2 = selectTwo.options[selectTwo.selectedIndex].value;
            console.log(selectedValue2);
        
            for (var i = 1; i <= 5; i++) {
                if (selectedValue2 === i.toString()) {
                    twoplace = $("#place" + i).val();
                    twolatitude = $("#latitude" + i).val();
                    twolongitude = $("#longitude" + i).val();
                    break;
                }
            }
        });

        selectThree.addEventListener('change', function() {
            var selectedValue3 = selectThree.options[selectThree.selectedIndex].value;
            console.log(selectedValue3);
        
            for (var i = 1; i <= 5; i++) {
                if (selectedValue3 === i.toString()) {
                    threeplace = $("#place" + i).val();
                    threelatitude = $("#latitude" + i).val();
                    threelongitude = $("#longitude" + i).val();
                    break;
                }
            }
        });

        $("#calculate").click(function() {
            console.log(oneplace,twoplace,threeplace)

            if (oneplace && twoplace && threeplace) {
                var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.driving }); // ルートのモードを指定する
        
                directionsManager.clearAll();

                var oneWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: oneplace, location: new Microsoft.Maps.Location(onelatitude, onelongitude) });
                directionsManager.addWaypoint(oneWaypoint);
        
                var twoWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: threeplace, location: new Microsoft.Maps.Location(threelatitude, threelongitude) });
                directionsManager.addWaypoint(twoWaypoint);
        
                directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({ address: twoplace, location: new Microsoft.Maps.Location(twolatitude, twolongitude) }), 1);
        
                directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
                directionsManager.calculateDirections();
            }
        });

        $("#clear").click(function(){
            location.reload();
        });
    });
}


$("#open").click(function(){
    var selectedValue = $("#result").val();

    if (selectedValue === "#ff0000") {
        $(".house").show();
        $(".food").hide();
        $(".work").hide();
        $(".job").hide();
        $(".others").hide();
    } else if (selectedValue === "#008000") {
        $(".house").hide();
        $(".food").show();
        $(".work").hide();
        $(".job").hide();
        $(".others").hide();
    } else if (selectedValue === "#0000ff") {
        $(".house").hide();
        $(".food").hide();
        $(".work").show();
        $(".job").hide();
        $(".others").hide();
    } else if (selectedValue === "#ffff00") {
        $(".house").hide();
        $(".food").hide();
        $(".work").hide();
        $(".job").show();
        $(".others").hide();
    } else {
        $(".house").hide();
        $(".food").hide();
        $(".work").hide();
        $(".job").hide();
        $(".others").show();
    } 
});

