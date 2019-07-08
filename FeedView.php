
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("feeds", "1");

var FA = new Array( //配列です。ここに、取得したいRSSフィードを加えるだけです
//"http://blog.rankseeker.net/index.xml",//rankseeker
//"http://rssblog.ameba.jp/a2aoki/rss20.xml",// 青木彰彦プロ
"http://rssblog.ameba.jp/kaechan-1019/rss20.xml",// 秋光楓プロ
"http://blog.rankseeker.net/asadarina/index.xml",// 浅田梨奈プロ
/*
"http://rss.exblog.jp/rss/exblog/p-hitomiandoh/atom.xml",// 安藤瞳プロ
"http://rssblog.ameba.jp/iguchi-pro/rss20.xml",// 井口直之プロ
"http://blogs.yahoo.co.jp/yuki324jpba/rss.xml",// 市原由紀プロ
"http://rssblog.ameba.jp/eueueueueueueueueu/rss20.xml",// 岩見彩乃プロ
"http://rssblog.ameba.jp/chitose-u/rss20.xml",// 生方千登勢プロ
"http://rss.exblog.jp/rss/exblog/p-minaendoh/atom.xml",// 遠藤未菜プロ
"http://rssblog.ameba.jp/yfbnao/rss20.xml",// 大石奈緒プロ
"http://blog.rankseeker.net/otaako/index.xml",// 太田朱虹プロ
"http://rssblog.ameba.jp/oneya-ai/rss20.xml",// 大根谷愛プロ
"http://rssblog.ameba.jp/to-pro-0413-0486/rss20.xml",// 大谷内高志プロ
"http://blogs.yahoo.co.jp/okadaikuko307/rss.xml",// 岡田郁子プロ
"http://rssblog.ameba.jp/tomomi422/rss20.xml",// 亀井智美プロ
"http://rssblog.ameba.jp/viviycha/rss20.xml",// 川崎由意プロ
"http://blog.rankseeker.net/kawafunemanami/index.xml",// 川舩愛美プロ
"http://rssblog.ameba.jp/rtailkiss/rss20.xml",// 菊地葵プロ
"http://rss.exblog.jp/rss/exblog/p-yukakishida/atom.xml",// 岸田有加プロ
"http://blog.rankseeker.net/kubotaayaka/index.xml",// 久保田彩花プロ
"http://rssblog.ameba.jp/yas792/rss20.xml",// 黒川靖プロ
"http://blog.rankseeker.net/kuwatomiki/index.xml",// 桑藤美樹プロ
"http://blog.rankseeker.net/koizuminatsumi/index.xml",// 小泉奈津美プロ
"http://blog.rankseeker.net/kobayashiayumi/index.xml",// 小林あゆみプロ
"http://rssblog.ameba.jp/tetsuyakobayashi1198/rss20.xml",// 小林哲也プロ
"http://blog.rankseeker.net/kobayashiyoshimi/index.xml",// 小林よしみプロ
"http://rssblog.ameba.jp/grandbowl-saitoh/rss20.xml",// 斉藤茂雄プロ
"http://blog.rankseeker.net/saitoseiya/index.xml",// 齋藤征哉プロ
"http://rss.exblog.jp/rss/exblog/p-mikasakai/atom.xml",// 酒井美佳プロ
"http://rssblog.ameba.jp/5962314/rss20.xml",// 坂本詩緒里プロ
"http://rss.exblog.jp/rss/exblog/p-asamisakurai/atom.xml",// 櫻井麻美プロ
"http://rss.exblog.jp/rss/exblog/p-marikosakurai/atom.xml",// 櫻井眞利子プロ
"http://rssblog.ameba.jp/jpba1091/rss20.xml",// 佐取賢プロ
"http://blogs.yahoo.co.jp/junko_467/rss.xml",// 白石順子プロ
"http://rssblog.ameba.jp/grandbowl-suzuki/rss20.xml",// 鈴木亜季プロ
"http://rssblog.ameba.jp/don-chuck-pro/rss20.xml",// 鈴木博喜プロ
"http://rss.exblog.jp/rss/exblog/p-risasuzuki/atom.xml",// 鈴木理沙プロ
"http://rssblog.ameba.jp/susumu-hiromi/rss20.xml",// 進博美プロ
"http://blog.rankseeker.net/stephanypyrdol/index.xml",// ステファニー・ピヤドールプロ
"http://blog.rankseeker.net/takeharamiki/index.xml",// 竹原三貴プロ
"http://rss.exblog.jp/rss/exblog/p-amitanaka/atom.xml",// 田中亜実プロ
"http://rssblog.ameba.jp/grandbowl-tanigawa/rss20.xml",// 谷川章子プロ
"http://rssblog.ameba.jp/tsurui-anami/rss20.xml",// 鶴井亜南プロ
"http://rssblog.ameba.jp/masami-abe369/rss20.xml",// 堂元美佐プロ
"http://rssblog.ameba.jp/nilawatit/rss20.xml",// 殿井ニラワティプロ
"http://rssblog.ameba.jp/yuko-pro/rss20.xml",// 中谷優子プロ
"http://rss.exblog.jp/rss/exblog/p-marikonakano/atom.xml",// 中野麻理子プロ
"http://rssblog.ameba.jp/jpba1247/rss20.xml",// 中村太亮プロ
"http://rss.exblog.jp/rss/exblog/p-mitsukinakamura/atom.xml",// 中村美月プロ
"http://rssblog.ameba.jp/aki-nawa/rss20.xml",// 名和秋プロ
"http://blog.rankseeker.net/nishimuramiki/index.xml",// 西村美紀プロ
"http://rssblog.ameba.jp/jpba-431/rss20.xml",// 野瀬千春プロ
"http://rss.exblog.jp/rss/exblog/p-masamihasegawa/atom.xml",// 長谷川真実プロ
"http://rss.exblog.jp/rss/exblog/kenji1254/atom.xml",// 馬場健司プロ
"http://rssblog.ameba.jp/p-chan-300/rss20.xml",// 福原明美プロ
"http://blogs.yahoo.co.jp/fujitama_330/rss.xml",// 藤田麻衣プロ
"http://rss.exblog.jp/rss/exblog/p-maifunamoto/atom.xml",// 舟本舞プロ
"http://rssblog.ameba.jp/jpba947/rss20.xml",// 保倉映義プロ
"http://rssblog.ameba.jp/horiesan/rss20.xml",// 堀江真一プロ
"http://rssblog.ameba.jp/narumi19900203/rss20.xml",// 本間成美プロ
"http://rss.exblog.jp/rss/exblog/p-rumimaeya/atom.xml",// 前屋瑠美プロ
"http://rssblog.ameba.jp/ryoko492/rss20.xml",// 町井綾子プロ
"http://blog.rankseeker.net/murayamaeri/index.xml",// 村山恵梨プロ
"http://blog.rankseeker.net/mochizukirie/index.xml",// 望月理江プロ
"http://rss.exblog.jp/rss/exblog/p-sanaemori/atom.xml",// 森彩奈江プロ
"http://rssblog.ameba.jp/jpba447-miho/rss20.xml",// 柳美穂プロ
"http://blog.rankseeker.net/yamadayuki/index.xml",// 山田幸プロ
"http://rssblog.ameba.jp/ty1060/rss20.xml",// 吉川朋絵プロ
*/
"http://blog.rankseeker.net/watanabekeaki/index.xml"// 渡辺けあきプロ
);

