<div class="col-3"></div>
<br>
<div class="alert alert-success" role="alert">tour</div>
<!---이름검색 및 추가부분---->
<script>
function find_text()
{
    if (!form1.text1.value)
        form1.action="/~team19/admin/tour/lists";
    else
        form1.action="/~team19/admin/tour/lists/text1/" + form1.text1.value;
    form1.submit();

}
</script>
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-3" align="left"> 
		
            <div class="input-group input-group-sm">

  <div class="input-group-prepend">
    <span class="input-group-text">상품명</span>
  </div>
     <input type="text" name="text1" value="<?=$text1;?>" class="form-control" placeholder="찾을 이름은?" >
    <div class="input-group-append">
        <button class="btn mycolor1" type="button" onClick="find_text();">검색</button>
    </div>
	</div>
</div>

<?    $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   ?>
        <div class="col-9" align="right">           
             <a href="/~team19/admin/tour/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
			 <a href="/~team19/admin/tour/jaego<?=$tmp; ?>" class="btn btn-sm mycolor1">재고계산</a>
        </div>
  </div>
</form>
<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="5%">번호</td>
        <td width="15%">상품명</td>
		<td width="10%">출발일</td>
		<td width="10%">도착일</td>
		<td width="10%">가격</td>
		<td width="20%">상품종류</td>
		<td width="20%">교통종류</td>
</tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no;
?>
<tr>
    <td><?=$no;?></td>
	<td><a href="/~team19/admin/tour/view/no/<?=$no;?><?=$tmp;?>"><?=$row->name;?></a></td>
	<td><?=$row->sdate ;?></td>
	<td><?=$row->edate ;?></td>
	<td><?=number_format($row->price) ;?></td>
    <td><?=$row->kind_name ;?></td>
	<td><?=$row->air_name ;?></td>
</tr>
<?
	}
?>
</table>
<?=$pagination; ?>