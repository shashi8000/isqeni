<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Orders extends CI_Controller {

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

    $sqldriver = "SELECT * from vendor_permission_managemrnt where setting_type =4 and  vendor_id=".$sessiondata['id']." ";
            $query=$this->db->query($sqldriver);
            $valPer = $query->result_array();
         
            if(empty($valPer)){
                redirect(site_url("dashboard"));
            }


  }

  public function index() {
    $data['langId'] = $this->session->userdata('admin_lang');
    if (isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit'])) {
      $checks = $this->input->post('check');

      if ($checks !== FALSE) {
        foreach ($checks AS $check) {
          if ($check > 0) {
            if (!($this->data->delete("orders", $check))) {
              echo "<script>alert('" . lang("NonDelete") . "');</script>";
            }
          }
        }
      } else {
        echo "<script>alert('" . lang("NonSelect") . "');</script>";
      }
    }
    //********************* Search *********************************
    $cat = $this->session->userdata('logged_in_customer')['id'];

    /*
    $quy1 = $this->db->select('*')->join('cart', 'products.id = cart.prod_id', 'left')->where('products.cat_id', $cat)->get('products')->result_array();
    $orders_id = [];
    foreach ($quy1 as $vals) {
      $orders_id[] = $vals['order_id'];
    }
    $where = [];
    if ($this->input->get('from'))
      $where['odate >='] = $this->input->get('from');
    if ($this->input->get('to'))
      $where['odate <='] = $this->input->get('to');
    if ($this->input->get('status') && $this->input->get('status') != 'all')
      $where['status'] = $this->input->get('status');
    if ($this->input->get('pay'))
      $where['pay'] = $this->input->get('pay');
    if ($orders_id)
      $total = $this->db->order_by('id', 'desc')->where_in('id', $orders_id)->get_where('orders', $where)->num_rows();
    else
      $total = 0;
    $page = (int) trim($this->input->get('p', TRUE));
    $index_Page = $this->config->item('index_page');
    if ($index_Page == "index.php") {
      $index_Page = $index_Page . "/";
    }
    $customer = $this->session->userdata('logged_in_customer');
    if (!$customer) {
      $paging["base_url"] = base_url() . $index_Page . "orders";
    } else {
      $paging["base_url"] = base_url() . $index_Page . "orders";
    }
    $paging["suffix"] = $this->config->item('url_suffix');
    if ($total > 0)
      $paging["total_rows"] = $total;
    else
      $paging["total_rows"] = 0;
    $paging["per_page"] = 50;
    $paging['page_query_string'] = TRUE;
    $paging['query_string_segment'] = 'p';
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
    $paging['next_link'] = '>';
    $paging['prev_link'] = '<';
    $paging['num_tag_open'] = '<li class="pager-item">';
    $paging['num_tag_close'] = '</li>';
    $paging['cur_tag_open'] = '<li class="active"><a href="javascript:">';
    $paging['cur_tag_close'] = '</a></li>';
    $this->pagination->initialize($paging);
    if (!empty($orders_id)) {
      $data['data'] = $this->db->order_by('id', 'desc')->where_in('id', $orders_id)->get_where('orders', $where, $paging["per_page"], $page)->result_array();
    } else {
      $data['data'] = [];
    }
    $data["links"] = $this->pagination->create_links();
    $data["companies"] = $this->db->get('cats')->result_array();
    $data['vendorId']=$cat;
    $this->load->view('customer/global/header');
    $this->load->view('customer/global/topbar');
    $this->load->view('customer/global/menu');
    $this->load->view('customer/pages/order_table', $data);
    $this->load->view('customer/global/footer');
    */
      //$data['data'] = $this->db->select('*')->join('order_item', 'products.id = order_item.product_id', 'left')->where('products.cat_id', $cat)->get('products')->result_array();

      $this->db->select('*');
      $this->db->from('order_item as t1');
      $this->db->join('products as t2', 't1.product_id = t2.id', 'LEFT');
      $this->db->join('orders as t3', 't1.order_id = t3.id', 'LEFT');
      $this->db->join('clients as t4', 't3.client_id = t4.id', 'LEFT');
      $this->db->join('order_vendor_driver as ovd', 'ovd.order_id = t3.id', 'LEFT');

	  if(@$_REQUEST['pay'] !='' && @$_REQUEST['pay'] !='0'){
          $this->db->where('LOWER(t3.payment_method)',$_REQUEST['pay']);
      }
      if(@$_REQUEST['status'] !='all' && @$_REQUEST['status'] !=''){
          $this->db->where('t3.order_status',@$_REQUEST['status']);
      }
      if(@$_REQUEST['from'] !='' && @$_REQUEST['to'] && @$_REQUEST['pay'] !='0' && @$_REQUEST['status'] !=''){
          $this->db->where("t3.order_datetime BETWEEN '".$_REQUEST['from']."' AND '".$_REQUEST['to']."'");
      }

      $this->db->where('t1.vendor_id', $cat);
      $this->db->order_by('t3.id','desc');
      $this->db->group_by('t3.id');

      //$this->db->where('t2.cat_id', $cat);

      $query = $this->db->get();
      $data['data'] =$query->result_array();

      $data["companies"] = $this->db->get('cats')->result_array();
      $data['vendorId']=$cat;

      $this->load->view('customer/global/header');
      $this->load->view('customer/global/topbar');
      $this->load->view('customer/global/menu');
      $this->load->view('customer/pages/order_table', $data);
      $this->load->view('customer/global/footer');
  }

  public function viewproductdetails($orders_id){

      $data['langId']        = FALSE ;
      $cat = $this->session->userdata('logged_in_customer')['id'];
      $data['data']          = $this->data->order_vendel_totla($cat, $orders_id);
      $data['Corderid'] =$orders_id;
      $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
      $data['method']        = "Vouchers" ;
      $data['Title']         = "عن التطبيق" ;
      //$data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
      $this->load->library('form_validation');
      $this->load->view('customer/global/header');
      $this->load->view('customer/global/topbar');
      $this->load->view('customer/global/menu');
      $this->load->view('customer/pages/ordersproductdetails',$data);
      $this->load->view('customer/global/footer');
  }

  public function printD() {

    $data['title'] = " - " . " تقرير مبيعات ";
    $data['langId'] = $this->session->userdata('admin_lang');
    $data['setting'] = $this->data->get("setting", FALSE, FALSE, 1);
    //********************* Search *********************************
    $arraySearch = array("id >" => 0);

    $from = $this->input->get('from');
    $to = $this->input->get('to');
    $branch = $this->input->get('branch');

    if ($from != FALSE && !empty($from)) {
      $arraySearch['odate >='] = $from;
    }
    if ($to != FALSE && !empty($to)) {
      $arraySearch['odate <='] = $to;
    }
    if ($branch != FALSE && !empty($branch)) {
      $arraySearch['branch_id'] = $branch;
    }
    //****************************************
    $Data2 = $this->data->get("orders", FALSE, $arraySearch, FALSE, TRUE, false, false, array("id" => "id"));
    $data['CountSearch'] = array(-1);
    foreach ($Data2 AS $t) {
      $data['CountSearch'][] = $t['id'];
    }
    $data['data'] = $this->data->get("orders", FALSE, $arraySearch, FALSE, TRUE, array("id" => "asc"));

    $this->load->view('customer/pages/order2_table', $data);
  }

