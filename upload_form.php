<?php
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:'. gmdate( 'D, d M Y H:i:s' ). 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');
?>


<?php
require_once "./dbc.php";

?>
<!-- ①フォームの説明 -->
<!-- ②$_FILEの確認 -->
<!-- ③バリデーション -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>アップロードフォーム</title>
  </head>
  <style>


    body {
      padding: 30px;
      margin: 0 auto;
      width: 600px;
    }

    .title {
      width:70%;
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;

    } 

    button, input, select, textarea, pre, th, td, li, dt, dd {
        font-family: inherit;
        font-size: 1rem;
      }

    p {
      margin-bottom: 0px;
    }

    textarea {
      width: 70%;
      height: 60px;
    }
    .file-up {
      margin-bottom: 10px;
    }

    .input_text {
      width: 70%;
      height:30px;
    }
    .submit {
      width:70%;
      text-align: center;
    }
    .btn {
      display: inline-block;
      border-radius: 3px;
      font-size: 18px;
      background: #67c5ff;
      border: 2px solid #67c5ff;
      padding: 5px 10px;
      color: #fff;
      cursor: pointer;
      margin-bottom: 200px;
    }

    img {
      width:100%;
    }

    .wrap {
      display:flex;
      width:100%;
    }

    .text_output {
      width:50%;
      margin-bottom:10px
    }

    .text_table {
      table-layout: fixed;
      width: 99%;
    }

    .text_table td{
      word-wrap: break-word;
    }

    .product_image {
      width:50%;
    }

    .title2 {
      width:100%;
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;

    } 
  </style>
  <body>
    <form enctype="multipart/form-data" class = "upload_form" action="./file_upload.php" method="post">
      <p class="title">落とし物登録システム</P>
      <div class="file-up">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input name="img" type="file" accept="image/*" onclick="gps_get()" required/>
      </div>
      <div>
        <p>品名（必須）</P>
        <input class = "input_text" type="text" name="hinmei" required/>
        <p>色（任意）</P>
        <input class = "input_text" type="text" name="color"/>
        <p>サイズ（任意）</P>
        <input class = "input_text" type="text" name="size"/>
        <p>ブランド・製造元（任意）</P>
        <input class = "input_text" type="text" name="brands" id="brands"/>
        <p>発見後の対応（必須）etc.公園のベンチに置いてきた。●●警察に届けた等</P>
        <textarea
          name="caption"
          id="caption"
          required></textarea>
      </div>
      <div class="submit">
        <input type="submit" value="送信" class="btn"/>
      </div>
    </form>

  <!-- //緯度経度の取得 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

  function success(pos){
      var lat = pos.coords.latitude;
      var lng = pos.coords.longitude;


    const html = `
      <input type="hidden" name="latitude" value="${lat}"/>
      <input type="hidden" name="longitude" value="${lng}"/>
    `;

    let container = $(".upload_form");
    container.append(html);
  }

  function fail(pos){
  alert('位置情報の取得に失敗しました。エラーコード：');
  }

  function gps_get() {
  navigator.geolocation.getCurrentPosition(success,fail);
  };
  </script>

 <!-- 直近のものから降順に一覧表示 -->
    <p class="title2">落とし物一覧（最近のもの順）</p>
    <?php $files = getAllFile();
    foreach($files as $file):?>
      <div class="wrap">
        <div class = "text_output">
          <table class ="text_table" border = "1">
            <tr>
            <td width=30%>入力日時</td>
            <td><?php echo h("{$file['insert_date']}"); ?></td>
            </tr>
            <tr>
            <td>品名</td>
            <td><?php echo h("{$file['hinmei']}"); ?></td>
            </tr>
            <tr>
            <td>色</td>
            <td><?php echo h("{$file['color']}"); ?></td>
            </tr>
            <tr>
            <td>サイズ</td>
            <td><?php echo h("{$file['size']}"); ?></td>
            </tr>
            <tr>
            <td>ブランド・製造元</td>
            <td><?php echo h("{$file['brand']}"); ?></td>
            </tr>
            <tr>
            <td>発見後の対応</td>
            <td><?php echo h("{$file['description']}"); ?></td>
            </tr>
          </table>

          <!-- <button onclick="GetMap()">地図</button> -->
          <!-- <a href ="./map.php">地図</a> -->
          <form enctype="multipart/form-data" class = "map_form" action="./map.php" method="post">
          <input type="hidden" name="hinmei" value= <?=$file['hinmei']?>>
          <input type="hidden" name="latitude" value= <?=$file['latitude']?>>
          <input type="hidden" name="longitude" value= <?=$file['longitude']?>>
          <input type="submit" value="地図" class="map"/>
          </form>
        </div>
        <div class = "product_image">
          <img src="<?php echo "{$file['file_path']}"; ?>" alt="">
        </div>
      </div>
      <?php endforeach; ?>
    
  </body>
</html>
