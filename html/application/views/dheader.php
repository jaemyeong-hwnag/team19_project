<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tourism a Travel Category Flat bootstrap Responsive website Template | Services :: w3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="/~team19/my/myy/css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="/~team19/my/myy/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="/~team19/my/myy/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Coda:400,800&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
<!-- //online-fonts -->

<script>

      $( document ).ready( function() {
        var jbOffset = $( '.header-w3layouts' ).offset();
        $( window ).scroll( function() {
          if ( $( document ).scrollTop() > jbOffset.top ) {
            $('.header-w3layouts').addClass('jbFixed');
			$('.header-w3layouts').addClass('jbFixed_style');
          }
          else {
            $('.header-w3layouts').removeClass('jbFixed');
			$('.header-w3layouts').removeClass('jbFixed_style');
          }
        });
      } );
    </script>
</script>
<style>

.photo2 {
    width: 250px; height: 250px;
    object-fit: cover;
    object-position: top;
    border-radius: 50%;
}

</style>
</head>
<body> 
<div class="main-agile banner-2">
	<!-- header -->
	<div class="header-w3layouts"> 
		<!-- Navigation -->
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Tourism</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="logo-agile-1"> 
				<h1><a class="logo" href="/~team19/main"><i class="fa fa-plane" aria-hidden="true"></i>Tourism</a></h1>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<?	
					 $activePage=urldecode($this->uri->segment(2));
					?>
					<li class="<?=  ($activePage=='package_tour_list') ? 'active':''; ?>""><a href="/~team19/tour1/package_tour_list">패키지 여행</a></li>
					<li class="<?=  ($activePage=='foreign_tour_list') ? 'active':''; ?>"><a href="/~team19/tour1/foreign_tour_list">해외 여행</a></li>
					<li class="<?=  ($activePage=='domestic_tour_list') ? 'active':''; ?>"><a href="/~team19/tour1/domestic_tour_list">국내 여행</a></li>
					<li class="<?=  ($activePage=='developer') ? 'active':''; ?>"><a href="/~team19/team19/developer">개발자</a></li>
					
					<?
					if($this->session->userdata('no')=="0"){
						echo("<li><a href='/~team19/admin/main'>admin</a></li>");
					}
					?>
					<?
					if($this->session->userdata('no')==null) {
						echo("  ");
					}
					else if($this->session->userdata('no')!=null||$this->session->userdata('no')=="0"){
						echo("
							<li class='dropdown menu__item menu__item--current m_nav_item'>
						<a href='/~team19/mypage' class='dropdown-toggle menu__link link link--kumya' data-toggle='dropdown'><span data-letters='Short Codes'>마이페이지<b class='caret'></b></span></a>
						<ul class='dropdown-menu agile_short_dropdown'>
						<li><a href='/~team19/yayak'>예약현황</a></li>
						<li><a href='/~team19/mypage'>나의 정보</a></li>
						</ul>
					</li>
					");
					}
					?>
					<!--<li class="dropdown menu__item menu__item--current m_nav_item">
						<a href="#" class="dropdown-toggle menu__link link link--kumya" data-toggle="dropdown"><span data-letters="Short Codes">Short Codes<b class="caret"></b></span></a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li><a href="/~team19/my/myy/icons.html">Web Icons</a></li>
							<li><a href="/~team19/my/myy/typography.html">Typography</a></li>
						</ul>
					</li>
					<li><a class="" href="contact.html">Contact Us</a></li>-->

								</ul>
			<ul class="nav navbar-nav navbar-left fa-kr-default">
					<li>
					<?
					if($this->session->userdata('no')==null) {
						echo("<li><a class='login' href='/~team19/login'><i class='fa fa-lock'></i></a></li>");
					}
					else if($this->session->userdata('no')!=null||$this->session->userdata('no')=="0"){
			
						echo("
							<li><a class='mypage' href='/~team19/mypage'><i class='glyphicon glyphicon-user'></i></a></li>");
						echo("<li><a class='login' href='/~team19/login/logout'>Logout</i></a></li>");
					}
					?>
			</li>
			</ul>
				</ul>
			<!-- //navbar-collapse -->
		</nav>  
	</div>	
	<!-- //header -->
	</div>	