<?
	$no=$row->no;
?>
	 <section class="contact-w3ls">
<div class="container">
		<h3 class="agile-title">My Page</h3>
		<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10" style="float: none; margin: 0 auto;" data-aos="flip-left">
			<div class="">
				<h4>Get In Touch</h4>
				<form action="#" method="post">
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">이름</label> 
                            <div type="text" class="form-control" name="name" id="name" placeholder=" " required=""><?=$row->name;?>
                            <p class="help-block"></p>
                        </div>
                    </div>	
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">연락처</label><br/>
                            <div type="text" class="form-control" name="tel1" style="width:100%;"><?=$row->tel;?>
							<p class="help-block"></p>
						</div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">아이디</label><br/>
                            <div type="text" class="form-control" style="width:100%;" name="uid" id="uid"><?=$row->uid ;?>
							
							<p class="help-block"></p>
						</div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">비밀번호</label>
                            <div type="passwd" class="form-control" name="pwd" id="pwd" placeholder=" " required=""><?=$row->pwd;?>
							<p class="help-block"></p>
						</div>
                    </div><br>
					<div align="center">
						<input type="submit" value="수정" class="btn btn-sm mycolor1">&nbsp;
						<input type="button" value="삭제" class="btn btn-sm mycolor1" onclick="history.back();">
					</div>
				</form>            
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</section>
  </body>
</html>