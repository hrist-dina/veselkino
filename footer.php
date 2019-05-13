<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

        <div class="body__content-bot">
            <div class="body__footer">
                <footer js-path-point class="footer">
                    <div class="footer__bg"></div>
                    <div class="footer__bg-shadow"></div>
                    <div class="footer-top block">
                        <div class="footer-top__wrapper block__wrapper">
                            <div class="footer-top__left">
                                <? $APPLICATION->IncludeFile('include_areas/rules.php', ['arProp' => $arProp], ['MODE' => 'html']) ?>
                            </div>
                            <div class="footer-top__center">
                                <div class="footer__nav">
                                    <div class="footer__item">
                                        <a js-scroll-item data-scroll="1" href="#" class="footer__link">О центре</a>
                                    </div>
                                    <div class="footer__item">
                                        <a js-scroll-item data-scroll="3" href="#" class="footer__link">Новости</a>
                                    </div>
                                    <div class="footer__item">
                                        <a js-scroll-item data-scroll="4" href="#" class="footer__link">Карта</a>
                                    </div>
                                </div>
                                <div class="footer__nav">
                                    <div class="footer__item">
                                        <a js-scroll-item data-scroll="5" href="#" class="footer__link">Фотогалерея</a>
                                    </div>
                                    <div class="footer__item">
                                        <a js-scroll-item data-scroll="6" href="#" class="footer__link">Отзывы</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-top__right">
                                <div class="footer__item footer__item_action">
                                    <a href="tel:<?=$arProp["PHONE"]["VALUE"]?>" class="footer__link" js-goal-phone><?=$arProp["PHONE_TITLE"]["~VALUE"]["TEXT"]?></a>
                                </div>

                                <div class="socials socials_white socials_justify_right">

                                    <? $APPLICATION->IncludeFile('include_areas/socials.php', ['arProp' => $arProp], ['MODE' => 'html']) ?>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom block">
                        <div class="footer-bottom__wrapper block__wrapper">
                            <div class="footer-bottom__left">
                                <div class="footer__copyright">© <?=date('Y')?> GALAXY</div>
                            </div>
                            <div class="footer-bottom__right">
                                <div class="footer__developer"><a href="http://creonit.ru/" target="_blank">Разработка сайта  —</a></div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</div>

<div class="ui-display_none">
    <div js-share-tip class="socials-tip">
        <div class="socials-tip__icon"></div>
        <div class="socials-tip__content">

            <div class="socials">
                <div class="socials__title">Соберите компанию и&nbsp;приходите вместе :)</div>
                <div class="socials__list">
                    <?
                    $shareUrl = urlencode($arProp["SOCIAL_URL"]["VALUE"]);
                    $shareTitle = urlencode($arProp["SOCIAL_TITLE"]["VALUE"]);
                    $shareText = urlencode($arProp["SOCIAL_DESCRIPTION"]["~VALUE"]["TEXT"]);
                    ?>
                    <a class="socials__item socials__item_vk" href="http://vk.com/share.php?url=<?=$shareUrl?>&title=<?=$shareTitle?>&description=<?=$shareText?>" target="_blank"></a>
                    <a class="socials__item socials__item_fb" href="https://www.facebook.com/sharer.php?u=<?=$shareUrl?>" target="_blank"></a>
                    <a class="socials__item socials__item_ok" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?=$shareUrl?>&st.comments=<?=$shareText?>&title=<?=$shareTitle?>" target="_blank"></a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>