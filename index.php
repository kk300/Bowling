<!DOCTYPE html>
<html>
<head>
<title>スポーツボウリング応援サイトSplash!</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no, email=no, address=no">
<meta name="description" content="プロボウラーのスケジュールをブログなどから集めてまとめています！">
<meta name="keywords" content="ボウリング, プロボウラー, チャレンジ, スケジュール">

<meta itemprop="name" content="スポーツボウリング応援サイトSplash!">
<meta itemprop="description" content="プロボウラーのスケジュールをブログなどから集めてまとめています！">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="スポーツボウリング応援サイトSplash!">
<meta name="twitter:url" content="http://splash.mybluemix.net/index.php">
<meta name="twitter:description" content="プロボウラーのスケジュールをブログなどから集めてまとめています！">

<meta property="og:type" content="website">
<meta property="og:title" content="スポーツボウリング応援サイトSplash!">
<meta property="og:url" content="http://splash.mybluemix.net/index.php">
<meta property="og:site_name" content="スポーツボウリング応援サイトSplash!">
<meta property="og:description" content="プロボウラーのスケジュールをブログなどから集めてまとめています！">

<link rel="stylesheet" href="css/base.css" type="text/css" media="all" />
<!-- jQuery-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<!-- Original CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/jquery.gmap3.js"></script>
<script>
$(document).ready(function() {    
    // 次の分類(分類Aごとの分類Bリスト)を定義
    var bunruiA = new Array('秋光楓プロ','浅田梨奈プロ','阿部聖水プロ','安藤瞳プロ','飯田菜々プロ','市原由紀プロ','岩見彩乃プロ','臼井昌香プロ','生方千登勢プロ','遠藤未菜プロ','大石奈緒プロ','太田朱虹プロ','大仲純怜プロ','大根谷愛プロ','岡田郁子プロ','亀井智美プロ','川崎由意プロ','川舩愛美プロ','菊地葵プロ','岸田有加プロ','久保田彩花プロ','倉田萌プロ','桑藤美樹プロ','小泉奈津美プロ','高和美プロ','小林あゆみプロ','小林よしみプロ','酒井美佳プロ','坂本詩緒里プロ','櫻井麻美プロ','櫻井眞利子プロ','白石順子プロ','鈴木亜季プロ','鈴木理沙プロ','進博美プロ','竹原三貴プロ','田中亜実プロ','谷川章子プロ','鶴井亜南プロ','寺下智香プロ','殿井ニラワティプロ','内藤真裕美プロ','長尾朱里プロ','中谷優子プロ','中野麻理子プロ','中村美月プロ','名和秋プロ','西村美紀プロ','野瀬千春プロ','長谷川真実プロ','姫路麗プロ','福原明美プロ','藤田麻衣プロ','舟本舞プロ','古田翔子プロ','堀内綾プロ','本間成美プロ','前屋瑠美プロ','町井綾子プロ','松永裕美プロ','三浦美里プロ','村上好プロ','村山恵梨プロ','望月理江プロ','森彩奈江プロ','柳美穂プロ','山田幸プロ','吉川朋絵プロ','渡辺けあきプロ');
    createSelection( form1.elements['player'], "(選手名)", bunruiA, bunruiA, 0);
    var getVal = GetQueryString();
    
    var jsonFileName = getVal["category"] + ".json";
    $.getJSON(jsonFileName, function(data) {
        var rows = "";
        //テーブルとして表示するため、htmlを構築
        var len = data.sche.length;
        for (var i = 0; i < len; i++) {
        	// 今日の日付より古いデータは表示しない
        	var today = new Date();
        	if (data.sche[i].days < today.getDate()) {
        		continue;
        	}
            rows += "<tr>";
            if (data.sche[i].wday == 'SUN') {
                rows += "<td class='score' bgcolor='#ffcccc'><center><h4><b>";
            }
            else if (data.sche[i].wday == 'SAT') {
                rows += "<td class='score' bgcolor='#ccccff'><center><h4><b>";
            }
            else {
                rows += "<td class='score'><center><h4><b>";
            }
            rows += data.sche[i].days ;
            rows += "</h4>";
            rows += data.sche[i].wday ;
            rows += "</b></center></td><td class='score'>";
            var len2 = data.sche[i].data.length;
            for (var j = 0; j < len2; j++) {
                if (data.sche[i].data[j].cent != "　") {
                    var playerName = data.sche[i].data[j].name;
                    if (playerName[0] != "【") {
                        playerName = data.sche[i].data[j].name + "プロ";
                    }
                    if (!('player' in getVal)
                      || (getVal['player'] == playerName)
                      || (getVal['player'] == 0)) {
                    rows += "<a href='";
                    rows += data.sche[i].data[j].purl;
                    rows += "' target='_blank'>";
                    rows += playerName;
                    rows += "</a><br /><small>";
                    for (var k = 0; k < 3; k++) {
                        rows += "　";
                    }
                    rows += "＠<a href='";
                    rows += data.sche[i].data[j].curl;
                    rows += "' target='_blank'>";
                    rows += data.sche[i].data[j].cent;
                    rows += "</a></small><br />";
                    }
                }
            }
            rows += "</td>";
            rows += "</tr>";
        }
        //テーブルに作成したhtmlを追加する
        $("#tbl").append(rows);
    });
});

