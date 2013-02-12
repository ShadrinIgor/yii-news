var path = 'http://www.world-news.uz/';

<!-- Yandex.Metrika counter -->
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter11298340 = new Ya.Metrika({id:11298340, enableAll: true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
<!-- end of Yandex.Metrika counter -->

<!-- facebook like -->
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=209811199041640";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
<!-- end of facebook like -->

$(document).ready(  function ()
{
    if( $(".countryList").length>0 && $(".cityList").length>0 )
    {
        $(".countryList").change( function()
        {
            $(".cityList").load( "http://yii-news/ajax/site/ListCity/?country="+$(".countryList").val(), function()
                {
                    $(".cityList").trigger("liszt:updated");
                });
        })
    }

    if( $("#validateForm").length>0 )$("#validateForm").validationEngine();
    if( $(".chzn-select").length>0 )$('.chzn-select').chosen({no_results_text:'Нет результатов по'});
})

function closeFotoNews( divObj )
{
	divObj.find( 'img' ).css( 'opacity', '0.8' );
	divObj.animate( {width:'170px'}, 300 );
	divObj.removeClass( "FN_itemSel" );	        
}

function new_window(url,width,height){
window.open(url,'_blank','toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=yes,width='+width+',height='+height+',top='+(window.screen.height/2 - height/2)+',left='+(window.screen.width/2 - width/2));
return false;
} 