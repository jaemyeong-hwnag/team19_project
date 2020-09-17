<?	// 클래스이름은 파일이름과 같아야 하며 첫 글자는 반드시 대문자여야 한다.
    class Team19 extends CI_Controller {				
       function __construct()                          // 클래스생성할 때 초기설정
	{
		parent::__construct();
		$this->load->database();// 데이터베이스 연결
		
		$this->load->helper(array("url","date"));
	}
		public function developer(){
			$this->load->view("dheader");
			$this->load->view("team19");
			$this->load->view("dfooter");
		}

    }
?>