////////////////////////////////////////////////////
//
// GETパラメータを連想配列で取得する関数
//	引数: void
function GetQueryString() {
    var result = {};
    if( 1 < window.location.search.length )
    {
        // 最初の1文字 (?記号) を除いた文字列を取得する
        var query = window.location.search.substring( 1 );

        // クエリの区切り記号 (&) で文字列を配列に分割する
        var parameters = query.split( '&' );

        for( var i = 0; i < parameters.length; i++ )
        {
            // パラメータ名とパラメータ値に分割する
            var element = parameters[ i ].split( '=' );

            var paramName = decodeURIComponent( element[ 0 ] );
            var paramValue = decodeURIComponent( element[ 1 ] );

            // パラメータ名をキーとして連想配列に追加する
            result[ paramName ] = paramValue;
        }
    }
    return result;
}

////////////////////////////////////////////////////
//
// 選択ボックスに選択肢を追加する関数
//	引数: ( selectオブジェクト, value値, text値)
function addSelOption( selObj, myValue, myText ) {
    selObj.length++;
    selObj.options[ selObj.length - 1].value = myValue ;
    selObj.options[ selObj.length - 1].text  = myText;
}

/////////////////////////////////////////////////////
//
// 選択リストを作る関数 
//	引数: ( selectオブジェクト, 見出し, value値配列 , text値配列 )
//
function createSelection( selObj, midashi, aryValue, aryText, initval )
{
    selObj.length = 0;
    addSelOption( selObj, initval, midashi);
    // 初期化
    for( var i=0; i < aryValue.length; i++) {
        addSelOption ( selObj , aryValue[i], aryText[i]);
    }
}
</script>

<style type="text/css">
#pagetop {
	position: fixed;
	bottom: 30px;
	right: 15px;
}

#namegrep {
	position: fixed;
	top: 0px;
	left: 15px;
        background-color: #ffffff;
}
</style>
</head>

<body>
    <p id="top"></p>

    <div id="container">
        <a href="./index.php">
            <img class="img-responsive" src="img/splash01.png" alt="splash!!">
        </a>
        <hr>
        <div id="fb-root"></div>

<!-- Facebookいいね!ボタン -->
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

		<div style="text-align: right; margin-right: 5%;">
			<div class="fb-like" data-href="http://splash.mybluemix.net/index.php" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true">
			</div> <!-- fb-like -->
		</div> <!-- style -->
		<br>

		<nav class="navbar navbar-default" role="navigation" style="background-color: 0x000000;">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MENU</a>
			</div> <!-- navbar-header -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<li><a href="./index.php">ホーム</a></li>
<?php
        $ym = date('ym');
        echo '<li><a href="./index.php?category=schedule' . $ym . '">スケジュール</a></li>';

?>
<!--			<li><a href="./index.php?category=report">大会速報</a></li> -->
		        <li><a href="./index.php?category=link">リンク</a></li>
<!--			<li><a href="./index.php?category=map">全国ボウリング場マップ</a></li> -->
				</ul>
			</div> <!-- collapse -->
		</div> <!-- container -->
		</nav>
	</div> <!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-3 hidden-xs">
