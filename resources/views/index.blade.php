<!DOCTYPE html>
<html lang="ja">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>天気予報 API（livedoor 天気互換）</title>
  <link rel="icon" type="image/png" href="{{ url('/') }}/logo.png">
  <link rel="canonical" href="{{ env('APP_URL') }}/">

  <!-- OGP -->
  <meta property="og:type" content="article">
  <meta property="description" content="気象庁が配信している各地の天気予報を livedoor 天気互換の json データで返す API です。livedoor 天気 API の代替として利用できます。">
  <meta property="og:description" content="気象庁が配信している各地の天気予報を livedoor 天気互換の json データで返す API です。livedoor 天気 API の代替として利用できます。">
  <meta property="og:title" content="天気予報 API（livedoor 天気互換）">
  <meta property="og:image" content="{{ url('/') }}/logo.png">
  <meta property="og:locale" content="ja_JP">
  <!-- /OGP -->

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:description" content="気象庁が配信している各地の天気予報を livedoor 天気互換の json データで返す API です。livedoor 天気 API の代替として利用できます。">
  <meta name="twitter:title" content="天気予報 API（livedoor 天気互換）">
  <meta name="twitter:image" content="{{ url('/') }}/logo.png">
  <!-- /Twitter Card -->

  <!-- JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="{{ url('/') }}/style.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('APP_GTAG') }}"></script>
  <script>

    window.dataLayer = window.dataLayer || [];
    function gtag(){
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '{{ env('APP_GTAG') }}');

    $(function(){
      $('a[href^="#"]').click(function(){
        var adjust = -82; // ヘッダー分
        var speed = 450;
        var href= $(this).attr('href');
        var target = $(href == '#' || href == '' ? 'html' : href);
        var position = target.offset().top + adjust;
        $('body, html').animate({ scrollTop:position }, speed, 'swing');
        return false;
      });
    });

  </script>

