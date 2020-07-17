<?php require_once('config.php'); ?>

<footer>
<p class="copyright">Copyright © 2020 PDFジェネレーター.</p>	
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-3.4.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--<script src="js/popper.min.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<?php if($dir == "index.php"): ?>
<script>
$(function(){
	$(".sns_btn").delay(1500).queue(function(){
		$(this).addClass("sns_btn_on").dequeue();
	});
});
</script>
<?php elseif($dir == "creation.php"): ?>
<script src="js/summernote.min.js"></script> 
<script src="js/summernote-ja-JP.min.js"></script>
<script src="js/creation.js"></script>
<?php elseif($dir == "history.php"): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="js/history.js"></script>
<?php endif; ?>
</body>
</html>