<table class="table table-bordered table-striped">
<thead>
<tr><th align="left">選手のブログへ</th></tr>
</thead>
<tbody>
<tr><td align="left">　<a href="http://ameblo.jp/a2aoki/" target="_blank"><font size="2">青木彰彦プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/kaechan-1019/" target="_blank"><font size="2">秋光楓プロ</a></td></tr>
<tr><td align="left">　<a href="http://www.starlanes.co.jp/asada/" target="_blank"><font size="2">浅田梨奈プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-hitomiandoh" target="_blank"><font size="2">安藤瞳プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/iguchi-pro/" target="_blank"><font size="2">井口直之プロ</a></td></tr>
<tr><td align="left">　<a href="http://blogs.yahoo.co.jp/yuki324jpba" target="_blank"><font size="2">市原由紀プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/eueueueueueueueueu/" target="_blank"><font size="2">岩見彩乃プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/chitose-u/" target="_blank"><font size="2">生方千登勢プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-minaendoh" target="_blank"><font size="2">遠藤未菜プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/yfbnao/" target="_blank"><font size="2">大石奈緒プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/otaako/" target="_blank"><font size="2">太田朱虹プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/oneya-ai/" target="_blank"><font size="2">大根谷愛プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/to-pro-0413-0486/" target="_blank"><font size="2">大谷内高志プロ</a></td></tr>
<tr><td align="left">　<a href="http://blogs.yahoo.co.jp/okadaikuko307" target="_blank"><font size="2">岡田郁子プロ</a></td></tr>
<tr><td align="left">　<a href="http://kamiyabowling.dosugoi.net/" target="_blank"><font size="2">神谷昇司プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/tomomi422/" target="_blank"><font size="2">亀井智美プロ</a></td></tr>
<tr><td align="left">　<a href="http://profile.ameba.jp/viviycha/" target="_blank"><font size="2">川崎由意プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/kawafunemanami/" target="_blank"><font size="2">川舩愛美プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/rtailkiss/" target="_blank"><font size="2">菊地葵プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-yukakishida" target="_blank"><font size="2">岸田有加プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/kubotaayaka/" target="_blank"><font size="2">久保田彩花プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/yas792/" target="_blank"><font size="2">黒川靖プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/kuwatomiki/" target="_blank"><font size="2">桑藤美樹プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/koizuminatsumi/" target="_blank"><font size="2">小泉奈津美プロ</a></td></tr>
<tr><td align="left">　<a href="http://s.maho.jp/blog/df3c63g6956a96d3/" target="_blank"><font size="2">小金正治プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/kobayashiayumi/" target="_blank"><font size="2">小林あゆみプロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/tetsuyakobayashi1198/" target="_blank"><font size="2">小林哲也プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/kobayashiyoshimi/" target="_blank"><font size="2">小林よしみプロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/grandbowl-saitoh/" target="_blank"><font size="2">斉藤茂雄プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/saitoseiya/" target="_blank"><font size="2">齋藤征哉プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-mikasakai" target="_blank"><font size="2">酒井美佳プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/5962314/" target="_blank"><font size="2">坂本詩緒里プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-asamisakurai" target="_blank"><font size="2">櫻井麻美プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-marikosakurai" target="_blank"><font size="2">櫻井眞利子プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/jpba1091/" target="_blank"><font size="2">佐取賢プロ</a></td></tr>
<tr><td align="left">　<a href="http://blogs.yahoo.co.jp/junko_467" target="_blank"><font size="2">白石順子プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/grandbowl-suzuki/" target="_blank"><font size="2">鈴木亜季プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/don-chuck-pro/" target="_blank"><font size="2">鈴木博喜プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-risasuzuki" target="_blank"><font size="2">鈴木理沙プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/susumu-hiromi/" target="_blank"><font size="2">進博美プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/stephanypyrdol/" target="_blank"><font size="2">ステファニー・ピヤドールプロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/takeharamiki/" target="_blank"><font size="2">竹原三貴プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-amitanaka" target="_blank"><font size="2">田中亜実プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/grandbowl-tanigawa/" target="_blank"><font size="2">谷川章子プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/tsurui-anami/" target="_blank"><font size="2">鶴井亜南プロ</a></td></tr>
<tr><td align="left">　<a href="http://bowling.sugai-dinos.jp/pc/blog/" target="_blank"><font size="2">寺下智香プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/masami-abe369/" target="_blank"><font size="2">堂元美佐プロ</a></td></tr>
<tr><td align="left">　<a href="http://profile.ameba.jp/nilawatit/" target="_blank"><font size="2">殿井ニラワティプロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/yuko-pro/" target="_blank"><font size="2">中谷優子プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-marikonakano" target="_blank"><font size="2">中野麻理子プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.livedoor.jp/jpba_nakamura/" target="_blank"><font size="2">中村智プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/jpba-1247/" target="_blank"><font size="2">中村太亮プロ</a></td></tr>
<tr><td align="left">　<a href="http://p-mitsukinakamura.exblog.jp/" target="_blank"><font size="2">中村美月プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/aki-nawa/" target="_blank"><font size="2">名和秋プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/nishimuramiki/" target="_blank"><font size="2">西村美紀プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/jpba-431/" target="_blank"><font size="2">野瀬千春プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-masamihasegawa" target="_blank"><font size="2">長谷川真実プロ</a></td></tr>
<tr><td align="left">　<a href="http://kenji1254.exblog.jp/" target="_blank"><font size="2">馬場健司プロ</a></td></tr>
<tr><td align="left">　<a href="http://www.futababowl.jp/himeji/index.html" target="_blank"><font size="2">姫路麗プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/p-chan-300/" target="_blank"><font size="2">福原明美プロ</a></td></tr>
<tr><td align="left">　<a href="http://blogs.yahoo.co.jp/fujitama_330" target="_blank"><font size="2">藤田麻衣プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-maifunamoto" target="_blank"><font size="2">舟本舞プロ</a></td></tr>
<tr><td align="left">　<a href="http://shokobowling.dosugoi.net/" target="_blank"><font size="2">古田翔子プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/jpba947/" target="_blank"><font size="2">保倉映義プロ</a></td></tr>
<tr><td align="left">　<a href="http://zassoudamashi.blog65.fc2.com/" target="_blank"><font size="2">堀内綾プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/horiesan/" target="_blank"><font size="2">堀江真一プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/narumi19900203/" target="_blank"><font size="2">本間成美プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-rumimaeya" target="_blank"><font size="2">前屋瑠美プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/ryoko492/" target="_blank"><font size="2">町井綾子プロ</a></td></tr>
<tr><td align="left">　<a href="http://kmcitybowl.p-kit.com/" target="_blank"><font size="2">松永裕美プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/murayamaeri/" target="_blank"><font size="2">村山恵梨プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/mochizukirie/" target="_blank"><font size="2">望月理江プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.excite.co.jp/p-sanaemori" target="_blank"><font size="2">森彩奈江プロ</a></td></tr>
<tr><td align="left">　<a href="http://bigjun.blog.so-net.ne.jp/" target="_blank"><font size="2">矢島純一プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/jpba447-miho/" target="_blank"><font size="2">柳美穂プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/yamadayuki/" target="_blank"><font size="2">山田幸プロ</a></td></tr>
<tr><td align="left">　<a href="http://ameblo.jp/ty1060/" target="_blank"><font size="2">吉川朋絵プロ</a></td></tr>
<tr><td align="left">　<a href="http://jpba848.jugem.jp/" target="_blank"><font size="2">吉田文啓プロ</a></td></tr>
<tr><td align="left">　<a href="http://blog.rankseeker.net/watanabekeaki/" target="_blank"><font size="2">渡辺けあきプロ</a></td></tr>
</tbody>
</table>
		</div> <!-- col -->
		<div>
