<div class="alert mycolor1" role="alert">회원</div>

<script>
function find_text()
{
    if (!form1.text1.value)
	form1.action="/team19/admin/member/lists";
    else                                    
    form1.action="/team19/admin/member/lists/text1/" + form1.text1.value;
    form1.submit();
}
</script>

<form name="form1" action="" method="post">
<div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" class="form-control"
	onKeyDown="if(event.keyCode==13){find_text();}">
    <div class="input-group-append">
        <button class="btn  btn-primary" type="button" onClick="find_text()">검색</button>
    </div>
</div>

	  <a href="/~team19/admin/member/add" class="btn btn-sm mycolor1">추가</a>

<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">아이디</td>
        <td width="20%">비밀번호</td>
		<td width="20%">이름</td>
        <td width="20%">전화번호</td>
        <td width="20%">등급</td>
    </tr>

 
<?

    foreach ($list as $row)                           
    {
        $no=$row->no;                                   
        $tel1 = trim(substr($row->tel,0,3));      
        $tel2 = trim(substr($row->tel,3,4));      
        $tel3 = trim(substr($row->tel,7,4));      
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
        $rank = $row->rank==0 ? "사용자" : "관리자" ;
?>

<tr>
    <td><?=$no; ?></td>
	<td><a href="/~team19/admin/member/view/no/<?=$no?>"><?=$row->name; ?></a></td>
	<td><?=$row->uid; ?></td>
	<td><?=$row->pwd; ?></td>
    <td><?=$tel; ?></td>
    <td><?=$rank; ?></td>
</tr>

<?
    }
?>


</table>
<?=$pagination;?>