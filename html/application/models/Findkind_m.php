<?
    class Findkind_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {
			if (!$text1)
				 $sql="select kind.* from kind order by kind.name limit $start,$limit";

			else

				 $sql="select kind.* from kind where kind.name like '%".$text1."%' order by kind.name limit $start,$limit";

			return $this->db->query($sql)->result();

        }

		public function getrow($no)  {
				$sql="select kind.* from kind where kind.no=$no";

			return $this->db->query($sql)->row();

		}

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from kind order by name ";
			else
				$sql="select * from kind where name like '%$text1%' order by name";
			return $this->db->query($sql)->num_rows();
		
		}

    }
?>
