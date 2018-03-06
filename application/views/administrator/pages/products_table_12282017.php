<?php
 $count = count($data);
?>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
          <li>
            <?php echo lang("Home") ;?><span class="divider">/</span>
          </li>
             
            <li>
            <?php echo 'Product';?>
          </li>
        </ul>
      </div>


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;

					</div>
					<div class="box-content">
            
<div class="col-md-6" style="text-align: left;">
  <?php 
        $query = $this->db->query("select * from cats");
        $data1=$query->result_array();
       // echo '<pre>';
       // print_r($data1);
  ?>
<form action="" method="post" id="table_form">
  <select name="cat_id"  onchange="this.form.submit();">
    <option value=""><?php echo lang('please_select');?></option>
    <?php foreach ($data1 as $key => $value) {?>
        <option <?php echo (isset($_REQUEST['cat_id']) && $_REQUEST['cat_id']==$value['id'])?'selected':''; ?>  value="<?php echo $value['id'];?>">
          <?php if($this->config->config['language'] =='arabic'){ echo $value['name'];}else{ echo $value['name_en']; }?></option>
    <?php } ?>

  </select>
</form>
</div>

<form action="<?php echo site_url("administrator/products/fetchDataFromTable/") ?>" method="post" id="table_form">
            <div class="col-md-6" style="text-align: right;"><button type="submit" class="btn btn-primary">Export Report</button></div>
              <input type="hidden" name="cat_id" value="<?php echo (isset($_REQUEST['cat_id']))?$_REQUEST['cat_id']:'0'; ?>">
              
            </form>
 

          <form action="" method="post" id="table_form">
              <table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>

								  <th><?php echo lang("No") ;?></th>
                  <th><?php echo lang("Photo") ;?></th>
								  
								  <?php if($this->config->config['language'] =='arabic'):?>
								  <th><?php echo lang("prod_num_ar") ;?></th>
								  <?php else : ?>
								  <th><?php echo lang("prod_num_en") ;?></th>
								  <?php endif; ?>	
								  
                                  <?php if($this->config->config['language'] =='arabic'):?>
								  <th><?php echo lang("name_ar") ;?></th>
								  <?php else : ?>
								  <th><?php echo lang("name_en") ;?></th>
								  <?php endif; ?>

								  <th><?php echo lang("price") ;?></th>
								  <!--<th><?php echo lang("totalsell") ;?></th>-->
								  <th>&nbsp;</th>
							  </tr>

						  </thead>
						  <tbody>
                          <tr>
                          <?php
                          //var_dump($data);
                          $No = 0 ;
                          foreach($data AS $data_item){
                            $No++ ;
                            if (!file_exists('download/products/product'.$data_item['id'].'')) {
                                    mkdir('download/products/product'.$data_item['id'].'', 0777, true);
                                }
                               $count = count(scandir("download/products/product".$data_item['id'])) - 2 ;
                           ?>

								<td><?php echo $No ;?></td>
                                <td class="center">
                                <li id="image-<?php echo $data_item['id'] ;?>" class="thumbnail">
								<a style="background:url(<?php echo $data_item['photo'] ;?>)" title="<?php echo $data_item['name'] ;?>" href="<?php echo $data_item['photo'] ;?>"><img class="grayscale" src="<?php echo $data_item['photo'] ;?>" width="50px" alt="<?php echo $data_item['name'] ;?>"></a>
							    </li>
                                </td>

								<?php if($this->config->config['language'] =='arabic'):?>
                                <td class="center"><?php echo $data_item['prod_num'] ;?></td>
								<?php else : ?>
                                <td class="center"><?php echo $data_item['prod_num_en'] ;?></td>
								<?php endif; ?>

								<?php if($this->config->config['language'] =='arabic'):?>
                                <td class="center"><?php echo $data_item['name'] ;?></td>
								<?php else : ?>
                                <td class="center"><?php echo $data_item['name_en'] ;?></td>
								<?php endif; ?>

                                <td class="center"><?php echo $data_item['price_ind'] ;?></td>



                              <!--<td class="center"><?php echo $this->data->getSum("order_item","total_amount",array("product_id"=>$data_item['id']));  ;?></td>-->
                                <td class="center">


								   	<a class="btn btn-info" href="<?php echo site_url("administrator/products/edit_product/".$data_item['id']);?>" >
										<i class="icon-edit icon-white"></i>
                                        View / Edit
									</a>
                  <a onClick="return confirm('<?php echo lang("WantDelete") ;?>')" class="btn btn-danger" href="<?php echo site_url("administrator/products/delete/".$data_item['id']."");?>">
                    <i class="fa fa-trash"></i>
                    <?php echo lang("Delete") ;?>
                  </a>











								</td>
							</tr>
                            <?php } ?>
						  </tbody>
					  </table>
                      </form>

					</div>

				</div>

			</div>


			</div>
				</div>
<style>
element.style {
    display: block;
}
#Activities,#Activities2 {
    background: #fff none repeat scroll 0 0;
    border: 5px solid #e26148;
    border-radius: 15px;
    display: none;
    left: 10%;
    min-height: 300px;
    max-height: 500px;
    overflow: auto;
    font-family: ge,tahoma;
    padding: 20px;
    position: fixed;
    top: 10%;
    width: 50%;
    z-index: 99999;
}
#Shadow {
      background: #000 none repeat scroll 0 0;
    display: none;
    height: 100%;
    position: fixed;
    top: 0;
     left: 0;
    width: 100%;
    z-index: 999;
    opacity: 0;
}
#Activities .btn {
    margin: 0px 5px 15px 10px ;
}
</style>