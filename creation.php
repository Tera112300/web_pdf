
<?php include('header.php'); ?>
<?php
if ( isset( $_COOKIE[ 'history_info' ] ) ) {
  $history_info = unserialize( $_COOKIE[ 'history_info' ] ); //クッキーに保存されたinfoを配列にする
}
if ( isset( $_COOKIE[ 'history_link' ] ) ) {
  $history_link = unserialize( $_COOKIE[ 'history_link' ] ); //クッキーに保存されたinfoを配列にする
}
$project_name;
$project_detail;
$decision = false;
/*$count = 0;*/
if ( isset( $_COOKIE[ 'history_item' ] ) ) {
  $link_parameter = "";

  if ( isset( $_GET[ 'link' ] ) ) {
    $link_parameter = $_GET[ 'link' ];
  }
  $history_item = unserialize( $_COOKIE[ 'history_item' ] ); //クッキーに保存されたテキストを配列にする
  $i = 0;

  foreach ( $history_item as $key => $val ) {
    $count = $i;
    //echo $val;
    if ( $link_parameter == $history_link[ $i ] ) {
      $project_name = $val;
      $project_detail = $history_info[ $i ];

      /*echo $count;*/
      $decision = true;
    }

    $i++;
  }

}

?>
<div class="container container_st" id="wrap">
  <!-- <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
    <strong>test.jpg</strong>をアップロード出来ませんでした。</div>-->
	<ol class="breadcrumb">
    <li><a href="index.php"><span class="fa fa-home" aria-hidden="true"></span> トップ</a></li>
    <li class="active">PDF作成</li>
  </ol>
  <div class="well"> WEBブラウザ上でPDFを作成できるジェネレーターです。 </div>
  <form action="pdf.php" method="post" enctype="multipart/form-data" id="pdf_form">
    <div class="input-group"> <span class="input-group-addon">プロジェクト名</span>
      <?php if($decision): ?>
      <input type="text" class="form-control" placeholder="PDFを作成する際に、履歴として保存されます。" name="project" id="project" required value=<?php echo $project_name; ?>>
      <?php else: ?>
      <input type="text" class="form-control" placeholder="PDFを作成する際に、履歴として保存されます。" name="project" id="project" required>
      <?php endif; ?>
    </div>
    <textarea class="form-control" id="detail" name="detail" rows="5">
	<?php
	if ( $decision ) {
	  echo $project_detail;
	}
	?>
	 </textarea>
    <button class="btn btn-primary" id="create">作成</button>
    <button class="btn btn-danger" id="danger" type="button">削除</button>
  </form>
</div>
<?php include('footer.php'); ?>