<?
    class Login_m extends CI_Model     // 모델 클래스 선언
    {
        /*public function getlist()
        {
            $sql="select * from jangbu order by name";     // select문 정의
            return $this->db->query($sql)->result();              // 쿼리실행, 결과 리턴
        }*/
		public function getrow($uid,$pwd)
		{
			$sql="select * from member where uid='$uid' and pwd='$pwd'";
			return $this->db->query($sql)->row();
		}

    }
?>
