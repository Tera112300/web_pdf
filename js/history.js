$(function(){
	
	$("#btn_history").on("click",function(){
		$("#sampleModal").modal('show');
	});
	$("#sampleModal #btn_close").on("click",function(){
		$(this).parents("#sampleModal").modal('hide');
		$("#list_js").remove();
		$(".pager li a").attr("href","#");
		$(".pager li").addClass("disabled");
		$.removeCookie('history_item', { path: '/' });
		$.removeCookie('history_info', { path: '/' });
		$.removeCookie('history_link', { path: '/' });
	});
	//$.removeCookie('history_item', { path: '/' });
	var $cooki = $.cookie( "history_item" );
	
	console.log($cooki);
});