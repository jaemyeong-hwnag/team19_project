		<?
			$no=$row->no;
		?>
		<!--<script>
		function cal_prices()
		{
			form1.prices.value=Number(form1.price.value)*Number(form1.numo.value);
			form1.bigo.focus();
		}
		</script>-->
		<script>
	$(function(){
		var m_no;
	$("#comment_add").click(function(){
		console.log("zzzzzzzzzzzz");
		var comment=$("#comment").val();
		var board_no=$("#board_no").val();
		$.ajax({

			url:"/~team19/tour1/commentAdd", 
				type: "POST", 
				data:{
				"comment":comment, "board_no":board_no
			},
			dataType: "text", complete: function(xhr, textStatus){
					//var data=xhr.responseText[0];
					//console.log(xhr["comment"].response);
					data=xhr.responseText;
					//console.log(JSON.stringify(data[0].no));
					no=data[0].no;
					comment=data[0].comment;
					//var comment=xhr;
					var comment=$("#comment").val();
			var name=$("#name").val();
			var writeday=$("#writeday").val();

			data=JSON.parse(xhr.responseText);
			console.log(JSON.stringify(data[0].no));
			no=data[0].no;
			m_no=data[0].no;
			console.log(JSON.parse(xhr.responseText));
			console.log(data[0]);

			$("#table_list").append(
			"<tr id='rowno"+no+"'>"+
				"<td width='10%'>"+name.replace('\\','')+"</td>"+ 
				"<td width='70%'> "+comment+"</td>"+ 
				"<td width='10%'>"+writeday+"</td>"+ 
				"<td><a href='#' rowno='"+no+"' class='ajax_del btn'>삭제</a></td>"
			+"</tr>");
			$("#comment").val("");
			}    ,error:function(request,status,error){
    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);}
		});
	});
		});
	$(function(){
	$("#table_list").on("click",".ajax_del",function(){
		console.log("zzzzzzzzzzzz");
		if(confirm("삭제할까요?")){
			$.ajax({
			url:"/~team19/tour1/commentDel", type: "POST",data:{"no":$(this).attr("rowno")}, 
			dataType: "text", complete: function(xhr, textStatus){
			var no=JSON.stringify(data[0].no);
			console.log(JSON.stringify(data[0].no));
			$('#rowno'+no).remove();
			}
		});
		};
});
		});
</script>

		<script>
		$(function(){ 
		  $('.bt_up1').click(function(){ 
			var num = +$(".price1").val()+1;
			$(".price1").val(num);
		  });

		  $('.bt_down1').click(function(){ 
			var num = +$(".price1").val()-1;
			if(num>-1) $(".price1").val(num);
		  });

		  $('.bt_up2').click(function(){ 
			var num = +$(".price2").val()+1;
			$(".price2").val(num);
		  });

		  $('.bt_down2').click(function(){ 
			var num = +$(".price2").val()-1;
			if(num>-1) $(".price2").val(num);
		  });
		})
		</script>
		<div class="container" bgcolor="black">
		<!----- 이름 ------->
		 <br><br><br>
		<h3 class="agile-title"><?=$row->name ?></h3> 
		<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
      <!----- 이름끝 ------->
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7"><h1 class="h2"></h1> </div>
              
          </div>
        </div>
      </div>

      <div id="content">
        <div class="container">
          <div class="row bar">


            <!-- LEFT COLUMN _________________________________________________________-->
            <div class="col-md">
             <!-- <p class="lead">Built purse maids cease her ham new seven among and. Pulled coming wooded tended it answer remain me be. So landlord by we unlocked sensible it. Fat cannot use denied excuse son law. Wisdom happen suffer common the appear ham beauty her had. Or belonging zealously existence as by resources.</p>
              <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>---><BR>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">

                    <div class="col-10"> <img src="/~team19/tour_img/<?=$row->pic ?>" alt="" class="img-fluid" width="700px" height="450px"></div>
                  </div>
                </div>
                <div class="col-sm-6" align="center">
                  <div class="box">
											<?
						if($this->session->userdata('no')!=null) {
						?>
                    <form name="form1" action="/~team19/tour1/add/no/<?=$no?>" method="post">
						<?}else{?><form name="form1" action="/~team19/login" method="post"><?}?>
                      <div class="sizes" align="center">
						<div class="alert alert-info" style="margin: 0 100px 38px 110px;" role="alert"></div>
						<div align="center"><h4><?=number_format($row->price) ?> 원</h4></div>
						<br>
						<script>
							$(function(){
							$("#sdate") .datetimepicker({
								locale: "ko",
								format: "YYYY-MM-DD",
								defaultDate: moment()
								});
							});
							$(function(){
							$("#edate") .datetimepicker({
							locale: "ko",
							format: "YYYY-MM-DD",
							defaultDate: moment()
								});
							});
						</script>
						<!----<div class="book_date">
							<div class="book_date" >--->
								<input type="hidden" name="sdate" value="<?=$row->sdate?>">
								<input type="hidden" name="price" value="<?=$row->price?>">
								<input type="hidden" value="<?=date("Y-m-d");?>"name="writeday" id="writeday">
								<input type="hidden" value="<?=$row->no;?>"name="board_no" id="board_no">
								<input type="hidden" value="<?=$this->session->userdata('name');?>"name="name" id="name">
								<div>
									<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
									<?=$row->sdate?>~<?=$row->edate?>
								</div>
