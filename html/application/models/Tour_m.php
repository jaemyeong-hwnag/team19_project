<?
    class Tour_m extends CI_Model
    {
        public function getlist($text1,$start,$limit)
        {

			if (!$text1)
				 $sql="select tour.* , air.name as air_name, kind.name as kind_name from tour left join air on tour.air_no=air.no left join kind on tour.kind_no=kind.no order by no desc limit $start,$limit";
			else
				 $sql="select tour.* , air.name as air_name, kind.name as kind_name from tour left join air on tour.air_no=air.no left join kind on tour.kind_no=kind.no tour where tour.name like '%".$text1."%' order by tour.name limit $start,$limit";

			return $this->db->query($sql)->result();

        }
		public function getrow($no)  {
				$sql="select tour.* , air.name as air_name, kind.name as kind_name from tour left join air on tour.air_no=air.no left join kind on tour.kind_no=kind.no where tour.no=$no order by tour.name";

			return $this->db->query($sql)->row();

		}
		function deleterow($no)  {
		    $sql="delete from tour where no=$no";
			return  $this->db->query($sql);
		}
		function insertrow($row)
		{
			return $this->db->insert("tour",$row);
		}
		function updaterow($row,$no)
		{
			$where=array("no"=>$no);
			return $this->db->update("tour",$row,$where);
		}

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from tour order by name ";
			else
				$sql="select * from tour where name like '%$text1%' order by name";

			return $this->db->query($sql)->num_rows();
		}
		function getlist_kind()
		{
			$sql="select * from kind order by name";
			return $this->db->query($sql)->result();
		}
		function cal_jaego()
		{
			$sql="drop table it exists temp;";
			$this->db->query($sql);

			$sql="create table temp(
				no int not null auto_increment,
				tour_no int,
				jaego int default 0,
				primary key(no));";
				$this->db->query($sql);

				$sql="update tour set jaego=0;";
				$this->db->query($sql);

				$sql="insert into temp (tour_no, jaego) select tour_no, sum(numi)-sum(numo) from jangbu
				group by tour_no;";
				$this->db->query($sql);

				$sql="update tour inner join temp on tour.no=temp.tour_no set tour.jaego=temp.jaego;";
				$this->db->query($sql);
		}
    }
?>
