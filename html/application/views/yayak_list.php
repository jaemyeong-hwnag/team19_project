<br>
<h3 class="agile-title">예약현황</h3> 
<div class="w3layouts_header">
			<p><span><i class="fa fa-plane sub-w3l" aria-hidden="true"></i></span></p>
		</div>
<br>
<div class="row">
		<div class="col-md-3"></div>
<div class="col-md-6"  align="center">
				<table class="table"  align="center">
					<thead align="center">
						<tr align="center">
							<th>번호</th>
							<th>상품명</th>
							<th>신청날짜</th>
							<th>상태</th>
							<th>금액</th>
							<!--<th>예약취소</th> align="center"-->
						</tr>
					</thead>
					<tbody>
					<?
    foreach ($list as $row)
    {
        $no=$row->no;
		$status = $row->status==0 ? "예약확인" : "대기" ; 
	?>
						<tr>
							<td><?=$row->no ?></td>
							<td><?=$row->tour_name ?></td>
							<td><?=$row->regday ?></td>
							<td><?=$status ?></td>
							<td><?=number_format($row->total_price) ?>원</td>
							
							<!--<td><a href="/~team19/yayak/del<?=$tmp; ?>"  class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a></td>-->
						</tr>
	<?
	}
	?>
					</tbody>
				</table>
			</div>
			<div class="col-md-3"></div>
			</div>
			<br><br><br><br><br><br>