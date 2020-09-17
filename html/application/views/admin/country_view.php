
		<?
			$no=$row->no;

			$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
		?>
		<div class="alert mycolor1" role="alert">국가</div>
		
		<form name="form1" method="post" action="">
		<table class="table table-bordered table-sm mymargin5">
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$row->no; ?></div>
			</td>
		</tr>

		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 나라명</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$row->name; ?></div>
			</td>
		</tr>

		</table>
		<div align="center">
			<a href="/~team19/country/edit<?=$tmp;?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team19/country/del<?=$tmp;?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
		</div>
		</form>