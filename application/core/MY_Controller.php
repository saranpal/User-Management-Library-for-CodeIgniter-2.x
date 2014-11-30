<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller  {

    public function __construct()
	{
        parent::__construct();
		$this->ci =& get_instance();

		$this->ci->load->config('tank_auth', TRUE);
		$this->load->helper(array('form', 'url'));
		$this->ci->load->library('session');
		$this->ci->load->database();
		$this->load->model('user_groups');
		//var_dump($this->ci->router->fetch_class());
		//var_dump($this->ci->router->fetch_method());
		//var_dump($this->ci->session->userdata('User'));
		
		
		
    }
	
	function beforeFilter() {
		$this->userAuth();
	}
	
	private function userAuth() {
	
	var_dump($this->ci->router->fetch_class());
	
	var_dump($this->user_groups->isUserGroupAccess($this->ci->router->fetch_class(), $this->ci->router->fetch_method(), 5));
		if(!$this->user_groups->isUserGroupAccess($this->ci->router->fetch_class(), $this->ci->router->fetch_method(), 5)) {
			
			
			//var_dump('okk');
			//redirect('/auth/login/');
			//exit;
		}
	}
	
}