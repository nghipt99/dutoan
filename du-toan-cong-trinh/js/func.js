// ----- CHECK VALUE -------
// Delete spaces
function delSpace(divObj) {
    // Delete first space
    if (/^ */.test(divObj.val())) {
        divObj.val(divObj.val().replace(/^ */g, ''));
    }
    // Delete only one space
    if (/  /.test(divObj.val())) {
        divObj.val(divObj.val().replace(/  */g, ' '));
    }
}

// Delete all spaces
function delAllSpace(divObj) {
    if (/^ */.test(divObj.val())) {
        divObj.val(divObj.val().replace(/ */g, ''));
    } else {
        hideMsg(divObj, divMsg);
    }
}

// hide messenger
function hideMsg(divObj,divMsg) {
	divObj.css({'box-shadow':'none','opacity':'1'});
	divMsg.html(null);
}

// check string null all space
function checkStringAllNull(divObj, str, divMsg) {
    delAllSpace(divObj);
    if (divObj.val() == 's') {
        hideMsg(divObj, divMsg);
    } else {
        if(divObj.val() == '' || /^s+$/.test(divObj.val())) {
			divObj.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
            divMsg.html('- <b>' + str + '</b> không được để trống.');
			return 0;
        } else {
            hideMsg(divObj, divMsg);
        }
    }
	return 1;
}

// check String
function checkString(divObj, str, divMsg) {
    delSpace(divObj);
    if (divObj.val() == 's') {
        hideMsg(divObj, divMsg);
    } else {
        if (divObj.val() == '' || /^s+$/.test(divObj.val())) {
			divObj.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
            divMsg.html('- <b>' + str + '</b> không được để trống.');
			return 0;
        } else {
            hideMsg(divObj, divMsg);
        }
    }
	return 1;
}

// check Number
function checkNumber(divNum, str, divMsg) {
    if (/[a-zA-Z]/.test(divNum.val())) {
        divNum.val(divNum.val().replace(/[a-zA-Z]/g, ''));
    }
    if (/ /.test(divNum.val())) {
        divNum.val(divNum.val().replace(/ */g, ''));
    }
    if (divNum.val() == '' || /^\s+$/.test(divNum.val())) {
		divNum.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
        divMsg.html('- <b>' + str + '</b> không được để trống.');
		return 0;
    } else {
        if (!(/^\d+$/.test(divNum.val()))) {
            divNum.val(divNum.val().replace(/[`~!@#%^&*()-_=+\|ơƠưƯ;:'',<.>?$]/g, ''));
			divNum.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
            divMsg.html('- <b>' +str+ '</b> chỉ được nhập số.');
			return 0;
        } else hideMsg(divNum,divMsg);//divMsg.html('');
    }
	return 1;
}

//Check email
// 0 : no optional
// 1 : optional
function checkEmail(divEmail, divMsg, kt) {
    if (/ /.test(divEmail.val())) {
        divEmail.val(divEmail.val().replace(/ */g, ''));
        if (kt == 0) {
            hideMsg(divEmail,divMsg);
        }
    }
    if (divEmail.val() == '' || /^\s+$/.test(divEmail.val())) {
        if (kt == 0) {
            hideMsg(divEmail,divMsg);
        } else {
            if (kt == 1) {
				divEmail.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
                divMsg.html('- <b>Email</b> '+'không được để trống.');
				return 0;
            }
        }
    } else {
        if (!(/^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+$/.test(divEmail.val()))) {
			divEmail.css({'box-shadow':'rgb(255, 0, 0) 0px 0px 3px 1px','opacity':'0.7'});
            divMsg.html('- <b>Email</b> không hợp lệ.<br>- Mẫu <b>email</b> hợp lệ : <b>xxx@yyy.zzz</b>');
			return 0;
        } else {
            hideMsg(divEmail,divMsg);
        }
    }
	return 1;
}

// hiện ẩn menu gắn tường
function hienan(vitri,an,hien){
	$('#hide').hide();	
	$('#hide').click(function(){
		$('#mnu').fadeOut(function(){
			$('#hide').hide();
			$('#show').show();
			$('#mnu').css(vitri,an);
			//$('#mnu').css('left','-170px');
			$('#mnu').show(500);
		});
	});
	
	$('#show').mousemove(function(){
		$('#mnu').fadeOut(function(){			
			$('#hide').show();
			$('#show').hide();
			$('#mnu').css(vitri,hien);
			//$('#mnu').css('left','0px');
			$('#mnu').show(500);
		});
	});
}

// check date
function checkdate(d,m,y){
	d=d.length==1?'0'+d:d;
	m=m.length==1?'0'+m:m;
	return parseInt(new Date(y+'-'+m+'-'+d).getDate()) == parseInt(d); 
}

// chuyển chuỗi có dấu -> không dấu
function unvn(str) {
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
	str= str.replace(/đ/g,"d");
	str= str.replace( /[\s\n\r]+/g,' '); // xóa khoang trang du thua
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");//tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự -
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,""); //cắt bỏ ký tự - ở đầu và cuối chuỗi
	return str;
}

// number format
function number_format(number, decimals, dec_point, thousands_sep) {
  //   example 1: number_format(1234.56); 				-> returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' '); 	-> returns 2: '1 234,56'
  //   example 3: number_format(1234.5768, 2, '.', ''); -> returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.'); 		-> returns 4: '67,00'
  //   example 5: number_format(1000); 					-> returns 5: '1,000'
  //   example 6: number_format(67.311, 2); 			-> returns 6: '67.31'
  //   example 7: number_format(1000.55, 1); 			-> returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.'); 	-> returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0); 				-> returns 9: '1'
  //  example 10: number_format('1.20', 2); 			-> returns 10: '1.20'
  //  example 11: number_format('1.20', 4); 			-> returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3); 			-> returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' '); -> returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', ''); 		-> returns 14: '0.00000001'

	number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
	toFixedFix = function(n, prec) {
		var k = Math.pow(10, prec);
		return '' + (Math.round(n * k) / k).toFixed(prec);
	};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}

function isNull(divObj){
	if(divObj == '' || /^s+$/.test(divObj)) {
		return 0; // null
	} else {
		return 1; // not null
	}
}

function checkImage(img, msg){
	if(img != undefined){
		msg.html('');
		return 1;
	} else {
		msg.html('Bạn chưa chọn hình ảnh');
		return 0;
	}
}
function checkCkeditor(divObj, str, divMsg){
	if(divObj == '') {			
		divMsg.html('- <b>'+str+'</b> không được để trống.');
		return 0;
	} else {
		divMsg.html('');
		return 1;
	}
}

function Left(str, n){
	if (n <= 0)
	    return "";
	else if (n > String(str).length)
	    return str;
	else
	    return String(str).substring(0,n);
}

function Right(str, n){
    if (n <= 0)
       return "";
    else if (n > String(str).length)
       return str;
    else {
       var iLen = String(str).length;
       return String(str).substring(iLen, iLen - n);
    }
}
// --------------//----------------
