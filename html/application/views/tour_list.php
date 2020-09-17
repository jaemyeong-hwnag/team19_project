<div class="albums">
	<div class="container">
		<h3 class="agile-title">해외 패키지</h3> 
		<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
		<?
			foreach ($list as $row)
			{
				$no=$row->no;
				if($no){
		?>
		<div class="col-md-6 w3lsalbums-grid">
			<div class="albums-left"> 
				<div> <img src="/~team19/tour_img/<?=$row->pic ?>" class="wthree-almub" height="250px"></img>
				</div>
			</div>
			<div class="albums-right">
				<h4><?=$row->name ?></h4>
				<p><?=$row->txt ?></p>
				<p><?=$row->price ?>원</p>
				<a class="w3more" href="/~team19/tour1/view/no/<?=$no;?><?=$tmp;?>"><i class="fa fa-mail-forward" aria-hidden="true"></i> More</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?
				}
		}
		?>

		<div class="clearfix"></div> 
	</div>
</div>
<div class="container"><div class="row"><div class="col"></div><div class="col"><?=$pagination; ?></div><div class="col"></div></div></div>
