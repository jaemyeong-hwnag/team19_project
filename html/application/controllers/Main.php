<?php
	class Main extends CI_Controller {
	
	function __construct()                          // 클래스생성할 때 초기설정
	{
		parent::__construct();
		$this->load->model("main_m");
		$this->load->database();// 데이터베이스 연결
		
		$this->load->helper(array("url","date"));
	}

    public function index()
    {
		$data=$this->data();
        $this->load->view("main_header");
		$this->load->view("main",$data);
        $this->load->view("main_footer");
    }
	 public function data()
	 {
		$data["total_count"]=$this->main_m->total_count();
		$data["k_count"]=$this->main_m->k_count();
		$data["h_count"]=$this->main_m->h_count();
		$data["list"]=$this->main_m->ran_tour();
		return $data;
     }
}
?>