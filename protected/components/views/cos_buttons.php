<div id="cosButtons">
    <font>Поделитесь находкой:</font>
    <noindex>
        <ul>
            <li style="width:80px">
                <!-- Поместите этот тег туда, где должна отображаться кнопка +1. -->
                <g:plusone></g:plusone>

                <!-- Поместите этот вызов функции отображения в соответствующее место. -->
                <script type="text/javascript">
                    window.___gcfg = {lang: 'ru'};

                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>

            </li>
            <li id="CB_01"><a onclick="return new_window('http://vkontakte.ru/share.php?url=<?= $url ?>',600,400);" href="#"></a></li>
            <li id="CB_02"><a onclick="return new_window('http://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl=<?= $url ?>',600,400);" href="#"></a></li>
            <li id="CB_03"><a onclick="return new_window('http://www.facebook.com/sharer.php?u=<?= $url ?>',600,400);" href="#"></a></li>
            <li id="CB_04"><a onclick="return new_window('http://connect.mail.ru/share?url=<?= $url ?>',600,400);" href="#" class="mrc__plugin_like_button"></a></li>
            <li id="CB_05"><a onclick="return new_window('http://twitter.com/share?url=<?= $url ?>',600,400);" href="#"></a></li>
            <li id="CB_06"><a href="#" onclick="return new_window('http://www.livejournal.com/update.bml?event=<?= $url ?>',800,600);"></a></li>
        </ul>
    </noindex>
</div>