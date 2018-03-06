<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vendorpermi extends CI_Controller {

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
    if ($this->session->userdata('logged_in_admin') != TRUE) {
      redirect(site_url("administrator/login"));
    }
    if (!in_array("1", $this->session->userdata('permi'))) {
      if (!in_array("5", $this->session->userdata('permi'))) {
        redirect(site_url("administrator/home"));
      }
    }
  }

  public function index() {
    $data['langId'] = FALSE;
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $checks = $this->input->post('check');
      if ($checks !== FALSE) {
        foreach ($checks AS $check) {
          if (!($this->data->delete("products", $check))) {
            echo "<script>alert('" . lang("NonDelete") . "');</script>";
          }
        }
      } else {
        echo "<script>alert('" . lang("NonSelect") . "');</script>";
      }
    }
    $data['setting']['data_in_page'] = 15;
    $index_Page = $this->config->item('index_page');
    if ($index_Page == "index.php") {
      $index_Page = $index_Page . "/";
    }
    $paging["base_url"] = base_url() . $index_Page . "administrator/products/index";
    $paging["first_url"] = base_url() . $index_Page . "administrator/products/index" . $this->config->item('url_suffix');
    $paging["suffix"] = $this->config->item('url_suffix');
    ;
    $paging["total_rows"] = $this->data->countTable("products");
    $paging["per_page"] = $data['setting']['data_in_page'];
    $paging["uri_segment"] = 4;
    $paging['num_links'] = 7;
    $paging['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
    $paging['full_tag_close'] = '</ul></div>';
    $paging['first_link'] = '[«]';
    $paging['first_tag_open'] = '<li class="first">';
    $paging['next_tag_open'] = '<li class="next">';
    $paging['prev_tag_open'] = '<li class="prev">';
    $paging['first_tag_close'] = '</li>';
    $paging['next_tag_close'] = '</li>';
    $paging['prev_tag_close'] = '</li>';
    $paging['last_link'] = '[»]';
    $paging['last_tag_open'] = '<li class="last">';
    $paging['last_tag_close'] = '</li>';
    $paging['next_link'] = 'التالي »';
    $paging['prev_link'] = '« السابق';
    $paging['num_tag_open'] = '<li class="pager-item">';
    $paging['num_tag_close'] = '</li>';
    $paging['cur_tag_open'] = '<li class="active"><a href="javascript:">';
    $paging['cur_tag_close'] = '</a></li>';
    $this->pagination->initialize($paging);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data'] = $this->data->get("vendor_permission_type", FALSE, array("id >" => 0), FALSE, TRUE, array("id" => "asc"), array($data['setting']['data_in_page'] => $page));
    $data["links"] = $this->pagination->create_links();
    $this->load->view('administrator/global/header');
    $this->load->view('administrator/global/topbar');
    $this->load->view('administrator/global/menu');
    $this->load->view('administrator/pages/vendor_table', $data);
    $this->load->view('administrator/global/footer');
  }

  public function add() {
   
        $data['langId']        = FALSE ;
        $data['vendor_per_type']  = $this->data->get("vendor_permission_type") ;
        $data['vendors']  = $this->data->get("cats") ;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Vouchers" ;
        $data['Title']         = "عن التطبيق" ;
        $this->load->library('form_validation');
        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/vendor_add_view',$data);
        $this->load->view('administrator/global/footer');
  }

  public function vendor_add(){
     if($_REQUEST['Cform'] !=''){
         $setingTypes=$_REQUEST['Cform']['setting_type'];
         $vendor=$_REQUEST['Cform']['vendor'];
         $sqlDelete = "delete from vendor_permission_managemrnt where vendor_id=".$vendor;
         $this->db->query($sqlDelete);
         foreach($setingTypes as $setingType){
             $getidandvalue=explode("~",$setingType);
             $status = '1';
             $sqlcoupon = "insert into vendor_permission_managemrnt (vendor_id, setting_type, status) values ('$vendor', '$getidandvalue[1]', '$status')";
             $this->db->query($sqlcoupon);
         }
     }
      redirect('administrator/vendorpermi/add');
  }


  public function viewpermission(){
      $data['langId']        = FALSE ;

      //$data['vendor_per_type']  = $this->data->get("vendor_permission_type");
      //$data['vendors']  = $this->data->get("cats");
      //$data['vendorpermission']  = $this->data->get("vendor_permission_managemrnt");



      $this->db->select('t1.vendor_id, t2.id, t2.id, t2.name, t2.name_en');
      $this->db->from('vendor_permission_managemrnt as t1');
      $this->db->where('t1.status', '1');
      $this->db->join('cats as t2', 't1.vendor_id = t2.id', 'LEFT');
      $this->db->group_by('t1.vendor_id');
      $query = $this->db->get();
      $data['vendorgrops']=$query->result_array();

      $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
      $data['method']        = "Vouchers" ;
      $data['Title']         = "عن التطبيق" ;
      $this->load->library('form_validation');
      $this->load->view('administrator/global/header');
      $this->load->view('administrator/global/topbar');
      $this->load->view('administrator/global/menu');
      $this->load->view('administrator/pages/permission_view',$data);
      $this->load->view('administrator/global/footer');
  }





  
 

}
