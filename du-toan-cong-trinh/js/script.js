var $du_toan_url=location.protocol+'//'+location.hostname+'/wp-content/plugins/du-toan/';
jQuery(document).ready(function(){
	var $hoten;
	var $email;
	var $sodt;
	var $mainha;
	var $chieudai;
	var $chieurong;
	var $chieucao;
	var $sotang;
	jQuery('#btn-kq').on('submit', function(){
		$hoten = jQuery('#txt_ho_ten').val();
		$email = jQuery('#txt_email').val();
		$sodt = jQuery('#txt_so_dt').val();
		//$mainha=jQuery('#loai_mai_nha').val();
		$chieudai=jQuery('#txt_chieu_dai').val();
		$chieurong=jQuery('#txt_chieu_rong').val();
		$chieucao=jQuery('#txt_chieu_cao').val();
		$sotang=jQuery('#txt_so_tang').val();
		var $isEmail =checkEmail($('#txt_email'), $('#txt_email'), 1);
		var $kt = isNull($fullname) && $isEmail && isNull($address) && isNull($phone) && isNull($title) && isNull($detail);
		if($kt != 1){
			checkString($('#txt_ho_ten'), 'Họ tên', $('#msgfullname'));
			checkEmail($('#txt_email'), $('#msg_email'), 1);
			checkNumber($('#txt_so_dt'), 'Số điện thoại', $('.msg_phone'));
			checkString($('#txt_chieu_dai'), 'Tiêu đề', $('.msg_chieudai'));
			checkString($('#txt_chieu_rong'), 'Nội dung', $('.msg_chieurong'));
			checkString($('#txt_chieu_cao'), 'Nội dung', $('.msg_chieucao'));
			checkNumber($('#txt_so_tang'), 'Nội dung', $('.msg_sotang'));
		}
		//var $data = 'hoten='+$hoten.val()+'&email='+$email.val()+'&sodt='+$sodt.val()+'&mainha='+$mainha.val()+'&chieudai='+$chieudai.val()+'&chieurong='+$chieurong.val()+'&chieucao='+$chieucao.val()+'&sotang='+$sotang.val();
		// Dự toán chi phí
		
		
	});
});