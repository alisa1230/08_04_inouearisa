function getLocation() {
    // グローバル変数
    var syncerWatchPosition = {
        count: 0,
        lastTime: 0,
        map: null,
        marker: null,
    };

    // 成功した時の関数
    function successFunc(position) {
        //緯度
        var lat = position.coords.latitude;
        //経度
        var lon = position.coords.longitude;
        // console.log(lat);
    }

    // 失敗した時の関数
    function errorFunc(error) {
        // エラーコードのメッセージを定義
        var errorMessage = {
            0: "原因不明のエラーが発生しました…。",
            1: "位置情報の取得が許可されませんでした…。",
            2: "電波状況などで位置情報が取得できませんでした…。",
            3: "位置情報の取得に時間がかかり過ぎてタイムアウトしました…。",
        };

        // エラーコードに合わせたエラー内容を表示
        alert(errorMessage[error.code]);
    }

    // オプション・オブジェクト
    var optionObj = {
        "enableHighAccuracy": false,
        "timeout": 1000000,
        "maximumAge": 0,
    };

    // 現在位置を取得する
    navigator.geolocation.watchPosition(successFunc, errorFunc, optionObj);

};



// 県知事公舎
// 33.57622701703072
// 130.407012104988