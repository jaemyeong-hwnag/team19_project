<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?
 $no=$row->no;
 $tel1=trim(substr($row->tel,0,3));
 $tel2=trim(substr($row->tel,3,4));
 $tel3=trim(substr($row->tel,7,4));
 $tel=$tel1 . "-" . $tel2 . "-" . $tel3;
 $rank=$row->rank==0?"직원":"관리자"; 

			$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
		?>
<div class="alert mycolor1 mymargin15" role="alert">사용자</div>
	
	<form name="form1" method="member_insert.html">
		<table class="table table-bordered table-sm mymargin5">
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
			<td width="80%" align="left"><?=$row->no;?></td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 이름
			</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$row->name;?>
				</div>
			</td>
		</tr>

		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 아이디</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$row->uid;?>
				</div>
			</td>
		</tr>
				<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font>암호</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$row->pwd;?>
				</div>
			</td>
		</tr>
		
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">전화</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$tel;?>
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">등급</td>
			<td width="80%" align="left">
				<div class="form-inline"><?=$rank;?>
				</div>
			</td>
		</tr>

		</table>
		<div align="center">
			<a href="/~team19/admin/member/edit<?=$tmp;?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team19/admin/member/del<?=$tmp;?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onclick="history.back();">

		</div>
	</form>


    </div>
</body>
</html>



