<?php
/**
 * Plugin Name: Dự toán công trình
 * Plugin URI: http://itsvnn.com
 * Description: Dự toán công trình xây dựng
 * Version: 18.04
 * Author: Phạm Thành Nghị
 * Author URI: http://itsvnn.com
 * License: GPLv2
 */

if(!class_exists('du_toan')) {
	class du_toan {
		function __construct() {
			if(!function_exists('add_shortcode')) {
				return;
			}
			add_shortcode( 'du_toan_cong_trinh' , array(&$this, 'fn_du_toan') );
		}
		
		function fn_du_toan($atts = array(), $content = null) {		
			$table=''; $table_info='';$style='';
			# FORM THÔNG TIN KHÁCH HÀNG ?>
			<div style="width: 100%;">
				<script>
				jQuery(function(){
					jQuery("#sent_mail").on("click",function(){
						//jQuery("#sent_mail").disabled();
						jQuery("#sent_mail").hide();
						//jQuery(".frm_du_toan").submit();
					});
				});
				</script>
				<form class="frm_du_toan" action="" method="post">	  
					<table border="0" style="border: none; margin: 0; width: 100%;">
						<tr style="color: #333;">
							<td style="border: none; padding-bottom: 10px; text-align: center; line-height: 27px; font-size: 20px; color: #1A237E;" colspan="2">
								Vui lòng điền đầy đủ thông tin của Quý khách vào Form bên dưới.<br/>
								Thông tin Dự toán Công trình sẽ được gửi đến địa chỉ email của Quý khách.<br/>
								Xin cảm ơn!
							</td>
						</tr>
						<!-- <tr style="color: #333;"><td colspan="2" style="border-top: none; border-left: none; border-right: none; "><h3>THÔNG SỐ CHUNG</h3></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none; width: 20%;">Họ tên</th>
							<td style="border: none;"><input id="txt_ho_ten" name="hoten" maxlength="255" type="text" style="width: 70%; line-height: 27px;"/></td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_hoten"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none; color: #333;">Email</th>
							<td style="border: none;"><input id="txt_email" name="email" maxlength="255" type="email" style="width: 70%; line-height: 27px;"/></td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_email"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Số điện thoại</th>
							<td style="border: none;"><input id="txt_so_dt" name="dienthoai" maxlength="12" type="text" style="width: 70%; line-height: 27px;"/></td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_phone"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Loại mái nhà</th>
							<td style="border: none;">: 
								<input type="radio" name="mainha" value="1" /> Bê tông
								<input type="radio" name="mainha" value="2" /> Ngói
								<input type="radio" name="mainha" value="3" /> Tôn
							</td>
						</tr>
						<!--//-->
						<tr style="color: #333;">
							<td style="border: none; font-size: medium; color: #f00" colspan="2">( Vui lòng chọn mái nhà của ngôi nhà bạn! )</td>
						</tr>
						<!-- <tr style="color: #333;"><td colspan="2" style="border: none;"><h3>THÔNG SỐ CHI TIẾT</h3></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Chiều dài</th>
							<td style="border: none;"><input id="txt_chieu_dai" name="chieudai" maxlength="5" type="text" style="width: 20%; line-height: 27px; text-align: center; display: inline-block;" /> m</td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_chieudai"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Chiều rộng</th>
							<td style="border: none;"><input id="txt_chieu_rong" name="chieurong" maxlength="5" type="text" style="width: 20%; line-height: 27px; text-align: center; display: inline-block;"/> m</td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_chieurong"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Chiều cao 1 tầng</th>
							<td style="border: none;"><input id="txt_chieu_cao" name="chieucao" maxlength="5" type="text" value="3.2"  style="width: 20%; line-height: 27px; text-align: center; display: inline-block;"/> m</td>
						</tr>
						<tr style="color: #333;">
						<td style="border: none; font-size: medium; color: #00f" colspan="2">( Chiều cao tiêu chuẩn 1 tầng: 3.2 m. Quý khách có thể thay đổi chiều cao ngôi nhà mà mình muốn!)</td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_chieucao"></td></tr> -->
						<tr style="color: #333;">
							<th style="border: none;">Số tầng</th>
							<td style="border: none;"><input id="txt_so_tang" name="sotang" maxlength="2" value="1"  type="text" style="width: 20%; line-height: 27px; text-align: center;"/></td>
						</tr>
						<!-- <tr style="color: #333;"><td style="border: none;"></td><td style="border: none;" class="msg msg_sotang"></td></tr>-->
						<tr>
							<td colspan="2" style="border: none;">
								<input type="submit" value="Tính kết quả" name="sent_mail" id="sent_mail" style=" color: #fff; background-color: #ed2024; width: 160px; margin: 10px 0; font-size: medium;">
							</td>
						</tr>
					</table>
				</form>
			</div>
<?php 		if (isset($_POST['sent_mail']) ) {				
				# phuong.do@square.vn				
				#$hoten=ten&email=email&sodt=1&mainha=1&chieudai=1&chieurong=2&chieucao=3&sotang=4
				
				$hoten = $_POST['hoten'];
				$email = $_POST['email'];
				$sodt = $_POST['dienthoai'];
				$mainha = $_POST['mainha'];
				$chieudai = $_POST['chieudai'];
				$chieurong = $_POST['chieurong'];
				$chieucao = $_POST['chieucao'];
				$sotang = $_POST['sotang'];

				if(empty($hoten) ||  empty($email) || empty($sodt) || empty($chieudai) || empty($chieurong) || empty($chieucao)){
					echo '<div style="color: #f00; ">Dữ liệu không được để trống.<br/>Vui lòng kiểm tra lại!<div>';
				} else {
					#require_once('ajax/ajax-du-toan.php');
					#--- Dự toán chi phí xây nhà ---
					$S_san=$sotang*$chieudai*$chieurong;
					$S_tuong=$sotang*(2*$chieudai*$chieucao+2*$chieurong*$chieucao);
					$S_tran=$sotang*(($mainha==1)?$chieudai*$chieurong:0);
					$S_tong=$S_tuong+$S_san+$S_tran;
					$V_ngoi_nha=$chieudai*$chieurong*$chieucao;
					$V_betong_mai=$chieudai*$chieurong*0.3;
					$V_betong=$sotang*($V_betong_mai+((2*($chieudai/5))*(0.25*0.25*($chieucao+1)))+(2*0.25*0.25*$chieudai+2*0.25*0.25*$chieurong));
					$chieu_dai_ton=$chieudai/0.91;
					#---
					$tong_tien=0;
					#--- Tien Sat ---
					$sat=$V_betong*360;
					$don_gia_sat=11000;
					$tong_gia_sat=$sat*$don_gia_sat;
					$tong_tien+=$tong_gia_sat;
					#--- Tien Gach ---
					$gach=$S_tuong*65;
					$don_gia_gach=900;
					$tong_gia_gach=$don_gia_gach*$gach;
					$tong_tien+=$tong_gia_gach;
					#--- Tien Xi Mang ---
					$xi_mang=($S_tuong+$S_san+$S_tran)*134;
					$don_gia_xi_mang=1850;
					$tong_gia_xi_mang=$don_gia_xi_mang*$xi_mang;
					$tong_tien+=$tong_gia_xi_mang;
					#--- Tien Cat ---
					$cat=$sotang*$V_ngoi_nha*0.4669;
					$don_gia_cat=300000;
					$tong_gia_cat=$don_gia_cat*$cat;
					$tong_tien+=$tong_gia_cat;
					#--- Tien da ---
					$da=$sotang*$V_ngoi_nha*0.25272;
					$don_gia_da=300000;
					$tong_gia_da=$don_gia_da*$da;
					$tong_tien+=$tong_gia_da;
					#--- Tien bot tret ngoai troi ---
					$bot_tret_ngoai_troi=$S_tuong*0.5;
					$don_gia_bot_tret_ngoai_troi=5000;
					$tong_gia_bot_tret_ngoai_troi=$don_gia_bot_tret_ngoai_troi*$bot_tret_ngoai_troi;
					$tong_tien+=$tong_gia_bot_tret_ngoai_troi;
					#--- Tien Son ngoai troi
					$son_ngoai_troi=$S_tuong*0.5;
					$don_gia_son_ngoai_troi=36000;
					$tong_gia_son_ngoai_troi=$don_gia_son_ngoai_troi*$son_ngoai_troi;
					$tong_tien+=$tong_gia_son_ngoai_troi;
					#--- Tien bot tret trong nha ---
					$bot_tret_trong_nha=($S_tuong+$S_tran)*0.5;
					$don_gia_bot_tret_trong_nha=4000;
					$tong_gia_bot_tret_trong_nha=$don_gia_bot_tret_trong_nha*$bot_tret_trong_nha;
					$tong_tien+=$tong_gia_bot_tret_trong_nha;
					#--- Tien Son trong nha
					$son_trong_nha=($S_tuong+$S_tran)*0.5;
					$don_gia_son_trong_nha=25000;
					$tong_gia_son_trong_nha=$don_gia_son_trong_nha*$son_trong_nha;
					$tong_tien+=$tong_gia_son_trong_nha;					
					#--- Tien gach men
					$gach_men=$S_san;
					$don_gia_gach_men=300000;
					$tong_gia_gach_men=$don_gia_gach_men*$gach_men;
					$tong_tien+=$tong_gia_gach_men;
					#---
					switch($mainha){
						case '2': # mái ngói
							$ngoi=$chieu_dai_ton*$chieurong*22;
							$don_gia_ngoi=6500;
							$tong_gia_ngoi=$don_gia_ngoi*$ngoi;
							$tong_tien+=$tong_gia_ngoi;
							$str_mainha='Mái ngói';
							break;
						case '3': # Mái tôn
							$ton=$chieu_dai_ton*$chieurong;
							$don_gia_ton=110000;
							$tong_gia_ton=$don_gia_ton*$ton;
							$tong_tien+=$tong_gia_ton;
							$str_mainha='Mái tôn';
							break;
						default: # Mái bằng
							$str_mainha='Mái bằng';
							break;
					}

					#require_once('ajax/ajax-sent-mail.php');
					$table_info.='<table style="width: 70%; border: none; border-collapse: collapse;">';					
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px; text-align: center;" colspan="2">
											<a href="https://xaydungdaibinhduong.com">
												<img src="https://xaydungdaibinhduong.com/wp-content/uploads/2017/11/DBD-LOGO-3.png" width="250px" />
											</a>
										</td>
									</tr>';
									
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px; text-align: center;" colspan="2"><h3>THÔNG TIN KHÁCH HÀNG</h3></td>
									</tr>';
									
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Họ và tên Khách hàng: </td>
										<td style="padding-bottom: 10px;">: '.$hoten.'</td>
									</tr>';
									
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Email Khách hàng: </td>
										<td style="padding-bottom: 10px;">: '.$email.'</td>
									</tr>';
									
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Số điện thoại Khách hàng:</td>
										<td style="padding-bottom: 10px;">: '.$sodt.'</td>
									</tr>';

					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Mái nhà:</td>
										<td style="padding-bottom: 10px;">: '.$str_mainha.'</td>
									</tr>';

					$table_info.='	<tr style=" style="color: #333;">';
					$table_info.='		<td style="padding-bottom: 10px; text-align: center;" colspan="2"><h3>THÔNG SỐ CHI TIẾT</h3></td>';
					$table_info.='	</tr>';

					$table_info.='	<tr style=" style="color: #333;">';
					$table_info.='		<td style="padding-bottom: 10px;">Chiều dài</td>';
					$table_info.='		<td style="padding-bottom: 10px;">: '.$chieudai.' m</td>';
					$table_info.='	</tr>';

					$table_info.='	<tr style=" style="color: #333;">';
					$table_info.='		<td style="padding-bottom: 10px;">Chiều rộng</td>';
					$table_info.='		<td style="padding-bottom: 10px;">: '.$chieurong.' m</td>';
					$table_info.='	</tr>';

					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Chiều cao 1 tầng</td>
										<td style="padding-bottom: 10px;">: '.$chieucao.' m</td>
									</tr>';
					
					$table_info.='	<tr style=" style="color: #333;">
										<td style="padding-bottom: 10px;">Số tầng</td>
										<td style="padding-bottom: 10px;">: '.$sotang.'</td>
									</tr>';				
					$table_info.='</table>';
					
					$table.='<table style="width: 100%; border: solid 1px #999; border-collapse: collapse;">';
					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<th style="padding: 10px 0; width: 20%;border-right: solid 1px #999;">Vật liệu</th>';
					$table.='		<th style="padding: 10px 0; width: 15%; border-right: solid 1px #999;">Số lượng</th>';
					$table.='		<th style="padding: 10px 0; width: 15%; border-right: solid 1px #999;">Đơn vị</th>';
					$table.='		<th style="padding: 10px 0; width: 15%; border-right: solid 1px #999;">Đơn giá</th>';
					$table.='		<th style="padding: 10px 0; width: 30%;">Thành tiền</th>';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Sắt</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right; border-right: solid 1px #999;">'.number_format($sat,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center; border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right; border-right: solid 1px #999;">'.number_format($don_gia_sat,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;">'.number_format($tong_gia_sat,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Gạch</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($gach,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">viên</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_gach,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;">'.number_format($tong_gia_gach,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Xi măng</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($xi_mang,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_xi_mang,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_xi_mang,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Cát</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($cat,2,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">m3</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_cat,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_cat,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Đá</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($da,2,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">m3</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_da,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_da,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999;">';
					$table.='		<td style="padding: 10px; border: solid 1px #999;">Bột trét ngoài trời</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right; border-right: solid 1px #999;">'.number_format($bot_tret_ngoai_troi,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center; border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right; border-right: solid 1px #999;">'.number_format($don_gia_bot_tret_ngoai_troi,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;">'.number_format($tong_gia_bot_tret_ngoai_troi,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px;border-right: solid 1px #999;">Sơn ngoài trời</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($son_ngoai_troi,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right; border-right: solid 1px #999;">'.number_format($don_gia_son_ngoai_troi,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_son_ngoai_troi,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px; border-right: solid 1px #999;">Bột trét trong nhà</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($bot_tret_trong_nha,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_bot_tret_trong_nha,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_bot_tret_trong_nha,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px;border-right: solid 1px #999;">Sơn trong nhà</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($son_trong_nha,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">kg</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_son_trong_nha,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_son_trong_nha,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px;border-right: solid 1px #999;">Gạch men</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($gach_men,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">m2</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_gach_men,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_gach_men,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px 10px; border-right: solid 1px #999;">Ngói</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px; text-align: right;border-right: solid 1px #999;">'.number_format($ngoi,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center; border-right: solid 1px #999;">Viên</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px; text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_ngoi,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px; text-align: right;border-right: solid 1px #999;">'.number_format($tong_gia_ngoi,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td style="padding: 10px;border-right: solid 1px #999;">Tôn</td><!-- Vật liệu -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($ton,0,'.',',').'</td><!-- Số lượng -->';
					$table.='		<td style="text-align: center;border-right: solid 1px #999;">m2</td><!-- Đơn vị -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999;">'.number_format($don_gia_ton,0,'.',',').' đ</td><!-- Đơn giá -->';
					$table.='		<td style="padding-right: 10px;text-align: right;border-right: solid 1px #999">'.number_format($tong_gia_ton,0,'.',',').' đ</td><!-- Thành tiền -->';
					$table.='	</tr>';

					$table.='	<tr style="border: solid 1px #999; color: #333;">';
					$table.='		<td colspan="4" style="text-align: right;padding: 10px 15px;border-right: solid 1px #999"><b>Tổng tiền:</b> </td>';
					$table.='		<td colspan="1" style="padding-right: 10px;text-align: right;border-right: solid 1px #999;"><b>'.number_format($tong_tien,0,'.',',').' đ</b></td>';
					$table.='	</tr>';
					$table.='</table>';
					
					$table.='---<br/><h3>CÔNG TY CỔ PHẦN KIẾN TRÚC XÂY DỰNG OMNY VIỆT NAM</h3>';
					$table.='<b>Địa chỉ:</b> òa nhà Sky Center, Lầu 6, Số 5B Phổ Quang, P. 2, Q. Tân Bình, Tp. Hồ Chí Minh<br/>';
					$table.='<b>Hotline:</b> 0901301337<br/>';
					$table.='<b>Email:</b> info@omnyvietnam.com';

					# Khách hàng
					$to = $_POST['email'];
					$subject = '[OMNY VIỆT NAM] THÔNG TIN TÍNH CHI PHÍ CÔNG TRÌNH';
					$body = $table_info.$table;
					$headers = array('Content-Type: text/html; charset=UTF-8');
					wp_mail( $to, $subject, $body, $headers );

					#Email nhận
					$subject = '[OMNY VIỆT NAM] THÔNG TIN KHÁCH HÀNG';
					wp_mail( 'nghipt99@gmail.com', $subject, $body, $headers );
					wp_mail( 'omny@omny.vn', $subject, $body, $headers );
					echo '<center style="font-size: 20px; line-height: 27px; color: #000; margin-top: 20px; margin-bottom: 20px;"> CẢM ƠN QUÝ KHÁCH ĐÃ SỬ DỤNG DỊCH VỤ CỦA CHÚNG TÔI!<br/>Thông tin Dự toán Công trình của Quý khách sẽ được gửi đến địa chỉ email <b>'.$_POST['email'].'<b>.</center>';
				}	
			}
			#return $str;
		}
	}
}
function mfpd_load() {
	global $mfpd;
	$mfpd = new du_toan();
}
add_action( 'plugins_loaded', 'mfpd_load' );

# WP-ADMIN

function fn_adm_du_toan(){
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

#add_action( 'admin_menu', 'fn_adm_du_toan' );

function my_plugin_options() {
	/*if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}*/
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

?>
