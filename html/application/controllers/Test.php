<?	// 클래스이름은 파일이름과 같아야 하며 첫 글자는 반드시 대문자여야 한다.
    class Test extends CI_Controller {				// air클래스 선언
        function __construct()							// 클래스생성할 때 초기설정
        {
            parent::__construct();
           // $this->load->database();					// 데이터베이스 연결
            //$this->load->model("air_m");				// 모델 air_m 연결
			//$this->load->helper(array("url","date"));
			//$this->load->library('pagination');
        }
        public function index()							// 제일 먼저 실행되는 함수
        {
			$this->load->view("header");                    // ������(�޴�)
			$this->load->view("signup");
			$this->load->view("main_footer");                      // �ϴ� ��� 
        }
    }
?>