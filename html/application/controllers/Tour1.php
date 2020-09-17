<?

class Tour1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("view_tour_m");
		$this->load->model("yeyag_m");
		$this->load->helper(array("url","date"));
		$this->load->library('pagination');
		$this->load->library('upload');

		date_default_timezone_set("Asia/Seoul");         // 지역설정
		$today=date("Y-m-d");           

	}
	public function index()
	{
		//$this->lists();
	}
	
	public function package_tour_list()
	{
		$data=null;
		$uri_array=$this->uri->uri_to_assoc(3); 
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";

		if ($text1=="") 
			$base_url = "/tour1/package_tour_list/page";
		else 
			$base_url = "/tour1/package_tour_list/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url= "/~team19" . $base_url;

		$config["per_page"]	 = 6;
		$config["total_rows"] = $this->view_tour_m->view_rowcount($text1);
		$config["uri_segment"] = $page_segment;
		$config["base_url"]	 = $base_url;
		$this->pagination->initialize($config);


		$data["page"]=$this->uri->segment($page_segment,0);
		$data["pagination"] = $this->pagination->create_links();

		$start=$data["page"];
		$limit=$config["per_page"];  


		$data["text1"]=$text1;                                    
		$data["list"]=$this->view_tour_m->view_getlist($text1,$start,$limit);

		$this->load->view("header");
		$this->load->view("foreign_tour",$data);
		$this->load->view("main_footer");
	}

	public function foreign_tour_list()
	{
		$data=null;
		$kind=7;
		$uri_array=$this->uri->uri_to_assoc(3); 
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";

		if ($text1=="") 
			$base_url = "/tour1/foreign_tour_list/page";
		else 
			$base_url = "/tour1/foreign_tour_list/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url= "/~team19" . $base_url;

		$config["per_page"]	 = 6;
		$config["total_rows"] = $this->view_tour_m->rowcount($text1,$kind);
		$config["uri_segment"] = $page_segment;
		$config["base_url"]	 = $base_url;
		$this->pagination->initialize($config);


		$data["page"]=$this->uri->segment($page_segment,0);
		$data["pagination"] = $this->pagination->create_links();

		$start=$data["page"];
		$limit=$config["per_page"];  


		$data["text1"]=$text1;                                    
		$data["list"]=$this->view_tour_m->getlist($text1,$start,$limit,$kind);

		$this->load->view("header");
		$this->load->view("foreign_tour",$data);
		$this->load->view("main_footer");
	}               
	
	public function domestic_tour_list()
	{
		$data=null;
		$kind=8;
		$uri_array=$this->uri->uri_to_assoc(3); 
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";

		if ($text1=="") 
			$base_url = "/tour1/domestic_tour_list/page";
		else 
			$base_url = "/tour1/domestic_tour_list/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url= "/~team19" . $base_url;


		$config["per_page"]	 = 6;
		$config["total_rows"] = $this->view_tour_m->rowcount($text1,$kind);
		$config["uri_segment"] = $page_segment;
		$config["base_url"]	 = $base_url;
		$this->pagination->initialize($config);


		$data["page"]=$this->uri->segment($page_segment,0);
		$data["pagination"] = $this->pagination->create_links();

		$start=$data["page"];
		$limit=$config["per_page"];  


		$data["text1"]=$text1;                                    
		$data["list"]=$this->view_tour_m->getlist($text1,$start,$limit,$kind);

		$this->load->view("header");
		$this->load->view("foreign_tour",$data);
		$this->load->view("main_footer");
	}
	
	public function view()
	{

		$uri_array=$this->uri->uri_to_assoc(3);
		$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->view_tour_m->view_getrow($no);

		$data["commentRow"] = $this->view_tour_m->commentgetrow($no);    // �ڷ��о� data�迭�� ���� 
		$data["commentList"] = $this->view_tour_m->commentgetlist($no);   // 해당페이지 자료읽기

		$this->load->view("header");
		$this->load->view("tour_view",$data);
		$this->load->view("main_footer");
	}

		public function add()
	{
		$today=date("Y-m-d");  
		$uri_array=$this->uri->uri_to_assoc(3);
		$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;
		
			$p_gubun2=$this->input->post("price2",TRUE);	//어린이
			$p_gubun=$this->input->post("price1",TRUE);	//성인
			$price=(int)$this->input->post("price",TRUE); 
			$tour_no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$member_no=$this->session->userdata('no');
			$total_price=(($p_gubun2*$price*0.9)+($p_gubun*$price));
			$data = array(							// 입력 값을 data 배열에 저장
				'tour_no'	 => $tour_no,
				'member_no'	 => $member_no,
				'p_gubun2'	 => $p_gubun2,
				'p_gubun'	 => $p_gubun,
				'regday'	 => $today,
				'status'	 => 0, 
				'total_price'	 => $total_price
				);
			$result = $this->yeyag_m->insertrow($data); // insertrow함수 호출, 데이터저장

			redirect("/~team19/yayak");
	}

	public function commentAdd()
		{	
			$comment=addslashes($this->input->post("comment",true));
			$board_no=$this->input->post("board_no",true);

			$name=addslashes($this->session->userdata('name'));
			$member_no=$this->session->userdata('no');
			
			$data=null;
			$data=array("comment" => $comment, 'writeday'=>date("Y-m-d"), "member_no"=>$member_no, "name"=>$name, "board_no"=>$board_no);
			$this->view_tour_m->commentinsertrow($data);
			
			$no=$this->db->insert_id();
			
			$data[] = array("comment"=>$this->input->post("comment",true),"no"=>$no);
			//'{"comment":$comment,"no":$no}'
			echo json_encode($data);
		}

		public function commentDel()
		{
			$no=$this->input->post("no",true);

			$this->view_tour_m->commentdeleterow($no);

			echo $no;
		}

				public function exdel()
		{
				$this->view_tour_m->exdel();
		}
	/*
	public function del()
	{

		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

		$this->view_tour_m->deleterow($no);
	
		redirect("/~team19/tour1/foreign_tour_list/" . $text1 . $page);
	}

	public function add()
	{

		$uri_array=$this->uri->uri_to_assoc(3);
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("pgubun_no","구분명","required");
		$this->form_validation->set_rules( "name","이름","required|max_length[20]");
		$this->form_validation->set_rules("price","단가","required|numeric");

		if($this->form_validation->run()==FALSE)
		{
			$data["list"] = $this->view_tour_m->getlist_pgubun();

			$this->load->view("admin/main_header2");
			$this->load->view("tour/tour_add",$data);
			$this->load->view("admin/main_footer2");
		}
		else
		{
			$data=array(
				'name' => $this->input->post("name",true),
				'sdate' => $this->input->post("sdate",true),
				'edate' => $this->input->post("edate",true),
				'price' => $this->input->post("price",true),
				'pgubun_no' => $this->input->post("pgubun_no",true),
				'air_no' => $this->input->post("air_no",true)	
					);

			$picname = $this->call_upload();
			if($picname) $data["pic"] = $picname;

			$result = $this->view_tour_m->insertrow($data); //데이터 저장
		
			redirect("/~team19/tour1/foreign_tour_list" . $text1 . $page);
		}
	}

	public function edit()
			{	
				$uri_array=$this->uri->uri_to_assoc(3);
				$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
				$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

				$this->load->library("form_validation");

				$this->form_validation->set_rules("gubun_no","구분명","required");
				$this->form_validation->set_rules("name","이름","required|max_length[20]");
				$this->form_validation->set_rules("price","단가","required|numeric");

				if($this->form_validation->run()==FALSE )
				{

					$data["list"] = $this->view_tour_m->getlist_gubun();

					$this->load->view("admin/main_header2");
					$data["row"] = $this->view_tour_m->getrow($no);
					$this->load->view("tour/tour_edit",$data);
					$this->load->view("admin/main_footer2");
				}
				else
				{
					$data=array(
						'name' => $this->input->post("name",true),
						'sdate' => $this->input->post("sdate",true),
						'edate' => $this->input->post("edate",true),
						'price' => $this->input->post("price",true),
						'pgubun_no' => $this->input->post("pgubun_no",true),
						'air_no' => $this->input->post("air_no",true)		
					);

						$picname = $this->call_upload();
						if($picname) $data["pic"] = $picname;
				
					$result = $this->view_tour_m->updaterow($data,$no); //데이터 저장
				
					redirect("/~team19/tour1/foreign_tour_list" . $text1 . $page);
				}
			}
	public function call_upload()
			{
				$config['upload_path']	= './tour_img';
				$config['allowed_types']	= 'gif|jpg|png'; 
				$config['overwrite']	= TRUE; 
				$this->upload->initialize($config); 
				if (!$this->upload->do_upload('pic')) 
					$picname="";
				else
					$picname=$this->upload->data("file_name");
				return $picname;
			}
	public function jaego()//예약으로 바꾸기
		{
			$uri_array=$this->uri->uri_to_assoc(3);			
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;
			
			$data["text1"]=$text1;
			$data["page"]=$page;
			$this->tour->call_jaego();

			redirect("/~team19/tour1/foreign_tour_list" . $text1 . $page);
		}*/

}
?>