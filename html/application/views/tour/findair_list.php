<br>
<div class="alert alert-success" role="alert">상품종류선택</div>
<!---이름검색 및 추가부분---->
<script>
	function find_text()
	{
		if (!form1.text1.value)
			form1.action="/~team19/findair/lists";
		else
			form1.action="/~team19/findair/lists/text1/" + form1.text1.value;
		form1.submit();

	}
	function Sendair(no,name)
	{
		opener.form1.air_no.value = no;
		opener.form1.air_name.value= name;
		self.close();
	}
</script>
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-6" align="left"> 
            <div class="input-group input-group-sm">
  <div class="input-group-prepend">
    <span class="input-group-text">종류명</span>
  </div>
     <input type="text" name="text1" value="<?=$text1;?>" class="form-control" placeholder="찾을 이름은?" >
    <div class="input-group-append">
        <button class="btn mycolor1" type="button" onClick="find_text();">검색</button>
    </div>
	</div>
</div>
        <div class="col-6" align="right"></div>
  </div>
</form>
<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="20%">번호</td>
        <td width="30%">항공사명</td>
</tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no;
?>
<tr>
    <td><?=$no;?></td>
    <td><a href="javascript:Sendair('<?=$no; ?>','<?=$row->name; ?>');">
	<?=$row->name;?></a></td>

</tr>
<?
	}
?>
</table>
<?=$pagination; ?>