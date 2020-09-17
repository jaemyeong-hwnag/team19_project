<?
    class Login extends CI_Controller {       // JangbuŬ���� ����
        function __construct()                           // Ŭ���������� �� �ʱ⼳��
        {
            parent::__construct();
            $this->load->database();                     // �����ͺ��̽� ����
            $this->load->model("Login_m");    // �� Jangbu_m ����
			$this->load->helper(array("url","date"));    //  helper ����
        }
        public function index()                            // ���� ���� ����Ǵ� �Լ�
        {
           	$this->load->view("header");                    // ������(�޴�)
			$this->load->view("login");
			$this->load->view("main_footer");                      // �ϴ� ��� 
        }

		public function check()
        {
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);

			echo($uid);
			$row=$this->Login_m->getrow($uid,$pwd);
			if($row){
				$data=array("no"=>$row->no);
				$this->session->set_userdata($data);
			}
			
			$this->load->view("header");                    // ������(�޴�)
			$this->load->view("main");
            $this->load->view("main_footer");
		}

		public function logout()
        {
			$data=array('no');
			$this->session->unset_userdata($data);

			$this->load->view("main_header");                    // ������(�޴�)
            $this->load->view("main_footer");   
		}

        public function lists()
        {
			
			//$text1=urldecode($this->uri->segment(4));   // URI: /jangbu/lists/text1/값
			//$data["text1"]=$text1;    
			// text1 값 전달을 위한 처리
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month"));
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");

			/*if ($text1=="")
				$base_url = "/jangbu/lists/page";                        // $page_segment = 4;
			else */
			$data["rowcount"]=$this->Login_m->rowcount($text1,$text2);

			$data["text1"]=$text1;
			$data["text2"]=$text2;
			$data["list_product"]=$this->Login_m->getlist_product();
			$data["list"]=$this->Login_m->getlist($text1,$text2);   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // ������(�޴�)
            $this->load->view("login_list",$data);           // jangbu_list�� �ڷ�����
            $this->load->view("main_footer");                      // �ϴ� ��� 
        }
    }
?>
