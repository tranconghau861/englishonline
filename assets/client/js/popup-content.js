/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var allMatchMetaInfo={};
var popupContentOpen=false;
var countDownTimeRun=false;
var countDownTimeTimer=null;
var timeRefresh=0;
function countDownTimeFun(){
    if(!countDownTimeRun){
        return;
    }
    var content=$('#funGameTimeCountDown');
    if(content.size()<=0){
        return;
    }
    var time = content.attr('time')-1;
    
    content.attr('time',time);
    var s = time % 60;
    s = s < 10 ? ('0'+s ) : s;
    time = Math.floor(time / 60);
    var m = time % 60;
    m = m < 10 ? ('0'+m ) : m;
    var h = Math.floor(time / 60);
    h = h < 10 ? ('0'+h ) : h;
    var label=$COUNT_DOWN_TIME_LABEL.replace('{h}',h);
    var label=label.replace('{m}',m);
    var label=label.replace('{s}',s);
    content.html(label);
    timeRefresh++;
    if(timeRefresh==15){
        timeRefresh=0;
        refreshPredictGame();
    }
    countDownTimeTimer=window.setTimeout('countDownTimeFun()',1000);
}
function openPopupContentMatch(mid){
    var optionAjax={
        data:{
            mid:mid
        },
        url:http + '/match/popupContent',
        type:'post',
        dataType:'json',
        success : function(rs){
            if(rs.rs!=1){
                $('#popupContentOverlay').css('display','none');
                $.msgAlert("error",rs.error==undefined ? $ERROR_SYSTEM : rs.error,true);
                return;
            }else if(popupContentOpen){
                $('#popupContentContainer').html(rs.data);
            }
            
        },
        error: function(){
            $.msgAlert("closeLoading");
            $.msgAlert("error",$ERROR_NETWORK,true);
        }
    }
    $('#addCommentBeforeMatch').dialog('close');
    $('#addCommentAfterMatch').dialog('close');
    $('#addMoreVideoPhoto').dialog('close');
    //    $('#popupContentContainer .add-popup-content-element').each(function(){
    //        try{
    //            $(this).dialog('destroy');
    //        }catch(e){
    //            console.log(e);
    //        }
    //    });
    popupContentOpen=true;
    $('#popupContentOverlay').css('display','block');
    $(document.body).css('overflow-y','hidden');
    $.ajax(optionAjax);
}
function closePopupContent(){
    countDownTimeRun=false;
    try{
        window.clearTimeout(countDownTimeTimer); 
    }catch(e){
        console.log(e);
    }
    $('#addCommentBeforeMatch').dialog('close');
    $('#addCommentAfterMatch').dialog('close');
    $('#addMoreVideoPhoto').dialog('close');
    $('#popupContentOverlay').css('display','none');
    $('#popupContentContainer').html('');
    popupContentOpen=false;
    FB.Event.unsubscribe('edge.create',handleFBCommentAndLike);
    FB.Event.unsubscribe('comment.create',handleFBCommentAndLike);
    FB.Event.unsubscribe('edge.remove',handleFBContentRemoveLike);
    $(document.body).css('overflow-y','');
}

function challengeFromPC(obj,tid){
    closePopupContent();
    challengeTeam(obj,tid);
    
}
function removeCommentBefore(cid){
    var url =$COMMENT_BEFORE_REMOVE_URL.replace('__cid__', cid);
    var callback=function(rs){
        $('#popupContentContainer div.item.comment-before-match').html(rs.data); 
    }
    requestAjax(url, {}, callback);
}
function removeCommentAfter(cid){
    var url =$COMMENT_AFTER_REMOVE_URL.replace('__cid__', cid);
    var callback=function(rs){
        $('#popupContentContainer div.item.comment-after-match').html(rs.data); 
    }
    requestAjax(url, {}, callback);
}