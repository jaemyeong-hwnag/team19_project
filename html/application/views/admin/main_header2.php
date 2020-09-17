<!doctype html>
<html lang="ko">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>판매관리</title>
    <!-- Bootstrap CSS -->
	<link href="/~team19/my/css/bootstrap.min.css" rel="stylesheet">
	<link href="/~team19/my/css/my.css" rel="stylesheet">
	<script src="/~team19/my/js/jquery-3.3.1.min.js"></script>
    <script src="/~team19/my/js/popper.min.js"></script>
    <script src="/~team19/my/js/bootstrap.min.js"></script>
	
	<script src="/~team19/my/js/moment-with-locales.min.js"></script>
	<script src="/~team19/my/js/bootstrap-datetimepicker.js"></script>
	<link href="/~team19/my/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<link rel="stylesheet" href="/~team19/my/css/fontawesome-all.min.css">
    
  </head>
  <body><!-- 풀다운메뉴 -->
    <div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/~team19/admin/main"><img src="/~sale22/product_img/logo.gif" width="100px" height="50px" border="10px"></a>	<!-- 메뉴이름 -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
	<!-- 메뉴들 -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>항공</b></a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="/~team19/admin/air"><b>항공사</b></a>
				<a class="dropdown-item" href="/~team19/admin/country"><b>나라</b></a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>여행</b></a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href="/~team19/admin/kind"><b>상품종류</b></a>
				<a class="dropdown-item" href="/~team19/admin/pgubun"><b>패키지종류</b></a>
				<a class="dropdown-item" href="/~team19/admin/tour"><b>여행상품</b></a>
			</div>
		</li>

		<li class="nav-item"><a class="nav-link" href="/~team19/admin/member"><b>회원관리</b></a></li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>예약현황</b></a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="/~team19/admin/yeyag"><b>예약</b></a>
				
			</div>
			</li>
		<li class="nav-item"><a class="nav-link" href="#"><b>사진</b></a></li>
        </ul>
		   </div>
		</nav>