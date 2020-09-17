<?
    class Yeyag_m extends CI_Model							// 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit) // 해당 페이지 자료 읽기
        {
			if (!$text1)
				$sql="select yeyag.*, tour.name as tour_name from yeyag left join tour on yeyag.tour_no=tour.no order by no desc limit $start,$limit"; // select문 정의, 전체자료
			else
				$sql="select yeyag.*, tour.name as tour_name from yeyag left join tour on yeyag.tour_no=tour.no";
            return $this->db->query($sql)->result();		// 쿼리실행, 결과리턴
        }
		public function rowcount($text1) // 전체 레코드 개수
		{
			if (!$text1)
				$sql="select * from yeyag order by tour_no";
			else
				$sql="select * from yeyag where tour_no like '%$text1%' order by tour_no";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($no)	// 값 불러오기
		{
			$sql="select yeyag.*, tour.name as tour_name from yeyag left join tour on yeyag.tour_no=tour.no where yeyag.no=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)	// 삭제
		{
			$sql="delete from yeyag where no=$no";
			return $this->db->query($sql);
		}
		function insertrow($row)	// 추가
		{
			return $this->db->insert("yeyag",$row);
		}
		function updaterow($row, $no)	// 수정
		{
			$where=array("no"=>$no);
			return $this->db->update("yeyag", $row, $where);
		}
		function getlist_gubun()
		{
			$sql="select * from tour order by name";
			return $this->db->query($sql)->result();
		}
		function cal_jaego()
		{
			$sql="drop table if exists temp;";
			$this->db->query($sql);
			$sql="create table temp (
					no int not null auto_increment,
					yeyag_no int,
					jaego int default 0,
					primary key(no) );";
			$this->db->query($sql);

			$sql="update yeyag set jaego=0;";
			$this->db->query($sql);

			$sql="insert into temp (yeyag_no, jaego)
					select yeyag_no, sum(numi)-sum(numo)
					from bjangbu
					group by yeyag_no;";
			$this->db->query($sql);

			$sql="update yeyag inner join temp on yeyag.no=temp.yeyag_no
					set yeyag.jaego=temp.jaego;";
			$this->db->query($sql);
		}
    }
?>