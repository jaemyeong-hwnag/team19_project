<?
	class Member extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("member_m");
		$this->load->helper(array("url","date"));
		$this->load->library('pagination');

	}
	public function index()
	{
		if($this->session->userdata('rank')!="1")redirect("/~team19");
		$this->lists();
	}

	public function lists()
	{
		$uri_array=$this->uri->uri_to_assoc(4); 
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";


		
		if ($text1=="") 
			$base_url = "/admin/member/lists/page";
		else 
			$base_url = "/admin/member/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url= "/~team19" . $base_url;

		$config["per_page"]	 = 5;
		$config["total_rows"] = $this->member_m->rowcount($text1);
		$config["uri_segment"] = $page_segment;
		$config["base_url"]	 = $base_url;
		$this->pagination->initialize($config);

		$data["page"]=$this->uri->segment($page_segment,0);
		$data["pagination"] = $this->pagination->create_links();

		$start=$data["page"];
		$limit=$config["per_page"];  


		$data["text1"]=$text1;                                    
		$data["list"]=$this->member_m->getlist($text1,$start,$limit);

		$this->load->view("admin/main_header2");
		$this->load->view("admin/member_list",$data);
		$this->load->view("admin/main_footer2");
	}
	
	public function view()
	{
		$uri_array=$this->uri->uri_to_assoc(4);
		$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;// "/page/" .

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->member_m->getrow($no);

		$this->load->view("admin/main_header2");
		$this->load->view("admin/member_view",$data);
		$this->load->view("admin/main_footer2");
	}
	public function del()
	{
		$uri_array=$this->uri->uri_to_assoc(4);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;


		$this->member_m->deleterow($no);
	
		redirect("/~team19/admin/member/lists/" . $text1 . $page);
	}

	public function add()
	{

		$uri_array=$this->uri->uri_to_assoc(4);
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","이름","required|max_length[20]");
		$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
		$this->form_validation->set_rules("pwd","암호","required|max_length[20]");



		if($this->form_validation->run()==FALSE)
		{
			$this->load->view("admin/main_header2");
			$this->load->view("admin/member_add");
			$this->load->view("admin/main_footer2");
		}
		else
		{
			$tel1=$this->input->post("tel1",true);
			$tel2=$this->input->post("tel2",true);
			$tel3=$this->input->post("tel3",true);
			$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
		
			$data=array(
				'name' => $this->input->post("name",true),
				'uid' => $this->input->post("uid",true),
				'pwd' => $this->input->post("pwd",true),
				'tel' => $tel,
				'rank' => $this->input->post("rank",true)			
					);
		
			$result = $this->member_m->insertrow($data); //데이터 저장
		
			redirect("/~team19/admin/member/lists//lists/" . $text1 . $page);
		}
	}
	public function edit()
			{
				$uri_array=$this->uri->uri_to_assoc(4);
				$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
				$this->load->library("form_validation");

				$this->form_validation->set_rules("name","이름","required|max_length[20]");
				$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
				$this->form_validation->set_rules("pwd","암호","required|max_length[20]");

				if($this->form_validation->run()==FALSE )
				{
					$this->load->view("admin/main_header2");
					$data["row"] = $this->member_m->getrow($no);
					$this->load->view("admin/member_edit",$data);
					$this->load->view("admin/main_footer2");
				}
				else
				{
					$tel1=$this->input->post("tel1",true);
					$tel2=$this->input->post("tel2",true);
					$tel3=$this->input->post("tel3",true);
					$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);
				
					$data=array(
						'name' => $this->input->post("name",true),
						'uid' => $this->input->post("uid",true),
						'pwd' => $this->input->post("pwd",true),
						'tel' => $tel,
						'rank' => $this->input->post("rank",true),			
								);
				
					$result = $this->member_m->updaterow($data,$no); //데이터 저장
				
					redirect("/~team19/admin/member/lists//lists/" . $text1 . $page);
				}
			}
}
?>