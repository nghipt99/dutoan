<style>
.navbar{margin-bottom: inherit !important;}
.map_title{text-transform: uppercase;font-size: large; text-align: center;}
.frm-contact{display: inline-table !important; max-width: 49.7%; width: 100%; vertical-align: top;}
#frm_contact{margin-top: 15px;}
</style>
<div class="frm-contact padding-cancel">
    <div class="col-xs-12 main-ttl">LIÊN HỆ</div>
    <div class="col-xs-12 padding-cancel">
        <form class="form-horizontal" id="frm_contact">
            <div class="form-group">
                <label class="col-xs-3 control-label">Họ tên: </label>
                <div class="col-xs-9"><input type="text" class="form-control" id="txtfullname" placeholder="Họ và tên của bạn"/></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgfullname"></div>
            <!-- // -->
            <div class="form-group">
                <label class="col-xs-3 control-label">Email: </label>
                <div class="col-xs-9"><input type="text" class="form-control" id="txtemail" placeholder="Địa chỉ email của bạn"/></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgemail"></div>
            <!-- // -->
            <div class="form-group">
                <label class="col-xs-3 control-label">Địa chỉ: </label>
                <div class="col-xs-9"><input type="text" class="form-control" id="txtaddress" placeholder="Địa chỉ của bạn."/></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgaddress"></div>
            <!-- // -->
            <div class="form-group">
                <label class="col-xs-3 control-label">Số điện thoại: </label>
                <div class="col-xs-9"><input type="text" class="form-control" id="txtphone" placeholder="Số điện thoại của bạn"/></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgphone"></div>
            <!-- // -->
            <div class="form-group">
                <label class="col-xs-3 control-label">Tiêu đề: </label>
                <div class="col-xs-9"><input type="text" class="form-control" id="txttitle" placeholder="Tiêu đề liên hệ"/></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgtitle"></div>
            <!-- // -->
            <div class="form-group">
                <label class="col-xs-3 control-label">Nội dung: </label>
                <div class="col-xs-9"><textarea class="form-control" id="txtdetail" placeholder="Nội dung liên hệ"></textarea></div>
            </div>
            <div class="col-xs-offset-3 col-xs-9 msg" id="msgdetail"></div>
            <!-- // -->
            <div class="panel-footer col-xs-12">
                <div class="col-xs-offset-3 col-xs-3">
                    <button type="button" class="btn btn-primary" id="btncontact"><span class="glyphicon glyphicon-send"></span> Gửi liên hệ</button>
                </div>
                <div id="msgcontact" class="col-xs-6"></div>
            </div>
        </form>
    </div>
	<script>
	$(document).ready(function(e) {
        //$('#txtfullname') $('#txtemail') $('#txtaddress') $('#txtphone') $('#txttitle') $('#txtdetail');
		//$('#msgfullname') $('#msgemail') $('#msgaddress') $('#msgphone') $('#msgtitle') $('#msgdetail');
		$('#txtfullname').on('keyup', function(){
			checkString($('#txtfullname'), 'Họ tên', $('#msgfullname'));
		});
		$('#txtemail').on('keyup', function(){
			checkEmail($('#txtemail'), $('#msgemail'), 1);
		});
		$('#txtaddress').on('keyup', function(){
			checkString($('#txtaddress'), 'Địa chỉ', $('#msgaddress'));
		});
		$('#txtphone').on('keyup', function(){
			checkNumber($('#txtphone'), 'Số điện thoại', $('#msgphone'));
		});
		$('#txttitle').on('keyup', function(){
			checkString($('#txttitle'), 'Tiêu đề', $('#msgtitle'));
		});
		$('#txtdetail').on('keyup', function(){
			checkString($('#txtdetail'), 'Nội dung', $('#msgdetail'));
		});
		$('#btncontact').on('click', function(e){
			var $fullname = $('#txtfullname').val();
			var $email = $('#txtemail').val();
			var $address = $('#txtaddress').val();
			var $phone = $('#txtphone').val();
			var $title = $('#txttitle').val();
			var $detail = $('#txtdetail').val();
			var $isEmail =checkEmail($('#txtemail'), $('#msgemail'), 1);
			var $kt = isNull($fullname) && $isEmail && isNull($address) && isNull($phone) && isNull($title) && isNull($detail);
			if($kt == 1){
				$('#msgcontact').html('<img src="<?=base_url();?>themes/img/loading.gif">- Dữ liệu đang được gửi đi ... ');
				$data = 'fullname='+$fullname+'&email='+$email+'&address='+$address+'&phone='+$phone+'&title='+$title+'&detail='+$detail;
				$.ajax({
					type:'POST',
					url: '<?=base_url();?>ajax/contact.html',
					data: $data,
					success:function(msg){
						$('#txtfullname').val('');
						$('#txtemail').val('');
						$('#txtaddress').val('');
						$('#txtphone').val('');
						$('#txttitle').val('');
						$('#txtdetail').val('');
						$('#msgcontact').html(msg);
					}
				});
			}else{
				checkString($('#txtfullname'), 'Họ tên', $('#msgfullname'));
				checkEmail($('#txtemail'), $('#msgemail'), 1);
				checkString($('#txtaddress'), 'Địa chỉ', $('#msgaddress'));
				checkNumber($('#txtphone'), 'Số điện thoại', $('#msgphone'));
				checkString($('#txttitle'), 'Tiêu đề', $('#msgtitle'));
				checkString($('#txtdetail'), 'Nội dung', $('#msgdetail'));
			}			
		});
    });
	</script>
</div>
<!-- MAPS -->
<div class="frm-contact padding-cancel">
    <div class="col-xs-12 main-ttl">BẢN ĐỒ</div>
    <div class="col-xs-12 padding-cancel">
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
        <script>
		var map;
		var infowindow;
		var marker= new Array();
		var old_id= 0;
		var infoWindowArray= new Array();
		var infowindow_array= new Array();
		function initialize(){
			var info = '<li>- Địa chỉ: <b><?=$co_addr;?></b></li><li>- Số điện thoại: <b><?=$co_phone;?></b></li><li>- Email: <b><?=$co_email;?></b></li>';
			var defaultLatLng = new google.maps.LatLng(10.826983, 106.710747);
			var myOptions= {
				zoom: 16,
				center: defaultLatLng,
				scrollwheel : false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("googlemaps"), myOptions);
			map.setCenter(defaultLatLng);
			var arrLatLng = new google.maps.LatLng(10.826983, 106.710747);
			infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><b><?=$co_name;?></b></div><div class="map_info">'+info+'</div></div>';
			loadMarker(arrLatLng, infoWindowArray[7895], 7895);
			moveToMaker(7895);
		}
		function loadMarker(myLocation, myInfoWindow, id){
			marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
			var popup = myInfoWindow;
			infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
			google.maps.event.addListener(marker[id], 'mouseover', function(){
				if (id == old_id) return;
				if (old_id > 0) infowindow_array[old_id].close();
				infowindow_array[id].open(map, marker[id]);
				old_id = id;
			});
			google.maps.event.addListener(infowindow_array[id], 'closeclick', function(){
				old_id = 0;
			});
		}
		function moveToMaker(id){
			var location = marker[id].position;
			map.setCenter(location);
			if (old_id > 0) infowindow_array[old_id].close();
			infowindow_array[id].open(map, marker[id]);
			old_id = id;
		}
		google.maps.event.addDomListener(window, 'load', initialize);		
		</script>
        <div id="googlemaps" style="width:100%; height: 420px;"></div>
    </div>
</div>