<?
    class Mypage_m extends CI_Model
    {
        
		public function getrow($no) 
		{
			$sql="select * from member where no=$no";
			return $this->db->query($sql)->row();
		}

		function updaterow($row, $no)	// ����
		{
			$where=array("no"=>$no);
			return $this->db->update("mypage", $row, $where);
		}
    }
?>
