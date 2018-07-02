<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>用户指南</title>

<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="./css/animate.min.css" rel="stylesheet" media="all">
<link href="./css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
<link rel="icon" href="/img/seedo.ico" type="image/x-icon">
</head>
<body >
<style>
#bootstrap-touch-slider{
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    margin: auto;
	background: white;
}
</style>
	<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
				<li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
				<li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper For Slides -->
			<div class="carousel-inner" role="listbox">

				<!-- Third Slide -->
				<div class="item active">

					<!-- Slide Background -->
					<img src="./img/guide-1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
					<!--<div class="bs-slider-overlay"></div>-->

					<div class="container">
						<div class="row">
							
						</div>
					</div>
				</div>
				<!-- End of Slide -->

				<!-- Second Slide -->
				<div class="item">

					<!-- Slide Background -->
					<img src="./img/guide-2.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
					<!--<div class="bs-slider-overlay"></div>-->
				</div>
				<!-- End of Slide -->

				<!-- Third Slide -->
				<div class="item">

					<!-- Slide Background -->
					<img src="./img/guide-3.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
					<!--<div class="bs-slider-overlay"></div>-->
					<!-- Slide Text Layer -->
				</div>
				<!-- End of Slide -->
				<!-- fourth Slide -->
				<div class="item">

					<!-- Slide Background -->
					<img src="./img/guide-4.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
					<!--<div class="bs-slider-overlay"></div>-->
					<!-- Slide Text Layer -->
				</div>
				<!-- End of Slide -->


			</div><!-- End of Wrapper For Slides -->

			<!-- Left Control -->
			<a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div> <!-- End  bootstrap-touch-slider Slider -->

<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script src="js/bootstrap-touch-slider.js"></script>
<script type="text/javascript">
	$('#bootstrap-touch-slider').bsTouchSlider();
</script>


</body>
</html>