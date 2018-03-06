<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payfort extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
         $this->setting->changeLang();
         $setting = $this->setting->get();
         if($this->session->userdata('site_lang') == FALSE)
         {
           $data['site_lang'] = $setting['site_lang'] ;
          $this->session->set_userdata($data);
         }
         $this->lang->load("site",$this->setting->getLang($this->session->userdata('site_lang')))  ;
         $this->config->set_item('language', $this->setting->getLang($this->session->userdata('site_lang')));
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
	}


	public function index()
	{
         $this->load->view('customer/global/header');
      
        $this->load->view('customer/pages/payfort');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */