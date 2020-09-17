<?	// 클래스이름은 파일이름과 같아야 하며 첫 글자는 반드시 대문자여야 한다.
    class Yeyag extends CI_Controller {				// yeyag클래스 선언
        function __construct()							// 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();					// 데이터베이스 연결
            $this->load->model("yeyag_m");				// 모델 yeyag_m 연결
			$this->load->helper(array("url","date"));
			$this->load->library('pagination');
			$this->load->library('upload');
			$this->load->library('image_lib');
        }
        public function index()							// 제일 먼저 실행되는 함수
        {
            $this->lists();								// list 함수 호출
        }
        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";

			if ($text1=="")
				$base_url = "/yeyag/lists/page";	// $page_segment = 4;
			else
				$base_url = "/yeyag/lists/text1/$text1/page"; // $page_segment = 6;
			$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")),"/")+1;
			$base_url = "/~team19".$base_url;	// team19계정인 경우

			$config["per_page"] = 5;	// 페이지당 표시할 line 수
			$config["total_rows"] = $this->yeyag_m->rowcount($text1); // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;	// 페이지가 있는 segment 위치
			$config["base_url"] = $base_url;		// 기본 URL
			$this->pagination->initialize($config);	// pagination 초기화, 설정 적용

			$data["page"]=$this->uri->segment($page_segment,0);	// 시작위치, 없으면 0
			$data["pagination"]=$this->pagination->create_links(); // 페이지소스 생성

			$start=$data["page"];	// n페이지 : 시작위치
			$limit=$config["per_page"];	// 페이지 당 라인수

			// $text1=urldecode($this->uri->segment(4));
			$data["text1"]=$text1;						// text1 값 전달을 위한 처리
            $data["list"] = $this->yeyag_m->getlist($text1,$start,$limit);	// 목록읽기, 해당페이지 자료읽기

            $this->load->view("admin/main_header2");			// 상단출력(메뉴)
			// $this->load->view("yeyag_title");
            $this->load->view("admin/yeyag_list",$data);		// yeyag_list에 자료전달
            $this->load->view("admin/main_footer2");			// 하단출력
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
			$data["row"]=$this->yeyag_m->getrow($no);

			$this->load->view("admin/main_header2");
            $this->load->view("admin/yeyag_view",$data);
            $this->load->view("admin/main_footer2");

			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		}
		public function del()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);					// URI: /yeyag/del/no/1
			$this->yeyag_m->deleterow($no);
			redirect("/~team19/admin/yeyag/lists/" . $text1 . $page);	// 목록화면으로 돌아가기
		}
		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			$this->load->library("form_validation");

			$this->form_validation->set_rules("no","번호","");
			$this->form_validation->set_rules("tour_no","상품명","");
			//$this->form_validation->set_rules("price","단가","required|numeric");
			
			if ($this->form_validation->run()==FALSE)	// 목록화면의 추가버튼 클릭한 경우
			{
				$data["list"] = $this->yeyag_m->getlist_gubun();

				$this->load->view('admin/main_header2');
				$this->load->view('admin/yeyag_add',$data);
				$this->load->view('admin/main_footer2');
			}
			else										// 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(							// 입력 값을 data 배열에 저장
					'no' => $this->input->post("no",TRUE),
					'tour_no'	 => $this->input->post("tour_no",TRUE),
					'member_no'	 => $this->input->post("member_no",TRUE),
					'p_gubun'	 => $this->input->post("p_gubun",TRUE),
					'p_gubun2'	 => $this->input->post("p_gubun2",TRUE),
					'regday'	 => $this->input->post("regday",TRUE),
					'status'	 => $this->input->post("status",TRUE)
					);
				//$picname=$this->call_upload();				// 업로드 시작
				// exit("$picname");
				//if ($picname) $data["pic"]=$picname;		// 파일이름 저장

				$result = $this->yeyag_m->insertrow($data); // insertrow함수 호출, 데이터저장

				redirect("/~team19/admin/yeyag/lists/" . $text1 . $page);		// 목록화면으로 이동
			}
		}
		public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no=array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1=array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page=array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : 0;

			// $no=$this->uri->segment(4);

			//$this->load->library("form_validation");	// 폼검증 라이브러리 로드

			//$this->form_validation->set_rules("bgubun_no","브랜드명","required");
			//$this->form_validation->set_rules("name","이름","required|max_length[50]");
			//$this->form_validation->set_rules("price","단가","required|numeric");

			if ($this->form_validation->run()==FALSE)	// 목록화면의 추가버튼 클릭한 경우
			{
				$data["list"] = $this->yeyag_m->getlist_gubun();

				$this->load->view('admin/main_header2');
				$data["row"]=$this->yeyag_m->getrow($no);
				$this->load->view("admin/yeyag_edit",$data);
				$this->load->view('admin/main_footer2');
			}
			else										// 입력화면의 저장버튼 클릭한 경우
			{
				$data = array(							// 입력 값을 data 배열에 저장
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
				$result = $this->yeyag_m->updaterow($data,$no); // insertrow함수 호출, 데이터저장

				redirect("/~team19/admin/yeyag/lists/" . $text1 . $page);		// 목록화면으로 이동
			}
		}
		public function call_upload()
		{
			$config['upload_path'] = "./yeyag_img";	// 저장할 경로
			$config['allowed_types'] = 'gif|jpg|png';	// 저장할 파일 종류
			$config['overwrite'] = TRUE;				// overwrite 허용
			$config['max_size'] = 10000000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;
			$this->upload->initialize($config);			// 설정 적용

			if (!$this->upload->do_upload('pic'))		// 업로드 시작
			$picname="";								// 실패 경우, 빈 문자열 리턴
			else
			{
			$picname=$this->upload->data("file_name");	//성공 경우, 파일이름 리턴
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
			$this->yeyag_m->cal_jaego();

			redirect("/~team19/yeyag/lists" . $text1 . $page);
		}
    }
?>