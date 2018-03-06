<?php if (!defined('BASEPATH')) exit('.');

class Emergency extends CI_Controller {

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
      $sessiondata = $this->session->userdata('logged_in_customer');
      if (!$sessiondata) {
          redirect(site_url("customers"));
      }

       
           

  }

  
  public function index() {
     $sessiondata = $this->session->userdata('logged_in_customer');
     
    $data['data'] = $this->data->getEmergencyList($sessiondata['id']);



    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/emergency_index',$data);
    $this->load->view('customer/global/footer');
   }
public function resetDriver(){
  
  
  if($_REQUEST !=''){
          $data=array('driver_id'=>NULL,'status'=>1,'order_assign_datetime'=>NULL);
          $this->db->where('order_id',$_REQUEST['orderid']);
          $this->db->where('vendor_id',$_REQUEST['vendorid']);
          $this->db->update('order_vendor_driver',$data);

          ////////// Update emergency request ////
          $data=array('action'=>1);
          $this->db->where('order_id',$_REQUEST['orderid']);
          $this->db->where('vendor_id',$_REQUEST['vendorid']);
          $this->db->where('driver_id',$_REQUEST['driverid']);
          $this->db->update('emergency_request',$data);

   }
  
   echo 1;
}

  
}