function initialize() {
    var feedsArr = new Array();
    var numEntr = 1; //各サイトのフィードを読み込む数（3サイトなので、投稿が3つ表示されます）
    var container = document.getElementById("feed");
    var cnt = FA.length;
    for (var k=0; k<FA.length; k++) {
        var feed = new google.feeds.Feed(FA[k]);
        feed.setNumEntries(numEntr);
        feed.setResultFormat(google.feeds.Feed.JSON_FORMAT); //JSONフォーマットに整形
        feed.load(function(result) {
            if (!result.error) {
                for (var i = 0; i < result.feed.entries.length; i++) {
                    var entry = result.feed.entries[i];
                    var eimg = "";
                    var imgCheck = entry.content.match(/(http:){1}[\S_-]+((\.png)|(\.jpg)|(\.JPG)|(\.gif))/); //データを取得する拡張子を指定
                    if(imgCheck){
                        eimg += imgCheck[0]; //配列の1番目に格納されたデータを取得（つまり、1枚目の画像を取得）
                    }
                    else {
                        eimg += 'http://www.imamura.biz/blog/wp-content/themes/alltuts/images/logo_blog8.png'; //画像が取得できなかった場合の代替画像のURLを指定
                    }
                    var attributes = ["title", "link", "publishedDate", "content"];
                    var ind = feedsArr.length;
                    feedsArr[ind] = new Array();
                    feedsArr[ind][0] = Date.parse(entry[attributes[2]]); // 日付でソート（並び替え）
                    feedsArr[ind][1] = entry[attributes[1]]; // link
                    feedsArr[ind][2] = entry[attributes[2]]; // publishedDate
                    feedsArr[ind][3] = entry[attributes[3]]; // content
                    feedsArr[ind][4] = entry[attributes[0]]; // title
                    feedsArr[ind][5] = result.feed.title; // site title
                    feedsArr[ind][6] = eimg; // thumbnail
                }
            }
            cnt--;
            if (cnt == 0) {
                feedsArr.sort();
                feedsArr.reverse();
                for (var j = 0; j < feedsArr.length; j++) {
                    var h4 = document.createElement("H4");
                    h4.appendChild(document.createTextNode(feedsArr[j][5]));
                    
                    var h5 = document.createElement("H5");
                    var aE = document.createElement("A");
                    aE.href=aE.title=feedsArr[j][1];
                    aE.innerHTML = feedsArr[j][4];
                    h5.appendChild(aE);
                    
                    var p = document.createElement("P");
                    var span1 = document.createElement("SPAN");
                    var span2 = document.createElement("SPAN");
                    var br = document.createElement("BR");
                    var hr = document.createElement("HR");
                    span1.appendChild(document.createTextNode(feedsArr[j][2]));
                    var stri = feedsArr[j][3].substring(0, 100);
                    stri = stri.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g, "");
                    span2.innerHTML = stri;
                    p.appendChild(span1);
                    p.appendChild(br);
                    p.appendChild(span2);
                    
                    container.appendChild(h4);
                    container.appendChild(h5);
                    container.appendChild(p);
                    container.appendChild(hr);
                    //var img_link = document.createElement("img");
                    //img_link.setAttribute("src", feedsArr[j][6] );
                    //img_link.setAttribute("width", "100" ); //幅：width属性に100pxを指定
                    //container.appendChild(img_link); //img（画像）タグを出力
                }
            }
        });
    }
}
google.setOnLoadCallback(initialize);
</script>
<h3>選手ブログ最新記事</h3>
<div id="feed">

