<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conditions extends CI_Controller {

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
        $data['langId']        = FALSE ;
        $langId                = $data['langId'];
        $data['setting']       = $this->data->get("setting",$data['langId'],FALSE,1) ;
        $setting               = $data['setting'];
        //*******************************************************
        $data['Data']     = $this->data->get("article",FALSE,array("method"=>"conditions")) ;
        $data['title'] = " - ".$data['Data']['title'];

        $template = $data['setting']['template'];
	  	$this->load->view('templates/'.$template.'/pages/conditions2',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */