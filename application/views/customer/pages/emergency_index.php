
<div id="content" class="span10">

<?php 
//echo '<pre>';
//print_r($data);
?>

            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <?php echo lang("Home") ;?>  <span class="divider">/</span>
                    </li>
                    <li>
                        <?php echo lang("EmegencyReason") ;?>
                    </li>
                </ul>
            </div>
            
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <?php echo lang("EmegencyReason") ;?>
                        <div class="box-icon">
                          
                        </div>
                    </div>
                    <div class="box-content">
                   
<form action="" method="post" id="table_form">
            <table class="table table-striped table-bordered bootstrap-datatable 
<?php if(count($data)>0){ 
            echo 'datatable';
          }?>">
              <thead>
                <tr>
                                  <!--<th> <input type="checkbox" name="checkAll" id="checkAll">  </th>-->
                 
                  <th><?php echo lang("InvoiceNumber") ;?></th>
                            <?php if($this->config->config['language'] =='english'):?>
                  <th><?php echo lang("Name_In_English") ;?></th>
                  <?php else : ?>
                  <th><?php echo lang("Name_In_Arabic") ;?></th>
                  <?php endif; ?>

                  <th><?php echo lang('ReasonDriver');?></th>
                  <th><?php echo lang('ReasonDriverOption');?></th>
                  <th><?php echo lang('Date');?></th>
                 
                  <th><?php echo lang("Action") ;?></th>
                 
                </tr>
                           
              </thead>
              <tbody>
                          <tr>
                          <?php
                          //var_dump($data);
                          foreach($data AS $data_item){
                           

                           ?>
                          <td><?php echo $data_item['order_id'];?></td>
                          <?php if($this->config->config['language'] =='english'):?>
                <td class="center"><?php echo $data_item['name_en'] ;?></td>
                <?php else : ?>
                <td class="center"><?php echo $data_item['name_ar'] ;?></td>
                <?php endif; ?>

                          <td><?php echo $data_item['reason'] ;?></td>
                          <?php if($this->config->config['language'] =='english'):?>
                <td class="center"><?php echo $data_item['description'] ;?></td>
                <?php else : ?>
                <td class="center"><?php echo $data_item['description_ar'] ;?></td>
                <?php endif; ?>
                          
                          <td><?php echo $data_item['created'] ;?></td>
                          <td>
                            <span id="ID<?php echo $data_item['order_id']; ?>">
                            <?php if($data_item['action']==0){ ?><a href="javascript:void(0);" onclick="resetDriver(<?php echo $data_item['order_id'].','.$data_item['vendor_id'].','.$data_item['driver_id'];?>)" style="color:#000">Take Action</a> <?php }else{?>
                              Action Taken
                           <?php } ?>
</span>
                         </td>
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


<script>
    function resetDriver(orderid,vendorid,driverId) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('emergency/resetDriver'); ?>?orderid="+orderid+"&vendorid="+vendorid+"&driverid="+driverId,

            success: function(data){
                $('#ID'+orderid).html('Action Taken');
                alert("Driver reset sucessfully");
            }
        });

    }
</script>