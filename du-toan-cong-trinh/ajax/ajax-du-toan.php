<?php #$hoten=ten&email=email&sodt=1&mainha=1&chieudai=1&chieurong=2&chieucao=3&sotang=4
$hoten = $_POST['hoten'];
$email = $_POST['email'];
$sodt = $_POST['sodt'];
$mainha = $_POST['mainha'];
$chieudai = $_POST['chieudai'];
$chieurong = $_POST['chieurong'];
$chieucao = $_POST['chieucao'];
$sotang = $_POST['sotang'];

#--- CSDL ---
/*$table = 'wp_du_toan';
id int autoincrement
name varchar
cost int

*/
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
#----
$sat=$V_betong*360;
$don_gia_sat=19000;
$tong_gia_sat=$sat*$don_gia_sat;
$tong_tien+=$tong_gia_sat;
#---
$gach=$S_tuong*65;
$don_gia_gach=900;
$tong_gia_gach=$don_gia_gach*$gach;
$tong_tien+=$tong_gia_gach;
#---
$xi_mang=($S_tuong+$S_san+$S_tran)*134;
$don_gia_xi_mang=1850;
$tong_gia_xi_mang=$don_gia_xi_mang*$xi_mang;
$tong_tien+=$tong_gia_xi_mang;
#---
$cat=$sotang*$V_ngoi_nha*0.4669;
$don_gia_cat=350000;
$tong_gia_cat=$don_gia_cat*$cat;
$tong_tien+=$tong_gia_cat;
#---
$da=$sotang*$V_ngoi_nha*0.25272;
$don_gia_da=300000;
$tong_gia_da=$don_gia_da*$da;
$tong_tien+=$tong_gia_da;
#---
$bot_tret_ngoai_troi=$S_tuong*0.5;
$don_gia_bot_tret_ngoai_troi=5000;
$tong_gia_bot_tret_ngoai_troi=$don_gia_bot_tret_ngoai_troi*$bot_tret_ngoai_troi;
$tong_tien+=$tong_gia_bot_tret_ngoai_troi;
#---
$son_ngoai_troi=$S_tuong*0.5;
$don_gia_son_ngoai_troi=36000;
$tong_gia_son_ngoai_troi=$don_gia_son_ngoai_troi*$son_ngoai_troi;
$tong_tien+=$tong_gia_son_ngoai_troi;
#---
$bot_tret_trong_nha=($S_tuong+$S_tran)*0.5;
$don_gia_bot_tret_trong_nha=4000;
$tong_gia_bot_tret_trong_nha=$don_gia_bot_tret_trong_nha*$bot_tret_trong_nha;
$tong_tien+=$tong_gia_bot_tret_trong_nha;
#---
$son_trong_nha=($S_tuong+$S_tran)*0.5;
$don_gia_son_trong_nha=25000;
$tong_gia_son_trong_nha=$don_gia_son_trong_nha*$son_trong_nha;
$tong_tien+=$tong_gia_son_trong_nha;
#---
$gach_men=$S_san;
$don_gia_gach_men=300000;
$tong_gia_gach_men=$don_gia_gach_men*$gach_men;
#---
$ngoi=$chieu_dai_ton*$chieurong*22;
$don_gia_ngoi=6500;
$tong_gia_ngoi=$don_gia_ngoi*$ngoi;
$tong_tien+=$tong_gia_ngoi;
#---
$ton=$chieu_dai_ton*$chieurong;
$don_gia_ton=110000;
$tong_gia_ton=$don_gia_ton*$ton;
$tong_tien+=$tong_gia_ton;
#---


?>

<table>
	<tr>
		<td>Vật liệu</td>
		<td>Số lượng</td>
		<td>Đơn vị</td>
		<td>Đơn giá</td>
		<td>Thành tiền</td>
	</tr>
	<!-- // -->
	<tr>
		<td>Sắt</td><!-- Vật liệu -->
		<td><?=number_format($sat,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_sat,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_sat,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Gạch</td><!-- Vật liệu -->
		<td><?=number_format($gach,2,'.',',');?></td><!-- Số lượng -->
		<td>viên</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_gach,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_gach,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Xi măng</td><!-- Vật liệu -->
		<td><?=number_format($xi_mang,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_xi_mang,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_xi_mang,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Cát</td><!-- Vật liệu -->
		<td><?=number_format($cat,2,'.',',');?></td><!-- Số lượng -->
		<td>m3</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_cat,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_cat,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Đá</td><!-- Vật liệu -->
		<td><?=number_format($da,2,'.',',');?></td><!-- Số lượng -->
		<td>m3</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_da,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_da,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Bột trét ngoài trời</td><!-- Vật liệu -->
		<td><?=number_format($bot_tret_ngoai_troi,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_bot_tret_ngoai_troi,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_bot_tret_ngoai_troi,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Sơn ngoài trời</td><!-- Vật liệu -->
		<td><?=number_format($son_ngoai_troi,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_son_ngoai_troi,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_son_ngoai_troi,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Bột trét trong nhà</td><!-- Vật liệu -->
		<td><?=number_format($bot_tret_trong_nha,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_bot_tret_trong_nha,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_bot_tret_trong_nha,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Sơn trong nhà</td><!-- Vật liệu -->
		<td><?=number_format($son_trong_nha,2,'.',',');?></td><!-- Số lượng -->
		<td>kg</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_son_trong_nha,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_son_trong_nha,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Gạch men</td><!-- Vật liệu -->
		<td><?=number_format($gach_men,2,'.',',');?></td><!-- Số lượng -->
		<td>m2</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_gach_men,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_gach_men,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Ngói</td><!-- Vật liệu -->
		<td><?=number_format($ngoi,0,'.',',');?></td><!-- Số lượng -->
		<td>Viên</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_ngoi,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_ngoi,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td>Tôn</td><!-- Vật liệu -->
		<td><?=number_format($ton,0,'.',',');?></td><!-- Số lượng -->
		<td>m2</td><!-- Đơn vị -->
		<td><?=number_format($don_gia_ton,0,'.',',');?></td><!-- Đơn giá -->
		<td><?=number_format($tong_gia_ton,0,'.',',');?></td><!-- Thành tiền -->
	</tr>
	<!-- // -->
	<tr>
		<td colspan="4" style="text-align: right;">Tồng tiền</td>
		<td colspan="1"><?=number_format($tong_tien,0,'.',',');?></td>
	</tr>
	<!-- // -->
</table>