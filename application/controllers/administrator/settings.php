<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

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
         if($this->session->userdata('logged_in_admin') != TRUE )
        {
          redirect(site_url("administrator/login"));
        }
        if (!in_array("1",$this->session->userdata('permi')))
        {
          if(!in_array("2",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {

    try{

     $data['langId']        = FALSE ;
     $data['data']          = $this->data->get("setting",$data['langId'],FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
      'id'=>''

      );
      foreach($required_fields  as $key=>$value)
      {
        $this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
      }
        if($this->input->post('id') == 0 || ! empty($_POST['Cform']['data_in_page'])) {
          $this->form_validation->set_rules("Cform[data_in_page]","عدد النتائج في الصفحة", 'numeric');
        }
          $this->form_validation->set_rules("Cform[site_name]","اسم الموقع", 'required');
          $this->form_validation->set_rules("Cform[site_email]","بريد الموقع", 'required|valid_email');

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
      {
        $data['data'] = $this->input->post('Cform');

      }else
      {
        if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("setting",$data['langId'],array("id"=>1)) ;

            }

      }
      }
      $data['temps'] = array_diff(scandir("./application/views/templates/"), array('..', '.'));
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_form',$data);
       $this->load->view('administrator/global/footer');
    }catch(Exception $e){

      echo $e;

    }

   }


   public function contact()
   {
     $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
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
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_contact_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function other()
   {
     $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
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
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_other_form',$data);
       $this->load->view('administrator/global/footer');
   }


   public function site()
   {
     $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_rules("Cform[txt_msg_len]","عدد الحروف فى الرسائل النصية", 'numeric');
        $this->form_validation->set_rules("Cform[img_size]","حجم الصور فى الرسائل", 'numeric');
        $this->form_validation->set_rules("Cform[video_size]","حجم الفيديو فى الرسائل", 'numeric');
        $this->form_validation->set_rules("Cform[audio_size]","حجم مقطع الصوت فى الرسائل", 'numeric');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    	  $done = $this->data->save();
    		if(! is_array($done) && $done == true)
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.$done[1].'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_site_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function register()
   {
     $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_rules("Cform[reg_cap_num]","عدد حروف CAPATCHA", 'numeric|greater_than[2]');
        $this->form_validation->set_rules("Cform[user_max_len]","اكبر عدد لحروف العضو", 'numeric|greater_than[0]');
        $this->form_validation->set_rules("Cform[user_min_len]","اصغر عدد لحروف العضو", 'numeric|greater_than[0]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');

    	}else
    	{
    	  $done = $this->data->save();
    		if(! is_array($done) && $done == true)
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }
            else
            {
              $data['message'] = '<div class="alert alert-error">'.$done[1].'<button data-dismiss="alert" class="close" type="button">×</button></div>';
              $data['data'] = $this->input->post('Cform');
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_reg_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function sms()
   {
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_rules("Cform[mobile_user]", lang("UserName"), 'required');
        $this->form_validation->set_rules("Cform[mobile_pass]", lang("Password"), 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{
    		if($this->data->save())
            {
               $data['message'] = '<div class="alert alert-success">'.lang("SuccessSave").'<button data-dismiss="alert" class="close" type="button">×</button></div>';
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_mobile_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function ticket()
   {
       $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
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
               $data['data']          = $this->data->get("setting",FALSE,array("id"=>1)) ;
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_ticket_form',$data);
       $this->load->view('administrator/global/footer');
   }
   public function design()
   {
       $data['langId']        = FALSE ;
        $data['data']          = $this->data->get("setting",$data['langId'],FALSE,1) ;

        $data['id']            = isset($data['data']['id'])?$data['data']['id'] : 0 ;

      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'id'=>''

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
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
               $data['data']          = $this->data->get("setting",$data['langId'],array("id"=>1)) ;
            }

    	}
      }
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_design_form',$data);
       $this->load->view('administrator/global/footer');
   }

   public function noti()
   {


    
     /*
      $data['data']          = $this->data->get("setting",FALSE,FALSE,1) ;
      $this->load->library('form_validation');
      if(isset($_POST) && count($_POST) > 0 && !isset($_POST['lang_submit']))
      {
        $required_fields = array(
    	'msg'=>'رساله التنبيه'

    	);
    	foreach($required_fields  as $key=>$value)
    	{
    		$this->form_validation->set_rules("Cform[".$key."]", $value, 'required');
    	}
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '<button data-dismiss="alert" class="close" type="button">×</button></div>');
        if ($this->form_validation->run() === FALSE)
    	{
    		$data['data'] = $this->input->post('Cform');
    	}else
    	{

           $clients1  = $this->data->get("clients",FALSE,array("id >"=>0,"device_token !="=>""),FALSE,TRUE,FALSE,FALSE,array("device_token"=>"device_token")) ;
           $clients2  = $this->data->get("tokens",FALSE,array("id >"=>0,"device_token !="=>""),FALSE,TRUE,FALSE,FALSE,array("device_token"=>"device_token")) ;
            $regs = "";
            $clients = array_merge($clients1,$clients2);
            array_unique($clients,SORT_REGULAR)   ;
           foreach($clients AS $client){
             $regs .= $client['device_token'].",";
           }

           $regs = trim($regs, ",");
           $path = site_url("home/sendNoti/");
           $Post = array(
           "msg"=> $_POST['Cform']['msg'],
           "title"=> "اسقني",
           "regs"=> $regs
           );

            $myvars = 'sent=' . json_encode($Post);

	     $ars = explode($regs,",") ;
            $ch = curl_init( $path );
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
           // curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec( $ch );
           curl_close($ch);
           $this->data->insert("notifications",array("text2"=>$_POST['Cform']['msg'],"client_id"=>0,"ndate"=>date('Y-m-d H:i:s')));

    	}
      }
      */
      $data=[];
        if(!empty($_REQUEST['couponcodeSelId'])){
        

          if($_REQUEST['couponcodeSelId']==2){
              if(isset($_REQUEST['corporate_type']) && $_REQUEST['corporate_type']!=''){
                   // Retreave Company//

                $sqldriver = "SELECT * from corporate_client_details where  corporate_type='".$_REQUEST['corporate_type']."'";
            $query=$this->db->query($sqldriver);
            $data = $query->result_array();
          
            foreach ($data as  $value) {

                  
              $this->data->insert("notifications",array("text2"=>$_POST['Cform']['msg'],"status"=>1,"client_id"=>$value['client_id'],"ndate"=>date('Y-m-d H:i:s')));

            }


              }else{
                  $sqldriver = "SELECT * from clients where  user_type=".$_REQUEST['couponcodeSelId']." ";
                  $query=$this->db->query($sqldriver);
                  $data = $query->result_array();
          
            foreach ($data as  $value) {

                 
              $this->data->insert("notifications",array("text2"=>$_POST['Cform']['msg'],"status"=>1,"client_id"=>$value['id'],"ndate"=>date('Y-m-d H:i:s')));

            }

                 // Retreave all corporate//
              }

          }else{
            // Get All other type
            $sqldriver = "SELECT * from clients where  user_type=".$_REQUEST['couponcodeSelId']." ";
                  $query=$this->db->query($sqldriver);
                  $data = $query->result_array();
          
            foreach ($data as  $value) {

                 
              $this->data->insert("notifications",array("text2"=>$_POST['Cform']['msg'],"status"=>1,"client_id"=>$value['id'],"ndate"=>date('Y-m-d H:i:s')));

            }

          }

          $data['data']="Notification queued";

      }

      
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/setting/setting_noti_form',$data);
       $this->load->view('administrator/global/footer');

   }

public function delaynoti(){
      

      $sqlData = "select * from sent_notification as s left join drivers  as d on s.driver_id = d.id";
      $query=$this->db->query($sqlData);
      $data['data'] = $query->result_array();
       
       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/delaynoti',$data);
       $this->load->view('administrator/global/footer');

}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */