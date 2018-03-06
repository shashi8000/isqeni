<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
         $this->setting->changeAdminLang();
         $setting = $this->setting->get();
         $this->load->model('administrator/data');
         $this->load->helper('administrator/lang');
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
          if(!in_array("9",$this->session->userdata('permi')))
          {
            redirect(site_url("administrator/home"));
          }
        }
	}
	public function backup()
	{
	    $data['title']  = lang("Backup");
        $download = $this->input->post("download");
        $this->load->helper('download');
         if($download == 1)
         {
           // var_dump ();
            $this->load->library('zip');
            $path = getcwd().'/';
            var_dump($path);die;
            $backup =  $this->zip->read_dir($path);
             $this->zip->download("backup_files_".date('Y-m-d').".zip");
         }
         else if($download == 2)
         {
           $this->load->dbutil();
           $prefs = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
           $backup =& $this->dbutil->backup($prefs);
           force_download("backup_database_".date('Y-m-d').".sql",$backup);
         }




      //




        // Download the file to your desktop. Name it "my_backup.zip"

       //  force_download("my_backup.zip",$aa);

		$this->load->view('administrator/global/header');
		$this->load->view('administrator/global/topbar');
		$this->load->view('administrator/global/menu');
		$this->load->view('administrator/pages/backup',$data);
		$this->load->view('administrator/global/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */