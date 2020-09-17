<?
    class Signup_m extends CI_Model     // 모델 클래스 선언
    {
        /*public function getlist()
        {
            $sql="select * from member order by name";     // select문 정의
            return $this->db->query($sql)->result();              // 쿼리실행, 결과 리턴
        }*/
		function getrow($uid)  {
			$sql="select * from member where uid=$uid";
			return  $this->db->query($sql)->row();
		}
		function deleterow($no)  {
			$sql="delete from member where no=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("member",$row);
		}

		function updaterow( $row, $no )
		{
			$where=array( "no"=>$no );
			return $this->db->update( "member", $row, $where );
		}

		public function getlist($text1,$start,$limit)
		{
			if (!$text1)
				$sql="select * from member order by name limit $start,$limit";    // 전체 자료
			else
				$sql="select * from member where name like '%$text1%' order by name limit $start,$limit";
			return $this->db->query($sql)->result();
		}

		public function rowcount( $text1 ){
		if (!$text1)
			$sql="select * from member order by name";
		else
			$sql="select * from member where name like '%$text1%' order by name";
		return $this->db->query($sql)->num_rows();
		}

    }
?>
