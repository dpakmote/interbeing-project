// Javascript codes
//function changeColor(code,id){
//	if (code=="grey"){
//		document.getElementById(id).style.backgroundColor="#ccc";
//	}
//	else {
//		// ip.style.backgroundColor="white";
//		mouseOut(id);
//	}
//}
//
//function hover(id){
//	document.getElementById(id).style.backgroundColor="green";
//}
//
//function mouseOut(id){
//	document.getElementById(id).style.backgroundColor="white";	
//}
//

// JQuery Code
$(document).ready(function(){
    $(".hover").hover(function(){
        $(this).css({"background-color":"green"});
    },
        function(){
        $(this).css({"background-color":"white"});
    });
});