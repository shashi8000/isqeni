<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conditions extends CI_Controller {

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
          if(!in_array("3",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
   public function index()
   {
      
      $this->db->select('*');
            $this->db->from('article');
            $this->db->where('method', 'conditions');
            $this->db->where('lang_id', ($this->config->config['language']=='english')?1:2);
            $query = $this->db->get();
            $data['data'] = $query->result();

            $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/condition_list',$data);
       $this->load->view('administrator/global/footer');
         
   }


 public function edit_condition()
   {


    //$data['about'] = 
      $this->db->select('*');
            $this->db->from('article');
            $this->db->where('method', 'conditions');
            $this->db->where('lang_id', ($this->config->config['language']=='english')?1:2);
            $query = $this->db->get();
            $data['data'] = $query->result();

           if(isset($_REQUEST['post_id'])){
              $data=array('title'=>$_REQUEST['title'],'text2'=>$_REQUEST['text2']);
              $this->db->where('id',$_REQUEST['post_id']);
              $this->db->update('article',$data);
              redirect(site_url("administrator/conditions"));
           } 



       $this->load->view('administrator/global/header');
       $this->load->view('administrator/global/topbar');
       $this->load->view('administrator/global/menu');
       $this->load->view('administrator/pages/conditions_form',$data);
       $this->load->view('administrator/global/footer');
         

   }
//*****************************************************************

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */