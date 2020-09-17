<?
    class Pgubun_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {

			if (!$text1)
				$sql="select * from pgubun order by name limit $start,$limit";    // 전체 자료
			else
				$sql="select * from pgubun order by name where name like '%".$text1."%' order by name limit $start,$limit";
			return $this->db->query($sql)->result();


			//$sql="select * from pgubun order by name ";
			//return $this->db->query($sql)->result();
        }

		public function getrow($no)  {
			$sql="select * from pgubun where no=$no";
			return $this->db->query($sql)->row();
		}

		function deleterow($no)  {
		    $sql="delete from pgubun where no=$no";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			return $this->db->insert("pgubun",$row);
		}

		function updaterow($row,$no)
		{
			$where=array("no"=>$no);
			return $this->db->update("pgubun",$row,$where);
		}

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from pgubun order by name ";
			else
				$sql="select * from pgubun where name like '%$text1%' order by name";
			return $this->db->query($sql)->num_rows();
		
		}

    }
?>