広告<br />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- test_unit01 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1068622611384585"
     data-ad-slot="6545396557"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</div><!-- 広告 -->
		<div class="col-xs-12 col-sm-9 col-md-9 ">
<?php
//	require_once "./Feed.php";
	
//	$feed = new Feed;
//	$blog_url = "http://rssblog.ameba.jp/kaechan-1019/rss.html";
//	$rss = $feed->loadRss($blog_url);
//	echo "記事";
//	foreach($rss->item as $item) {
//		echo $item->title;
//	}
    $category = '';
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    }
    if (substr($category, 0, 8) == 'schedule') {
//        echo '準備中です。。。<br />';
        ob_start();
        ob_implicit_flush(0);
        require './ScheduleView.php';
        $content = ob_get_clean();
        echo $content;
    } else {
        ob_start();
        ob_implicit_flush(0);
        require './FeedView.php';
        $content = ob_get_clean();
        echo $content;
    }
?>
			</div> <!-- col -->
		</div> <!-- row -->
	</div> <!-- container -->
	<div><p id="pagetop"><a href="#top"><button type="button" class="btn btn-default">ページの先頭へ</button></a></p></div>
	<div class="container">
	<center>
	<hr>
2013-2015 MKProject
	<hr>
	</center>
</div> <!-- container -->
</body>
</html>