<!-- 								<input  id="sdate" name="sdate" type="text" value="<?=$row->sdate?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" color="black">&nbsp;&nbsp;~&nbsp;&nbsp;  -->
<!--  -->
<!-- 							<!----</div>	 -->
<!-- 						</div>--->
<!-- 							<!----<div class="book_date">---> 
<!-- 								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> -->
<!-- 									<input  id="edate" name="edate" type="text" value="<?=$row->edate?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required=""> -->
<!-- 									<br><br> -->
<!-- 							<!----</div>	--->
							<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>성인</label>
									<div class="numbers-row">
											<input type="number" min="0" value="1" style="width:15%; display: inline;" id="count" class="qty2 form-control price1" name="price1" onchange="count1();">
<!-- 										<div class="btn bt_up1">+</div> -->
<!-- 										<div class="btn bt_down1" style="background: #ff2f68;">-</div> -->
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>어린이</label>
									<div class="numbers-row">
										<input type="number" value="0"  min="0" id="countb" style="width:15%; display: inline;" class="qty2 form-control price2" name="price2" onchange="count1();">
<!-- 										<div class="btn bt_up2" id="plus2" onclick="plus2()">+</div> -->
<!-- 										<div class="btn bt_down2" style="background: #ff2f68;" id="moins2" onclick="minus2()">-</div> -->
									</div>
								</div>
							</div>

						</div>
<!---<div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button">Button</button>
    
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
  <button  class="btn btn-outline-secondary" type="button">Button</button>
</div>-->
                        <!---<select class="bs-select">
                          <option value="small">Small</option>
                          <option value="medium">Medium</option>
                          <option value="large">Large</option>
                          <option value="x-large">X Large</option>
                        </select>-->
                      </div>
					  <hr style="margin: 10px 100px;" >
                      
                      <p class="text-center">
						<?
						if(!$this->session->userdata('no')) {
						?>
                        <button type="submit" href="" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn  fa-kr-default" style="margin:0;"><i class="fa fa-plane"></i>  로그인 </button>
						<?}else{?>
						<button href="/~team19/login" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn  fa-kr-default" style="margin:0;"><i class="fa fa-plane"></i>  예약하기 </button>
						<?}?>
                      </p>
                    </form>
                  </div>
				  <br>
                  <div class="alert alert-info" style="margin: 0px 100px 20px 110px;" role="alert"></div>
                </div>
              </div>
              <div id="details" class="box mb-4 mt-4 fa-kr-default">
                <hr>
				<br><br><br><br><br><br>
                <h4>Product details</h4>
				<br>
				<h4>Air</h4>
				<br>
                <ul>
                  <li><?=$row->air_name?></li>
                </ul>
				<hr>
                <h4>Date</h4>
				<br>
                <ul>
                  <li>날짜 : <?=$row->sdate?> ~ <?=$row->sdate?></li>
                </ul>
				<hr>
                <p class="fa-kr-default" style="color:black;"><?=stripslashes(nl2br($row->txt))?></p>
				<hr>
				<h2 align="center" id="h2.-bootstrap-heading">상품평<a class="anchorjs-link" href="#h2.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2>
				 <table class="table table-bordered table-sm mymargin5" id="table_list">
		<?
			foreach ($commentList as $row)                             // 연관배열 list를 row를 통해 출력한다.
			{

		?>
			<tr id="rowno<?=$row->no;?>">
				<td width="10%"><?=stripslashes(nl2br($row->member_name));?></td>
				<td width="75%" align="left"><?=stripslashes(nl2br($row->comment));?></td>
				<td width="10%"><?=$row->writeday;?></td>

				<?
					if($row->member_no==$this->session->userdata('no')){
						echo("<td width='5%' ><a href='#' rowno='".$row->no."'class='ajax_del btn'>삭제</a></td>");
					}
					else{
						echo("<td width='5%'>  </td>");
					}
				?>
			</tr>
		<?
			}
		?>
		   		<table class="table table-bordered table-sm mymargin5">
		<tr>
			<td>
				<textarea class="form-control" name="comment" rows="3" cols="100%" id="comment"></textarea>
			</td>
			<td align="center">
				<?
					if($this->session->userdata('no')){
				?>
				<a href="#" class="btn btn-sm mycolor1" id="comment_add" style="margin: 10px;" >댓글쓰기</a>
				<?
					}else{
				?>
				<a href='#loginModal' class="btn btn-sm mycolor1" data-toggle='modal' style="margin: 10px;">댓글쓰기</a>
				<?
					}
				?>
			</td>
		</tr>
		</table>
                <blockquote class="blockquote">
                  <p class="mb-0"><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                </blockquote>
              </div>
              <div id="product-social" class="box social text-center mb-5 mt-5">
                <h4 class="heading-light">Show it to your friends</h4><br>
                <ul class="social list-inline">
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>


              <br><br>
            </div>
           </div>
		  
		   </div></div></div>

		   <!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        로그인이 안 되어있습니다.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->