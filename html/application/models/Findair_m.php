<?
    class Findair_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
			if (!$text1)
				 $sql="select air.* from air order by air.name limit $start,$limit";

			else

				 $sql="select air.* from air where air.name like '%".$text1."%' order by air.name limit $start,$limit";

			return $this->db->query($sql)->result();

        }

		public function getrow($no)  {
				$sql="select air.* from air where air.no=$no";

			return $this->db->query($sql)->row();

		}

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from air order by name ";
			else
				$sql="select * from air where name like '%$text1%' order by name";
			return $this->db->query($sql)->num_rows();
		
		}

    }
?>
