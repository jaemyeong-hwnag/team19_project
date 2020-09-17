		<div class="alert alert-danger" role="alert">예약 추가</div>
		<script>
			$(function() {
				$("#regday").datetimepicker({
					locale: "ko",
					format: "YYYY-MM-DD",
					defaultDate: moment()
				});
			});
		</script>

		<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
		<table class="table table-sm table-bordered  mymargin5">
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 상품명</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<select name="tour_no" class="form-control form-control-sm">
						<option value="">선택하세요</option>
<?
	$tour_no=set_value("tour_no");
	foreach ($list as $row)
	{
		if ($row->no==$tour_no)
			echo("<option value='$row->no' selected>$row->name</option>");
		else
			echo("<option value='$row->no'>$row->name</option>");
	}
?>
						</select>
				</div>
				<? if(form_error("tour_no")==true) echo form_error("tour_no"); ?>
			</td>
		</tr>
		<!--
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 상품종류</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="button" name="tour_no" size="1000" value="항공사 찾기"onClick="find_air();" value="<?=set_value("tour_no"); ?>"
								 class="form-control form-control-sm">
				</div>
				<? if(form_error("tour_no")==true) echo form_error("tour_no"); ?>
			</td>
		</tr>
		-->
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 아이디</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="member_no" value="" class="form-control form-control-sm">
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 성인</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="p_gubun" size="20"
								 class="form-control form-control-sm">
				</div>
			</td>
		</tr>
		
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 어린이</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="p_gubun2" size="20"
								 class="form-control form-control-sm">
				</div>
			</td>
		</tr>
		<tr>
				<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 날짜</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<div class="input-group input-group-sm date" id="regday">
					<input type="text" name="regday" value="<?=set_value("regday") ?>" class="form-control form-control-sm">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>	
			</div>
					<? if(form_error("regday")==TRUE) echo form_error("regday");?>
				</td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 상태</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="radio" name="status" value="0" checked>예약확인&nbsp&nbsp
					<input type="radio" name="status" value="1">예약미확인
				</div>
			</td>
		</tr>
		<!--
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 사진</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="file" name="pic" value="" class="form-control form-control-sm">
				</div>
			</td>
		</tr>
		-->
		</table>
		<div align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
		</div>
		</form>