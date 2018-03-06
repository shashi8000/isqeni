<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
         $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
         $this->load->library("pagination");
         if($this->session->userdata('admin_lang') == FALSE)
         {
           $data['admin_lang'] = $setting['admin_lang'] ;
           $this->session->set_userdata($data);
         }
          $this->lang->load("admin",$this->setting->getLang($this->session->userdata('admin_lang')))  ;
          $this->config->set_item('language', $this->setting->getLang($this->session->userdata('admin_lang')));
      if($this->session->userdata('logged_in_admin') != TRUE )
        {
          redirect(site_url("administrator/login"));
        }
        if (!in_array("1",$this->session->userdata('permi')))
        {
          if(!in_array("7",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {
      $data['langId'] = $this->session->userdata('admin_lang');
      $data['data'] = $this->data->getOrderdataForAdmin($_REQUEST);
      $data["companies"] = $this->db->get('cats')->result_array();
      $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/order_table',$data);
     $this->load->view('administrator/global/footer');

   }

public function exportExcelData($records)
{
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }

public function fetchDataFromTable()
{
     
//////////////////////////////
     
    $data['data']= $this->data->getOrderdataForAdmin($_REQUEST);
  
    ///////////////////////////







     $dataToExports = [];
     foreach ($data['data'] as $data) {
     
                    $ordStatus='N/A';
                    if($data['order_status'] == 1){ $ordStatus= lang('PlacedOrder');}
                    if($data['order_status'] == 2) { $ordStatus= lang('CancelOrder');}
                    if($data['order_status'] == 3) { $ordStatus= lang('DeliveredOrder');}
                    if($data['order_status'] == 4) { $ordStatus= lang('PendingOrder');}
                   
/// Address///
$vall = $this->data->get("shipping_address",FALSE,array("id"=>$data['shipping_id']),FALSE,TRUE) ;
$adr='';
                    if($vall[0]['street'] !='' ){
                        $adr =$adr. $vall[0]['street'] . ',';
                    }
                    if($vall[0]['house']!=''){
                        $adr =$adr. $vall[0]['house'] . ',';
                    }
                    if($vall[0]['landmark']!=''){
                     $adr =$adr.  $vall[0]['landmark'] . ',';
                    }







        $arrangeData[lang("InvoiceNumber")] = $data['order_id'];
        $arrangeData[lang("ClientName")] = $data['name'];//$this->clientName($data_item['client_id'], $data_item['shipping_id']);// $data['name_en'];//$data['mobile'];
        $arrangeData[lang("ClientMobile")] = $data['mobile'];
        $arrangeData[lang("ClientEmail")] = $data['email'];
        $arrangeData[lang("ClientAddress")] = $adr;
        $arrangeData[lang("Date")]=$data['order_datetime'];
        $arrangeData[lang("Total")] = $data['payment_amount'];
        $arrangeData[lang("PaymentMethod")] = $data['payment_method'];
        $arrangeData[lang("OrderStatus")] = $ordStatus;
        
         $dataToExports[] = $arrangeData;
  }

  
 

    $filename = "order-".date('Y-m-d').".xls";
  
 header( 'Content-Type: text/csv; charset=utf-8; encoding=UTF-8' ); 
 header('Content-Transfer-Encoding: binary');
  //header("Content-type:text/html; charset=utf-8");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
  exit(); 
 }
public function clientName($clientId,$shipping_id){
    $clientdetail=$this->data->getclientshipdetails($clientId,$shipping_id);
    
//print_r($clientdetail);

    if(@$clientdetail[0]['name'] !=''){
        return @$clientdetail[0]['name'];
    }else{
        return 'N/A';
    }

}




public function companies()
   {
      $data['langId']        = $this->session->userdata('admin_lang') ;
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $checks = $this->input->post('check');

        if($checks !== FALSE)
        {
           foreach($checks AS $check)
           {
             if($check > 0) {
               if(! ($this->data->delete("orders",$check)))
               {
                 echo "<script>alert('".lang("NonDelete")."');</script>";
               }
             }
           }
        }
        else
        {
          echo "<script>alert('".lang("NonSelect")."');</script>";
        }
      }
      //********************* Search *********************************
       $cat  = $this->input->get('cat');
       $quy1 = $this->db->select('*')->join('cart','products.id = cart.prod_id','left')
                        ->where('products.cat_id', $cat)->get('products')->result_array();
        $orders_id = [];
        foreach ($quy1 as $vals ) {
          $orders_id[] = $vals['order_id'];
        }
        
        if ( $orders_id ) $total = $this->db->order_by('id','desc')->where_in('id',$orders_id)->get('orders')->num_rows();
        else              $total = 0;

        $page = (int) trim($this->input->get('p',TRUE));
        $index_Page = $this->config->item('index_page');
        if($index_Page == "index.php"){$index_Page = $index_Page."/";}
        $paging["base_url"] = base_url().$index_Page."administrator/orders/companies?cat=".$cat;
        $paging["suffix"] = $this->config->item('url_suffix');

        if ( $total > 0 )  $paging["total_rows"] = $total;
        else               $paging["total_rows"] = 0;
        $paging["per_page"] = 10;
        $paging['page_query_string'] = TRUE;
			  $paging['query_string_segment'] ='p';
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

        if ( !empty($orders_id) ) {        
           $data['data'] = $this->db->order_by('id','desc')->where_in('id',$orders_id)->get('orders',$paging["per_page"],$page)->result_array();
        }else{
           $data['data'] = [];
        }
        
       $data["links"] = $this->pagination->create_links() ;
       $data["companies"] = $this->db->get('cats')->result_array();

     $this->load->view('administrator/global/header');
     $this->load->view('administrator/global/topbar');
     $this->load->view('administrator/global/menu');
     $this->load->view('administrator/pages/order_company',$data);
     $this->load->view('administrator/global/footer');
   }

    public function viewproductdetails($orders_id){

        $data['langId']        = FALSE ;
        $cat = $this->session->userdata('logged_in_customer')['id'];
        $data['data']          = $this->data->order_vendel_totlaorderall($orders_id);
        $data['Corderid'] = $orders_id;
        $data['id']            = isset($data['data']['id'])? $data['data']['id'] : 0 ;
        $data['method']        = "Order Details" ;
        $data['Title']         = "عن التطبيق" ;
        //$data['cats'] = $this->data->get("cats", FALSE, array("parent" => 0), FALSE, TRUE);
        $this->load->library('form_validation');
        $this->load->view('administrator/global/header');
        $this->load->view('administrator/global/topbar');
        $this->load->view('administrator/global/menu');
        $this->load->view('administrator/pages/ordersproductdetails',$data);
        $this->load->view('administrator/global/footer');
    }

public function edit()
   {
      $data['langId']        = FALSE ;
      if($this->uri->segment(4))
      {
        $data['data']          = $this->data->get("orders",$data['langId'],array("id"=>$this->uri->segment(4))) ;
        $data['id']            = $this->uri->segment(4) ;
      }
      else
      {
        $data['id'] = 0 ;
      }
     if ( $this->input->post('table') ){
        $this->db->set('status', $this->input->post('status'));
        $this->db->where('id', $data['id']);
        $this->db->update('orders');
        redirect('administrator/orders/');
     }
       $data['cats']        = $this->data->get("cats",FALSE,array("parent"=>0),FALSE,TRUE) ;
       $data['branchs']     = $this->data->get("branchs",FALSE,array("id >"=>0),FALSE,TRUE) ;
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/edit_orders',$data);
       $this->load->view('administrator/global/footer');
   }

   public function printD()
   {

       $data['title'] = " - "." تقرير مبيعات ";
      $data['langId']        = $this->session->userdata('admin_lang') ;
      $data['setting']       = $this->data->get("setting",FALSE,FALSE,1) ;
      //********************* Search *********************************
      $arraySearch = array("id >"=>0) ;

       $from   = $this->input->get('from') ;
       $to     = $this->input->get('to') ;
       $branch = $this->input->get('branch') ;

       if($from != FALSE && !empty($from))
       {
         $arraySearch['odate >='] = $from ;
       }
       if($to != FALSE && !empty($to))
       {
         $arraySearch['odate <='] = $to ;
       }
       if($branch != FALSE && !empty($branch))
       {
         $arraySearch['branch_id'] = $branch ;
       }
       //****************************************
       $Data2 = $this->data->get("orders",FALSE,$arraySearch,FALSE,TRUE,false,false,array("id"=>"id"));
       $data['CountSearch'] = array(-1);
       foreach($Data2 AS $t){
           $data['CountSearch'][]  = $t['id'] ;
       }
        $data['data']   = $this->data->get("orders",FALSE,$arraySearch,FALSE,TRUE,array("id"=>"asc"));
     $this->load->view('administrator/pages/order2_table',$data);
   }

//*****************************************************************
   public function delete($slug)
	{
		if($slug > 0)
		{
		  	$this->data->delete("orders",$slug);
		  	$this->data->delete("cart",FALSE,array("order_id"=>$slug));
		}
    	redirect('administrator/orders/index/', 'refresh');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */