<!-- welcome -->
<div class="about w3layouts-agileinfo">
	<div class="container">
		<div class="about-top w3ls-agile">
			<div class="col-md-6 come">
			<img src="/~team19/img/1.jpg">
				<!---<img class="img-responsive" src="images/well2.jpg" alt="">
				<img class="img-responsive" src="images/well.jpg" alt="">--->
				<!--<div class="position-w3l">
				<img src="/~team19/img/1.jpg">
				</div>--->
			</div>
			<div class="col-md-6 come">
				<div class="about-wel">
					<h5>Welcome To Our Tourism</h5>
					<p>Masagni dolores eoquie int Basmodi temporant, nicmquam eius, Basmodi temurer sehsMunim.</p>
					<p>Basmodi temporant, ut laboreas dolore magnam kuytase uaeraquis autem vel eum iure reprehend.Unicmquam eius, Basmodi temurer sehsMunim.</p>
				</div>
				<div class="steps-wel">
					<h5>Follow Us For Easy Steps</h5>
					<div class="col-md-3 col-sm-3 col-xs-3 w3ls_banner_bottom_grids first-posi-w3l">
						<div class="w3l_banner_bottom_grid1">
							<i class="fa fa-phone hvr-pulse-shrink" aria-hidden="true"></i>
						</div>
						<div class="w3l_banner_bottom_grid1">
							<i class="fa fa-users hvr-pulse-shrink" aria-hidden="true"></i>
						</div>
						<div class="w3l_banner_bottom_grid1">
							<i class="fa fa-map-marker hvr-pulse-shrink" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2 w3ls_banner_bottom_grids">
						<h6>01</h6>
						<h6>02</h6>
						<h6>03</h6>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-7 w3ls_banner_bottom_grids">
						<p>Masagni dolores eoquie int Basmodi Basmodi temurer.</p>
						<p>Masagni dolores eoquie int Basmodi Basmodi temurer.</p>
						<p>Masagni dolores eoquie int Basmodi Basmodi temurer.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //welcome -->
<!-- stats -->
<div class="stats">
	<div class="container">
		<div class="stats-info">
			<div class="col-md-4 col-sm-4 stats-grid slideanim">
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?=$total_count;?>' data-delay='.5' data-increment="1"><?=$total_count;?></div>
				<h4 class="stats-info">총 패키지 수</h4>
			</div>
			<div class="col-md-4 col-sm-4 stats-grid slideanim">
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?=$k_count;?>' data-delay='.5' data-increment="1"><?=$k_count;?></div>
				<h4 class="stats-info">국내 여행</h4>
			</div>
			<div class="col-md-4 col-sm-4 stats-grid slideanim">
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?=$h_count;?>' data-delay='.5' data-increment="10"><?=$h_count;?></div>
				<h4 class="stats-info">해외 여행</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //stats -->
<!-- Popular -->
<div class="albums">
	<div class="container">
		<h3 class="agile-title">TOUR</h3> 
		<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
		<?
			foreach ($list as $row)
			{
				$no=$row->no;
		?>
		<div class="col-md-6 w3lsalbums-grid">
			<div class="albums-left"> 
				<div> <img src="/~team19/tour_img/<?=$row->pic ?>" class="wthree-almub" height="250px"></img>
				</div>
			</div>
			<div class="albums-right">
				<h4 style="overflow: hidden; text-overflow: ellipsis;white-space: nowrap; width: 210px; height: 24px;"><?=$row->name ?></h4>
				<p class="fa-kr-default" style="overflow: hidden; text-overflow: ellipsis;white-space: nowrap; width: 210px; height: 50px;"><?=stripslashes(nl2br($row->txt)); ?></p>
				<br>
				<p><?=number_format($row->price) ?>원</p>
				<a class="w3more" href="/~team19/tour1/view/no/<?=$no;?>"><i class="fa fa-mail-forward" aria-hidden="true"></i> More</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?
			}
		?>
		<div class="clearfix"></div> 
	</div>
</div>
<!-- //Popular --> 
