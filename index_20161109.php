<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		
		// conn db parameters
		require_once('db_connect.php');		
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$conn->query("set names 'utf8'");		
				
		// start calculate num items in the basket

		$n_items_in_the_basket = 0;

		if(!isset($_SESSION['cart_items'])){
			$n_items_in_the_basket = 0;
		}				
		else
		{
			$n_items_in_the_basket = count($_SESSION['cart_items']);			
		}
		
		
		$sql_currencies = "select * from currencies where status='1' order by id";
									
		$arr_currencies = array();		
		$results_currencies = mysqli_query($conn, $sql_currencies); 	
		
		while($line = mysqli_fetch_assoc($results_currencies)){
			$arr_currencies[] = $line;
		}

		$sql_is_to_show_banners_front_page = "select * from app_properties where prop_name='is_to_show_banners_front_page' ";
									
		$arr_is_to_show_banners_front_page = array();		
		$results_is_to_show_banners_front_page = mysqli_query($conn, $sql_is_to_show_banners_front_page); 	
		
		while($line = mysqli_fetch_assoc($results_is_to_show_banners_front_page)){
			$arr_is_to_show_banners_front_page[] = $line;
		}	


		$sql_banner_front_page_left_path = "select * from app_properties where prop_name='banner_front_page_left_path' ";
									
		$arr_banner_front_page_left_path = array();		
		$results_arr_banner_front_page_left_path = mysqli_query($conn, $sql_banner_front_page_left_path); 	
		
		while($line = mysqli_fetch_assoc($results_arr_banner_front_page_left_path)){
			$arr_banner_front_page_left_path[] = $line;
		}			
		
		
		$sql_banner_front_page_right_path = "select * from app_properties where prop_name='banner_front_page_right_path' ";
									
		$arr_banner_front_page_right_path = array();		
		$results_arr_banner_front_page_right_path = mysqli_query($conn, $sql_banner_front_page_right_path); 	
		
		while($line = mysqli_fetch_assoc($results_arr_banner_front_page_right_path)){
			$arr_banner_front_page_right_path[] = $line;
		}	

		$sql_banner_front_page_right_alt = "select * from app_properties where prop_name='banner_front_page_right_alt' ";
									
		$arr_banner_front_page_right_alt = array();		
		$results_banner_front_page_right_alt = mysqli_query($conn, $sql_banner_front_page_right_alt); 	
		
		while($line = mysqli_fetch_assoc($results_banner_front_page_right_alt)){
			$arr_banner_front_page_right_alt[] = $line;
		}			
		
		$sql_banner_front_page_left_alt = "select * from app_properties where prop_name='banner_front_page_left_alt' ";
									
		$arr_banner_front_page_left_alt = array();		
		$results_banner_front_page_left_alt = mysqli_query($conn, $sql_banner_front_page_left_alt); 	
		
		while($line = mysqli_fetch_assoc($results_banner_front_page_left_alt)){
			$arr_banner_front_page_left_alt[] = $line;
		}	


		$sql_block_1_items_to_show = "select * from app_properties where prop_name='block_1_items_to_show' ";
									
		$arr_block_1_items_to_show = array();		
		$results_block_1_items_to_show = mysqli_query($conn, $sql_block_1_items_to_show); 	
		
		while($line = mysqli_fetch_assoc($results_block_1_items_to_show)){
			$arr_block_1_items_to_show[] = $line;
		}		
		
		$block_1_items_to_show = $arr_block_1_items_to_show[0]['prop_value'];
		
		
		
		$sql_block_2_items_to_show = "select * from app_properties where prop_name='block_2_items_to_show' ";
									
		$arr_block_2_items_to_show = array();		
		$results_block_2_items_to_show = mysqli_query($conn, $sql_block_2_items_to_show); 	
		
		while($line = mysqli_fetch_assoc($results_block_2_items_to_show)){
			$arr_block_2_items_to_show[] = $line;
		}		
		
		$block_2_items_to_show = $arr_block_2_items_to_show[0]['prop_value'];		
		
		
		
		$sql_block_3_items_to_show = "select * from app_properties where prop_name='block_3_items_to_show' ";
									
		$arr_block_3_items_to_show = array();		
		$results_block_3_items_to_show = mysqli_query($conn, $sql_block_3_items_to_show); 	
		
		while($line = mysqli_fetch_assoc($results_block_3_items_to_show)){
			$arr_block_3_items_to_show[] = $line;
		}		
		
		$block_3_items_to_show = $arr_block_3_items_to_show[0]['prop_value'];		
		
		
		
		
		$sql_block_4_items_to_show = "select * from app_properties where prop_name='block_4_items_to_show' ";
									
		$arr_block_4_items_to_show = array();		
		$results_block_4_items_to_show = mysqli_query($conn, $sql_block_4_items_to_show); 	
		
		while($line = mysqli_fetch_assoc($results_block_4_items_to_show)){
			$arr_block_4_items_to_show[] = $line;
		}		
		
		$block_4_items_to_show = $arr_block_4_items_to_show[0]['prop_value'];			
		
		
		
		$sql_block_5_items_to_show = "select * from app_properties where prop_name='block_5_items_to_show' ";
									
		$arr_block_5_items_to_show = array();		
		$results_block_5_items_to_show = mysqli_query($conn, $sql_block_5_items_to_show); 	
		
		while($line = mysqli_fetch_assoc($results_block_5_items_to_show)){
			$arr_block_5_items_to_show[] = $line;
		}		
		
		$block_5_items_to_show = $arr_block_5_items_to_show[0]['prop_value'];			
		
		
		$sql_is_to_show_product_views = "select * from app_properties where prop_name='is_to_show_product_views' ";
									
		$arr_is_to_show_product_views = array();		
		$results_is_to_show_product_views = mysqli_query($conn, $sql_is_to_show_product_views); 	
		
		while($line = mysqli_fetch_assoc($results_is_to_show_product_views)){
			$arr_is_to_show_product_views[] = $line;
		}		
		
		$is_to_show_product_views = $arr_is_to_show_product_views[0]['prop_value'];		
		
			

		$sql_is_to_show_discount_block = "select * from app_properties where prop_name='is_to_show_discount_block' ";
									
		$arr_is_to_show_discount_block = array();		
		$results_is_to_show_discount_block = mysqli_query($conn, $sql_is_to_show_discount_block); 	
		
		while($line = mysqli_fetch_assoc($results_is_to_show_discount_block)){
			$arr_is_to_show_discount_block[] = $line;
		}		
		
		$is_to_show_discount_block = $arr_is_to_show_discount_block[0]['prop_value'];				
			
		

		$sql_is_to_show_facebook_ad_block = "select * from app_properties where prop_name='is_to_show_facebook_ad_block' ";
									
		$arr_is_to_show_facebook_ad_block = array();		
		$results_is_to_show_facebook_ad_block = mysqli_query($conn, $sql_is_to_show_facebook_ad_block); 	
		
		while($line = mysqli_fetch_assoc($results_is_to_show_facebook_ad_block)){
			$arr_is_to_show_facebook_ad_block[] = $line;
		}		
		
		$is_to_show_facebook_ad_block = $arr_is_to_show_facebook_ad_block[0]['prop_value'];
		
		
		
		if(!isset($_SESSION['the_curr'])){
			$_SESSION['the_curr'] = 1;
			$_SESSION['the_curr_sign'] = '₪';
			$_SESSION['rate'] = 1.00;
			$_SESSION['sign_place'] = 'r';
			$_SESSION['curr_desc'] = 'Новый Израильский Шекель';
			$_SESSION['curr_name'] = 'ILS';
		}		
		
	?>
    
	<!-- the important tags :) -->
    <title>магазин "Crystal Sky" - серебряные украшения, натуральные камни, позолота</title>
    <meta name="keywords" content="ювелирные, украшения, серебро, камни, позолота, магазин, Нацерет-Илит, Нацрат-Иллит, Раско, crystalsky, crystal, sky, crystal sky, Нацрат, Нацерет, Израиль" />
	<meta name="description" content="Магазин CrystalSky - серебряные украшения, натуральные камни, позолота, ювелирные украшения, подарки, сувениры. Адрес: Нацерет-Илит, Мерказ Раско, Ацмон 18, Израиль." />
		
	<!-- Fonts -->
    <link href='assets/css/fonts.css' rel='stylesheet' type='text/css'>		
		
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->			
	
	<link href="assets/css/animate.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.css" rel="stylesheet">		
	<link href="assets/css/crystalsky.css" rel="stylesheet">
		
	<!-- icons -->
		
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">	
	
	<!-- icons -->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.min.js"></script>	
	
  
  <script>
  
		function ILikeIt()
		{			
			var nErrors =0;
			
			if (document.getElementById("like_firstname").value==null || document.getElementById("like_firstname").value=="")
			{
							
				document.getElementById("like_firstname").style.borderColor = "red";
				document.getElementById("like_firstname").style.boxShadow = "3px 3px 3px lightgray";				
				nErrors++;
			}			
			else 
			{
				document.getElementById("like_firstname").style.borderColor = "#e3e3e3";
				document.getElementById("like_firstname").style.boxShadow = "none";	
			}			
			
			if (document.getElementById("like_email").value==null || document.getElementById("like_email").value=="")
			{
							
				document.getElementById("like_email").style.borderColor = "red";
				document.getElementById("like_email").style.boxShadow = "3px 3px 3px lightgray";				
				nErrors++;
			}	
			else if (!validateEmail(document.getElementById("like_email").value))
			{							
				document.getElementById("like_email").style.borderColor = "red";
				document.getElementById("like_email").style.boxShadow = "3px 3px 3px lightgray";							
				nErrors++;			
			}		
			else 
			{
				document.getElementById("like_email").style.borderColor = "#e3e3e3";
				document.getElementById("like_email").style.boxShadow = "none";	
			}			
						
			if (nErrors==0)
			{
			
				var url = "i_like_it.php";
			
				var oData = new FormData(document.forms.namedItem("LikeForm"));
				
				var oReq = new XMLHttpRequest();
				  oReq.open("POST", url, true);
				  oReq.onload = function(oEvent) {
				  
					if (oReq.status == 200) 
					{								
						$('#myDoLike').modal('hide');																																			
						return;					
					} else {
					  alert("Error: " + oReq.status);
					}
				  };
				oReq.send(oData); 

			}			
		}    
    
		$(document).ready(function () {

			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			});

			$('.scrollup').click(function () {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});

		});  
  
		function doLike(n,t)
		{					
			document.getElementById("like_firstname").style.borderColor = "#e3e3e3";
			document.getElementById("like_firstname").style.boxShadow = "none";			
			
			document.getElementById("like_email").style.borderColor = "#e3e3e3";
			document.getElementById("like_email").style.boxShadow = "none";	

			document.getElementById("like_city").style.borderColor = "#e3e3e3";
			document.getElementById("like_city").style.boxShadow = "none";			
		
			document.getElementById("like_phone").style.borderColor = "#e3e3e3";
			document.getElementById("like_phone").style.boxShadow = "none";	
		
			document.getElementById("theItemName").innerHTML = t;
			
			document.getElementById("like_product_id").value = n;
			document.getElementById("like_product_name").value = t;
			
			$("#myDoLike").modal('show');
		}
  
		function wishJewelry()
		{
			alert("Yes");
		}
  
		function currencyChanged(n,s,r,p,d,cn)
		{
			 //alert('n='+n);
			 
			var http = new XMLHttpRequest();
			var url = "set_currency.php";
			var params = "the_curr="+n+"&the_curr_sign="+s+"&rate="+r+"&sign_place="+p+"&curr_desc="+d+"&curr_name="+cn;
			http.open("POST", url, true);

			//Send the proper header information along with the request
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			http.onreadystatechange = function() {//Call a function when the state changes.
				if(http.readyState == 4 && http.status == 200) {
					// alert(http.responseText);
					// refresh the page to update currencies
					
					// window.location.replace("http://crystalsky.co.il/index.php");					
					window.location.reload(true);
				}
			}
			http.send(params);		 
			 
		}
  
		function validateEmail(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}	  

		function subscribeEmail()
		{			
			var nErrors =0;
			
			if (document.getElementById("subscr_email").value==null || document.getElementById("subscr_email").value=="")
			{
							
				document.getElementById("subscr_email").style.borderColor = "red";
				document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";				
				nErrors++;
			}	
			else if (!validateEmail(document.getElementById("subscr_email").value))
			{							
				document.getElementById("subscr_email").style.borderColor = "red";
				document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";							
				nErrors++;			
			}		
			else 
			{
				document.getElementById("subscr_email").style.borderColor = "#e3e3e3";
				document.getElementById("subscr_email").style.boxShadow = "none";	
			}				
						
			if (nErrors==0)
			{
			
				var url = "subscribe_email.php";
			
				var oData = new FormData(document.forms.namedItem("SubscribeEmail"));
				
				var oReq = new XMLHttpRequest();
				  oReq.open("POST", url, true);
				  oReq.onload = function(oEvent) {
				  
					if (oReq.status == 200) 
					{			
						$('#myModalOk').modal('show');																																			
						return;					
					} else {
					  alert("Error: " + oReq.status);
					}
				  };
				oReq.send(oData); 

			}			
		}  
  
		// all thumbnails the same size
		
		 $(document).ready(function() {
			var maxHeight = 0;          
			$(".equalize").each(function(){
			  if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
			});         
			$(".equalize").height(maxHeight);
			
		  }); 	  
		  
	</script>  
	
  </head>
  <body>
  <!-- start google analytics -->
  <?php include_once("analyticstracking.php") ?>
  <!-- end google analytics -->
 
	<!--- start header --->
	
     <div class="navbar-wrapper">
      <div class="container">

		<nav class="navbar navbar-default navbar-inverse" style="border-radius:15px !important; margin-bottom:0px; border: 1px solid grey;">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php"><strong style="color:#ececec">"Crystal Sky"</strong></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			 <ul class="nav navbar-nav navbar-left">
				<li><a href="about_us.php#come_here">О нас<span class="sr-only">(current)</span></a></li>				
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Каталог<span class="caret"></span></a>
				  <ul class="dropdown-menu" style="border-radius:10px">
					<li><a href="catalog.php?r=1,2,3,4,5,6,7,21#come_here">Изделия из серебра</a></li>
					<li><a href="catalog.php?r=8,9,10,11,12,13,14,22#come_here">Изделия из позолоты</a></li>
					<li><a href="catalog.php?r=15,16#come_here">Изделия из камней</a></li>					
					<li><a href="catalog.php?r=17,18,19,20#come_here">Модные украшения</a></li>					
				  </ul>
				</li>
				 
				<li><a href="blog.php#come_here">Блог</a></li>
							
				<li><a href="contact_us.php#come_here">Контакты</a></li>
				 
			  </ul>		
						  
			  <div class="hidden-sm">
			  <ul class="nav navbar-nav navbar-right">
				
				<!--
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Рус<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Рус</a></li>
					<li><a href="#">Eng</a></li>
					<li><a href="#">עבר</a></li>					
				  </ul>
				</li>
				-->
				 
				
				<li class="dropdown">
				  <a href="#" title="Выберите Валюту" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="currency_selection" class="currency_selection" style="color:#EB6B56; font-size: 150%;"><? echo $_SESSION['the_curr_sign']; ?></span><span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<?php
						for($idc=0; $idc<sizeof($arr_currencies); $idc++)
						{
					?>
							<li><a href="#" title="<? echo $arr_currencies[$idc]['curr_desc']; ?>" onclick="currencyChanged(<? echo $arr_currencies[$idc]['id']; ?>, '<? echo $arr_currencies[$idc]['curr_sign']; ?>', <? echo $arr_currencies[$idc]['rate']; ?> , '<? echo $arr_currencies[$idc]['sign_place']; ?>', '<? echo $arr_currencies[$idc]['curr_desc']; ?>', '<? echo $arr_currencies[$idc]['curr_name']; ?>' );"><span style="color:#EB6B56; font-size: 150%;"><? echo $arr_currencies[$idc]['curr_sign']; ?></span></a></li>
					<?
						}
					?>
					
				  </ul>
				</li>
				
			 
				 
				
			  </ul>
			  </div>
			  
			  <div class="hidden-sm">
			  <form class="navbar-form navbar-right" role="search" action="search_result.php" method="get">
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="Поиск" id="q" name="q" style="border-radius:25px">
				</div>
				<button type="submit" class="btn btn-default" style="border-radius:25px"><span class="glyphicon glyphicon-search"></span></button>
			  </form>
			  </div>
			  
			 <form action="basket.php#come_here" class="navbar-form navbar-right" role="basket">				
				<button type="submit" class="btn btn-default" style="border-radius:15px"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<span class="badge"><?php echo $n_items_in_the_basket; ?></span></button>				
			  </form>				  
			 	  			  
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

      </div>
    </div>
	 
	<!--- end header --->		
		
	<!--- start slider ---->
		
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner" role="listbox">
		<div class="item active">
		  <img style="position:absolute; top:0; left:0; min-width:100%; height:500px; max-width:none;" class="img-responsive center-block" src="assets/images/thumbcarusel1.jpg" title="Crystal Sky - серебряные украшения" alt="Crystal Sky - серебряные украшения">
		  <div class="container">
			<div class="carousel-caption">
			  <h1>магазин "Crystal Sky"</h1>
			  <p>Cеребряные украшения, натуральные камни, позолота. Самые изысканные украшения для Вас! Богатые стилистические решения – от классики до авангарда. Наши адреса: город Нацерет-Илит, Мерказ Раско, улица Ацмон 18; город Тверия, Шук Ирони, улица Апрахим 18</p>
			  <p><a class="btn btn-lg btn-primary" href="catalog.php" role="button">Подробнее...</a></p>
			</div>
		  </div>
		</div>
		<div class="item">
		  <img style="position:absolute; top:0; left:0; min-width:100%; height:500px; max-width:none;" class="img-responsive center-block" src="assets/images/thumbcarusel2.jpg" title="Crystal Sky - натуральные камни" alt="Crystal Sky - натуральные камни">
		  <div class="container">
			<div class="carousel-caption">
			  <h1>магазин "Crystal Sky"</h1>
			  <p>Широкий выбор ювелирных украшений на любой вкус! Высокий уровень обслуживания! Приглашаем за покупками!</p>
			  <p><a class="btn btn-lg btn-primary" href="catalog.php" role="button">Подробнее...</a></p>
			</div>
		  </div>
		</div>
		<div class="item">
		  <img style="position:absolute; top:0; left:0; min-width:100%; height:500px; max-width:none;" class="img-responsive center-block" src="assets/images/thumbcarusel3.jpg" title="Crystal Sky - позолота" alt="Crystal Sky - позолота">
		  <div class="container">
			<div class="carousel-caption">
			  <h1>магазин "Crystal Sky"</h1>
			  <p>Приобретая серебряные ювелирные изделия в нашем магазине, Вы непременно будете довольны! Разнообразие дизайна и доступные цены! Приглашаем Вас за покупками!</p>
			  <p><a class="btn btn-lg btn-primary" href="catalog.php" role="button">Подробнее...</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>		
	
	<!--- end slider ---->
			
	<div class="clearfix" style="margin-bottom:30px;"></div>		
			
	<div id="content"> 		<!-- start content -->
	<div class="container"> <!-- start container -->		
					
		<!--- start featured products --->
		<?php
		
			$sql = "select count(1) n_recs from products where status = 1 and is_featured='1'";				 
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$n_of_recs = $row["n_recs"];
			
			if ($n_of_recs >= 3)
			{
		
				$st_pos = rand(0, $n_of_recs-3);
				$sql = "select * from products where status = 1 and is_featured='1' limit ".$st_pos.", 3";
				$the_data = array();		
				$results_the_data = mysqli_query($conn, $sql); 	
				
				while($line = mysqli_fetch_assoc($results_the_data)){
					$the_data[] = $line;
				}					
		
		?>
		
	
		<div class="row marketing" style="padding:10px;">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<a href="item.php?i=<?php echo $the_data[0]["id"]; ?>#come_here"><img src="<?php echo $the_data[0]["photo1"]; ?>" style="min-height:180px;height:180px;min-width:180px;width:180px; box-shadow: 2px 2px 3px #888888; border-radius:15px;" alt="<?php echo $the_data[0]["title"]; ?>" title="<?php echo $the_data[0]["title"]; ?>" class="img-circle" style="box-shadow: 2px 2px 3px #888888;"></a>
				<h2>Рекомендуем!</h2>
				<p><?php echo $the_data[0]["title"]; ?></p>
				<a href="item.php?i=<?php echo $the_data[0]["id"]; ?>#come_here" class="btn btn-success">Далее...</a>	
				<div class="hidden-lg hidden-md">&nbsp;</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">	
				<a href="item.php?i=<?php echo $the_data[1]["id"]; ?>#come_here"><img src="<?php echo $the_data[1]["photo1"]; ?>" style="min-height:180px;height:180px;min-width:180px;width:180px; box-shadow: 2px 2px 3px #888888; border-radius:15px;" alt="<?php echo $the_data[1]["title"]; ?>" title="<?php echo $the_data[1]["title"]; ?>" class="img-circle" style="box-shadow: 2px 2px 3px #888888;"></a>
				<h2>Рекомендуем!</h2>
				<p><?php echo $the_data[1]["title"]; ?></p>
				<a href="item.php?i=<?php echo $the_data[1]["id"]; ?>#come_here" class="btn btn-success">Далее...</a>
				<div class="hidden-lg hidden-md">&nbsp;</div>
			</div>			
			<div class="col-md-4 col-sm-4 col-xs-12">	
				<a href="item.php?i=<?php echo $the_data[2]["id"]; ?>#come_here"><img src="<?php echo $the_data[2]["photo1"]; ?>" style="min-height:180px;height:180px;min-width:180px;width:180px; box-shadow: 2px 2px 3px #888888; border-radius:15px;" alt="<?php echo $the_data[2]["title"]; ?>" title="<?php echo $the_data[2]["title"]; ?>" class="img-circle" style="box-shadow: 2px 2px 3px #888888;"></a>
				<h2>Рекомендуем!</h2>
				<p><?php echo $the_data[2]["title"]; ?></p>
				<a href="item.php?i=<?php echo $the_data[2]["id"]; ?>#come_here" class="btn btn-success">Далее...</a>	
				<div class="hidden-lg hidden-md">&nbsp;</div>				
			</div>				
		</div>		
		
		<div class="clearfix" style="margin-bottom:20px;"></div>
		
		<?php
			}
			else
			{
				/// no featured products...
			}
		?>
	
	<!--- end featured products ---->
				
	<!--- start section Изделия из серебра -->	
						
	<div class="row" >
		<div class="col-md-12" >
			<div class="panel panel-default" style="border-radius:15px; box-shadow: 2px 2px 3px #888888;">
			  <div class="panel-body" style="padding: 25px">
			  
				<div class="row">
				
				  <div class="panel-body">
						<ul class="breadcrumb" style="border-radius:15px;">
							<li><a href="catalog.php?r=1,2,3,4,5,6,7,21#come_here"><h4>Изделия из серебра</h4></a></li>			
						</ul>
				  </div>
				
				</div>
				
				  <!---  start of thumbnails -->
				  
				  <?php
				  
				  $sql = "select count(1) n_recs from products where status = 1 and category in (select id from sub_category where main_category = '1' )";
				  $result = $conn->query($sql);
				  $row = $result->fetch_assoc();
				  $n_of_recs = $row["n_recs"];
				  
				  $st_pos = rand(0, $n_of_recs-$block_1_items_to_show);

				  $sql = "select * 
							from products 
							where status = '1'
							  and category in 
									(select id 
										from sub_category 
										where main_category = 
												(select id 
													from main_category 
													where name = 'Изделия из серебра'
												)
									) limit ".$st_pos.", ".$block_1_items_to_show;
			  
					$the_data = array();		
					$results_the_data = mysqli_query($conn, $sql); 	
					
					while($line = mysqli_fetch_assoc($results_the_data)){
						$the_data[] = $line;
					}					  										    
				  
				  ?>
				  
				  <!---  start of thumbnails -->
				  
				  <div class="row">
				  
					<?
					
					for($idx=0; $idx<$block_1_items_to_show; $idx++)
					{
					?>
					
					  <div class="col-sm-6 col-md-3">
						<div class="thumbnail"  style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888; ">
						  <?php
						  if ($the_data[$idx]["is_discount"] == 1)
						  {						  
						  ?>
							<div class="ribbon_red" style="margin-left:15px;"><span>скидка</span></div>
						  <?php
						  }
						  else if ($the_data[$idx]["is_new"] == 1)
						  {
						  ?>
							<div class="ribbon_green" style="margin-left:15px;"><span>новинка</span></div>
						  <?php
						  }
						  
						  // show price - 0 - the product is out of stock...
						  if ($the_data[$idx]["show_price"] == 0)
						  {
						  ?>
							<div class="ribbon_blue" style="margin-left:15px;"><span>продано</span></div>
						  <?php
						  }						  
						  ?>
						  
						  <a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><img src="<?php echo $the_data[$idx]["photo1"]; ?>" border="0" alt="<?php echo $the_data[$idx]["title"]; ?>" style="min-height:250px;height:250px; border-radius:15px;"></a>
						  <div class="caption equalize">
							<p class="product_title"><a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><?php echo $the_data[$idx]["title"]; ?></a></p>
							<p><?php echo $the_data[$idx]["short_desc"]; ?></p>								
						  </div>
						  
						  <div class="caption likes">
							<?php
							if ($is_to_show_product_views == '1')
							{
							?>
								<p><i class="fa fa-eye" style="margin-left:7px;"></i> <span id='nOfViews'><?php echo $the_data[$idx]["nviews"]; ?></span> | <a href="#" onclick="return false;">Просмотров</a></p>
							<?
							}
							?>
								<p><i class="fa fa-thumbs-up" style="margin-left:7px;"></i> <span id='nOfLikes'><?php echo $the_data[$idx]["likes"]; ?></span> | <a href="#" onClick="doLike(<?php echo $the_data[$idx]["id"]; ?>,'<?php echo $the_data[$idx]["title"]; ?>'); return false;">Поставить Лайк</a></p>
						  </div>
						  
							<p class="ebuttonz" style="padding:15px" >
							
								<a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here" class="btn btn-success" role="button">Далее...</a> 
								<?php 
									if ($the_data[$idx]["show_price"] == 1) 
									{ 									
										if ($_SESSION['sign_place'] == 'r')
										{									
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?></span>
								<?php 
										}
										else
										{
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ); ?></span>
								<?php
										}
									} 
								?>
							</p>							
						</div>
					  </div>	
					  
					<?
					}
					?>

				  </div>
				  
				  <div class="col-sm-12 col-md-12">

					<p><a href="catalog.php?r=1,2,3,4,5,6,7,21#come_here" class="btn btn-default pull-right" role="button">Перейти в каталог...</a></p>
				  
				  </div>				  
				  
				  <!---  end of thumbnails -->
				  
			  </div>
			</div>	
		</div>
	</div>
 
	<!--- end section Изделия из серебра -->


 	<!-- start рекламный баннер #4 -->
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" style="text-align:center">
		
			<ul class="breadcrumb" style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				<li><a href="http://ok.ru/crystalsky" style="color:#571c85" target='_blank'><h4>Приглашаем Вас в клуб магазина <b>"Crystal Sky"</b> в <i>"Одноклассниках"</i>! Присоединяйтесь!</h4></a>
				</li>			
			</ul>
	 
		</div>
		<!-- the end of breadcrumb --->	
	</div>	 
	<!-- end рекламный баннер #4 -->
 	
	<!-- рекламный графический баннер -->
	<?		
	
		if ($arr_is_to_show_banners_front_page[0]['prop_value'] == '1')
		{
	?>
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-6" style="text-align:center">			
			<img src='<?php echo $arr_banner_front_page_left_path[0]['prop_value']; ?>' border='0' style="border-radius:15px; box-shadow: 2px 2px 3px #888888;" class="img-responsive center-block" title='<?php echo $arr_banner_front_page_left_alt[0]['prop_value']; ?>' alt='<?php echo $arr_banner_front_page_left_alt[0]['prop_value']; ?>'>
		</div>
		<div class="hidden-lg hidden-md"><div class="clearfix" style="margin-bottom:20px;"></div></div>
		<div class="col-md-6" style="text-align:center">			
			<img src='<?php echo $arr_banner_front_page_right_path[0]['prop_value']; ?>' border='0' style="border-radius:15px; box-shadow: 2px 2px 3px #888888;" class="img-responsive center-block" title='<?php echo $arr_banner_front_page_right_alt[0]['prop_value']; ?>' alt='<?php echo $arr_banner_front_page_right_alt[0]['prop_value']; ?>'>
		</div>		
		<!-- the end of breadcrumb --->	
	</div>	 	
	
	<div class="clearfix" style="margin-bottom:20px;"></div>	
	
	<?
		} 
	?>
	<!-- рекламный графический баннер -->
	
 
 	<!--- start section discounts -->	
	<?php
	
	date_default_timezone_set('Asia/Jerusalem');
	$today_date = date('d/m/Y', time());
	
	
	if ($is_to_show_discount_block == '1')
	{
	
	?>
	
	<div class="row" id="discounts_cs">
		<div class="col-md-12" >
			<div class="panel panel-default" style="border-radius:15px; box-shadow: 2px 2px 3px #888888;">
			  <div class="panel-body" style="padding: 25px">
			  
				<div class="row">
				
				  <div class="panel-body">
						<ul class="breadcrumb" style="border-radius:15px;">
							<li><a href="#discounts_cs"><h4>Сегодня, <? echo $today_date; ?>, мы приготовили для Вас специальные скидки!</h4></a></li>			
						</ul>
				  </div>
				
				</div>
				
				  <!---  start of thumbnails -->
				  
				  <?php
				  
				  $sql = "select count(1) n_recs from products where status = 1 and is_discount='1' and show_price='1' and price < 125";
				  $result = $conn->query($sql);
				  $row = $result->fetch_assoc();
				  $n_of_recs = $row["n_recs"];
				  
				  $st_pos = rand(0, $n_of_recs-$block_5_items_to_show);

				  $sql = "select * 
							from products 
							where status = '1'
							  and is_discount='1' 
							  and show_price='1'
							  and price < 125 
							  limit ".$st_pos.", ".$block_5_items_to_show;
			  
					$the_data = array();		
					$results_the_data = mysqli_query($conn, $sql); 	
					
					while($line = mysqli_fetch_assoc($results_the_data)){
						$the_data[] = $line;
					}					  										    
				  
				  ?>
				  
				  <!---  start of thumbnails -->
				  
				  <div class="row">
				  
					<?
					for($idx=0; $idx<$block_5_items_to_show; $idx++)
					{
					?>
					
					  <div class="col-sm-6 col-md-3">
						<div class="thumbnail"  style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888; ">
						  <?php
						  if ($the_data[$idx]["is_discount"] == 1)
						  {						  
						  ?>
							<div class="ribbon_red" style="margin-left:15px;"><span>скидка</span></div>
						  <?php
						  }
						  else if ($the_data[$idx]["is_new"] == 1)
						  {
						  ?>
							<div class="ribbon_green" style="margin-left:15px;"><span>новинка</span></div>
						  <?php
						  }
						  
						  // show price - 0 - the product is out of stock...
						  if ($the_data[$idx]["show_price"] == 0)
						  {
						  ?>
							<div class="ribbon_blue" style="margin-left:15px;"><span>продано</span></div>
						  <?php
						  }						  
						  ?>
						  <a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><img src="<?php echo $the_data[$idx]["photo1"]; ?>" border="0" alt="<?php echo $the_data[$idx]["title"]; ?>" style="min-height:250px;height:250px; border-radius:15px;"></a>
						  <div class="caption equalize">
							<p class="product_title"><a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><?php echo $the_data[$idx]["title"]; ?></a></p>
							<p><?php echo $the_data[$idx]["short_desc"]; ?></p>							 
						  </div>
						  
						  <div class="caption likes">
							<?php
							if ($is_to_show_product_views == '1')
							{
							?>
								<p><i class="fa fa-eye" style="margin-left:7px;"></i> <span id='nOfViews'><?php echo $the_data[$idx]["nviews"]; ?></span> | <a href="#" onclick="return false;">Просмотров</a></p>
							<?
							}
							?>
								<p><i class="fa fa-thumbs-up" style="margin-left:7px;"></i> <span id='nOfLikes'><?php echo $the_data[$idx]["likes"]; ?></span> | <a href="#" onClick="doLike(<?php echo $the_data[$idx]["id"]; ?>,'<?php echo $the_data[$idx]["title"]; ?>'); return false;">Поставить Лайк</a></p>
						  </div>
						  
							<p class="ebuttonz" style="padding:15px" >
								<a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here" class="btn btn-danger" role="button">Заказ...</a> 
								<?php 
									if ($the_data[$idx]["show_price"] == 1) 
									{ 									
										if ($_SESSION['sign_place'] == 'r')
										{									
								?>
										<span class="pull-right" style="font-weight:bold;font-size:16px; text-decoration: line-through; color:#337ab7;">
										<?php echo money_format('%i', ceil(1.20*$the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?>
										</span>	
										<br/>
										<span class="pull-right" style="margin-top:-20px; font-weight:bold;font-size:20px; color:#d9534f;">
										<?php echo money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?>
										</span>
								<?php 
										}
										else
										{
								?>										
										<span class="pull-right" style="font-weight:bold;font-size:16px; text-decoration: line-through; color:#337ab7;">
										<?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil(1.20*$the_data[$idx]["price"]/$_SESSION['rate']) ); ?>
										</span>
										<br/>
										<span class="pull-right" style="margin-top:-20px; font-weight:bold;font-size:20px; color:#d9534f;">
										<?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ); ?>
										</span>
								<?php
										}
									} 
								?>
							</p>							
						</div>
					  </div>	
					  
					<?
					}
					?>

				  </div>
				  
				  <div class="col-sm-12 col-md-12">

					<p><a href="#discounts_cs" class="btn btn-default pull-right" role="button">Заказывайте прямо сейчас!</a></p>
				  
				  </div>				  
				  
				  <!---  end of thumbnails -->
				  
			  </div>
			</div>	
		</div>
	</div>
 
	<!--- end section discounts -->
	
	<?
	
	}
	
	?>
 
 
	<?
	if ($is_to_show_facebook_ad_block == '1')
	{
	?>
 
 	<!-- start рекламный баннер #5 -->
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" style="text-align:center">
		
			<ul class="breadcrumb" style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				<li><a href="http://facebook.com/crystalsky.jewelry" style="color:#571c85" target='_blank'><h4>Приглашаем Вас в клуб магазина <b>"Crystal Sky"</b> в <i>"Фейсбуке"</i>! Присоединяйтесь!</h4></a>
				</li>			
			</ul>
	 
		</div>
		<!-- the end of breadcrumb --->	
	</div>	 
	<!-- end рекламный баннер #5 --> 
 
	<?
	}
	?>
	
	<?php
	
	  $sql = "select count(1) n_recs from products where status = 1 and category in (select id from sub_category where main_category = 2)";
	  $result = $conn->query($sql);
	  $row = $result->fetch_assoc();
	  $n_of_recs = $row["n_recs"];				  				 
	  
	  if ($n_of_recs < $block_2_items_to_show)
	  {
		// do nothing...
	  }
	  else
	  {
	
	?>	 
 
	<!--- start section Изделия из позолоты -->
	
		<div class="row" >
			<div class="col-md-12" >
				<div class="panel panel-default" style="border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				  <div class="panel-body" style="padding: 25px">
				  
					<div class="row">
					  <div class="panel-body">
							<ul class="breadcrumb" style="border-radius:15px;">
								<li><a href="catalog.php?r=8,9,10,11,12,13,14,22#come_here"><h4>Изделия из позолоты</h4></a></li>			
							</ul>
					  </div>
					</div>
					  
					  <!---  start of thumbnails -->
					  
					  <div class="row">
					  
					  <?php				  
					  
					  $st_pos = rand(0, $n_of_recs-$block_2_items_to_show);

					  $sql = "select * 
								from products 
								where status = 1 
								  and category in 
										(select id 
											from sub_category 
											where main_category = 
													(select id 
														from main_category 
														where name = 'Изделия из позолоты'
													)
										) limit ".$st_pos.", ".$block_2_items_to_show;
				  
						$the_data = array();		
						$results_the_data = mysqli_query($conn, $sql); 	
						
						while($line = mysqli_fetch_assoc($results_the_data)){
							$the_data[] = $line;
						}					  										    
					  
					  ?>
					  
					  <!---  start of thumbnails -->
					  
					  
					  
						<?
						for($idx=0; $idx<$block_2_items_to_show; $idx++)
						{
						?>
						
						  <div class="col-sm-6 col-md-3">
							<div class="thumbnail"  style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888; ">
							  <?php
							  if ($the_data[$idx]["is_discount"] == 1)
							  {						  
							  ?>
								<div class="ribbon_red" style="margin-left:15px;"><span>скидка</span></div>
							  <?php
							  }
							  else if ($the_data[$idx]["is_new"] == 1)
							  {
							  ?>
								<div class="ribbon_green" style="margin-left:15px;"><span>новинка</span></div>
							  <?php
							  }
							  
							  // show price - 0 - the product is out of stock...
							  if ($the_data[$idx]["show_price"] == 0)
							  {
							  ?>
								<div class="ribbon_blue" style="margin-left:15px;"><span>продано</span></div>
							  <?php
							  }						  
							  ?>
							  <a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><img src="<?php echo $the_data[$idx]["photo1"]; ?>" border="0" alt="<?php echo $the_data[$idx]["title"]; ?>" style="min-height:250px;height:250px; border-radius:15px;"></a>
							  <div class="caption equalize">
								<p class="product_title"><a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><?php echo $the_data[$idx]["title"]; ?></a></p>
								<p><?php echo $the_data[$idx]["short_desc"]; ?></p>						
							  </div>
							  
							  <div class="caption likes">
								<?php
								if ($is_to_show_product_views == '1')
								{
								?>
									<p><i class="fa fa-eye" style="margin-left:7px;"></i> <span id='nOfViews'><?php echo $the_data[$idx]["nviews"]; ?></span> | <a href="#" onclick="return false;">Просмотров</a></p>
								<?
								}
								?>
									<p><i class="fa fa-thumbs-up" style="margin-left:7px;"></i> <span id='nOfLikes'><?php echo $the_data[$idx]["likes"]; ?></span> | <a href="#" onClick="doLike(<?php echo $the_data[$idx]["id"]; ?>,'<?php echo $the_data[$idx]["title"]; ?>'); return false;">Поставить Лайк</a></p>
							  </div>							  
							  
								<p class="ebuttonz" style="padding:15px" >
									<a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here" class="btn btn-success" role="button">Далее...</a> 
									<?php 
										if ($the_data[$idx]["show_price"] == 1) 
										{ 									
											if ($_SESSION['sign_place'] == 'r')
											{									
									?>
											<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?></span>
									<?php 
											}
											else
											{
									?>
											<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ); ?></span>
									<?php
											}
										} 
									?>
								</p>							
							</div>
						  </div>

										  
						  
						<?
						}	// $idx
									  
					?>
						
					 </div>	
					  
					  <div class="col-sm-12 col-md-12">

						<p><a href="catalog.php?r=8,9,10,11,12,13,14,22#come_here" class="btn btn-default pull-right" role="button">Перейти в каталог...</a></p>
					  
					  </div>				  
					  
					  <!---  end of thumbnails -->

				  </div>
				</div>	
			</div>
		</div>	
	
	<?php
	} // if
	?>
	
	<!--- end section Изделия из позолоты -->
 
	<!-- start рекламный баннер #2 -->
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" style="text-align:center">
		
			<ul class="breadcrumb" style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				<li><a href="https://www.youtube.com/channel/UCeiNKvNYTd4sTA-h3VlyrBg" style="color:#571c85" target='_blank'><h4>Приглашаем Вас на видеоканал магазина <b>"Crystal Sky"</b> на <i>"YouTube"</i>! Присоединяйтесь!</h4></a>
				</li>			
			</ul>
	 
		</div>
		<!-- the end of breadcrumb --->	
	</div>	 
	<!-- end рекламный баннер #2 -->
	
	
	<!--- start section Изделия из камней -->
	
	<div class="row" >
		<div class="col-md-12" >
			<div class="panel panel-default" style="border-radius:15px; box-shadow: 2px 2px 3px #888888;">
			  <div class="panel-body" style="padding: 25px">
			  
				<div class="row">
				  <div class="panel-body">
						<ul class="breadcrumb" style="border-radius:15px;">
							<li><a href="catalog.php?r=15,16#come_here"><h4>Изделия из камней</h4></a></li>			
						</ul>
				  </div>
				</div>
				  
				  <?php
				  
				  $sql = "select count(1) n_recs from products where status = 1 and category in (select id from sub_category where main_category = 3)";
				  $result = $conn->query($sql);
				  $row = $result->fetch_assoc();
				  $n_of_recs = $row["n_recs"];
				  
				  $st_pos = rand(0, $n_of_recs-$block_3_items_to_show);

				  $sql = "select * 
							from products 
							where status = 1 
							  and category in 
									(select id 
										from sub_category 
										where main_category = 
												(select id 
													from main_category 
													where name = 'Изделия из камней'
												)
									) limit ".$st_pos.", ".$block_3_items_to_show;
			  
					$the_data = array();		
					$results_the_data = mysqli_query($conn, $sql); 	
					
					while($line = mysqli_fetch_assoc($results_the_data)){
						$the_data[] = $line;
					}					  										    
				  
				  ?>
				  
				  <!---  start of thumbnails -->
				  
				  <div class="row">
				  
					<?
					for($idx=0; $idx<$block_3_items_to_show; $idx++)
					{
					?>
					
					  <div class="col-sm-6 col-md-3">
						<div class="thumbnail"  style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888; ">
						  <?php
						  if ($the_data[$idx]["is_discount"] == 1)
						  {						  
						  ?>
							<div class="ribbon_red" style="margin-left:15px;"><span>скидка</span></div>
						  <?php
						  }
						  else if ($the_data[$idx]["is_new"] == 1)
						  {
						  ?>
							<div class="ribbon_green" style="margin-left:15px;"><span>новинка</span></div>
						  <?php
						  }
						  
						  // show price - 0 - the product is out of stock...
						  if ($the_data[$idx]["show_price"] == 0)
						  {
						  ?>
							<div class="ribbon_blue" style="margin-left:15px;"><span>продано</span></div>
						  <?php
						  }						  
						  ?>
						  <a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><img src="<?php echo $the_data[$idx]["photo1"]; ?>" border="0" alt="<?php echo $the_data[$idx]["title"]; ?>" style="min-height:250px;height:250px; border-radius:15px;"></a>
						  <div class="caption equalize">
							<p class="product_title"><a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><?php echo $the_data[$idx]["title"]; ?></a></p>
							<p><?php echo $the_data[$idx]["short_desc"]; ?></p>							
						  </div>
						  
						  <div class="caption likes">
							<?php
							if ($is_to_show_product_views == '1')
							{
							?>
								<p><i class="fa fa-eye" style="margin-left:7px;"></i> <span id='nOfViews'><?php echo $the_data[$idx]["nviews"]; ?></span> | <a href="#" onclick="return false;">Просмотров</a></p>
							<?
							}
							?>
								<p><i class="fa fa-thumbs-up" style="margin-left:7px;"></i> <span id='nOfLikes'><?php echo $the_data[$idx]["likes"]; ?></span> | <a href="#" onClick="doLike(<?php echo $the_data[$idx]["id"]; ?>,'<?php echo $the_data[$idx]["title"]; ?>'); return false;">Поставить Лайк</a></p>
						  </div>						  
						  
							<p class="ebuttonz" style="padding:15px" >
								<a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here" class="btn btn-success" role="button">Далее...</a> 
								<?php 
									if ($the_data[$idx]["show_price"] == 1) 
									{ 									
										if ($_SESSION['sign_place'] == 'r')
										{									
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?></span>
								<?php 
										}
										else
										{
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ); ?></span>
								<?php
										}
									} 
								?>									
							</p>							
						</div>
					  </div>	
					  
					<?
					}
					?>

				  </div>
				  				  
				  <div class="col-sm-12 col-md-12">

					<p><a href="catalog.php?r=15,16#come_here" class="btn btn-default pull-right" role="button">Перейти в каталог...</a></p>
				  
				  </div>				  
				  
				  <!---  end of thumbnails -->
				  
			  </div>
			</div>	
		</div>
	</div>		
	
	<!--- end section Изделия из камней -->
	
	
	<!-- start рекламный баннер #7 -->
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" style="text-align:center">
		
			<ul class="breadcrumb" style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				<li><a href="contact_us.php#come_here" style="color:#571c85" target='_blank'><h4>Укажите <i>Имя</i> и <i>Дату Рождения</i>; мы подберем украшение именно для <b>Вac</b>!</h4></a>
				</li>			
			</ul>
	 
		</div>
		<!-- the end of breadcrumb --->	
	</div>	 
	<!-- end рекламный баннер #7 -->	
	
	<!-- start рекламный баннер #3 -->
	<div class="row" style="background:#red">
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" >
			
			<div class="post" style="background:#ffffff; padding:25px; border-radius:15px; box-shadow: 2px 2px 3px #888888;">

				<div class="row">
				  <div class="panel-body">
						<ul class="breadcrumb" style="border-radius:15px;">
							<li><a href="feedbacks.php#come_here"><h4>Отзывы покупателей</h4></a></li>			
						</ul>
				  </div>				  							 
				</div>			
		
		
				<div class="row">
										
					<div class="col-sm-3 col-md-2 text-center-xs">
						<p>
							<div id="review_id" style="display: none;"></div>
							<br/>
							<img style="margin-left: auto; margin-right: auto; margin-top: -30px;" width="100" src="assets/images/avatar_1.png" class="img-responsive img-circle" alt="">										
							<p style="text-align:center; margin-top: -10px;"><i><span id="review_author"></span>,<br/><span id="review_city"></span></i></p>
						</p>
					</div>
					<div class="col-sm-9 col-md-10 text-center-xs">
						<h4><span id="review_title"></span>...</h4>
						<p class="posted"><i class="fa fa-clock-o"></i> <span id="review_date"></span></p>									
						<p style="padding-right:10px;"><span id="review_detail"></span></p>
						<br/>
					</div>					
				</div>	

				<div class="row">
				  <div class="col-sm-12 col-md-12">
					<p><a href="#" onClick="get_next_review();return false;" class="btn btn-default pull-right" role="button" style="margin-right:20px;">Показать еще...</a></p>				  
				  </div>
				</div>

			</div>				
			
		 </div>
		<!-- the end of breadcrumb --->			
		
	</div>	 
	<!-- end рекламный баннер #3 -->
	
	<br/>
	
	<!-- start рекламный баннер #8 -->
	<div class="row" >
		<!-- breadcrumb with navigation details -->
		<div class="col-md-12" style="text-align:center">
		
			<ul class="breadcrumb" style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888;">
				<li><a href="https://twitter.com/crystalsky925" style="color:#571c85" target='_blank'><h4>Приглашаем Вас в клуб магазина <b>"Crystal Sky"</b> в <i>"Твиттере"</i>! Присоединяйтесь!</h4></a>
				</li>			
			</ul>
	 
		</div>
		<!-- the end of breadcrumb --->	
	</div>	 
	<!-- end рекламный баннер #8 -->	
	
	<!--- start section Модные украшения -->
	
	<div class="row" >
		<div class="col-md-12" >
			<div class="panel panel-default" style="border-radius:15px; box-shadow: 2px 2px 3px #888888;">
			  <div class="panel-body" style="padding: 25px">
			  
			  
				<div class="row">
				  <div class="panel-body">
						<ul class="breadcrumb" style="border-radius:15px;">
							<li><a href="catalog.php?r=17,18,19,20#come_here"><h4>Модные украшения</h4></a></li>			
						</ul>
				  </div>				  
					 
				</div>
				  
				  <!---  start of thumbnails -->
				  
				  <?php
				  
				  $sql = "select count(1) n_recs from products where status = 1 and category in (select id from sub_category where main_category = 4)";
				  $result = $conn->query($sql);
				  $row = $result->fetch_assoc();
				  $n_of_recs = $row["n_recs"];
				  
				  $st_pos = rand(0, $n_of_recs-$block_4_items_to_show);

				  $sql = "select * 
							from products 
							where status = 1 
							  and category in 
									(select id 
										from sub_category 
										where main_category = 
												(select id 
													from main_category 
													where name = 'Модные украшения'
												)
									) limit ".$st_pos.", ".$block_4_items_to_show;
			  
					$the_data = array();		
					$results_the_data = mysqli_query($conn, $sql); 	
					
					while($line = mysqli_fetch_assoc($results_the_data)){
						$the_data[] = $line;
					}					  										    
				  
				  ?>
				  
				  <!---  start of thumbnails -->
				  
				  <div class="row">
				  
					<?
					for($idx=0; $idx<$block_4_items_to_show; $idx++)
					{
					?>
					
					  <div class="col-sm-6 col-md-3">
						<div class="thumbnail"  style="background:#ffffff; border-radius:15px; box-shadow: 2px 2px 3px #888888; ">
						  <?php
						  if ($the_data[$idx]["is_discount"] == 1)
						  {						  
						  ?>
							<div class="ribbon_red" style="margin-left:15px;"><span>скидка</span></div>
						  <?php
						  }
						  else if ($the_data[$idx]["is_new"] == 1)
						  {
						  ?>
							<div class="ribbon_green" style="margin-left:15px;"><span>новинка</span></div>
						  <?php
						  }
						  
						  // show price - 0 - the product is out of stock...
						  if ($the_data[$idx]["show_price"] == 0)
						  {
						  ?>
							<div class="ribbon_blue" style="margin-left:15px;"><span>продано</span></div>
						  <?php
						  }						  
						  ?>
						  <a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><img src="<?php echo $the_data[$idx]["photo1"]; ?>" border="0" alt="<?php echo $the_data[$idx]["title"]; ?>" style="min-height:250px;height:250px; border-radius:15px;"></a>
						  <div class="caption equalize">
							<p class="product_title"><a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here"><?php echo $the_data[$idx]["title"]; ?></a></p>
							<p><?php echo $the_data[$idx]["short_desc"]; ?></p>
						  </div>
						  
						  <div class="caption likes">
							<?php
							if ($is_to_show_product_views == '1')
							{
							?>
								<p><i class="fa fa-eye" style="margin-left:7px;"></i> <span id='nOfViews'><?php echo $the_data[$idx]["nviews"]; ?></span> | <a href="#" onclick="return false;">Просмотров</a></p>
							<?
							}
							?>
								<p><i class="fa fa-thumbs-up" style="margin-left:7px;"></i> <span id='nOfLikes'><?php echo $the_data[$idx]["likes"]; ?></span> | <a href="#" onClick="doLike(<?php echo $the_data[$idx]["id"]; ?>,'<?php echo $the_data[$idx]["title"]; ?>'); return false;">Поставить Лайк</a></p>
						  </div>						  
						  
							<p class="ebuttonz" style="padding:15px" >
								<a href="item.php?i=<?php echo $the_data[$idx]["id"]; ?>#come_here" class="btn btn-success" role="button">Далее...</a> 
								<?php 
									if ($the_data[$idx]["show_price"] == 1) 
									{ 									
										if ($_SESSION['sign_place'] == 'r')
										{									
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ).$_SESSION['the_curr_sign']; ?></span>
								<?php 
										}
										else
										{
								?>
										<span class="pull-right" style="font-weight:bold;font-size:20px; color:#337ab7;"><?php echo $_SESSION['the_curr_sign'].money_format('%i', ceil($the_data[$idx]["price"]/$_SESSION['rate']) ); ?></span>
								<?php
										}
									} 
								?>								
							</p>							
						</div>
					  </div>	
					  
					<?
					}
					?>

				  </div>
				  
				  <div class="col-sm-12 col-md-12">

					<p><a href="catalog.php?r=17,18,19,20#come_here" class="btn btn-default pull-right" role="button">Перейти в каталог...</a></p>
				  
				  </div>				  
				  
				  <!---  end of thumbnails -->
				  				  
			  </div>
			  				  
			  
			</div>	
		</div>
	</div>			
	
	<!--- end section Модные украшения -->
	
	<!-- End Product Thumbnail -->	
	
	</div> <!-- end contaner -->
	</div> <!-- end content -->	
	
	
	<div class="clearfix" style="margin-bottom:20px;"></div>
	
	<!-- Pre footer -->
	
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Страницы</h4>

                        <ul>
                            <li><a href="index.php">Главная</a>
                            </li>						
                            <li><a href="about_us.php#come_here">О нас</a>
                            </li>
                            <li><a href="catalog.php#come_here">Каталог</a>
                            </li>
							<li><a href="discounts.php#come_here">Скидки</a>
                            </li>
                            <li><a href="feedbacks.php#come_here">Отзывы покупателей</a>
                            </li>
                            <li><a href="blog.php#come_here">Блог</a>
                            </li>
                            <li><a href="contact_us.php#come_here">Контакты</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>Мероприятия</h4>

                        <ul>
                            <li><a href="events.php#ev1">"Пригласите Друзей!"</a>
                            </li>
                            <li><a href="events.php#ev2">"Наш Баннер"</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Каталог</h4>
 					 
                        <ul>
                            <li><a href="catalog.php?r=1,2,3,4,5,6,7,21#come_here">Ювелирные украшения из серебра</a>
                            </li>
                            <li><a href="catalog.php?r=8,9,10,11,12,13,14,22#come_here">Ювелирные украшения из позолоты</a>
                            </li>
                            <li><a href="catalog.php?r=15,16#come_here">Ювелирные украшения из камней</a>							
                            </li>
                            <li><a href="catalog.php?r=17,18,19,20#come_here">Модные украшения</a>							
                            </li>
                            <li><a href="catalog.php?r=1#come_here">Наборы из серебра</a>
                            </li>
                            <li><a href="catalog.php?r=16#come_here">Браслеты из камней</a>
                            </li>
                            <li><a href="catalog.php?r=15#come_here">Ожерелья из камней</a>							
                            </li>
                            <li><a href="catalog.php?r=20#come_here">Часы</a>							
                            </li>
                            <li><a href="catalog.php?r=19#come_here">Серьги из стекла</a>
                            </li>
                            <li><a href="catalog.php?r=18#come_here">Ожерелья из стекла</a>
                            </li>
                            <li><a href="catalog.php?r=17#come_here">Кулоны из стекла</a>							
                            </li>	
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Наши адреса</h4>

                        <p><strong>магазин "Crystal Sky"</strong>
                            <br>улица Ацмон 18
                            <br>Мерказ Раско
                            <br>город Нацерет-Илит
                            <br>Северный Округ
                            <br>
                            <strong>Израиль</strong>
                        </p>

                        <p><strong>магазин "Crystal Sky"</strong>
                            <br>улица Апрахим 18
                            <br>Шук Ирони
                            <br>город Тверия
                            <br>Северный Округ
                            <br>
                            <strong>Израиль</strong>
                        </p>						
						
                        <a href="contact_us.php#come_here">Связаться с нами</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Подпишитесь на новости</h4>

                        <p class="text-muted">Введите свой емайл и будьте в курсе всех новостей и мероприятий магазина "Crystal Sky"! Подпишитесь сейчас и получайте скидки!</p>

                        <form  enctype="multipart/form-data" method="post" name="SubscribeEmail">
                            <div class="input-group">
								
                                <input type="text" class="form-control" name="subscr_email" id="subscr_email">

                                <span class="input-group-btn">

									<button class="btn btn-default" type="button" onclick="subscribeEmail()">Подписаться!</button>

								</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h5>Присоединяйтесь к нам! Подписывайтесь на наши страницы в социальных сетях!</h5>

                        <p class="social">
							<a href="http://ok.ru/crystalsky" target='_blank' class="odnoklassniki external" data-animate-hover="shake"><i class="fa fa-odnoklassniki"></i></a>
                            <a href="http://facebook.com/crystalsky.jewelry" target='_blank' class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/CrystalSky925" target='_blank' class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>                            
                            <a href="https://www.youtube.com/channel/UCeiNKvNYTd4sTA-h3VlyrBg/videos" target='_blank' class="youtube external" data-animate-hover="shake"><i class="fa fa-youtube"></i></a>
							<a href="https://www.instagram.com/crystal_sky_jewelry/" target='_blank' class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>							
                            <a href="mailto: info@crystalsky.co.il?Subject=contact from website CrystalSky.co.il" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>							
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->	
	
	<!-- End Pre Footer -->
	
	
	<!-- Footer -->
		
	<div id="copyright">
		<div class="container">
			<div class="col-md-8">
				<p class="pull-left">© 2016 Магазин "Crystal Sky"<div class="hidden-sm hidden-xs"> - украшения из серебра, натуральные камни, позолота</div></p>
			</div>
			<div class="col-md-4">
				<p class="pull-right"><a href="#">Back To Top</a></p>				
			</div>
		</div>
	</div>	
	
	<a href="#" class="scrollup"></a>
			
	<!-- End Footer -->	
	
	<?php
	
	$sql = "select * from (SELECT id, user_name, user_city, feedback_title, feedback_msg, date_format(datex, '%d/%m/%Y') the_date FROM feedbacks WHERE lang='ru' and status=1 order by datex desc) M limit 0, 5";				

	$result = $conn->query($sql);	
	
	?>
	
	<script>
	
		str_feedback_id = new Array();
		str_feedback_author = new Array();
		str_feedback_title = new Array();
		str_feedback_city = new Array();
		str_feedback_date = new Array();
		str_feedback_detail = new Array();
	
	<?php
	
	if ($result->num_rows > 0) 
	{		
		$idx=0;
		while($row = $result->fetch_assoc())
		{
			
	?>
		str_feedback_id[<?php echo $idx; ?>]= "<?php echo $idx; ?>";
		str_feedback_author[<?php echo $idx; ?>]= "<?php echo htmlspecialchars($row["user_name"]); ?>";
		str_feedback_city[<?php echo $idx; ?>]= "<?php echo htmlspecialchars($row["user_city"]); ?>";
		str_feedback_date[<?php echo $idx; ?>]= "<?php echo $row["the_date"]; ?>";
		str_feedback_title[<?php echo $idx; ?>]= "<?php echo htmlspecialchars($row["feedback_title"]); ?>";
		str_feedback_detail[<?php echo $idx; ?>]= "<?php echo htmlspecialchars($row["feedback_msg"]); ?>";
	<?php
	
		$idx++;
		}
	}
	
	?>
	
		document.getElementById('review_id').innerHTML =str_feedback_id[0];
		document.getElementById('review_author').innerHTML =str_feedback_author[0];
		document.getElementById('review_city').innerHTML =str_feedback_city[0];
		document.getElementById('review_date').innerHTML =str_feedback_date[0];		
		document.getElementById('review_title').innerHTML =str_feedback_title[0];
		document.getElementById('review_detail').innerHTML =str_feedback_detail[0];
	
		function get_next_review()
		{
		
			n = document.getElementById('review_id').innerHTML;
			n++;
		
			if (n<0) 
			{
				n=0;
			}
			
			if (n><?php echo $result->num_rows; ?> - 1)
			{
				n = 0;
			}
			
			document.getElementById('review_id').innerHTML =str_feedback_id[n];
			document.getElementById('review_author').innerHTML =str_feedback_author[n];
			document.getElementById('review_city').innerHTML =str_feedback_city[n];
			document.getElementById('review_date').innerHTML =str_feedback_date[n];
			document.getElementById('review_title').innerHTML =str_feedback_title[n];
			document.getElementById('review_detail').innerHTML =str_feedback_detail[n];		
		}
				
		$('.dropdown-menu a').on('click', function(){    
			$(this).parent().parent().prev().html($(this).html() + '<span class="caret"></span>');    
		})

	</script>	
	
	<?php
	// close db connection
	$conn->close();
	
	require_once('trace_login_businesslog.php');
	
	?>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>	
	
