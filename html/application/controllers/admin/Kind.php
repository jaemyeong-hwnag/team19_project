<?	// 클래스이름은 파일이름과 같아야 하며 첫 글자는 반드시 대문자여야 한다.
    class Kind extends CI_Controller {				// kind클래스 선언
        function __construct()							// 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();					// 데이터베이스 연결
            $this->load->model("kind_m");				// 모델 kind_m 연결
			$this->load->helper(array("url","date"));
			$this->load->library('pagination');
        }
        public function index()							// 제일 먼저 실행되는 함수
        {
			if($this->session->userdata('rank')!="1")redirect("/~team19");
            $this->lists();								// list 함수 호출
        }
        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(4);
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0;


			if ($text1=="")
				$base_url = "/kind/lists/page";	// $page_segment = 4;
			else
				$base_url = "/kind/lists/text1/$text1/page"; // $page_segment = 6;
			$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")),"/")+1;
			$base_url = "/~team19".$base_url;	// team19계정인 경우

			$config["per_page"] = 5;	// 페이지당 표시할 line 수
			$config["total_rows"] = $this->kind_m->rowcount($text1); // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;	// 페이지가 있는 segment 위치
			$config["base_url"] = $base_url;		// 기본 URL
			$this->pagination->initialize($config);	// pagination 초기화, 설정 적용

			$data["page"]=$this->uri->segment($page_segment,0);	// 시작위치, 없으면 0
			$data["pagination"]=$this->pagination->create_links(); // 페이지소스 생성

			$start=$data["page"];	// n페이지 : 시작위치
			$limit=$config["per_page"];	// 페이지 당 라인수

			// $text1=urldecode($this->uri->segment(4));
			$data["text1"]=$text1;						// text1 값 전달을 위한 처리
            $data["list"] = $this->kind_m->getlist($text1,$start,$limit,$page);	// 목록읽기, 해당페이지 자료읽기

            $this->load->view("admin/main_header2");			// 상단출력(메뉴)
			//echo "ok";
			// $this->load->view("kind_title");
            $this->load->view("admin/kind_list",$data);		// kind_list에 자료전달
            $this->load->view("admin/main_footer2");			// 하단출력
        }
		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(4);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);
			$data["text1"]=$text1;
			$data["page"]=$page;
			$data["row"]=$this->kind_m->getrow($no);

			$this->load->view("admin/main_header2");
            $this->load->view("admin/kind_view",$data);
            $this->load->view("admin/main_footer2");

			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		}
		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(4);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);					// URI: /kind/del/no/1
			$this->kind_m->deleterow($no);
			redirect("/~team19/admin/kind/lists/" . $text1 . $page);	// 목록화면으로 돌아가기
		}
		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(4);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			$this->load->library("form_validation");

			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			
			if ($this->form_validation->run()==FALSE)	// 목록화면의 추가버튼 클릭한 경우
			{
				$this->load->view('admin/main_header2');
				$this->load->view('admin/kind_add');
				$this->load->view('admin/main_footer2');
			}
			else										// 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(							// 입력 값을 data 배열에 저장
					'name' => $this->input->post("name",true)
					);
				$result = $this->kind_m->insertrow($data); // insertrow함수 호출, 데이터저장

				redirect("/~team19/admin/kind/lists/" . $text1 . $page);		// 목록화면으로 이동
			}
		}
		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(4);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);

			$this->load->library("form_validation");	// 폼검증 라이브러리 로드

			$this->form_validation->set_rules("name","이름","required|max_length[20]");

			if ($this->form_validation->run()==FALSE)	// 목록화면의 추가버튼 클릭한 경우
			{
				$this->load->view('admin/main_header2');
				$data["row"]=$this->kind_m->getrow($no);
				$this->load->view("admin/kind_edit",$data);
				$this->load->view('admin/main_footer2');
			}
			else										// 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(							// 입력 값을 data 배열에 저장
					'name' => $this->input->post("name",true)
					);
				$result = $this->kind_m->updaterow($data,$no); // insertrow함수 호출, 데이터저장

				redirect("/~team19/admin/kind/lists/" . $text1 . $page);		// 목록화면으로 이동
			}
		}
    }
?>