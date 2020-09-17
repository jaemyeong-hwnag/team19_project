<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<div class="alert mycolor1 mymargin15" role="alert">사용자</div>
	
	<form name="form1" method="post"action="">
		<table class="table table-bordered table-sm mymargin5">
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 이름</td>
			<td width="80%" align="left"><div class="form-inline"><input  type="text" name="name"  value="<?=set_value("name"); ?>" ><? If (form_error("name")==true) echo form_error("name"); ?>

			</td>
			
				</div>
			</td>
		</tr>
		<!-- 아이디, 암호, 전화, 등급  행 추가 -->
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 아이디</td>
			<td width="80%" align="left"><div class="form-inline">
			<input  type="text" name="uid" size="20" maxlength="20" value="">
			
				
				</div>
			</td>
		</tr>
				<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font>암호</td>
			<td width="80%" align="left"><div class="form-inline">
					<input  type="text" name="pwd" size="20" maxlength="20" value="">
					
				</div>
			</td>
		</tr>
		
	<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">전화</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input  type="text" name="tel1" size="3" maxlength="3" value="">- 
					<input  type="text" name="tel2" size="4" maxlength="4" value="">- 
				    <input  type="text" name="tel3" size="4" maxlength="4" value="">
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">등급</td>
			<td width="80%" align="left">
				<div class="form-inline">
				
					<input  type="radio" name="rank" value="0"> 사용자 &nbsp&nbsp;
					<input  type="radio" name="rank" value="1"> 관리자
					
				
				</div>
			</td>
		</tr>


		</table>
		<div align="center">
			
			<input type="submit" value="저장" class="btn btn-sm mycolor1">
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onclick="history.back();">
			<!-- 수정,삭제,저장,이전버튼 -->
		</div>
	</form>


    </div><!--container 끝-->
</body>
</html>



