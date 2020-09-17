<div class="alert alert-danger" role="alert">예약</div> <!-- 사용자헤더 -->
	<script>
		function find_text()
		{
			if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
				form1.action="/~team19/yeyag/lists";
			else									// 값이 있는 경우, text1 값 전달
				form1.action="/~team19/yeyag/lists/text1/" + form1.text1.value;
			form1.submit();
		}
	</script>
		<form name="form1" action="" method="post">
			<div class="row">
				<div class="col-3" align="left">	<!-- 이름검색 부분-->
					<div class="input-group  input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text">이름</span>
						</div>						<!-- 다음 화면 text그대로 표시-->
						<input type="text" name="text1" value="<?=$text1;?>"
						class="form-control" placeholder="찾을 이름은?" aria-label="찾을 이름은?" onKeydown="if (event.keyCode == 13) { find_text(); }">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" onClick="find_text();">검색</button>
						</div>
					</div>
				</div>
	<?
		$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
	?>
				<div class="col-9" align="right">	<!--추가버튼 부분-->
					 <a href="/~team19/admin/yeyag/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
					 <a href="/~team19/admin/yeyag/jaego<?=$tmp; ?>" class="btn btn-sm mycolor1">재고계산</a>
				</div>
			</div>
		</form>

<table class="table  table-bordered  table-sm  mymargin5 alert-warning">
			<tr class="mycolor2">
				<td width="5%">번호</td>
				<td width="20%">상품명</td>
				<td width="10%">아이디</td>
				<td width="10%">성인</td>
				<td width="10%">어린이</td>
				<td width="10%">날짜</td>
				<td width="10%">상태</td>
			</tr>
<?
    foreach ($list as $row)		// 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no;								// 사용자번호
		
		$status = $row->status==0 ? "예약확인" : "예약미확인" ;	// 0->판매, 1->매진
		//$p_gubun = $row->p_gubun==0 ? "성인" : "어린이" ;
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="/~team19/admin/yeyag/view/no/<?=$no?><?=$tmp?>"><?=$row->tour_name; ?></a></td>
	<td><?=$row->member_no; ?></td>
	<td><?=$row->p_gubun; ?></td>
	<td><?=$row->p_gubun2; ?></td>
	<td><?=$row->regday; ?></td>
	<td><?=$status; ?></td>
</tr>
<?
    }
?>
</table>

<?=$pagination;?>