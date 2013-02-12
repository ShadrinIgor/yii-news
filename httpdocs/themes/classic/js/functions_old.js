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
    if( $( ".TI_div").length )
    {
        $( ".TI_div a").click( function ()
            {
                var parentDiv = $( this.parentNode).find( '.TI_div2' );
                if( parentDiv.css("height")=="197px" )
                {
                    var parentAutoHeight = parentDiv.css( "height", "auto").css( "height" );
                    parentDiv.css( "height", "197px");
                    parentDiv.animate( {height:parentAutoHeight}, 800 );
                    this.text = "скрыть информацию...";
                }
                    else
                {
                    parentDiv.animate( {height:"197px"}, 800 );
                    this.text = "читать полностью...";
                }

                return false;
            })
    }
    //

    if( $(".BTB_title").length )
    {
        var currentBTB;
        $( ".BTB_title" ).click( function ()
        {
            var parentDiv = $( this.parentNode);
            //ML_blockClose
            var curent = parentDiv.find( ".MLB_inner" );
            if( curent.length )
            {
                if( currentBTB )
                {
                    currentBTB.hide('def');
                    $( currentBTB[0].parentNode  ).addClass( "ML_blockClose" );
                }
                    else
                {
                    var defaultOpen = $( this.parentNode.parentNode).find( ".ML_blockOpen .BTB_title" );
                    if( defaultOpen!=this )
                    {
                        $( this.parentNode.parentNode).find( ".ML_blockOpen").removeClass( "ML_blockOpen").addClass("ML_blockClose");
                        $( this.parentNode.parentNode).find( ".ML_blockOpen .MLB_inner" ).hide( 'def' );
                    }
                }

                if( curent.css( 'display' ) =='none' )
                {
                    curent.show('def');
                    parentDiv.removeClass( "ML_blockClose" );
                }
                     else
                {
                    curent.hide('def');
                    parentDiv.addClass( "ML_blockClose" );
                }

                currentBTB = curent;
            }

            return false;
        })
    }

	if( $( ".RMoney" ).length )
	{		$( ".RMoney .more a" ).click( function ()
			{
				var otherMoney = $( "#otherMoney" );
				if( otherMoney.css( 'display' ) =='none' )otherMoney.show('def');
									  				else  otherMoney.hide('def');
				return false;
			})
	}

	if( $(".topListNews").length>0 )
	{		$(".rightSlide").click( function ()
			{
				var ulObj = $( this.parentNode ).find( 'ul' );
				var liWidth = parseInt( ulObj.find( 'li' ).css( 'width' ) ) + 10;
				var marginLeft = parseInt( ulObj.css( 'margin-left' ) );
//				var countNewsOnPage = Math.round( parseInt( $(".topListNews").css( 'width' ) )/ liWidth );
				var countNewsOnPage = parseInt( $(".topListNews").css( 'width' ) );
				if( ( marginLeft * -1 )<( ulObj.find( 'li' ).length * liWidth - countNewsOnPage ) )
				{
					marginLeft = marginLeft - liWidth;
					ulObj.animate( {marginLeft:marginLeft+ 'px'}, 300 );// + "px"
				}
				ulObj.animate( {marginLeft:marginLeft+ 'px'}, 300 );// + "px"

				return false;
			});

		$(".leftSlide").click( function ()
			{
				var ulObj = $( this.parentNode ).find( 'ul' );
				var liWidth = parseInt( ulObj.find( 'li' ).css( 'width' ) ) + 10;
				var marginLeft = parseInt( ulObj.css( 'margin-left' ) );
				if( marginLeft != 0 )
				{
					marginLeft = marginLeft + liWidth;
					ulObj.animate( {marginLeft:marginLeft+ 'px'}, 300 );// + "px"
				}

				return false;
			}
		);

		$( ".oneNews" ).mouseover( function ()
			{
				$( this ).addClass( 'selNews' );
				var divObj = $( this ).find( '.popup' );
				var divWeight = divObj.css( 'left' );
				divObj.show( );
				var i=0;
			}
		)

		$( ".oneNews" ).mouseout( function ()
			{
				$( this ).removeClass( 'selNews' );
				$( this ).find( '.popup' ).hide(  );
			}
		)			}

		if( $("#fotoNews").length >0 )
		{
			$(".FNImage img").mouseover( function ()
			{
				$( this ).css( 'opacity', '0.8' );
				$( this ).animate( {opacity:'1'}, 200 );
			})

			$(".FNImage img").mouseout( function ()
			{
				$( this ).css( 'opacity', '0.8' );
				$( this ).animate( {opacity:'1'}, 200 );
			})

			var activeNews;
			$(".FNImage img").click( function ()
			{
				var parentDiv = $( this.parentNode.parentNode );
				if( parentDiv.css( 'width' ) == '170px' )
					{
						if( activeNews && activeNews!=parentDiv )closeFotoNews( activeNews );

						$( this ).css( 'opacity', '1' );
						parentDiv.animate( {width:'710px'}, 300 );
						activeNews = parentDiv;
						parentDiv.addClass( "FN_itemSel" );                                                
					}
				else
					{
						closeFotoNews( parentDiv );
					}
			})
		}

		if( $( ".znalItem" ) )
		{
			var activeZnak;

			$( ".openZnak" ).click( function ()
				{
					var znakDesc = $( this.parentNode ).find( ".znakDesc" );

					if( activeZnak && activeZnak!=znakDesc )activeZnak.hide( 'def' );

					if( znakDesc.css( "display" ) == 'none' )znakDesc.show( 'def' );
														else znakDesc.hide( 'def' );

					activeZnak = znakDesc;

					return false;
				})


			$( ".closeZnak" ).click( function ()
				{
					$( this.parentNode.parentNode ).hide( 'def' );
					return false;
				})

		}
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