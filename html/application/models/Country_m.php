<?
    class Country_m extends CI_Model							// 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit) // 해당 페이지 자료 읽기
        {
			if (!$text1)
				$sql="select * from country order by name limit $start,$limit"; // select문 정의, 전체자료
			else
				$sql="select * from country where name like '%$text1%' order by name limit $start,$limit";
            return $this->db->query($sql)->result();		// 쿼리실행, 결과리턴
        }
		public function rowcount($text1) // 전체 레코드 개수
		{
			if (!$text1)
				$sql="select * from country order by name";
			else
				$sql="select * from country where name like '%$text1%' order by name";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($no)	// 값 불러오기
		{
			$sql="select * from country where no=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)	// 삭제
		{
			$sql="delete from country where no=$no";
			return $this->db->query($sql);
		}
		function insertrow($row)	// 추가
		{
			return $this->db->insert("country",$row);
		}
		function updaterow($row, $no)	// 수정
		{
			$where=array("no"=>$no);
			return $this->db->update("country", $row, $where);
		}
    }
?>