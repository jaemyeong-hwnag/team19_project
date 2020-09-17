<script>
var chk;
$(function(){
	$("#uid_check").click(function(){
		var uid=$("#uid").val();
		if( uid == "" ){
		alert('ID를 입력해주세요.');
		return false;
		}
		
		$.ajax({
			url:"/~team19/signup/id_check", 
				type: "POST", 
				data:{
				"uid":uid
			},
			dataType: "text", complete: function(xhr, textStatus){
					var check=xhr.responseText;
					if(check==1){
					$("#ch").val(check).trigger('change');
					alert('사용가능한 ID 입니다.');
					chk=1;
					/*$('#save').remove();
					$("#btn").append(
						"<input type='submit' value='완료' id='save' class='btn btn-sm mycolor1'>"
						)*/

					}else if (check==0)
					{
						alert('중복된 ID 입니다.');
						$("#ch").val("").trigger('change');
						chk=0;
						/*$('#save').remove();
						$("#btn").append(
						"<a href='#' id='save' class='btn btn-sm mycolor1'>료</a>"
						)*/
					}
			}
		});
	});
		});
$(function(){
		var frm = $("form[name='form1']");
		var ch = $("#ch").val();
		frm.submit(function(){
			if(chk!=1){
				console.log("ㅋㅋㅋㅋ"+chk);
                alert("아이디 중복체크해주세요");
                return false;
            }
		});
	});
</script>
		<!--<form name="form1" method="post" action="">
			<table class="">
			<tbody class="">
			<tr>
				<td width="20%" class="" style="vertical-align:middle">
					이름
				</td>
				<td width="80%" align="left">
					<div class="">
						<input  type="text" name="name" class="" value="<?=set_value("name");?>">
					</div>
					<?if(form_error("name")==true) echo form_error("name");?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="" style="vertical-align:middle">
					아이디
				</td>
				<td width="80%" align="left">
					<div class="">
						<input  type="text" name="uid" id="uid" class="" value="<?=set_value("uid");?>">
						<a href='#' class='badge badge-primary' id='uid_check'>중복체크</a>
					</div>
					<?if(form_error("uid")==true) echo form_error("uid");?>
					
				</td>
				<input type="hidden" value='' name="ch" id="ch">
			</tr>
			<tr>
				<td width="20%" class="" style="vertical-align:middle">
					암호
				</td>
				<td width="80%" align="left">
					<div class="">
						<input  type="text" name="pwd" class="" value="<?=set_value("pwd");?>">
					</div>
					<?if(form_error("pwd")==true) echo form_error("pwd");?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="info" style="vertical-align:middle">
					전화
				</td>
				<td width="80%" align="left">
					<div class="">
						<input  type="text" name="tel1" size="3" class="" value="<?=set_value("tel1");?>">&nbsp;-&nbsp;
						<input  type="text" name="tel2" size="4" class="" value="<?=set_value("tel2");?>">&nbsp;-&nbsp;
						<input  type="text" name="tel3" size="4" class="" value="<?=set_value("tel3");?>">
					</div>
				</td>
			</tr>
			<input type="hidden" name="rank" value="0">
			</tbody>
			</table>
			<div align="center" id="" class="">			
				
				<input class="w3l_btn" type="submit" value="완료">

				<input class="w3l_btn" type="button" value="이전화면" onClick="history.back();"> &nbsp;
			</div>
		</form>
	 </div>-->
	 <section class="contact-w3ls">
<div class="container">
		<h3 class="agile-title">Sign Up</h3>
		<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10" style="float: none; margin: 0 auto;" data-aos="flip-left">
			<div class="">
				<h4>Get In Touch</h4>
				<form name="form1" action="#" method="post">
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">이름</label> 
                            <input type="text" class="form-control" name="name" id="name" placeholder=" " required="">
                            <p class="help-block"></p>
                        </div>
                    </div>	
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">연락처</label><br/>
                            <input type="text" class="form-control" name="tel1" style="width:15%; display: inline;" maxlength="3" value="<?=set_value("tel1");?>">&nbsp;
							<label class="contact-p1">-</label>&nbsp;
							<input type="text" class="form-control" name="tel2" style="width:20%; display: inline;" maxlength="4" value="<?=set_value("tel2");?>">&nbsp;
							<label class="contact-p1">-</label>&nbsp;
							<input type="text" class="form-control" name="tel3" style="width:20%; display: inline;" maxlength="4" value="<?=set_value("tel3");?>">
							<p class="help-block"></p>
						</div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">아이디</label><br/>
                            <input type="text" class="form-control" style="width:90%; display: inline;" name="uid" id="uid">
							<a href='#' class='btn' id='uid_check' style="align: left; background:#00bfff;font-size: 1em;color: #fff;">중복체크</a>
							<p class="help-block"></p>
						</div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1">비밀번호</label>
                            <input type="passwd" class="form-control" name="pwd" id="pwd" placeholder=" " required="">
							<p class="help-block"></p>
						</div>
                    </div>
					<input type="hidden" name="rank" value="0">
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">완료</button>
				</form>            
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</section>
  </body>
</html>