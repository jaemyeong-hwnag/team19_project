		<div class="alert alert-danger" role="alert">예약수정</div>
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
	// $gubun_no=set_value("gubun_no");
	foreach ($list as $row1)
	{
		if ($row->tour_no==$row1->no)
			echo("<option value='$row1->no' selected>$row1->name</option>");
		else
			echo("<option value='$row1->no'>$row1->name</option>");
	}
?>
						</select>
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 아이디</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="member_no" size="20" value="<?=$row->member_no;?>"
								 class="form-control from-control-sm">
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 성인</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="p_gubun" value="<?=$row->p_gubun;?>" class="form-control from-control-sm">
				</div>
			</td>
		</tr>

		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 어린이</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="p_gubun2" value="<?=$row->p_gubun2;?>" class="form-control from-control-sm">
				</div>
			</td>
		</tr>
				<td width="20%" class="alert-warning" style="vertical-align:middle">날짜</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<div class="input-group input-group-sm date" id="regday">
					<input type="text" name="regday" value="<?=$row->regday;?>" class="form-control form-control-sm">
					<div class="input-group-append">
					<div class="input-group-text">
					<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>	
			</div>
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
			</td>
		</tr>

		</table>
		<div align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
		</div>
		</form>