<?
class Tour extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("tour_m");
		$this->load->helper(array("url","date"));
		$this->load->library('pagination');
		$this->load->library('upload');

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
			$base_url = "/admin/tour/lists/page";
		else 
			$base_url = "/admin/tour/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url= "/~team19" . $base_url;


		$config["per_page"]	 = 5;
		$config["total_rows"] = $this->tour_m->rowcount($text1);
		$config["uri_segment"] = $page_segment;
		$config["base_url"]	 = $base_url;
		$this->pagination->initialize($config);


		$data["page"]=$this->uri->segment($page_segment,0);
		$data["pagination"] = $this->pagination->create_links();

		$start=$data["page"];
		$limit=$config["per_page"];  


		$data["text1"]=$text1;                                    
		$data["list"]=$this->tour_m->getlist($text1,$start,$limit);

		$this->load->view("admin/main_header2");
		$this->load->view("tour/tour_list",$data);
		$this->load->view("admin/main_footer2");
	}
	
	public function view()
	{
		$uri_array=$this->uri->uri_to_assoc(4);
		$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ;

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->tour_m->getrow($no);

		$this->load->view("admin/main_header2");
		$this->load->view("tour/tour_view",$data);
		$this->load->view("admin/main_footer2");
	}
	public function del()
	{

		$uri_array=$this->uri->uri_to_assoc(4);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

		$this->tour_m->deleterow($no);
	
		redirect("/~team19/admin/tour/lists/" . $text1 . $page);
	}

	public function add()
	{

		$uri_array=$this->uri->uri_to_assoc(4);
		$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

		$this->load->library("form_validation");

		$this->form_validation->set_rules("kind_no","구분명","required");
		$this->form_validation->set_rules( "name","이름","required|max_length[20]");
		$this->form_validation->set_rules("price","단가","required|numeric");

		if($this->form_validation->run()==FALSE)
		{
			$data["list"] = $this->tour_m->getlist_kind();

			$this->load->view("admin/main_header2");
			$this->load->view("tour/tour_add",$data);
			$this->load->view("admin/main_footer2");
		}
		else
		{
			$txt=addslashes($this->input->post("txt",true));
			$data=array(
				'txt' => $txt,
				'name' => $this->input->post("name",true),
				'sdate' => $this->input->post("sdate",true),
				'edate' => $this->input->post("edate",true),
				'price' => $this->input->post("price",true),
				'kind_no' => $this->input->post("kind_no",true),
				'air_no' => $this->input->post("air_no",true)	
					);

			$picname = $this->call_upload();
			if($picname) $data["pic"] = $picname;

			$result = $this->tour_m->insertrow($data); //데이터 저장
		
			redirect("/~team19/admin/tour/lists/" . $text1 . $page);
		}
	}

	public function edit()
			{	
				$uri_array=$this->uri->uri_to_assoc(4);
				$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
				$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
				$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

				$this->load->library("form_validation");

				$this->form_validation->set_rules("kind_no","구분명","required");
				$this->form_validation->set_rules("name","이름","required|max_length[20]");
				$this->form_validation->set_rules("price","단가","required|numeric");

				if($this->form_validation->run()==FALSE )
				{

					$data["list"] = $this->tour_m->getlist_kind();

					$this->load->view("admin/main_header2");
					$data["row"] = $this->tour_m->getrow($no);
					$this->load->view("tour/tour_edit",$data);
					$this->load->view("admin/main_footer2");
				}
				else
				{
					$txt=addslashes($this->input->post("txt",true));
					$data=array(
						'txt' => $txt,
						'name' => $this->input->post("name",true),
						'sdate' => $this->input->post("sdate",true),
						'edate' => $this->input->post("edate",true),
						'price' => $this->input->post("price",true),
						'kind_no' => $this->input->post("kind_no",true),
						'air_no' => $this->input->post("air_no",true)		
					);

						$picname = $this->call_upload();
						if($picname) $data["pic"] = $picname;
				
					$result = $this->tour_m->updaterow($data,$no); //데이터 저장
				
					redirect("/~team19/admin/tour/lists" . $text1 . $page);
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

			redirect("/~team19/admin/tour/lists" . $text1 . $page);
		}

}
?>