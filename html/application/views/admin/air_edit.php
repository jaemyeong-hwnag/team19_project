		<div class="alert mycolor1" role="alert">항공사</div>
		
		<form name="form1" method="post" action="">
		<table class="table table-sm table-bordered  mymargin5">
		
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
			<td width="80%" align="left"><?=$row->no; ?></td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 항공사명</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="text" name="name" size="20" value="<?=$row->name; ?>"
								 class="form-control from-control-sm">
				</div>
				<? if(form_error("name")==true) echo form_error("name"); ?>
			</td>
		</tr>

		</table>
		<div align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
		</div>
		</form>