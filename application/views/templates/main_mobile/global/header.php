<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  if($this->setting->getLang($this->session->userdata('site_lang')) == "arabic")
  {
    $dir = "rtl";
  }
  else
  {
    $dir = "ltr";
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $setting['site_name'];?> <?php echo $title ;?></title>
<meta name="description" content="<?php echo $setting['site_name']?> <?php echo $title ;?> <?php echo isset($data['desc'])? $data['desc']:"" ;?>" />
<meta name="keywords" content="<?php echo $setting['site_name']?> <?php echo $title ;?><?php echo isset($data['tags'])? $data['tags']:"" ;?>" />
<?php
    $index_Page = $this->config->item('index_page');
    if($index_Page == "index.php"){$index_Page = $index_Page."/";}
  ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/mobile/<?php echo $setting['template']?>.css"/>
<?php  if($dir == "ltr"){?>
<link rel="stylesheet" href="<?php echo base_url()?>css/ltr.css" type="text/css">
<?php } ?>
<?php
echo $setting['google_analy'];
?>
</head>
 <form action="" method="post" id="arabic_form">
    <input type="hidden" name="lang_submit" value="2">
    </form>
    <form action="" method="post" id="english_form">
    <input type="hidden" name="lang_submit" value="1">
    </form>
<body>