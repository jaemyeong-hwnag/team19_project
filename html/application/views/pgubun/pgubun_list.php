<br>
<div class="alert alert-success" role="alert">상품종류</div>
<!---이름검색 및 추가부분---->
<script>
function find_text()
{
    if (!form1.text1.value)
        form1.action="/~team19/pgubun/lists";
    else
        form1.action="/~team19/pgubun/lists/text1/" + form1.text1.value;
    form1.submit();

}
</script>
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-3" align="left"> 
		
            <div class="input-group input-group-sm">

  <div class="input-group-prepend">
    <span class="input-group-text">여행 종류</span>
  </div>
     <input type="text" name="text1" value="<?=$text1;?>" class="form-control" placeholder="찾을 장르는?" >
    <div class="input-group-append">
        <button class="btn mycolor1" type="button" onClick="find_text();">검색</button>
    </div>
	</div>
</div>

<?    $tmp = $text1 ? "/text1/$text1/" : "/page/$page";   ?>
        <div class="col-9" align="right">           
             <a href="/~team19/pgubun/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>

        </div>
  </div>
</form>
<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="40%">상품명</td>
		<td width="50%">패키지경로</td>
</tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no;
?>
<tr>
    <td><?=$no;?></td>
    <td><a href="/~team19/pgubun/view/no/<?=$no;?><?=$tmp;?>"><?=$row->name;?></a></td>
	<td><?=$row->root ;?></td>
</tr>
<?
	}
?>
</table>
<?=$pagination; ?>