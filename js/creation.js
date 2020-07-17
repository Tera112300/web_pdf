$(function () {

  function alert_dom(alert_img,alert_txt,class_name) {
    $("<div>", {
      class: 'alert alert-dismissible alert-hidden',
      html: '<button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button><strong>' + alert_img + '</strong>' + alert_txt
    }).prependTo('#wrap').addClass(class_name).slideDown("slow").delay(2700).queue(function () {
      $(this).slideUp("slow", function () {
        $(this).remove();
      }).dequeue();
    });
  }
 /* $(".alert").each(function () {

  });*/
	$("#danger").on("click",function(){
		$(".note-editable").empty();
		$("#detail").val("");
		$("#project").val("");
	});
  $('#detail').summernote({
    height: 900,
    fontNames: ["YuGothic", "Yu Gothic", "Hiragino Kaku Gothic Pro", "Meiryo", "sans-serif", "Arial", "Arial Black", "Comic Sans MS", "Courier New", "Helvetica Neue", "Helvetica", "Impact", "Lucida Grande", "Tahoma", "Times New Roman", "Verdana"],
    lang: "ja-JP",
    callbacks: {
      onImageUpload: function (files) {
        data = new FormData();
        data.append("files", files[0]);
        $.ajax({
          data: data,
          type: "POST",
          url: "img_creation.php",
          cache: false,
          contentType: false,
          processData: false
          /*success: function(url) {
			  console.log(data);
			 //console.log(files[0].name);
              //アップロードが成功した後の画像を書き込む処理
              $('#detail').summernote('insertImage',files[0].name);
          }*/
        }).done(function (url) {
          if (url == "can_not") {
            alert_dom(files[0].name, "をアップロードに失敗しました。","alert-warning");
          } else if (url == "not_selected") {
            alert_dom("エラー", "ファイルが選択されていません。","alert-danger");
          } else {
            $('#detail').summernote('insertImage', url);
            alert_dom(files[0].name, "をアップロードに成功しました。","alert-success");
          }
          //alert_dom.prependTo('#wrap');
          // ...
        });
      }
    }
  });
});