//*****************************************************************
  public function delete($slug) {
    if ($slug > 0) {
      $this->data->delete("orders", $slug);
      $this->data->delete("cart", FALSE, array("order_id" => $slug));
    }
    redirect('orders/index/', 'refresh');
  }

  
  
  /*
  public function driverdatain(){
      if($_REQUEST !=''){
          $data=array('driver_id'=>$_REQUEST['driverid'],'status'=>4,'order_assign_datetime'=>date('Y-m-d H:i:s'));
          $this->db->where('order_id',$_REQUEST['orderid']);
          $this->db->where('vendor_id',$_REQUEST['vendorid']);
          $this->db->update('order_vendor_driver',$data);
         echo 1;
      }
  }
  */

   public function driverdatain(){
      if($_REQUEST !=''){
          $data=array('driver_id'=>$_REQUEST['driverid'],'status'=>4,'order_assign_datetime'=>date('Y-m-d H:i:s'));
          $this->db->where('order_id',$_REQUEST['orderid']);
          $this->db->where('vendor_id',$_REQUEST['vendorid']);
          $this->db->update('order_vendor_driver',$data);

            $this->db->select('*');
            $this->db->from('drivers');
            $this->db->where('id',$_REQUEST['driverid']);
            $query = $this->db->get();
            $rows=$query->result_array();
                                                                
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_URL,$this->config->item('apiURL2'));
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,
              "device_token=".$rows[0]['device_token']."&device_type=".$rows[0]['device_type']."&title=New Order&body=#".$_REQUEST['orderid']."&order_id=".$_REQUEST['orderid']."&notify_type=assign_driver");
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded','secret:tcl1806'));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $server_output = curl_exec ($ch);
          curl_close ($ch);

         echo 1;
      }
  }


}
