		<?
			$no=$row->no;
			
			$status = $row->status==0 ? "판매" : "매진" ;
			$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
		?>
		<div class="alert alert-danger" role="alert">예약추가</div>
		
		<form name="form1" method="post" action="">
		<table class="table table-bordered table-sm mymargin5">
		
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 패키지종류</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->tour_no; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"><font color="red">*</font> 상품명</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->tour_name; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"> 멤버번호</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->member_no; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle">성인</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->p_gubun; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle"></font> 어린이</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->p_gubun2; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle">날짜</td>
			<td width="80%" align="left"><div class="form-inline"><?=$row->regday; ?></div></td>
		</tr>
		<tr>
			<td width="20%" class="alert-warning" style="vertical-align:middle">예약진행</td>
			<td width="80%" align="left"><div class="form-inline"><?=$status; ?></div></td>
		</tr>
		</table>
		<div align="center">
			<a href="/~team19/admin/yeyag/edit<?=$tmp;?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team19/admin/yeyag/del<?=$tmp;?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>
			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
		</div>
		</form>