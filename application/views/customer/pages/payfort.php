<?php 





					if($_REQUEST){
						$str = '{4:6}';

						echo '<pre>';
						print_r($_REQUEST);
						exit();




						$data['created_at'] = date('Y-m-d H:i:s');
						$data['payfort_responce'] = $str;
						$data['transection_id']=1000;
						$this->db->insert('payfort_response',$data);
						?>
					<table align="center">
						<tr>
							<td ><img src="<?php echo base_url(); ?>web/img/logo-2.png" /></td>
						</tr>
						<tr>
							<td ></td>
						</tr>
						<tr>
							<td >Thnak You for responce</td>
						</tr>
						<tr>
							<td ></td>
						</tr>
                    </table>		
				<?php	}else{ ?>
					<table align="center">
						<tr>
							<td ><img src="<?php echo base_url(); ?>web/img/logo-2.png" /></td>
						</tr>
						<tr>
							<td ></td>
						</tr>
						<tr>
							<td >Some problem in responce</td>
						</tr>
						<tr>
							<td ></td>
						</tr>
                    </table>


			<?php	} ?>






