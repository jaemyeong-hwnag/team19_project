<div class="alert mycolor1" role="alert">여행종류</div> <!-- 사용자헤더 -->
	<script>
		function find_text()
		{
			if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
				form1.action="/~team19/kind/lists";
			else									// 값이 있는 경우, text1 값 전달
				form1.action="/~team19/kind/lists/text1/" + form1.text1.value;
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
					 <a href="/~team19/admin/kind/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
				</div>
			</div>
		</form>

<table class="table  table-bordered  table-sm  mymargin5">
			<tr class="mycolor2">
				<td width="10%">번호</td>
				<td width="90%">여행종류</td>
			</tr>
<?
    foreach ($list as $row)		// 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->no;								// 사용자번호
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="/~team19/admin/kind/view/no/<?=$no?><?=$tmp?>"><?=$row->name; ?></a></td>
</tr>
<?
    }
?>
</table>

<?=$pagination;?>