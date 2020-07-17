<?php
$pdf_project = $_POST[ 'project' ];
$pdf_info = $_POST[ 'detail' ];
?>
<?php
/*$data_item = array($pdf_project,$pdf_info); //ここに保存したいテキスト（配列にしとく）*/
$data_item = [ $pdf_project ]; //ここに保存したいテキスト（配列にしとく）
$data_info = [$pdf_info];
$data_link = [date("Ymd-His").$pdf_project];
$max = '50'; //保存する数

//テキストの保存
if ( isset( $_COOKIE[ 'history_item' ] ) ) { //現在クッキーに保存されているものがあれば
  $status = unserialize( $_COOKIE[ 'history_item' ] ); //まずアンシリアライズ（？）で配列に
  foreach ( $status as $key => $name ) {
    if ( !in_array( $name, $data_item ) ) { // data_itemにnameがなければ
      /* array_push($data_item,$name);　// data_itemに突っ込む*/


      array_push( $data_item, $name );
    }

    if ( count( $data_item ) == $max ) { //保存する数で終了
      break;
    }
  }
}


//info保存　テキスト保存とやってることは一緒
if ( isset( $_COOKIE[ 'history_info' ] ) ) {
  $status = unserialize( $_COOKIE[ 'history_info' ] );
  foreach ( $status as $key => $name ) {
    if ( !in_array( $name, $data_info ) ) {
      array_push( $data_info, $name );
    }
    if ( count( $data_info ) == $max ) {
      break;
    }
  }
}

//info保存　テキスト保存とやってることは一緒
if ( isset( $_COOKIE[ 'history_link' ] ) ) {
  $status = unserialize( $_COOKIE[ 'history_link' ] );
  foreach ( $status as $key => $name ) {
    if ( !in_array( $name, $data_link ) ) {
      array_push( $data_link, $name );
    }
    if ( count( $data_link ) == $max ) {
      break;
    }
  }
}


//クッキーセット
setcookie( 'history_item', serialize( $data_item ), time() + 3600, '/' );
setcookie( 'history_info', serialize( $data_info ), time() + 3600, '/' );
setcookie( 'history_link', serialize( $data_link ), time() + 3600, '/' );