<?	// Ŭ�����̸��� �����̸��� ���ƾ� �ϸ� ù ���ڴ� �ݵ�� �빮�ڿ��� �Ѵ�.
    class Yayak extends CI_Controller {				// yeyagŬ���� ����
        function __construct()							// Ŭ���������� �� �ʱ⼳��
        {
            parent::__construct();
            $this->load->database();					// �����ͺ��̽� ����
            $this->load->model("yayak_m");				// �� yayak_m ����
			$this->load->helper(array("url","date"));
			$this->load->library('pagination');
			$this->load->library('upload');
			$this->load->library('image_lib');
        }
        public function index()							// ���� ���� ����Ǵ� �Լ�
        {
            $this->lists();								// list �Լ� ȣ��
        }
        public function lists()
        {	
			$member_no=$this->session->userdata('no');
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";

			if ($text1=="")
				$base_url = "/yayak/lists/page";	// $page_segment = 4;
			else
				$base_url = "/yayak/lists/text1/$text1/page"; // $page_segment = 6;
			$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")),"/")+1;
			$base_url = "/~team19".$base_url;	// team19������ ���

			$config["per_page"] = 5;	// �������� ǥ���� line ��
			$config["total_rows"] = $this->yayak_m->rowcount($text1, $member_no); // ��ü ���ڵ尳�� ���ϱ�
			$config["uri_segment"] = $page_segment;	// �������� �ִ� segment ��ġ
			$config["base_url"] = $base_url;		// �⺻ URL
			$this->pagination->initialize($config);	// pagination �ʱ�ȭ, ���� ����

			$data["page"]=$this->uri->segment($page_segment,0);	// ������ġ, ������ 0
			$data["pagination"]=$this->pagination->create_links(); // �������ҽ� ����

			$start=$data["page"];	// n������ : ������ġ
			$limit=$config["per_page"];	// ������ �� ���μ�

			// $text1=urldecode($this->uri->segment(4));
			$data["text1"]=$text1;						// text1 �� ������ ���� ó��
            $data["list"] = $this->yayak_m->getlist($text1,$start,$limit, $member_no);	// ����б�, �ش������� �ڷ��б�

            $this->load->view("main_header");			// ������(�޴�)
			// $this->load->view("yayak_title");
            $this->load->view("yayak_list",$data);		// yayak_list�� �ڷ�����
            $this->load->view("main_footer");			// �ϴ����
        }
		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);
			$data["text1"]=$text1;
			$data["page"]=$page;
			$data["row"]=$this->yayak_m->getrow($no);

			$this->load->view("admin/main_header");
            $this->load->view("admin/yayak_view",$data);
            $this->load->view("admin/main_footer");

			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		}
		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);					// URI: /yayak/del/no/1
			$this->yayak_m->deleterow($no);
			redirect("/~team19/yayak/lists/" . $text1 . $page);	// ���ȭ������ ���ư���
		}
		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			$this->load->library("form_validation");

			$this->form_validation->set_rules("no","��ȣ","");
			$this->form_validation->set_rules("tour_no","��ǰ��","");
			//$this->form_validation->set_rules("price","�ܰ�","required|numeric");
			
			if ($this->form_validation->run()==FALSE)	// ���ȭ���� �߰���ư Ŭ���� ���
			{
				$data["list"] = $this->yayak_m->getlist_gubun();

				$this->load->view('admin/main_header2');
				$this->load->view('admin/yayak_add',$data);
				$this->load->view('admin/main_footer2');
			}
			else										// �Է�ȭ���� �����ư Ŭ���� ���
			{
				$data = array(							// �Է� ���� data �迭�� ����
					'no' => $this->input->post("no",TRUE),
					'tour_no'	 => $this->input->post("tour_no",TRUE),
					'member_no'	 => $this->input->post("member_no",TRUE),
					'p_gubun'	 => $this->input->post("p_gubun",TRUE),
					'p_gubun2'	 => $this->input->post("p_gubun2",TRUE),
					'regday'	 => $this->input->post("regday",TRUE),
					'status'	 => $this->input->post("status",TRUE)
					);
				//$picname=$this->call_upload();				// ���ε� ����
				// exit("$picname");
				//if ($picname) $data["pic"]=$picname;		// �����̸� ����

				$result = $this->yayak_m->insertrow($data); // insertrow�Լ� ȣ��, ����������

				redirect("/~team19/admin/yayak/lists/" . $text1 . $page);		// ���ȭ������ �̵�
			}
		}
		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);

			//$this->load->library("form_validation");	// ������ ���̺귯�� �ε�

			//$this->form_validation->set_rules("bgubun_no","�귣���","required");
			//$this->form_validation->set_rules("name","�̸�","required|max_length[50]");
			//$this->form_validation->set_rules("price","�ܰ�","required|numeric");

			if ($this->form_validation->run()==FALSE)	// ���ȭ���� �߰���ư Ŭ���� ���
			{
				$data["list"] = $this->yayak_m->getlist_gubun();

				$this->load->view('admin/main_header2');
				$data["row"]=$this->yayak_m->getrow($no);
				$this->load->view("admin/yayak_edit",$data);
				$this->load->view('admin/main_footer2');
			}
			else										// �Է�ȭ���� �����ư Ŭ���� ���
			{
				$data = array(							// �Է� ���� data �迭�� ����
					'no' => $this->input->post("no",TRUE),
					'tour_no'	 => $this->input->post("tour_no",TRUE),
					'member_no'	 => $this->input->post("member_no",TRUE),
					'p_gubun'	 => $this->input->post("p_gubun",TRUE),
					'p_gubun2'	 => $this->input->post("p_gubun2",TRUE),
					'regday'	 => $this->input->post("regday",TRUE),
					'status'	 => $this->input->post("status",TRUE)
					);
					//$picname=$this->call_upload();
					//if ($picname) $data["pic"]=$picname;
				$result = $this->yayak_m->updaterow($data,$no); // insertrow�Լ� ȣ��, ����������

				redirect("/~team19/admin/yayak/lists/" . $text1 . $page);		// ���ȭ������ �̵�
			}
		}
		public function call_upload()
		{
			$config['upload_path'] = "./yayak_img";	// ������ ���
			$config['allowed_types'] = 'gif|jpg|png';	// ������ ���� ����
			$config['overwrite'] = TRUE;				// overwrite ���
			$config['max_size'] = 10000000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;
			$this->upload->initialize($config);			// ���� ����

			if (!$this->upload->do_upload('pic'))		// ���ε� ����
			$picname="";								// ���� ���, �� ���ڿ� ����
			else
			{
			$picname=$this->upload->data("file_name");	//���� ���, �����̸� ����
			//$picsize=$this->upload->data("file_size");
			$config['image_library'] = 'gd2';
			$config['source_image'] = '/~team19/product_img/' . $pinname;
			$config['thumb_marker'] = '';
			$config['new_image'] = '/~team19/product_img/thumb';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 200;
			$config['height'] = 150;

			$this->image_lib->initialize($config);

			$this->image_lib->resize();
			}
			return $picname;
		}
		public function jaego()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			$data["text1"]=$text1;
			$data["page"]=$page;
			$this->yayak_m->cal_jaego();

			redirect("/~team19/yayak/lists" . $text1 . $page);
		}
    }
?>