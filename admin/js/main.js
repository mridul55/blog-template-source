$(document).ready(function(){
	$(document).on("keyup","#username",function(e){
		e.preventDefault();
		var username = $(this).val();
		$.ajax({
			url:"../check/username.php",
			type:"post",
			dataType:"text",
			data:{username:username},
			success:function(data){
				$("#success").html(data);
			}
		});
	});
});