/*---------------------------
 *@: Define object call function
	@:parameters: click call function
	@:return: true
	@:date: 19.03.2014
	@:author: Loi.Huynh
----------------------------*/
function objPlayerLikeFB()
{	
	jQuery.objGetPlayerLikeFB();
};
jQuery.getTempLikeFB = function()
{
	var html = '';		
	html += '<div class="tn-popup-head">Like Home Page Giaibongda.com</div>';
	html += '<a href="javascript:void(0)" onclick="jQuery.objClose()"  class="tn-popup-close tn-popup-in-close">x</a>';
	html += '<div class="tn-popup-txt clearfix">';
		html += '<p>Hãy bấm like giaibongda.com để nhận được những quyền lợi hấp dẫn cho mình và đội bóng, đồng thời cập nhật tin tức mới nhất về các giải đấu của chúng tôi.</p>';
		html += '<table class="tn-tbfull tn-tbdef">';
			html += '<tr>';
			html += '<td style="color:#fff" align="center"><div class="fb-like" data-href="https://www.facebook.com/giaibongda" data-layout="standard" data-colorscheme="dark" data-action="like" data-show-faces="false" data-share="false"></div></td>';		
		html += '</tr>';
		html += '</table>';		
	html += '</div>';		
	return html;
};

jQuery.objGetPlayerLikeFB = function()
{	
	$("body").append('<div class="tn-bg-popup" style="display:none"></div>');
	$("body").append('<div id="user-likefb-pp" class="tn-popup-in pp-medium" style="display:none"></div>');
	var html = jQuery.getTempLikeFB();
	$('#user-likefb-pp').html(html).fadeIn();
	$('.tn-bg-popup').fadeIn();
};

jQuery.objUserRegistry = function()
{	
	jQuery.objGetUserRegistry();
};
jQuery.objGetUserRegistry = function()
{
	jQuery.BackgroupPopup();
	jQuery.ConRegistry();
	var html = jQuery.getTempReg();
	$('#user-registry-pp').html(html).fadeIn();
	$('.tn-bg-popup').fadeIn();
};
jQuery.objClose = function()
{	
	$('.tn-bg-popup').remove();
	$('#user-registry-pp').remove();
	$('.tn-bg-popup').fadeOut();
	$('.tn-popup-in').fadeOut();	
};
jQuery.objGetMessage = function()
{
	jQuery.BackgroupPopup();
	jQuery.ConMessage();
	var html = jQuery.getTempMessage();
	$('#message-pp').html(html).fadeIn();
	$('.tn-bg-popup').fadeIn();
};
$(function(){
	var s = document.getElementsByTagName('script')[0];	
	
	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = "jQuery.objTemplates.js";
	s.parentNode.insertBefore(node, s);	
	
});