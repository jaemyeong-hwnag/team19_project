<?
    class Yayak_m extends CI_Model							// �� Ŭ���� ����
    {
        public function getlist($text1,$start,$limit, $member_no) // �ش� ������ �ڷ� �б�
        {
			if (!$text1)
				$sql="select yeyag.*, tour.name as tour_name, member.name as member_name from yeyag left join tour on yeyag.tour_no=tour.no left join member on yeyag.member_no=member.no where yeyag.member_no=$member_no"; // select�� ����, ��ü�ڷ�
//where member_no=$this->session->userdata('no')
			 //$sql="select tour.* , air.name as air_name, kind.name as kind_name from tour left join air on tour.air_no=air.no left join kind on tour.kind_no=kind.no order by no desc limit $start,$limit";

			else
				$sql="select yeyag.*, tour.name as tour_name from yeyag left join tour on yeyag.tour_no=tour.no where yeyag.member_no=$member_no";
            return $this->db->query($sql)->result();		// ��������, �������
        }
		public function rowcount($text1, $member_no) // ��ü ���ڵ� ����
		{
			if (!$text1)
				$sql="select * from yeyag where member_no=$member_no order by no";
			else
				$sql="select * from yeyag where tour_no like '%$text1%' and member_no=$member_no order by tour_no";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($no)	// �� �ҷ�����
		{
			$sql="select yeyag.*, tour.name as tour_name from yeyag left join tour on yeyag.tour_no=tour.no where yeyag.no=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)	// ����
		{
			$sql="delete from yeyag where no=$no";
			return $this->db->query($sql);
		}
		function insertrow($row)	// �߰�
		{
			return $this->db->insert("yeyag",$row);
		}
		function updaterow($row, $no)	// ����
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