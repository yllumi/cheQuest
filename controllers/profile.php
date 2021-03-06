<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Public_Controller {
	
	public function __construct()
    {
        parent::__construct();
		
		 // check if user has login
        if(!isset($this->current_user->id))
        	redirect('users/login');

		$this->load->model('chequest/activity_m');
		$this->load->library('chequest');
		$this->lang->load('chequest');
		
		// Load css/js
		$this->template
			 ->append_css('module::chequest.css')
			 ->append_js('module::chequest.js')
			 ->set('context', 'profile');
		
		// Set Sidenav
		$this->chequest->set_context_menu();
	}
	
	public function index($id = 1)
	{
		if(!$id) $id = $this->session->userdata('user_id');
		
		if(!is_int($id)) $activities = $this->activity_m->get_many_by(array('username'=>$id));
	 		else $activities = $this->activity_m->get_many($id);

		$this->template->set_partial('content', 'profile/index.php');
			 
		self::build();
	}
	
	function build($layout = 'layout'){
		$this->template->build($layout);
	}
    
}

