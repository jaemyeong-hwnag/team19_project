<?
	class Mypage extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("mypage_m");
	}
	public function index()
	{	
		//$data["row"] = $this->mypage_m->getrow($no);
		$this->view();
	}

		public function view()
	{
		$uri_array=$this->uri->uri_to_assoc(4);
		$no=$this->session->userdata('no');
		
		$data["row"] = $this->mypage_m->getrow($no);

		$this->load->view("header");
		$this->load->view("mypage",$data);
		$this->load->view("main_footer");
	}
	
	public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);

			$this->load->library("form_validation");	// ������ ���̺귯�� �ε�

			$this->form_validation->set_rules("no","�귣���","required");
			$this->form_validation->set_rules("name","�̸�","required|max_length[50]");
			//$this->form_validation->set_rules("price","�ܰ�","required|numeric");

			if ($this->form_validation->run()==FALSE)	// ���ȭ���� �߰���ư Ŭ���� ���
			{
				$data["list"] = $this->yeyag_m->getlist_gubun();
				$data["row"]=$this->yeyag_m->getrow($no);

				$this->load->view("header");
				$this->load->view("mypage_edit",$data);
				$this->load->view("main_footer");
			}
			else										// �Է�ȭ���� �����ư Ŭ���� ���
			{
				$data = array(							// �Է� ���� data �迭�� ����
					'no' => $this->input->post("no",TRUE),
					'name'	 => $this->input->post("name",TRUE),
					'tour_no'	 => $this->input->post("tour_no",TRUE),
					'member_no'	 => $this->input->post("member_no",TRUE),
					'inone'	 => $this->input->post("inone",TRUE),
					'p_gubun'	 => $this->input->post("p_gubun",TRUE),
					'regday'	 => $this->input->post("regday",TRUE),
					'status'	 => $this->input->post("status",TRUE)
					);
					//$picname=$this->call_upload();
					//if ($picname) $data["pic"]=$picname;
				$result = $this->yeyag_m->updaterow($data,$no); // insertrow�Լ� ȣ��, ����������

				redirect("/~team19/Mypage/mypage/" . $text1 . $page);		// ���ȭ������ �̵�
			}
		}
}
?>