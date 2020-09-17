<?
    class Main_m extends CI_Model							// 모델 클래스 선언
    {

		public function total_count() // 전체 레코드 개수
		{
			$sql="select * from tour order by name";
			return $this->db->query($sql)->num_rows();
		}

		public function k_count() // 전체 레코드 개수
		{
			$sql="select * from tour where tour.kind_no=8 order by name";
			return $this->db->query($sql)->num_rows();
		}

		public function h_count() // 전체 레코드 개수
		{
			$sql="select * from tour  where tour.kind_no=7 order by name";
			return $this->db->query($sql)->num_rows();
		}

		public function ran_tour(){
			$sql="select * from tour order by rand() limit 4";
			return $this->db->query($sql)->result();
		}
    }
?>