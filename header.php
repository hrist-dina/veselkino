<?
use Bitrix\Main\Page\Asset;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$asset_version = 9;

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115544013-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-115544013-1');
    </script>
    <? $APPLICATION->ShowHead(); ?>
    <?

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vendor.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/common.css');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/common.js');

    if(CModule::IncludeModule('iblock') && CModule::IncludeModule('creonit.core')) {
        if (Creonit\Core\Iblock::getInstance()->getIblockId('veselkino') == NULL) {
            $obCache = new CPHPCache();
            $obCache->CleanDir(true, "cache");
            $obCache->CleanDir(true, "managed_cache");
            $obCache->CleanDir(true, "stack_cache");

            $obCache = new CPageCache();
            $obCache->AbortDataCache();

            \Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();
            \Bitrix\Main\Data\Cache::setClearCache(true);

            BXClearCache(true);

            $GLOBALS['CACHE_MANAGER']->CleanAll();
            $GLOBALS['stackCacheManager']->CleanAll();

            $staticHtmlCache = \Bitrix\Main\Data\StaticHtmlCache::getInstance();
            $staticHtmlCache->deleteAll();
        }
        $arFilter = array("IBLOCK_ID"=>Creonit\Core\Iblock::getInstance()->getIblockId('veselkino'),"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res_o = CIBlockElement::GetList(array(), $arFilter, false, array(), array());
        while ($ar_fields_o = $res_o->GetNextElement()) {
            $arProp = $ar_fields_o->GetProperties();
        }
    }
    ?>
    <script>
        app.start();
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <link rel="shortcut icon" href="/local/templates/veselkino/images/favicon.png">

    <title><? $APPLICATION->ShowTitle() ?></title>

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?=$arProp["SOCIAL_TITLE"]["VALUE"]?>">
    <meta property="og:url" content="<?=$arProp["SOCIAL_URL"]["VALUE"]?>"/>
    <meta property="og:description" content="<?=$arProp["SOCIAL_DESCRIPTION"]["~VALUE"]["TEXT"]?>"/>
    <meta property="og:image" content="<?= 'http://' . SITE_SERVER_NAME . CFile::GetPath($arProp["SOCIAL_IMAGE"]["VALUE"]) ?>"/>
    <meta property="og:site_name" content="<?=$arProp["SOCIAL_URL"]["VALUE"]?>"/>
    <meta property="twitter:card" content="summary_large_image"/>
    <meta property="twitter:title" content="<?=$arProp["SOCIAL_URL"]["VALUE"]?>"/>
    <meta property="twitter:description" content="<?=$arProp["SOCIAL_DESCRIPTION"]["~VALUE"]["TEXT"]?>"/>
    <meta property="twitter:text:description" content="<?=$arProp["SOCIAL_DESCRIPTION"]["~VALUE"]["TEXT"]?>"/>
    <meta property="twitter:image" content="<?= 'http://' . SITE_SERVER_NAME . CFile::GetPath($arProp["SOCIAL_IMAGE"]["VALUE"]) ?>"/>
    <meta property="twitter:url" content=""/>
    <meta name="twitter:site" content="<?=$arProp["SOCIAL_URL"]["VALUE"]?>"/>
    <meta name="twitter:creator" content="<?=$arProp["SOCIAL_URL"]["VALUE"]?>"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic" rel="stylesheet">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <? $APPLICATION->IncludeFile('include_areas/meta.php', ['modal' => $modal], ['MODE' => 'html']) ?>
</head>
<body js-scroll-container class="body">
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47451490 = new Ya.Metrika2({
                    id:47451490,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47451490" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?$APPLICATION->ShowPanel();?>
<div class="body__wrapper">
    <div js-headerFixed class="body__headerFixed">

        <div js-headerTop class="header header_top block">
            <div class="header__wrapper block-wrapper block-wrapper_max-width_none">
                <div class="header__logo">
                    <a class="logo logo_small link-image" href="#">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/veselkino-1.png" alt="Весёлкино">
                    </a>
                </div>

                <div class="header__info">
                    <div class="header__info-column">
                        <div class="header__info-text">
                            <?=$arProp["ADDRESS"]["~VALUE"]["TEXT"]?>
                        </div>

                    </div>
                    <div class="header__info-column">
                        <div class="header__info-text">
                            <?=$arProp["WORKING_HOURS"]["~VALUE"]["TEXT"]?>
                        </div>
                        <div class="header__info-text">
                            <a href="tel:<?=$arProp["PHONE"]["VALUE"]?>" class="footer__link" js-goal-phone><?=$arProp["PHONE_TITLE"]["~VALUE"]["TEXT"]?></a>
                        </div>
                    </div>
                </div>

                <div class="header__nav">
                    <a js-header-open="main/header" href="#" class="header__nav-trigger"></a>
                </div>
            </div>
        </div>


    </div>
    <div class="body__side" js-close-modal>
        <div class="body__header">

            <header js-header class="header">
                <div js-header-wrapper class="header__wrapper">
                    <div class="header__bg"></div>
                    <div class="header__logo block">
                        <div class="block-wrapper block-wrapper_min-width_none">
                            <a class="logo link-image" href="#">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/veselkino-1.png" alt="Весёлкино">
                            </a>
                        </div>
                    </div>

                    <div class="header__nav block">
                        <div class="block-wrapper block-wrapper_min-width_none">
                            <nav class="nav nav_large nav_white nav_out-block">
                                <div class="nav__list">

                                    <!--<div class="nav__item">
                                        <a js-scroll-item data-scroll="1" href="#" class="nav__link">О центре</a>
                                    </div>-->

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="1" href="#" class="nav__link">Услуги</a>
                                    </div>

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="2" href="#" class="nav__link">Новости</a>
                                    </div>

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="3" href="#" class="nav__link">Карта</a>
                                    </div>

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="4" href="#" class="nav__link">Фотогалерея</a>
                                    </div>

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="5" href="#" class="nav__link">Отзывы</a>
                                    </div>

                                    <div class="nav__item">
                                        <a js-scroll-item data-scroll="6" href="#" class="nav__link">Контакты</a>
                                    </div>

                                </div>
                            </nav>

                        </div>
                    </div>

                    <div class="header__bottom block">
                        <? $APPLICATION->IncludeFile('include_areas/communicate.php', ['arProp' => $arProp], ['MODE' => 'html']) ?>
                    </div>
                </div>
            </header>




            <div js-header-layer class="layer layer_overlay layer_overlay_left layer_header" data-id="main/header">
                <div class="layer__inside">
                    <a js-close-layer class="layer-close" role="button" href="#"></a>

                    <div class="layer__content">
                        <div class="header header_layer">
                            <div class="header__bg"></div>
                            <div class="header__wrapper">
                                <div class="header__logo block">
                                    <div class="block-wrapper block-wrapper_min-width_none">
                                        <a class="logo link-image" href="#">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/images/veselkino-1.png" alt="Весёлкино">
                                        </a>
                                    </div>
                                </div>

                                <div class="header__nav block">
                                    <div class="block-wrapper block-wrapper_min-width_none">
                                        <nav class="nav nav_large nav_white nav_out-block">
                                            <div class="nav__list">

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="1" href="#" class="nav__link">О центре</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="2" href="#" class="nav__link">Услуги</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="3" href="#" class="nav__link">Новости</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="4" href="#" class="nav__link">Карта</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="5" href="#" class="nav__link">Фотогалерея</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="6" href="#" class="nav__link">Отзывы</a>
                                                </div>

                                                <div class="nav__item">
                                                    <a js-menu-trigger data-scroll="7" href="#" class="nav__link">Контакты</a>
                                                </div>

                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="header__bottom block">
                                    <? $APPLICATION->IncludeFile('include_areas/communicate.php', ['arProp' => $arProp], ['MODE' => 'html']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>


    <div class="body__content">

