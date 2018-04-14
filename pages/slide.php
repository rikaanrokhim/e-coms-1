<html>
<head> 
	<script src="../js/jquery-2.1.1.js"></script>
	<script src="../js/slide.js"></script>
	
<style>
#con {
	width : 100%;
	height: auto;
	overflow: hidden;
}		
#img {
	width: 400%;
	-webkit-transition: all ease 1.5s;
	-moz-transition: all ease 1.5s;
}
#img img {
	float: left;
	width: 25%;
}
</style>
</head>
<body onload="slide()">
	<div id="con">
		<div id="img" style="transform:translateX(0%);">
			<img src="../images/s2.jpg" />
			<img src="../images/s4.jpg" />
			<img src="../images/s3.jpg" />
			<img src="../images/s1.jpg" />
		</div>
	</div>
	<input type="hidden" name="ke" value="0" id="ke" />
</body>
</html>