<!--- image presenter --->

<div class="modal fade" tabindex="-1" role="dialog" id="myModalOk" name="myModalOk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="imgPresenterTitle">Подпишитесь на новости</h4>
      </div>
      <div class="modal-body" id="imgPresenterBody" name="imgPresenterBody" style="margin-left:auto; margin-right:auto; text-align:center">       
	  Спасибо! Ваш емайл успешно занесен в нашу базу данных! <br/>Вы будьте в курсе всех новостей и мероприятий магазина "Crystal Sky"! 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--- image presenter --->	


<div class="modal fade" tabindex="-1" role="dialog" id="myDoLike" name="myDoLike">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Поставить Лайк</h4>
      </div>
      <div class="modal-body" style="margin-left:20px; margin-right:20px; text-align:center">       
		Вам нравится изделие: "<span id="theItemName"></span>", и Вы ставите Лайк! Приглашаем Вас за покупками в наш магазин "Crystal Sky"! Порекомендуйте нас всем своим друзьям и знакомым! Спасибо! 
		
				<br/>
				<br/>
				<form data-toggle="validator" role="form" id="LikeForm">
					<div class="row" id="contact_status">
						<div class="col-sm-6">
							<div id="inp_like_first_name" class="form-group">
								<label for="like_firstname">Ваше Имя</label>
								<input type="text" class="form-control" name="like_firstname" id="like_firstname">
							</div>
						</div>                               
						<div class="col-sm-6">
							<div id="inp_like_email" class="form-group">
								<label for="like_email">Ваш Емайл</label>
								<input type="text" class="form-control" name="like_email" id="like_email">
							</div>
						</div> 
						<div class="col-sm-6">
							<div id="inp_like_city" class="form-group">
								<label for="like_city">Ваш Город</label>
								<input type="text" class="form-control" name="like_city" id="like_city">
							</div>
						</div>                               
						<div class="col-sm-6">
							<div id="inp_like_phone" class="form-group">
								<label for="like_phone">Ваш Телефон</label>
								<input type="text" class="form-control" name="like_phone" id="like_phone">
							</div>
						</div> 						
					</div>
					<input type="hidden" name="like_product_id" id="like_product_id">
					<input type="hidden" name="like_product_name" id="like_product_name">
					<!-- /.row -->													
				</form>	
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="ILikeIt(); return false;">Ok</button>        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
  </body>
</html>