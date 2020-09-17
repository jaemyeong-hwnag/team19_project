<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<div class="alert mycolor1 mymargin15" role="alert">사용자</div>
	
	<form name="form1" method="post"action="">
		<table class="table table-bordered table-sm mymargin5">
		<tr>
		<td width="20%" class="mycolor2" style="vertical-align:middle">번호</td>
		<td width="80%" align="left"><?=$row->no;?></td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 이름</td>
			<td width="80%" align="left"><div class="form-inline"><input  type="text" name="name" size="20" maxlength="20" value="<?=$row->name;?>">
			</td>
			
				</div>
			</td>
		</tr>

		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font> 아이디</td>
			<td width="80%" align="left"><div class="form-inline">
			<input  type="text" name="uid" size="20" maxlength="20" value="<?=$row->uid;?>">
			
				
				</div>
			</td>
		</tr>
				<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle"><font color="red">*</font>암호</td>
			<td width="80%" align="left"><div class="form-inline">
					<input  type="text" name="pwd" size="20" maxlength="20" value="<?=$row->pwd;?>">
					
				</div>
			</td>
		</tr>
		<?
		$tel1=trim(substr($row->tel,0,3));
		$tel2=trim(substr($row->tel,3,4));
		$tel3=trim(substr($row->tel,7,4));
		?>
	<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">전화</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input  type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1;?>">- 
					<input  type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2;?>">- 
				    <input  type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3;?>">
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">등급</td>
			<td width="80%" align="left">
				<div class="form-inline">
				<?
				if($row->rank==0)
				{
					?>
				<input type="radio" name="rank" value="0" checked>사용자
				<input type="radio" name="rank" value="1">관리자
				<?
				} else
				{
					?>
				<input type="radio" name="rank" value="0">사용자
				<input type="radio" name="rank" value="1"checked>관리자
				<?
				}
				?>

					
				
				</div>
			</td>
		</tr>


		</table>
		<div align="center">
			
			<input type="submit" value="저장" class="btn btn-sm mycolor1">
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onclick="history.back();">

		</div>
	</form>


    </div>
</body>
</html>



