<?
    class Signup extends CI_Controller {       // MemberŬ���� ����
        function __construct()                           // Ŭ���������� �� �ʱ⼳��
        {
            parent::__construct();
            $this->load->database();                     // �����ͺ��̽� ����
            $this->load->model("signup_m");    // �� Member_m ����
			$this->load->helper(array("url","date"));    //  helper ����
			$this->load->library('pagination');
        }

        public function index()                            // ���� ���� ����Ǵ� �Լ�
        {	
			$class_name=get_class($this);
			$this->load->view("header");                    // ������(�޴�)
			$this->load->view("signup");
			$this->load->view("main_footer");                      // �ϴ� ��� 
		}

		public function id_check(){
			
			$uid=$this->input->post("uid",true);

			$count = $this->signup_m->rowcount($uid);
			if($count>0){
				echo 0;
			} else{
				echo 1;
			}
		}

		public function add()
		{

			$this->load->library("form_validation")
				;
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");

			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("header");
					$this->load->view("signup_add");    // �Է�ȭ�� ǥ��
					$this->load->view("main_footer");

				}
				else              // �Է�ȭ���� �����ư Ŭ���� ���
				{

					$tel1 = $this->input->post("tel1",true);
					$tel2 = $this->input->post("tel2",true);
					$tel3 = $this->input->post("tel3",true);
					
					$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);

					$data=array('name'=>$this->input->post("name",true),'uid'=>$this->input->post("uid",true),'pwd'=>$this->input->post("pwd",true),'tel'=>$tel,'rank'=>$this->input->post("rank",true));
					$this->signup_m->insertrow($data);

					redirect("/~team19/");    //   ���ȭ������ �̵�.
				}
			//}
		}
		/*
			if($this->session->userdata('rank'!=1))redirect("/~sale");
            $this->lists();                                        // list �Լ� ȣ��
        }

        public function lists()
        {
			//$text1=urldecode($this->uri->segment(4));   // URI: /member/lists/text1/값
			//$data["text1"]=$text1;    
			// text1 값 전달을 위한 처리
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			
			if ($text1=="")
				$base_url = "/member/lists/page";                        // $page_segment = 4;
			else 
				$base_url = "/member/lists/text1/$text1/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			$base_url = "/~sale" . $base_url;


			$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->member_m->rowcount($text1);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용

			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수


			$data["text1"]=$text1;
           // $data["list"] = $this->member_m->getlist($text1);    // �ڷ��о� data�迭�� ���� 
			$data["list"]=$this->member_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // ������(�޴�)
            $this->load->view("member_list",$data);           // member_list�� �ڷ�����
            $this->load->view("main_footer");                      // �ϴ� ��� 
        }

		public function view()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

			$data["page"] = $page;
			$data["text1"]=$text1;
            $data["row"] = $this->member_m->getrow($no);    // �ڷ��о� data�迭�� ���� 

            $this->load->view("main_header");                    // ������(�޴�)
            $this->load->view("member_view",$data);           // member_list�� �ڷ�����
            $this->load->view("main_footer");                      // �ϴ� ��� 
        }
		public function del()
		{
			//$no=$this->uri->segment(4);        // URI: /member/del/no/1
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;


			$this->member_m->deleterow($no);
			redirect("/~sale/member/lists/".$text1.$page);             // ���ȭ������ ���ư���
		}

		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			//$no=$this->uri->segment(4);
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");

			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$this->load->view("main_header");
				$data["row"]=$this->member_m->getrow($no);
				$this->load->view("member_edit",$data);
				$this->load->view("main_footer");
			}
			else                                                                   // 저장버튼 클릭한 경우
			{   $tel1 = $this->input->post("tel1",true);
				$tel2 = $this->input->post("tel2",true);
				$tel3 = $this->input->post("tel3",true);
					
				$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);

				$data=array('name'=>$this->input->post("name",true),'uid'=>$this->input->post("uid",true),'pwd'=>$this->input->post("pwd",true),'tel'=>$tel,'rank'=>$this->input->post("rank",true));
				$result = $this->member_m->updaterow($data,$no);
				redirect("/~sale/member/lists/".$text1.$page);
			}
		}

		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;


			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");
			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("main_header");
					$this->load->view("member_add");    // �Է�ȭ�� ǥ��
					$this->load->view("main_footer");

				}
				else              // �Է�ȭ���� �����ư Ŭ���� ���
				{

					$tel1 = $this->input->post("tel1",true);
					$tel2 = $this->input->post("tel2",true);
					$tel3 = $this->input->post("tel3",true);
					
					$tel=sprintf("%-3s%-4s%-4s",$tel1,$tel2,$tel3);

					$data=array('name'=>$this->input->post("name",true),'uid'=>$this->input->post("uid",true),'pwd'=>$this->input->post("pwd",true),'tel'=>$tel,'rank'=>$this->input->post("rank",true));
					$this->member_m->insertrow($data);

					redirect("/~sale/member/lists/".$text1.$page);    //   ���ȭ������ �̵�.
				}
			//}
		}*/
    }
?>
