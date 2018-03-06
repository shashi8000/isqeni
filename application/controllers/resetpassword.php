<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resetpassword extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->setting->changeAdminLang();
    $setting = $this->setting->get();
    $this->load->model('administrator/data');
    $this->load->helper('administrator/lang');
    $this->load->helper('administrator/get');
    $this->load->library("pagination");
    

    if ($this->session->userdata('admin_lang') == FALSE) {
      $data['admin_lang'] = $setting['admin_lang'];
      $this->session->set_userdata($data);
    }
    $this->lang->load("admin", $this->setting->getLang($this->session->userdata('admin_lang')));
    $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
    
  }

  public function index($verified=NULL) {

    //$data =array();
    $data['data']=$verified;

       if(isset($_REQUEST['verify_post'])){
         
          if((isset($_REQUEST['password']) && isset($_REQUEST['cpassword'])) && ($_REQUEST['cpassword']== $_REQUEST['password']) && $_REQUEST['password']!='' && $_REQUEST['cpassword']!='' && strlen($_REQUEST['cpassword'])>8)  {

              
               $data=array('password'=>md5($_REQUEST['password']));
               $this->db->where('verification_key',$verified);
               $this->db->update('clients',$data);
               $data['data']=$verified;


              $data['message']='Your Password is changed';

          }else{

              $data['message']='Both fields are required and should be same and greater than 8 charecter';

          }

       }



        $this->load->view('customer/pages/reset',$data);


  }
    
}