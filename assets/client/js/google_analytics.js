(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-67583203-1', 'auto');  // Replace with your property ID.
ga('send', 'pageview');
var play_time = 0;
function timerTracking()
{
    ga('send', 'pageview')
    t=setTimeout("timerTracking()",240000);
}

function ga_event(name,action,description,value,implicit_count){
    if(typeof(value) != 'undefined' && value){        
        if(typeof(implicit_count) != 'undefined' && implicit_count){
            ga('send', 'event', name, action, description, value, implicit_count);
        }else{
            ga('send', 'event', name, action, description, value);
        }
    }else{
        ga('send', 'event', name, action, description);
    }
}