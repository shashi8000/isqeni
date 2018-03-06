<?php
$count = 10;
?>
<link href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.form.js"></script>
<div id="content" class="span10">
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                Vendor Setting List
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <form action="" method="post" id="table_form">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                        <tr>
                            <th><?php echo lang("Sr_No"); ?></th>
                            <?php if ($this->config->config['language'] == 'english'): ?>
                                <th><?php echo lang("Name_In_English"); ?></th>
                            <?php else : ?>
                                <th><?php echo lang("Name_In_Arabic"); ?></th>
                            <?php endif; ?>
                            <th><?php echo lang("Status"); ?></th>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $No = 0;
                            foreach ($data

                            AS $data_item){
                            $No++;
                            ?>
                            <td><?php echo $No; ?></td>
                            <?php if ($this->config->config['language'] == 'english'): ?>
                                <td class="center"><?php echo $data_item['name_en']; ?></td>
                            <?php else : ?>
                                <td class="center"><?php echo $data_item['name']; ?></td>
                            <?php endif; ?>
                            <td class="center">
                                <?php
                                if ($data_item['status'] == '1') {
                                    echo 'Active';
                                } else {
                                    echo 'Deactive';
                                }

                                ?></td>


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

    #Activities, #Activities2 {
        background: #fff none repeat scroll 0 0;
        border: 5px solid #e26148;
        border-radius: 15px;
        display: none;
        left: 10%;
        min-height: 300px;
        max-height: 500px;
        overflow: auto;
        font-family: ge, tahoma;
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
        margin: 0px 5px 15px 10px;
    }
</style>