<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bill extends CI_Controller {
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
	public function index($id)
	{
        $data['langId']         = FALSE ;
        $langId                 = $data['langId'];
        $data['setting']        = $this->data->get("setting",$data['langId'],FALSE,1) ;
        $setting                = $data['setting'];
        $customer               = $this->session->userdata('id');
        //*******************************************************
        $data['Data']     = $this->data->get("orders",FALSE,array("id"=>$id),1);
        $data['Branch']   = $this->data->get("branchs",FALSE,array("id"=>$data['Data']['branch_id']),1);
        $data['client']   = $this->data->get("clients",FALSE,array("id"=>$data['Data']['client_id']),1);
        $data['items']   = $this->data->get("cart",FALSE,array("order_id"=>$data['Data']['id']),FALSE,TRUE);
        $data['title'] = " - "."فاتورة شراء";
        $template = $data['setting']['template'];
	    $this->load->view('templates/'.$template.'/global/header',$data);
	    $this->load->view('templates/'.$template.'/pages/bill',$data);
        $this->load->view('templates/'.$template.'/global/footer-bottom',$data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */