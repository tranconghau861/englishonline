jQuery.BackgroupPopup = function()
{
	$("body").append('<div class="tn-bg-popup" style="display:none"></div>');
	return true;
};
jQuery.ConRegistry = function()
{
	$("body").append('<div id="user-registry-pp" class="tn-popup-in pp-medium" style="display:none"></div>');
	return true;
};
jQuery.getTempReg = function()
{
	var html = '';		
	html += '<div class="tn-popup-head">Xác Nhận Đăng Ký</div>';
	html += '<a href="javascript:void(0)" onclick="jQuery.objClose()"  class="tn-popup-close tn-popup-in-close">x</a>';
	html += '<div class="tn-popup-txt clearfix">';
		html += '<p>Tài khoản này hiện không tồn tại trên trang giaibongda.com. Bạn muốn đăng ký làm Cầu thủ tự do hay thành lập Đội bóng mới?</p>';
		html += '<table class="tn-tbfull tn-tbdef">';
			html += '<tr>';
			html += '<td><span class="pull-right text-center"><p><a href="'+http +'/dang-ky-lap-doi-bong.html" class="btn tn-btn-default tn-popup-close">Lập đội bóng mới</a></p></span></td>';            
			html += '<td><span class="pull-left text-center"><p><a href="'+http +'/dang-ky-cau-thu.html" class="btn tn-btn-default tn-popup-close">Đăng ký cầu thủ tự do</a></p></span></td>';
		html += '</tr>';
		html += '</table>';		
	html += '</div>';		
	return html;
};
jQuery.ConMessage = function()
{
	$("body").append('<div id="message-pp" class="tn-popup-in pp-medium" style="display:none"></div>');
	return true;
};
jQuery.getTempMessage = function()
{
	var html = '';		
	html += '<div class="tn-popup-head">Thông Báo</div>';
	html += '<a href="javascript:void(0)" class="tn-popup-close tn-popup-in-close">x</a>';
	html += '<div class="tn-popup-txt clearfix">';
		html += '<p>Chức mừng bạn đã đăng ký thành công tài khoản trên trang giaibongda.com. Vui lòng kiểm tra email để biết thông tin tài khoản.</p>';			
	html += '</div>';		
	return html;
};