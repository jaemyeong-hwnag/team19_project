<?
    $no=$row->no;

	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
<br>
<div class="alert mycolor1" role="alert">상품종류</div>

<form name="form1" method="post" action="">

<table class="table table-bordered table-condensed mymargin5">

<tr>
    <td width="20%" class="info" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><div class=
	"form-inline"><?=$row->no; ?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 상품종류명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        패키지경로
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->root; ?>
        </div>
    </td>
</tr>
</table>


<div align="center">
<a href="/~team19/pgubun/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
<a href="/~team19/pgubun/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;
&nbsp;
<input type ="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">

</div>
</form>