</head>
<body>

  <nav id="navigation" class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
    <div class="container">
      <a class="navbar-brand text-white" href="./">
        <img src="{{ url('/') }}/logo.png" class="d-inline-block align-top">
        天気予報 API（livedoor 天気互換）
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="navbar" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="#about">
              <i class="fas fa-info-circle"></i>About
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#changes-notes">
              <i class="fas fa-exclamation-circle"></i>Changes Notes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#request-parameter">
              <i class="fas fa-paper-plane"></i>Request
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#response-field">
              <i class="fas fa-reply"></i>Response
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#json-data-sample">
              <i class="fas fa-code"></i>Json Data Sample
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="about" class="container mt-4 px-2 px-lg-3">
    <div class="card">
      <h2 class="card-header font-weight-bold"><i class="fas fa-info-circle"></i>About</h2>
      <div class="card-body p-sm-4">

        <p>天気予報 API（livedoor 天気互換）は、気象庁が配信している全国各地の今日・明日・あさっての天気予報・予想気温と都道府県の天気概況情報を json データで提供しています。</p>

        <p>
          去る 2020 年 7 月、<a href="https://help.livedoor.com/weather/index.html" target="_blank">livedoor 天気がサービス終了となりました。</a>livedoor 天気の API はわかりやすく、認証も不要でとても利用しやすかったのですが、突然の終了となりとても残念です。<br>
          代替として使えそうな API を探しましたが、OpenWeatherMap は API キーが必要な上に予報自体が正確でなかったり、気象庁のサイトはそもそも API がなかったりなど livedoor 天気のように手軽に使える API は見つからず、こうして自作することとなりました。<br>
          （気象庁 HP のリニューアルにより現在では各種 API が存在しますが、公に公開されているものではないためドキュメントはなく、またデータが非常に取りづらい構造になっており、手軽に使えるかというと微妙…）<br>
        </p>

        <p>
          この API は、<a href="https://www.jma.go.jp/jma/index.html" target="_blank">気象庁</a> から配信されている全国各地の天気予報を取得し、終了した livedoor 天気 の API と互換性のある json 形式のデータで提供するものです。URL を差し替えるだけで極力既存のコードをいじることなく利用できるようにしているつもりですが、<span class="text-danger font-weight-bold">livedoor 天気の API からの変更点や注意点もあります。</span>利用される際は下記の 変更点・注意事項 をよく読んだ上でご利用ください。<br>
        </p>

        <p class="mb-0">
          <span class="text-danger font-weight-bold"><u>気象庁 HP のリニューアルに対応しました。</u> また、気象台名、天気詳細、見出し/本文のみの天気概況文、一時細分区域名のプロパティを新たに追加しました。</span>
          <span class="text-danger">気象データ取得が API 化されたことで細かい挙動が変更になっていますが、ドキュメントの方の更新が終わっていません。レスポンスデータは livedoor 天気にて用意されていたプロパティに関しては互換を保っていますが、あらかじめご了承ください。</span><br>
        </p>

      </div>
    </div>
  </div>

  <div id="changes-notes" class="container mt-4 px-2 px-lg-3">
    <div class="card">
      <h2 class="card-header font-weight-bold"><i class="fas fa-exclamation-circle"></i>変更点・注意事項（情報が古くなっています）</h2>
      <div class="card-body p-sm-4">

        <ul class="mb-0">
          <li>天気予報は気象庁のサイトをスクレイピングして取得しているため、<span class="text-danger">もし取得元のページに予期しないデータが入っていた場合や HTML の構造が大幅に変わった場合などに、500 エラーで取得できなくなる可能性があります。</span></li>
          <ul>
            <li>万全は期しているつもりですが、アクセスする時間によってデータが変わるため、修正できていない不具合があるかもしれません。</li>
            <li>サービスの利用は無料ですが、この API を利用したことで何らかの不具合が発生しても責任は負えません。自己責任にてお願いします。</li>
            <li>このため、<u>天気を「確実に」取得する必要がある用途での利用は推奨しません。</u>有料サービスなども検討してください。</li>
          </ul>
          <li>API は HTTP 接続と HTTPS 接続両方に対応していますが、<span class="text-info">できるだけ HTTPS でアクセスすることを推奨します</span>（証明書云々など HTTPS 接続が難しい環境向けに一応残しています）。</li>
          <li>ピンポイント予報の発表地点を表す pinpointLocations は気象庁 HP からは取得できないため、廃止としました。</li>
          <li>link はリクエストされたデータの地域に該当する気象庁 HP 天気予報のデータ取得元 URL を返すようになりました。</li>
          <li>copyright 内の項目は現状に合わせて変更しています。provider は気象庁としていますが、非公式です。</li>
          <ul>
            <li>API のレスポンス内 ( copyright → provider → note ) に JSON データへ編集している旨を明記しています。</li>
          </ul>
          <li>気象庁から配信されているデータの関係上、<span class="text-danger">明後日の最高気温、最低気温は取得できません</span>（ null になります）。また、今日の最低気温も取得できないようです。</li>
          <ul>
            <li>時間帯によっては明後日の天気が予報ごと取得できないこともあります。取得できない場合も考慮して実装してください。</li>
            <li>天気が取得できなかった場合は天気アイコンのタイトル・URL も空 (null) になります。</li>
          </ul>
          <li>日付が変わってから今日分の天気が配信されるまでの0時～5時の間は、<span class="text-info">気象庁 HP で明日分として配信されている天気を今日の天気、明後日分として配信されている天気を明日の天気として扱います。</span></li>
          <ul>
            <li>したがって、0時～5時の間は明後日の天気は取得できません。また、明日の最高気温・最低気温・降水確率も取得できません（降水確率のみ null ではなく --% と表示されます）。</li>
          </ul>
          <li>forecasts → image はサルベージした各天気アイコンの URL を返しますが、稀にしか発表されない天気などアイコンを判定できなかった場合は「？」アイコンの画像を返すことがあります。もし遭遇した場合は <a href="https://github.com/tsukumijima/weather-api/issues" target="_blank">Issues</a> へ報告していただけると助かります。</li>
          <li>publicTime_format と description → publicTime_format を追加しました。ISO8601 形式の publicTime を 年/月/日 時間:分:秒 の形で取得できます。
          </li>
          <li><span class="text-info">降水確率を表す chanceOfRain を追加しました。今日と明日の 0時～6時・6時～12時・12時～18時・18時～24時 の降水確率を取得できます</span>（明後日は取得できず、常に --% になります）。</li>
          <ul>
            <li>今日分の降水確率のうち、過ぎた分（例・12時にアクセスしたときの0時～6時の降水確率）は --% と表示されます。</li>
          </ul>
          <li>コードは <a href="https://github.com/tsukumijima/weather-api" target="_blank">GitHub</a> にて公開しています。なにか不具合があれば <a href="https://github.com/tsukumijima/weather-api/issues" target="_blank">Issues</a> へお願いします。</li>
          <ul>
            <li>未検証ですが、自分のサイトでこの API をホストすることも可能です。</li>
          </ul>
        </ul>

      </div>
    </div>
  </div>

  <div id="request-parameter" class="container mt-4 mb-4 px-2 px-lg-3">
    <div class="card">
      <h2 class="card-header font-weight-bold"><i class="fas fa-paper-plane"></i>リクエストパラメータ</h2>
      <div class="card-body p-sm-4 pb-4">
        <div>
          <p>
            JSON データをリクエストする際のベースとなる URL は以下になります。<br>
            <span style="color:#d00;"><strong>{{ url('/') }}/api/forecast</strong></span><br>
            この URL に下の表のパラメータを加え、実際にリクエストします。
          </p>
          
          <table class="table">
            <tr>
              <th class="title" nowrap>パラメータ名</th>
              <th class="title">説明</th>
            </tr>
            <tr>
              <th>city</th>
              <td>
                地域別に定義された ID 番号を表します。<br>
                リクエストする地域と ID の対応は、livedoor 天気で使われていた <a href="{{ url('/') }}/primary_area.xml" target="_blank">全国の地点定義表</a> 内で<br>「一次細分区域（cityタグ）」の ID をご参照ください。（例・佐賀県 伊万里 = 410020 ）
              </td>
            </tr>
          </table>
          
          <div class="column d-inline-block px-4 py-3" style="border: 1px solid #dee2e6; width: 100%;">
            <strong>（例）「福岡県・久留米の天気」を取得する場合</strong><br>
            <div>
              下記 URL にアクセスして JSON データを取得します。http:// でのアクセスも可能です。<br>
              基本 URL + 久留米の ID (400040)
            </div>
            <a href="{{ url('/') }}/api/forecast/city/400040" target="_blank">{{ url('/') }}/api/forecast/city/400040</a>
            <div>
              クエリで取得することもできます。
            </div>
            <a href="{{ url('/') }}/api/forecast?city=400040" target="_blank">{{ url('/') }}/api/forecast?city=400040</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="response-field" class="container mt-4 px-2 px-lg-3">
    <div class="card">
      <h2 class="card-header font-weight-bold"><i class="fas fa-reply"></i>レスポンスフィールド</h2>
      <div class="card-body p-sm-4 pb-4">

        <p>
          取得した JSON データは以下の定義に基づいて構成されています（プロパティ名は順不同）。<br>
          <u>下線</u> の項目はこの API で新たに追加されたプロパティです。<br>
        </p>
  
        <table class="table mt-4" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th class="title" nowrap>プロパティ名</th>
            <th class="title">内容</th>
          </tr>
          <tr>
            <th class="thline">publicTime</th>
            <td class="tdline">予報の発表日時（ ISO8601 形式 / 例・2020-09-01T05:00:00+09:00 ）</td>
          </tr>
          <tr>
            <th class="thline"><u>formattedPublicTime</u></th>
            <td class="tdline">予報の発表日時（例・2020/09/01 05:00:00 ）</td>
          </tr>
          <tr>
            <th class="thline"><u>publishingOffice</u></th>
            <td class="tdline">予報を発表した気象台の名前（例・福岡管区気象台）</td>
          </tr>
          <tr>
            <th class="thline">title</th>
            <td class="tdline">タイトル・見出し（例・福岡県 久留米 の天気）</td>
          </tr>
          <tr>
            <th class="thline">link</th>
            <td class="tdline">リクエストされたデータの地域に該当する気象庁 HP の天気予報の URL</td>
          </tr>
          <tr>
            <th class="thline">description</th>
            <td class="tdline">
              <div style="margin-bottom: 12px;">天気概況文</div>
              <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                <tr>
                  <th class="title" nowrap>プロパティ名</th>
                  <th class="title" width="98%">内容</th>
                </tr>
                <tr>
                  <th class="thline">publicTime</th>
                  <td class="tdline">天気概況文の発表時刻（ ISO8601 形式 / 例・2020-09-01T04:52:00+09:00 ）</td>
                </tr>
                <tr>
                  <th class="thline"><u>formattedPublicTime</u></th>
                  <td class="tdline">天気概況文の発表時刻（例・2020/09/01 04:52:00 ）</td>
                </tr>
                <tr>
                  <th class="thline"><u>headlineText</u></th>
                  <td class="tdline">天気概況文（見出しのみ）</td>
                </tr>
                <tr>
                  <th class="thline"><u>bodyText</u></th>
                  <td class="tdline">天気概況文（本文のみ）</td>
                </tr>
                <tr>
                  <th class="thline">text</th>
                  <td class="tdline">天気概況文</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <th class="thline">forecasts</th>
            <td class="tdline">
              <div style="margin-bottom: 12px;">都道府県天気予報の予報日毎の配列</div>
              <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                <tr>
                  <th class="title" nowrap>プロパティ名</th>
                  <th class="title" width="98%">内容</th>
                </tr>
                <tr>
                  <th class="thline">date</th>
                  <td class="tdline">予報日</td>
                </tr>
                <tr>
                  <th class="thline">dateLabel</th>
                  <td class="tdline">予報日（今日・明日・明後日のいずれか）</td>
                </tr>

                <tr>
                  <th class="thline">telop</th>
                  <td class="tdline">天気（晴れ、曇り、雨など）</td>
                </tr>
                
                <tr>
                  <th class="thline"><u>detail</u></th>
                  <td class="tdline">
                    <div style="margin-bottom: 12px;">
                      天気詳細<br>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                      <tr>
                        <th class="title" nowrap>プロパティ名</th>
                        <th class="title" width="98%">内容</th>
                      </tr>
                      <tr>
                        <th class="thline">weather</th>
                        <td class="tdline">詳細な天気情報</td>
                      </tr>
                      <tr>
                        <th class="thline">wind</th>
                        <td class="tdline">風の強さ</td>
                      </tr>
                      <tr>
                        <th class="thline">wave</th>
                        <td class="tdline">波の高さ（海沿いの地域のみ）</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <th class="thline">temperature</th>
                  <td class="tdline">
                    <div style="margin-bottom: 12px;">
                      <strong>max</strong>・・・最高気温<br>
                      <strong>min</strong>・・・最低気温
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                      <tr>
                        <th class="title" nowrap>プロパティ名</th>
                        <th class="title" width="98%">内容</th>
                      </tr>
                      <tr>
                        <th class="thline">celsius</th>
                        <td class="tdline">摂氏 (°C)</td>
                      </tr>
                      <tr>
                        <th class="thline">fahrenheit</th>
                        <td class="tdline">華氏 (°F)</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <th class="thline"><u>chanceOfRain</u></th>
                  <td class="tdline">
                    <div style="margin-bottom: 12px;">
                      降水確率<br>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                      <tr>
                        <th class="title" nowrap>プロパティ名</th>
                        <th class="title" width="98%">内容</th>
                      </tr>
                      <tr>
                        <th class="thline">T00_06</th>
                        <td class="tdline">0 時から 6 時までの降水確率</td>
                      </tr>
                      <tr>
                        <th class="thline">T06_12</th>
                        <td class="tdline">6 時から 12 時までの降水確率</td>
                      </tr>
                      <tr>
                        <th class="thline">T12_18</th>
                        <td class="tdline">12 時から 18 時までの降水確率</td>
                      </tr>
                      <tr>
                        <th class="thline">T18_24</th>
                        <td class="tdline">18 時から 24 時までの降水確率</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <th class="thline">image</th>
                  <td class="tdline">
                    <div style="margin-bottom: 12px;">
                      天気アイコン<br>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                      <tr>
                        <th class="title" nowrap>プロパティ名</th>
                        <th class="title" width="98%">内容</th>
                      </tr>
                      <tr>
                        <th class="thline">title</th>
                        <td class="tdline">天気（晴れ、曇り、雨など）</td>
                      </tr>
                      <tr>
                        <th class="thline">url</th>
                        <td class="tdline">天気アイコンの URL（SVG 画像）</td>
                      </tr>
                      <tr>
                        <th class="thline">width</th>
                        <td class="tdline">天気アイコンの幅</td>
                      </tr>
                      <tr>
                        <th class="thline">height</th>
                        <td class="tdline">天気アイコンの高さ</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <th class="thline">location</th>
            <td class="tdline">
              <div style="margin-bottom: 12px;">予報を発表した地域を定義</div>
              <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                <tr>
                  <th class="title" nowrap>プロパティ名</th>
                  <th class="title" width="98%">内容</th>
                </tr>
                <tr>
                  <th class="thline">area</th>
                  <td class="tdline">地方名（例・九州）</td>
                </tr>
                <tr>
                  <th class="thline">prefecture</th>
                  <td class="tdline">都道府県名（例・福岡県）</td>
                </tr>
                <tr>
                  <th class="thline"><u>district</u></th>
                  <td class="tdline">一次細分区域名（例・北九州地方）</td>
                </tr>
                <tr>
                  <th class="thline">city</th>
                  <td class="tdline">気象観測所名（例・八幡）</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <th class="thline">copyright</th>
            <td class="tdline">
              <table cellpadding="0" cellspacing="0" width="100%" class="tableline">
                <tr>
                  <th class="title" nowrap>プロパティ名</th>
                  <th class="title" width="98%">内容</th>
                </tr>
                <tr>
                  <th class="thline">title</th>
                  <td class="tdline">コピーライトの文言</td>
                </tr>
                <tr>
                  <th class="thline">link</th>
                  <td class="tdline">天気予報 API（livedoor 天気互換）の URL</td>
                </tr>
                <tr>
                  <th class="thline">image</th>
                  <td class="tdline">天気予報 API（livedoor 天気互換）のアイコン</td>
                </tr>
                <tr>
                  <th class="thline">provider</th>
                  <td class="tdline">天気予報 API（livedoor 天気互換）で使用している気象データの配信元（気象庁）</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

      </div>
    </div>
  </div>

  <div id="json-data-sample" class="container mt-4 mb-4 pb-4 pb-sm-0 px-2 px-lg-3">
    <div class="card">
      <h2 class="card-header font-weight-bold"><i class="fas fa-code"></i>JSON データサンプル</h2>
      <div class="card-body p-sm-4">
        
        <p class="mb-4">livedoor 天気の API では ASCII の範囲外の文字はすべてエスケープされていましたが、この API ではエスケープは行いません。</p>

        <pre>{
    "publicTime": "2021-03-03T05:00:00+09:00",
    "formattedPublicTime": "2021/03/03 05:00:00",
    "publishingOffice": "福岡管区気象台",
    "title": "福岡県 久留米 の天気",
    "link": "https://www.jma.go.jp/bosai/forecast/#area_type=offices&area_code=400000",
    "description": {
        "publicTime": "2021-03-03T04:43:00+09:00",
        "formattedPublicTime": "2021/03/03 04:43:00",
        "headlineText": "福岡、北九州地方では、３日夕方まで高波に注意してください。福岡県では、４日まで空気の乾燥した状態が続くため、火の取り扱いに注意してください。",
        "bodyText": "　福岡県は、寒気の影響により曇りとなっている所がありますが、高気圧に覆われて概ね晴れています。\n\n　３日は、寒気の影響によりはじめ曇りとなる所がありますが、高気圧に覆われて概ね晴れとなるでしょう。\n\n　４日は、高気圧に覆われて晴れとなる所もありますが、気圧の谷や湿った空気の影響により概ね曇りで、夜遅くは雨となるでしょう。",
        "text": "福岡、北九州地方では、３日夕方まで高波に注意してください。福岡県では、４日まで空気の乾燥した状態が続くため、火の取り扱いに注意してください。\n\n　福岡県は、寒気の影響により曇りとなっている所がありますが、高気圧に覆われて概ね晴れています。\n\n　３日は、寒気の影響によりはじめ曇りとなる所がありますが、高気圧に覆われて概ね晴れとなるでしょう。\n\n　４日は、高気圧に覆われて晴れとなる所もありますが、気圧の谷や湿った空気の影響により概ね曇りで、夜遅くは雨となるでしょう。"
    },
    "forecasts": [
        {
            "date": "2021-03-03",
            "dateLabel": "今日",
            "telop": "晴れ",
            "detail": {
                "weather": "晴れ",
                "wind": "北の風",
                "wave": "０．５メートル"
            },
            "temperature": {
                "min": {
                    "celsius": null,
                    "fahrenheit": null
                },
                "max": {
                    "celsius": "14",
                    "fahrenheit": "57.2"
                }
            },
            "chanceOfRain": {
                "T00_06": "--%",
                "T06_12": "0%",
                "T12_18": "0%",
                "T18_24": "0%"
            },
            "image": {
                "title": "晴れ",
                "url": "https://www.jma.go.jp/bosai/forecast/img/100.svg",
                "width": 80,
                "height": 60
            }
        },
        {
            "date": "2021-03-04",
            "dateLabel": "明日",
            "telop": "曇のち一時雨",
            "detail": {
                "weather": "くもり　時々　晴れ　夜遅く　雨",
                "wind": "北の風　後　北東の風",
                "wave": "０．５メートル"
            },
            "temperature": {
                "min": {
                    "celsius": "4",
                    "fahrenheit": "39.2"
                },
                "max": {
                    "celsius": "18",
                    "fahrenheit": "64.4"
                }
            },
            "chanceOfRain": {
                "T00_06": "10%",
                "T06_12": "10%",
                "T12_18": "20%",
                "T18_24": "60%"
            },
            "image": {
                "title": "曇のち一時雨",
                "url": "https://www.jma.go.jp/bosai/forecast/img/212.svg",
                "width": 80,
                "height": 60
            }
        },
        {
            "date": "2021-03-05",
            "dateLabel": "明後日",
            "telop": "雨のち曇",
            "detail": {
                "weather": null,
                "wind": null,
                "wave": null
            },
            "temperature": {
                "min": {
                    "celsius": "10",
                    "fahrenheit": "50"
                },
                "max": {
                    "celsius": "20",
                    "fahrenheit": "68"
                }
            },
            "chanceOfRain": {
                "T00_06": "70%",
                "T06_12": "70%",
                "T12_18": "70%",
                "T18_24": "70%"
            },
            "image": {
                "title": "雨のち曇",
                "url": "https://www.jma.go.jp/bosai/forecast/img/313.svg",
                "width": 80,
                "height": 60
            }
        }
    ],
    "location": {
        "area": "九州",
        "prefecture": "福岡県",
        "district": "筑後地方",
        "city": "久留米"
    },
    "copyright": {
        "title": "(C) 天気予報 API（livedoor 天気互換）",
        "link": "{{ url('/') }}/",
        "image": {
            "title": "天気予報 API（livedoor 天気互換）",
            "link": "{{ url('/') }}/",
            "url": "{{ url('/') }}/logo.png",
            "width": 120,
            "height": 120
        },
        "provider": [
            {
                "link": "https://www.jma.go.jp/jma/",
                "name": "気象庁 Japan Meteorological Agency",
                "note": "気象庁 HP にて配信されている天気予報を json データへ編集しています。"
            }
        ]
    }
}</pre>

      </div>
    </div>
  </div>

  <footer id="footer" class="footer bg-dark">
    <div class="container d-flex flex-column align-items-center align-items-sm-end pt-3 pb-3">
      <div class="d-inline text-white text-center text-sm-right">
        <a class="mr-1">© 2020 - {{ date('Y') }}</a>
        <br class="d-inline d-sm-none">
        天気予報 API（livedoor 天気互換）
      </div>
    </div>
  </footer>

</body>
</html>
