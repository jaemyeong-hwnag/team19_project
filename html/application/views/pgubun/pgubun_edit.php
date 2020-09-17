<br>
<div class="container">
<div class="alert mycolor1 mymargin5" role="alert">상품종류</div>

<form name="form1" method="post" action="">

<table class="table table-bordered table-sm mymargin5">

<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">번호</td>
    <td width="80%" align="left"><?=$row->no; ?></td>
</tr>

<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 종류명</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input type="text" name="name" size="40" maxlength="40" value="<?=$row->name ?>"
                         class="form-control from-control-sm">
        </div>
		<? If (form_error("name")==true) echo form_error("name"); ?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red"></font>패키지 경로</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input type="text" name="root" size="40" maxlength="40" value="<?=$row->root ?>"
                         class="form-control from-control-sm">
        </div>

    </td>
</tr>
</table>

<div align="center">
<input type = "submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
<input type ="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>