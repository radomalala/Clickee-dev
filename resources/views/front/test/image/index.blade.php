<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>jQuery Zoom Demo</title>
	<style>
		/* styles unrelated to zoom */
		* { border:0; margin:0; padding:0; }
		p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

		/* these styles are for the demo, but are not required for the plugin */
		.zom {
			display:inline-block;
			position: relative;
		}
		
		/* magnifying glass icon */
		.zom:after {
			content:'';
			display:block; 
			width:33px; 
			height:33px; 
			position:absolute; 
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zom img {
			display: block;
		}

		.zom img::selection { background-color: transparent; }

		#ex2 img:hover { cursor: zoom-in; }
		#ex2 img:active { cursor: zoom-out; }
		#ex3 img:hover { cursor: zoom-in; }
		#ex3 img:active { cursor: zoom-out; }
	</style>
	
<script src="{!! URL::to('/') !!}/frontend/js/jquery.js"></script>

<!-- Zoom.min.js -->
<script src="{!! URL::to('/') !!}/frontend/js/jquery.zoom.js"></script>
	<script>
		$(document).ready(function(){
			$('#image-test').zoom();
			$('#ex1').zoom();
			$('#ex2').zoom({ on:'grab' });
			$('#ex3').zoom({ on:'click' });			 
			$('#ex4').zoom({ on:'toggle' });
		});
	</script>
</head>
<body>
	<div class='zom' id='ex1'>
		<img src='http://localhost/alternateeve/public/images/daisy.jpg' width='555' height='320' alt='Daisy on the Ohoopee'/>
	</div>
	<div class='zom' id='ex2'>
		<img src='http://localhost/alternateeve/public/images/roxy.jpg' width='290' height='320' alt='Roxy on the Ohoopee'/>
		<p>Grab</p>
	</div>
	<span class='zom' id='ex3'>
		<img src='http://localhost/alternateeve/public/images/daisy.jpg' width='555' height='320' alt='Daisy on the Ohoopee'/>
		<p>Click to activate</p>
	</span>
	<span class='zom' id='ex4'>
		<img src='http://localhost/alternateeve/public/images/roxy.jpg' width='290' height='320' alt='Roxy on the Ohoopee'/>
		<p>Click to toggle</p>
	</span>
	<span class='zom' id='image-test'>
		<img width='290' height='320' class="image-test" src="http://localhost/alternateeve/public/upload/product/24141_NPTR.jpg" />
	</span>
</body>
</html>
