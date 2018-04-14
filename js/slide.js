function slide() {
	var ke = $("#ke").val();
	//alert(ke)
	$("#img").css("transform", "translateX("+ke*-25+"%)");
	if (ke == 3) {
		$("#ke").val(0);
	} else {
		ke = $("#ke").val(Number(ke)+1);
	}
	setTimeout("slide()", 4000);
}