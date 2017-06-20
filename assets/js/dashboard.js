$(document).ready(function(){
	$("#logout").click(function(){
		$.ajax({
			url:"/interbeing-project/logout",
			success:function(data){
				window.location=data;
			},
			error:function(err){
				alert("System encountered an error. Try again.");
				//console.log(err);
			}
		});

	});
	$("#update_profile").click(function(){
		var fname= $("#fname").val();
		$.ajax({
			url:"/interbeing-project/update",
			type:"POST",
			data:{"fname":fname, "lname":lname},
			success:function(data){
				if(data==1){
					alert("updated successfully");	
				}
				else(data==0){
					alert("Update Error. Try again");
				}
			},
			error:function(){
				alert("Update Error. Try again");
			}
		});
	)};
	$(".userdetails").blur(function(){
		$(this).attr("disabled","disabled")
	});
});

function edit (id){
	$(".userdetails").trigger("blur");
	$("#"+id).removeAttr("disabled");
};