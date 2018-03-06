<?php 
//echo '<pre>';
//print_r($data);

?>


<div id="content" class="span10">
      <!-- content starts -->

      <div>
        <ul class="breadcrumb">
          <li>
            <a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
          </li>
                    <li>
                       <?php echo lang('OrderNotification1'); ?>
          </li>
        </ul>
      </div>
      <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-header well" data-original-title>
            &nbsp;
            <div class="box-icon">
                           <!--<a class="btn btn-danger" href="javascript:document.getElementById('table_form').submit();" onClick="return confirm('<?php echo lang("WantDelete") ;?> ')" style="width:90px;">
                    <i class="icon-trash icon-white"></i>
                    <?php echo lang("DeleteChecked") ;?>
                  </a>-->
            </div>
          </div>
          <div class="box-content">
                    <form action="" method="post" id="table_form">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr>
                  <th> <?php echo lang('OrderId'); ?>  </th>
                  <th> <?php echo lang("Name") ;?> </th>
                  <th><?php echo lang('OrderNotification1'); ?></th>
                  <th><?php echo lang('Date'); ?></th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
              foreach($data AS $data_item){
                           ?>
              <tr>
                <td>#<?php echo $data_item['order_id'] ;?></td>
                <td>
<?php
                  if($this->config->config['language'] =='english'){
                        echo @$data_item['name_en']; 
                 }else{
                       echo @$data_item  ['name_ar']; 
                 }
?>

                </td>
                
                <td class="center"><?php echo $data_item['notification'] ;?></td>
                <td class="center"><?php echo $data_item['created'] ;?></td>
                
              </tr>
                            <?php } ?>
              </tbody>
            </table>
                      </form>
          </div>
        </div><!--/span-->

      </div><!--/row-->

          <!-- content ends -->
      </div><!--/#content.span10-->
        </div><!--/fluid-row-->
