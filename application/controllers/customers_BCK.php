<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class customers extends CI_Controller {
    public function __construct()
	{
		 parent::__construct();
         $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         if($this->session->userdata('admin_lang') == FALSE)
         {
           $data['admin_lang'] = $setting['admin_lang'] ;
           $this->session->set_userdata($data);
         }
          $this->lang->load("admin",$this->setting->getLang($this->session->userdata('admin_lang')))  ;
          $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
	}
	public function index()
	{
		$customersData =[];
		$sessiondata = [];
		$sessiondata = $this->session->userdata('logged_in_customer');
		if(!$sessiondata) {
			$customersData['message'] =  lang("Pleasecustomers");
			$customersData['txtUserName'] = $this->input->post('txtUserName');
			if(isset($_POST['txtUserName'])) {
			 	 $userName = $this->input->post('txtUserName');
				 $password = $this->input->post('txtPassword');
			   	if(($this->data->setcustomers("cats",$userName,$password) == TRUE )) {
			   		$userData = $this->data->getUserByUsername($userName,"cats");
                    // set session
                    $this->session->set_userdata('logged_in_customer',$userData);
					if($this->session->userdata('logged_in_customer'))
						redirect(site_url("products"));
				}else{
					$customersData['message'] =  lang("errorUserName");
				}
			}
		}
		$this->load->view('administrator/user/login',$customersData);
		
	}
	public function dashbord()
	{
		$sessiondata = $this->session->userdata('logged_in_customer');
		if (!$sessiondata) {
			
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url("customers"));
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */