
<?php
 $count = count($data);
?>
<script>
$(function () {
        $("#checkAll").click(function () {
            if ($('#uniform-checkAll span').attr('class') =="checked") {
                    for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                      $("#uniform-checkbox"+i+" span").attr("class", "checked");
                }
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                      $("#checkbox"+i).prop("checked", true);
                }
        } else {
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                      $("#uniform-checkbox"+i+" span").attr("class", "");
                }
                for (var i=1;i<= <?php echo $count;?> ; i++)
                {
                      $("#checkbox"+i).prop("checked", false);
                }
        }
    });
});
</script>
<div id="content" class="span10">

<?php 

//echo '<pre>';
//print_r($data); 

?>

            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
                    </li>
                    <li>
                        <?php echo lang("Condition");?>
                    </li>
                </ul>
            </div>
            
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <?php echo lang("Conditions");?>
                        <div class="box-icon">
                          
                        </div>
                    </div>
                    <div class="box-content">
                    <form action="" method="post" id="table_form">
                        <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th><?php echo lang("Title");?></th>
                                  <th><?php echo lang("Content");?></th>
                                  <th><?php echo lang("Action");?></th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td><?php echo $data[0]->title; ?></td>
                                <td><?php echo $data[0]->text2; ?></td>
                                <td class="center">
                                    <a class="btn btn-info" href="<?php echo site_url('administrator/conditions/edit_condition/'.$data[0]->id) ?>">
                                        <i class="icon-edit icon-white"></i>
        <?php echo lang("Edit");?> </a>
                                </td>
                            </tr>
                           
                          </tbody>
                      </table>
                      </form>
                    </div>
                </div><!--/span-->
            </div><!--/row-->
                    <!-- content ends -->
            </div><!--/#content.span10-->
                </div><!--/fluid-row-->


