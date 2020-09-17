<?    $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
		$title = null;
		$gubun=urldecode($this->uri->segment(2));

		if($gubun=="foreign_tour_list") $title = "해외여행";
		else if($gubun=="domestic_tour_list") $title = "국내여행";
		else $title = "패키지여행";
?>
<div class="albums">
	<div class="container">
	<? 

	?>
		<h3 class="agile-title"><?= $title;?></h3> 
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
				<a class="w3more" href="/~team19/tour1/view/no/<?=$no;?><?=$tmp;?>"><i class="fa fa-mail-forward" aria-hidden="true"></i> More</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?
			}
		?>

		<div class="clearfix"></div> 
	</div>
</div>
<div class="container"><div class="row"><div class="col"></div><div class="col" align="center"><?=$pagination; ?></div><div class="col"></div></div></div>
