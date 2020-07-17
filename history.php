<?php include('header.php'); ?>
<div class="container container_st" id="wrap"> 
  <!-- <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
    <strong>test.jpg</strong>をアップロード出来ませんでした。</div>-->
  <ol class="breadcrumb">
    <li><a href="index.php"><span class="fa fa-home" aria-hidden="true"></span> トップ</a></li>
    <li class="active">履歴</li>
  </ol>
  <div class="btn_wrap">
    <ul class="clearfix">
      <li class="btn btn-primary"><a href="creation.php">新規作成</a></li>
      <li class="btn btn-danger" id="btn_history">履歴削除</li>
    </ul>
  </div>
  <div class="list_wrap"> 
    
    <!--<li><a href="#">csss</a><span class="close_cp">✕</span></li>
        <li><a href="#">csss</a><span class="close_cp">✕</span></li>-->
    <?php
    $max_count = 2;
    $link_parameter = 1;

    if ( isset( $_GET[ 'pager' ] ) ) {
      $link_parameter = $_GET[ 'pager' ];
    }
    $start_no = ( $link_parameter - 1 ) * $max_count;
    //echo $start_no;
    $history_count = "";
    $max_page = "";
    if ( isset( $_COOKIE[ 'history_item' ] ) ) {
      $history_item = unserialize( $_COOKIE[ 'history_item' ] ); //クッキーに保存されたinfoを配列にする
    }
    if ( isset( $_COOKIE[ 'history_link' ] ) ) {
      $history_link = unserialize( $_COOKIE[ 'history_link' ] ); //クッキーに保存されたinfoを配列にする
    }
    if ( isset( $_COOKIE[ 'history_info' ] ) ) {
      $history_info = unserialize( $_COOKIE[ 'history_info' ] ); //クッキーに保存されたテキストを配列にする
      $i = 0;
      $history_count = count( $history_info ); //クッキーの数取得
      $max_page = ceil( $history_count / $max_count ); //ページ数を取得

      echo '<ul class="cp_list" id="list_js">';
      foreach ( $history_info as $key => $val ) {
        //echo $val;
        if ( $max_count > $i && ( $i + $start_no ) < $history_count ) {

          //1ページ目は0に
          echo '<li><a href="creation.php?link=' . $history_link[ $i + $start_no ] . '">' . $history_item[ $i + $start_no ] . '</a></li>';


        }
        /*echo $val[1];*/

        //echo '<li><a href="'.$history_url[$i].'">'.$val.'</a></li>'; //テキストを表示および同じ順番に保存されているURLを表示
        $i++;
      }
      echo '</ul>';
    } else {
      echo '<p>過去に作成したPDFはありません。</p>';
    }
    ?>
  </div>
  <ul class="pager">
    <?php
    if ( $link_parameter > 1 ) {
      echo '<li><a href="history.php?pager=' . ( $link_parameter - 1 ) . '">前へ</a></li>';
    } else {
      echo '<li class="disabled"><a href="#" disabled="disabled">前へ</a></li>';
    }
    ?>
    <!--<li><a href="#">前へ</a></li>-->
    <?php
    if ( $link_parameter < $max_page ) {
      echo '<li><a href="history.php?pager=' . ( $link_parameter + 1 ) . '">次へ</a></li>';
    } else {
      echo '<li class="disabled"><a href="#">次へ</a></li>';
    }
    ?>
  </ul>
  <!-- <div class="history_link"><a href="#" class="btn btn-default btn-block">新規作成</a></div>--> 
  
</div>
<!-- モーダル・ダイアログ -->
<div class="modal fade" id="sampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        <h4 class="modal-title">PDFジェネレーターの内容</h4>
      </div>
      <div class="modal-body"> 削除してもよろしいでしょうか？ </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
        <button type="button" class="btn btn-primary" id="btn_close">削除</button>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
