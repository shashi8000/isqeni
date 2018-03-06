<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clients extends CI_Controller {
  	public function __construct()
	{
  		 parent::__construct();
        $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
         $this->load->helper('administrator/get');
         $this->load->helper('string');
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
            if(!in_array("6",$this->session->userdata('permi')))
          {
              redirect(site_url("administrator/home"));
          }
        }
	}
    public function index()
    {
      


 
        if(isset($_POST['couponcodeSelId'])){
			if($_REQUEST['couponcodeSelId']==2){
				if( isset($_REQUEST['corporate_type'])){

					$query = $this->db->query("select * from clients as c LEFT join  corporate_client_details as cd on cd.client_id = c.id where cd.corporate_type='".$_REQUEST['corporate_type']."'");
                    $data['data']=$query->result_array();

				}else{
          $query = $this->db->query("select * from clients as c LEFT join  corporate_client_details as cd on cd.client_id = c.id where c.user_type='".$_REQUEST['couponcodeSelId']."'");
                    $data['data']=$query->result_array();

					}

			}else if($_REQUEST['couponcodeSelId']==3){

               $query = $this->db->query("select * from clients as c LEFT join  mosque_client_details as cd on cd.client_id = c.id where c.user_type='".$_REQUEST['couponcodeSelId']."'");
                    $data['data']=$query->result_array();


      }else{

          $data['data']= $this->data->get("clients",FALSE,array("user_type"=>$_POST['couponcodeSelId']));
      }
  } else{
    $data['data']= $this->data->get("clients",FALSE,array("user_type"=>1));
  }




       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/clients_table',$data);
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
     if(isset($_POST['couponcodeSelId'])){
      if($_REQUEST['couponcodeSelId']==2){
        if( isset($_REQUEST['corporate_type']) &&  ($_REQUEST['corporate_type']=='hotel' || $_REQUEST['corporate_type']=='company' || $_REQUEST['corporate_type']=='compound') ){

          $query = $this->db->query("select * from clients as c LEFT join  corporate_client_details as cd on cd.client_id = c.id where cd.corporate_type='".$_REQUEST['corporate_type']."'");
                    $data['data']=$query->result_array();

        }else{

          $query = $this->db->query("select * from clients as c LEFT join  corporate_client_details as cd on cd.client_id = c.id where c.user_type='".$_REQUEST['couponcodeSelId']."'");
                    $data['data']=$query->result_array();

          }

      }else if($_REQUEST['couponcodeSelId']==3){

               $query = $this->db->query("select * from clients as c LEFT join  mosque_client_details as cd on cd.client_id = c.id where c.user_type='".$_REQUEST['couponcodeSelId']."'");
                    $data['data']=$query->result_array();


      }else{

          $data['data']= $this->data->get("clients",FALSE,array("user_type"=>$_POST['couponcodeSelId']));
      }
  } else{
    $data['data']= $this->data->get("clients",FALSE,array("user_type"=>1));
  }


    ///////////////////////////

     $dataToExports = [];
     foreach ($data['data'] as $data) {
        $arrangeData[lang("ClientNum")] = $data['id'];
        $arrangeData[lang("Name")] = $data['name'];//$data['mobile'];
        $arrangeData[lang("Email")] = $data['email'];
         $arrangeData[lang("Mobile")] = $data['mobile'];
         $arrangeData[lang("RegiserDate")] = $data['created'];
        
if(isset($_REQUEST['couponcodeSelId']) && $_REQUEST['couponcodeSelId']=='2'){ 
  $arrangeData["CR Number"] = $data['cr_number'];
}

if(isset($_REQUEST['couponcodeSelId']) && $_REQUEST['couponcodeSelId']=='3'){ 
  $arrangeData["Soudi ID"] = $data['saudi_id'];
}

        
         $arrangeData[lang("Status")] = ($data['active'])?'Active':'Not Active';
        $dataToExports[] = $arrangeData;
  }
  // set header
  if($_REQUEST['couponcodeSelId']==1){
      $filename = "individual-".date('Y-m-d').".xls";
  }
  if($_REQUEST['couponcodeSelId']==2){
    //echo $_REQUEST['corporate_type'];exit();
    if(isset($_REQUEST['corporate_type']) && ($_REQUEST['corporate_type']=='hotel' || $_REQUEST['corporate_type']=='company' || $_REQUEST['corporate_type']=='compound') ){
      $filename = "corporate-".$_REQUEST['corporate_type']."-".date('Y-m-d').".xls";
    }else{
      $filename = "corporate-all-".date('Y-m-d').".xls";
    }
  }


  if($_REQUEST['couponcodeSelId']==3){
    $filename = "mosque-".date('Y-m-d').".xls";
  }

  /*
  if($_REQUEST['couponcodeSelId']==2 && isset($_REQUEST['corporate_type']) && $_REQUEST['corporate_type']!=0){
      $filename = "corporate-".$_REQUEST['corporate_type']."-".date('Y-m-d').".xls";
  }
  if($_REQUEST['couponcodeSelId']==2 && isset($_REQUEST['corporate_type']) && $_REQUEST['corporate_type']==0){
    $filename = "corporate-all-".date('Y-m-d').".xls";
  }
if($_REQUEST['couponcodeSelId']==3){
    $filename = "mosque-".date('Y-m-d').".xls";
  }

  */

  
  
 
  header("Content-type:text/html; charset=utf-8");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
  exit(); 
 }




    public function add()
    {
        if($this->uri->segment(4))
      {
          $data['data']        = $this->data->get("clients",FALSE,array("id"=>$this->uri->segment(4))) ;
        $data['id']          = $this->uri->segment(4) ;
      }
      else
      {
          $data['id'] = 0 ;
      }
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0)
      {
      		//echo $key . "***".$value ."<br/>";
    		$this->form_validation->set_rules("Cform[name]",lang("Name"),'required');
            if(!isset($data['data']['mobile']) || $data['data']['mobile'] !=$_POST['Cform']['mobile'])
            {
      		$this->form_validation->set_rules("Cform[mobile]",lang("Mobile"), 'required|min_length[3]|is_unique[clients.mobile]');
            }
            else{
                $this->form_validation->set_rules("Cform[mobile]",lang("Mobile"), 'required|min_length[3]');
            }
    		if($this->input->post('id') == 0 || ! empty($_POST['Cform']['password'])) {
                $this->form_validation->set_rules("Cform[password]",lang("Password"), 'required|matches[password]|MD5');
    		  $this->form_validation->set_rules("password",lang("ConfPassword"), 'required');
            }
            else
            {
                $_POST['Cform']['password'] = $data['data']['password']   ;
            }
            if(!isset($data['data']['email']) || $data['data']['email'] !=$_POST['Cform']['email'])
            {
      			$this->form_validation->set_rules("Cform[email]",lang("Email"), 'required|valid_email|is_unique[clients.email]');
            }
            else{
                $this->form_validation->set_rules("Cform[email]",lang("Email"), 'required|valid_email');
            }
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
      		$data['data'] = $this->input->post('Cform');
    	}else
    	{
      		if($this->data->save())
            {
                 $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']        = $this->data->get("clients",FALSE,array("id"=>$this->uri->segment(4)))  ;
            }
    	}
      }
       $data['groups']  = $this->data->get("users_group");
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/user/clients_form',$data);
       $this->load->view('administrator/global/footer');
    }

    public function notAprove(){
  	    $data=array('verified'=>'0');
        $this->db->where('id',$_REQUEST['client_id']);
        $this->db->update('clients',$data);
        //redirect('administrator/clients', 'refresh');
    }

    public function aprove(){

        $data=array('verified'=>'1');
        $this->db->where('id',$_REQUEST['client_id']);
        $this->db->update('clients',$data);

        $this->db->select('*');
        $this->db->from('clients');
        $this->db->where('id',$_REQUEST['client_id']);
        $query = $this->db->get();
        $rows=$query->result_array();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL,$this->config->item('apiURL'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "name=".$rows[0]['name']."&email=".$rows[0]['email']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded','secret:tcl1806'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);

        //redirect('administrator/clients', 'refresh');
    }


    public function status($table,$slug,$status)
	{
  		if($this->data->setStatus($table,$status,$slug,"active"))
		{
            redirect('administrator/clients', 'refresh');
		}
	}

  public function addNotify()
  {
     if ($this->input->post('msg') )
     {
       $this->db->insert('notifications',
       [
         'client_id' => $this->input->post('client_id'),
         'text2'     => $this->input->post('msg'),
         'ndate'     => date('Y-m-d H:i:s'),
       ]);

      $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL,$this->config->item('apiURLSingleUser'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            //"userid=".$this->input->post('client_id')."&content=".$this->input->post('msg'));
          "userid=".$this->input->post('client_id')."&content=".$this->input->post('msg'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded','secret:tcl1806'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
       
     }
  }


    public function delete($slug)
	{
  		if($slug > 0)
		{
  			$this->data->delete("clients",$slug);
		}
    	redirect('administrator/clients', 'refresh');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */