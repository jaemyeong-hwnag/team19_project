<?
    class Login_m extends CI_Model     // �� Ŭ���� ����
    {
        /*public function getlist()
        {
            $sql="select * from jangbu order by name";     // select�� ����
            return $this->db->query($sql)->result();              // ��������, ��� ����
        }*/
		public function getrow($uid,$pwd)
		{
			$sql="select * from member where uid='$uid' and pwd='$pwd'";
			return $this->db->query($sql)->row();
		}

    }
?>
