<?
    class Pgubun extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("pgubun_m");
			$this->load->helper(array("url","date"));
			$this->load->library('pagination');

        }
        public function index()
        {
            $this->lists();
        }

        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3); 
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";


			
			if ($text1=="") 
				$base_url = "/pgubun/lists/page";
			else 
				$base_url = "/pgubun/lists/text1/$text1/page";
				$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
				$base_url= "/~team19" . $base_url;


			$config["per_page"]	 = 5;
			$config["total_rows"] = $this->pgubun_m->rowcount($text1);
			$config["uri_segment"] = $page_segment;
			$config["base_url"]	 = $base_url;
			$this->pagination->initialize($config);


			$data["page"]=$this->uri->segment($page_segment,0);
			$data["pagination"] = $this->pagination->create_links();

			$start=$data["page"];
			$limit=$config["per_page"];  


			$data["text1"]=$text1;                                    
			$data["list"]=$this->pgubun_m->getlist($text1,$start,$limit);

            $this->load->view("admin/main_header");
            $this->load->view("pgubun/pgubun_list",$data);
            $this->load->view("admin/main_footer");
        }
		
        public function view()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0 ; //"/page/" . 

			$data["text1"]=$text1;
			$data["page"]=$page;
			$data["row"] = $this->pgubun_m->getrow($no);

            $this->load->view("admin/main_header");
			$this->load->view("pgubun/pgubun_view",$data);
            $this->load->view("admin/main_footer");
        }
		public function del()
		{

			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;


			$this->pgubun_m->deleterow($no);
		
			redirect("/~team19/pgubun/lists/" . $text1 . $page);
		}

		public function add()
		{

			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");

			$this->form_validation->set_rules("name","이름","required|max_length[20]");

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view("admin/main_header");
				$this->load->view("pgubun/pgubun_add");
				$this->load->view("admin/main_footer");
			}
			else
			{
				$data=array(
					'name' => $this->input->post("name",true),
					'root' => $this->input->post("root",true)
						);
			
				$result = $this->pgubun_m->insertrow($data); //데이터 저장
			
				redirect("/~team19/pgubun/lists" . $text1 . $page);
			}
		}
	
		public function edit()
				{
					
					$uri_array=$this->uri->uri_to_assoc(3);
					$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
					$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
					$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;
					$this->load->library("form_validation");
					$this->form_validation->set_rules("name","이름","required|max_length[20]");

					if($this->form_validation->run()==FALSE )
					{
						$this->load->view("admin/main_header");
						$data["row"] = $this->pgubun_m->getrow($no);
						$this->load->view("pgubun/pgubun_edit",$data);
						$this->load->view("admin/main_footer");
					}
					else
					{
					
						$data=array(
							'name' => $this->input->post("name",true),
							'root' => $this->input->post("root",true)
									);
					
						$result = $this->pgubun_m->updaterow($data,$no); //데이터 저장
					
						redirect("/~team19/pgubun/lists/" . $text1 . $page);
					}
				}
    }
?>