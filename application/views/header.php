<!DOCTYPE html>
<html>

<head>
<title>Grocellia</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<script src='<?= base_url()?>assets/js/jquery.min.js'></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
	(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "../../../../../../vdo.ai/core/w3layouts/vdo.ai.js");
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125810435-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125810435-1');
</script><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../../www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>
    
    
<body>
<!-- header -->
    <div class="agileits_header">
		<div class="container">
            
            <!-- Promo code -->
			<div class="w3l_offers">
				<p style="font-size:11px">DISKON BESAR BESARAN (UP TO 70%) DENGAN MENGGUNAKAN GO PAY . <a href="products.html">SHOP NOW</a></p>
			</div>
            <!-- /Promo code -->
            
			<div class="agile-login">
                <?php if(!isset($_SESSION['userId'])){ ?>
				<ul>
					<li><a href="<?php echo base_url(). 'grocellia/register' ?>"> Create Account </a></li>
					<li><a href="<?php echo base_url(). 'grocellia/login'?>">Login</a></li>
					<li><a href="contact.html">Help</a></li>
					<?php if(isset($_SESSION['userPosition']) && $_SESSION['userPosition'] == 'Staff'){?>
                    <li><a href="<?= base_url()?>grocellia/dashboard">Back End</a></li>
                    <?php }?>
				</ul>
                <?php } else{ ?>
                <ul>
					<li><a href="<?php echo base_url(). 'grocellia/profile' ?>"> Profile </a></li>
					<li><a href="<?php echo base_url(). 'grocellia/logout'?>">Logout</a></li>
					<li><a href="contact.html">Help</a></li>
					
				</ul>
                <?php } ?>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

    <div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
                    <li><i class="fa fa-phone" aria-hidden="true"></i>Complaints and Suggestions: <br><a href="">grocellia.store@gmail.com</a></li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="<?php echo base_url(). 'grocellia/index' ?>">grocellia</a></h1>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs"z>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url(). 'grocellia/index' ?>" class="act">Home</a></li>	
                        <!-- Mega Menu -->
                        <li class="active"><a href="<?= base_url('grocellia/groceries/all')?>" class="act">Groceries</a></li>

                        <li><a href="<?= base_url('grocellia/about')?>">About</a></li>
                        <li><a href="<?php echo base_url(). 'grocellia/contact' ?>">Contact</a></li>
                        <?php if(isset($_SESSION['userPosition']) && $_SESSION['userPosition'] == 'Staff'){?>
                        <li><a href="<?= base_url()?>dashboard">Back End</a></li>
                        <?php }?>
                        <div style="float:right">
                            <li>
                                    <a href="<?= base_url()?>grocellia/checkout"?>
                                    <button class="w3view-cart" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                                    </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
		
<!-- //navigation -->
