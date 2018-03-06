<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->setting->changeAdminLang();
        $setting = $this->setting->get();
        $this->load->model('administrator/data');
        $this->load->helper('administrator/lang');
        $this->load->helper('administrator/get');
        if($this->session->userdata('admin_lang') == FALSE)
        {
            $data['admin_lang'] = $setting['admin_lang'] ;
            $this->session->set_userdata($data);
        }
        $this->lang->load("admin",$this->setting->getLang($this->session->userdata('admin_lang')))  ;
        $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
        if($this->session->userdata('logged_in_customer') != TRUE )
        {
            redirect(site_url("customer"));
        }

    }
    public function index()
    {

        $data=array();
        //$data['langId']        = FALSE ;

       // $data['data']          = $this->data->get("article",$data['langId'],array("method"=>"dashboard")) ;
        //$data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        //$data['method']        = "dashboard" ;
        //$data['Title']         = "عن التطبيق" ;

/*
        $this->load->library('form_validation');


        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/dashboard',$data);
        $this->load->view('administrator/global/footer');
*/

        $this->load->view('customer/global/header');
        $this->load->view('customer/global/topbar');
        $this->load->view('customer/global/menu');
        $this->load->view('customer/pages/dashboard',$data);
        $this->load->view('customer/global/footer');
    }


//*****************************************************************

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */