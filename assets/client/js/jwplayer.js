$(function(){
    var s = document.getElementsByTagName('script')[0];

    var node = document.createElement('script');
    node.type = 'text/javascript';
    node.async = true;
    node.src = "http://content.jwplatform.com/libraries/V6NfEzT7.js";
    s.parentNode.insertBefore(node, s);


});

function loadJWPlayer($div, $param)
{
    jwplayer($div).setup($param);
}
