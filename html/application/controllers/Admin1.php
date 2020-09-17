<?
    class Admin extends CI_Controller {       // MemberŬ���� ����
        function __construct()                           // Ŭ���������� �� �ʱ⼳��
        {
            parent::__construct();
            $this->load->database();                     // �����ͺ��̽� ����
            $this->load->model("admin_m");    // �� Member_m ����
			$this->load->helper(array("url","date"));    //  helper ����
			$this->load->library('pagination');
        }

        public function index()                            // ���� ���� ����Ǵ� �Լ�
        {	
			//$class_name=get_class($this);
			//$this->load->view("admin/main_header2");                    // ������(�޴�)
			//$this->load->view("admin/air_list");
			//$this->load->view("admin/main_header");
			$this->load->view("admin/main_header2");
			//echo("zzzzzzzzzzzzzzzzzzzz");
			$this->load->view("admin/main_footer2");                   // �ϴ� ��� 
			//$this->load->view("admin/air_list");
			//$this->load->view("admin/air_list");
		}
		
		public function air()                           // ���� ���� ����Ǵ� �Լ�
        {	
			//$class_name=get_class($this);
			$this->load->view("admin/main_header2");

			$this->load->view("admin/main_footer2");
			//$this->load->view("admin/air_list");                // ������(�޴�)
			//$this->load->view("singup");
			//$this->load->view("main_footer");                      // �ϴ� ��� 
		}

		public function member()                           // ���� ���� 
        {	
			//$class_name=get_class($this);
			//$this->load->view("admin/main_header");
			//$this->load->view("admin/member_list");                // ������(�޴�)
			//$this->load->view("singup");
			//$this->load->view("main_footer");                      // �ϴ� ��� 
		}
		public function tour()                           // ���� ���� 
        {	
			//$class_name=get_class($this);
			//$this->load->view("admin/main_header");
			//$this->load->view("admin/member_list");                // ������(�޴�)
			//$this->load->view("singup");
			//$this->load->view("main_footer");                      // �ϴ� ��� 
		}

    }
?>
