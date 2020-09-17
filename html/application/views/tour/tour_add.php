<br>
<div class="container">
<div class="alert" role="alert">여행 상품</div>
<script>
	function find_kind() //상품종류 찾기
	{
		window.open("/~team19/findkind","","resizable=yes,scrollbar=yes,width=500,height=600");
	}
	function find_air() //항공사 찾기
	{
		window.open("/~team19/findair","","resizable=yes,scrollbar=yes,width=500,height=600");
	}
</script>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 상품종류명</td>
    <td width="80%" align="left">
        <div class="form-inline">
		<input type="hidden" name="kind_no" value="<?=set_value('kind_no'); ?>">

		<input type="text" name="kind_name" value="" class="form-control form-control-sm" disabled>
		<input type="button" value="상품종류 찾기" onClick="find_kind();" class="form-control btn btn-sm mycolor1">

        </div>
		
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 항공사</td>
    <td width="80%" align="left">
        <div class="form-inline">
		<input type="hidden" name="air_no" value="<?=set_value('air_no'); ?>">

		<input type="text" name="air_name" value="" class="form-control form-control-sm" disabled>
		<input type="button" value="항공사 찾기" onClick="find_air();" class="form-control btn btn-sm mycolor1">

        </div>
		<? if(form_error("air_no")==TRUE) echo form_error("air_no");?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 상품명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input type="text" name="name" size="20" maxlength="20" value="<?= set_value('name'); ?>"
                         class="form-control from-control-sm">
						 <? If (form_error("name")==true) echo form_error("name"); ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 가격
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input type="text" name="price" size="20" maxlength="20" value="<?= set_value('price'); ?>"
                         class="form-control from-control-sm">
						 <? If (form_error("price")==true) echo form_error("price"); ?>
        </div>
    </td>
</tr>
<script>
	$(function(){
		$("#sdate") .datetimepicker({
			locale: "ko",
			format: "YYYY-MM-DD",
			defaultDate: moment()
		});
	});
	$(function(){
		$("#edate") .datetimepicker({
			locale: "ko",
			format: "YYYY-MM-DD",
			defaultDate: moment()
		});
	});
</script>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        출발일
    </td>
    <td width="80%" align="left">
	<div class="form-inline">
	<div class="input-group input-group-sm date" id="sdate">
		<input type="text" name="sdate" size="20" maxlength="20" value="" class="form-control from-control-sm">
		<div class="input-group-append">
		<div class="input-group-text">
		<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
			</div>
		</div>
	</div>
</div>
	</td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        도착일
    </td>
    <td width="80%" align="left">
	<div class="form-inline">
	<div class="input-group input-group-sm date" id="edate">
		<input type="text" name="edate" size="20" maxlength="20" value="" class="form-control from-control-sm">
		<div class="input-group-append">
		<div class="input-group-text">
		<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
			</div>
		</div>
	</div>
</div>
	</td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input type="file" name="pic" value="" class="form-control from-control-sm">
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2"  style="vertical-align:middle">
        <font color="red">*</font> 내용
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <textarea name="txt" size="20" value="" rows="20" cols="100%"></textarea>
        </div>
    </td>
</tr>
</table>
<div align="center">
<input type = "submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
<input type ="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>
<br><br><br><br><br>