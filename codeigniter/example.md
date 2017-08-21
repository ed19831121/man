class Blog_controller extends CI_Controller {
	public function __construct(){
        	parent::__construct();
        	// Your own constructor code
    }
	public function blog(){
        	$this->load->model('blog');
		$data['query'] = $this->blog->get_last_ten_entries();
		$this->load->view('blog', $data);
	}
}
