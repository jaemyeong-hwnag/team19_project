<?
    $no=$row->no;
	
	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
?>
<br>
<div class="alert mycolor1" role="alert">tour</div>

<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">

<table class="table table-bordered table-condensed mymargin5">

<tr>
    <td width="20%" class="info" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><div class=
	"form-inline"><?=$row->no; ?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 출발날짜
    </td>
    <td width="80%" align="left">
        <div class="form-inline"><?=$row->sdate; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 도착날짜
    </td>
    <td width="80%" align="left">
        <div class="form-inline"><?=$row->edate; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 상품명</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 상품종류</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->kind_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 여행사종류</td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->air_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 금액</td>
    <td width="80%" align="left">
        <div class="form-inline"><?=$row->price; ?></div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<!--<b>파일이름</b> : <?=$row->pic15; ?><br>-->
        </div>
		<?
			if($row->pic)
				echo("<img src='/~team19/tour_img/$row->pic' width='200' class='img-fluid img-thumbnail'>");
			else
				echo("<img src='' width='200 class='img-fluid img-thumbnail'>");
		
		?>
    </td>
</tr>

<tr>
			<td width="20%" class="mycolor2" style="vertical-align:middle">
				<font color="red">*</font> 내용</td>
			<td width="80%" align="left" rows="20" cols="100%">
				<div class="form-inline"><?=stripslashes(nl2br($row->txt)); ?></div>
			</td>
		</tr>

</table>


<div align="center">
<a href="/~team19/admin/tour/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
<a href="/~team19/admin/tour/del<?=$tmp; ?>"  class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;
&nbsp;
<input type ="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">

</div>
</form>