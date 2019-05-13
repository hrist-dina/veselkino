<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Веселкино");
?>

<div class="body__content-top" js-start-open-modal data-modal="<?=$_GET['modal']?>">
<?
$arFilter = [
    'IBLOCK_ID' => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_master_class'),
    'ACTIVE' => 'Y',
    '>PROPERTY_DATE_TO' =>  date('Y-m-d'),
];
$rsElements = CIBlockElement::GetList([], $arFilter);
?>
    <div class="intro block<?if($element = $rsElements->GetNextElement()):?><?else:?> size-medium<?endif;?>">
        <div class="intro__bg">
            <div class="intro__overflow">
                <div class="intro__bg-balloon intro__bg-balloon_main"></div>
                <div class="intro__bg-balloon intro__bg-balloon_colored"></div>
                <div class="intro__bg-flower intro__bg-flower_big"></div>
                <div class="intro__bg-flower intro__bg-flower_medium"></div>
                <div class="intro__bg-flower intro__bg-flower_small"></div>
            </div>
            <div js-parallaxify-transform data-parallaxify-range="27" class="intro__bg-balloon intro__bg-balloon_pink"></div>
            <div class="intro__welcome intro__bg-balloon intro__bg-balloon_text">
                <div class="intro__welcome-bg"></div>
                <div class="intro__welcome-text">
                    <?=$arProp["TEXT_MAYOR"]["~VALUE"]["TEXT"]?>
                </div>
            </div>
        </div>
        <div class="intro__overflow">
            <div class="intro__info">
                <div class="intro__info-column">
                    <div class="intro__info-text">
                        <?=$arProp["ADDRESS"]["~VALUE"]["TEXT"]?>
                    </div>
                </div>
                <div class="intro__info-column">
                    <div class="intro__info-text">
                        <?=$arProp["WORKING_HOURS"]["~VALUE"]["TEXT"]?>
                    </div>
                    <div class="intro__info-text">
                        <a href="tel:<?=$arProp["PHONE"]["VALUE"]?>" js-goal-phone><?=$arProp["PHONE_TITLE"]["~VALUE"]["TEXT"]?></a>
                    </div>
                </div>
            </div>
            
            <div class="intro__promo">
                <div class="intro__promo-content">
                    <div class="intro__promo-bg"></div>
                    <div class="title title_margin_none ui-color_white intro__promo-title">1 час в подарок!</div>
                    <form js-promocode action="/ajax/veselkino.php?action=promocode" method="post" class="intro__promo-description">
                        <label js-inputShadow class="field field_clean">
                            <span class="field__title">Имя</span>
                            <span class="field__error">Как к вам обратиться?</span>
                            <input type="text" name="NAME" class="field__input" tabindex="1">
                        </label>
                        <label js-inputShadow class="field field_clean">
                            <span class="field__title">Email</span>
                            <span class="field__error">На эту почту мы напишем ответ</span>
                            <input type="text" name="EMAIL" class="field__input" tabindex="2">
                        </label>
                        <label js-inputShadow class="field field_clean">
                            <span class="field__title">Номер телефона</span>
                            <span class="field__error">На какой номер нам перезвонить?</span>
                            <input data-masked="phone" type="text" name="PHONE" class="field__input" tabindex="3">
                        </label>
                        <label js-inputShadow class="field field_clean">
                            <span class="field__title">День рождения ребёнка</span>
                            <span class="field__error">День рождения ребёнка?</span>
                            <input data-masked="date" type="text" name="BIRTHDAY" class="field__input" tabindex="4">
                        </label>
                        <div class="actions-set actions-set_margin-top_small">
                            <div class="actions-set__main actions-set__main_full">
                                <button type="submit" js-goal-promokod js-promocode-button class="actions-set__action button button_background_orange button button_medium button_full"><span class="button__title" tabindex="5">Получить промокод</span></button>
                            </div>
                        </div>
                        <div class="actions-set actions-set_margin-top_xsmall">
                            <div class="actions-set__main actions-set__main_full actions-set__main_align_center actions-set__main_simple">
                                Отправляя форму, вы соглашаетесь с <a href="<?=CFile::GetPath($arProp["PRIVACY_POLICY"]['VALUE'])?>" class="contact-us__link">политикой конфиденциальности</a>
                            </div>
                        </div>
                        <div class="actions-set actions-set_margin-top_xsmall">
                            <div class="actions-set__main actions-set__main_full actions-set__main_align_center actions-set__main_simple">
                                 <div class="intro__promocode intro__promocode_mask">
                                     <div class="intro__promocode-content" js-promocode-content></div>
                                     <div js-promocode-bg class="intro__promocode-bg">
                                         <div class="intro__promocode-bg__first"></div>
                                         <div class="intro__promocode-bg__second"></div>
                                         <div class="intro__promocode-bg__third"></div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="intro__events">
                <div class="intro__bg-city"></div>
                <div class="intro__events-bg"></div>
                <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "current_actions",
            array(
                "ACTIVE_DATE_FORMAT" => "j F Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_master_class'),
                "IBLOCK_TYPE" => "-",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "20",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "LINK",
                    2 => "TITLE",
                    3 => "DESCRIPTION",
                    4 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "COMPONENT_TEMPLATE" => "current_actions",
                "STRICT_SECTION_CHECK" => "N"
            ),
            false
            );?>
            </div>
        </div>
        <div class="intro__bg-bottomRounded"></div>
    </div>

    <div js-path-start class="services__pathPoint-1"></div>
    <div js-scroll-block data-end='1' js-services class="services block">

        <div js-parallaxify-position data-parallaxify-range="7" data-scroll="toggle(.is-visible, .is-invisible)" class="services__bg-cloud"></div>

        <div js-set-container class="services__wrapper block-wrapper">
            <div js-path-point data-line="true" class="services__pathPoint-2"></div>
            <h2  class="services__title ui-color_green">Услуги</h2>
            <div js-path-point data-line="true" data-clip="true" class="services__pathPoint-5"></div>
            <div js-path-point data-line="true" class="services__pathPoint-6"></div>
            <div class="services__list">
                <div js-path-point data-clip="true" class="services__pathPoint-3"></div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "services",
                    array(
                        "ACTIVE_DATE_FORMAT" => "j F Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_service'),
                        "IBLOCK_TYPE" => "-",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "LINK",
                            2 => "TITLE",
                            3 => "DESCRIPTION",
                            4 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "services",
                        "STRICT_SECTION_CHECK" => "N"
                    ),
                    false
                );?>
            </div>
            <div class="services__actions">
                <div js-path-point data-clip="true" class="services__pathPoint-4"></div>
                <button js-open-layer="main/modal" data-from="Хочу сходить с друзьями!" js-goal-uslugi class="services__action button button_background_orange button_large button_font-size_large"><span js-setted-text class="button__title">Хочу сходить с друзьями!</span></button>
            </div>
        </div>
    </div>



    <div js-scroll-block data-end="2" class="articles articles_tabs">
        <div js-parallaxify-position data-parallaxify-range="11" data-scroll="toggle(.is-visible,.is-invisible)" class="articles__bg-icecream"></div>
        <div js-parallaxify-position data-parallaxify-range="5" class="articles__bg-cloud"></div>
        <div class="articles-header block">
            <div class="articles-header__wrapper block-wrapper">
                <div js-path-point class="articles__pathPoint-1"></div>
                <h2 class="articles-header__title">Новости и акции</h2>
                <div class="articles-header__tabs">
                    <div class="articles-tabs">
                        <div class="articles-tabs__list">
                            <div js-tabby-tab data-tabby="articles-sections:news" class="articles-tabs__item" js-goal-novosti><span class="articles-tabs__item-title">Новости</span></div>
                            <div js-tabby-tab data-tabby="articles-sections:sales" class="is-active articles-tabs__item" js-goal-akcii><span class="articles-tabs__item-title">Акции</span></div>
                            <div js-tabby-tab data-tabby="articles-sections:master" class="articles-tabs__item" js-goal-sobytiya><span class="articles-tabs__item-title">События</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="articles-sections block">
            <div class="articles-sections__bg"></div>
            <div class="articles-sections__wrapper block-wrapper">
                <div js-tabby-panel js-articles-section data-paginator='{"initial": 4, "step": 6}' data-section="news" data-tabby="articles-sections:news" class="articles-section">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "news",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "N", // A
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_news'),
                            "IBLOCK_TYPE" => "-",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "3",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "show_more_news",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "LINK",
                                2 => "TITLE",
                                3 => "DESCRIPTION",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "DATE",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "news",
                            "STRICT_SECTION_CHECK" => "N"
                        ),
                        false
                    );?>
                    <div class="articles-sections__actions articles-sections__actions_out-bottom">
                        <button js-articles-section-more data-section="news" class="articles-sections__action button button__font-size_large button_large button_large button_background_blue "><span class="button__title">Показать еще</span></button>
                    </div>
                </div>
                <div js-tabby-panel js-articles-section data-paginator='{"initial": 4, "step": 6}' data-section="sales" data-tabby="articles-sections:sales" class="articles-section">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "actions",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "N",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_action'),
                            "IBLOCK_TYPE" => "-",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "3",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "show_more_actions",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "LINK",
                                2 => "TITLE",
                                3 => "DESCRIPTION",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "DATE",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "actions",
                            "STRICT_SECTION_CHECK" => "N"
                        ),
                        false
                    );?>
                    <div class="articles-sections__actions articles-sections__actions_out-bottom">
                        <button js-articles-section-more data-section="sales" class="articles-sections__action button button__font-size_large button_large button_large button_background_blue"><span class="button__title">Показать еще</span></button>
                    </div>
                </div>
                <div js-tabby-panel js-articles-section data-paginator='{"initial": 3, "step": 5}' data-section="training" data-tabby="articles-sections:master" class="articles-section">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "training",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "N",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_master_class'),
                            "IBLOCK_TYPE" => "-",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "3",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "show_more_training",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "LINK",
                                2 => "TITLE",
                                3 => "DESCRIPTION",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "DATE",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "training",
                            "STRICT_SECTION_CHECK" => "N"
                        ),
                        false
                    );?>
                    <div class="articles-sections__actions articles-sections__actions_out-bottom">
                        <button js-articles-section-more data-section="training" class="articles-sections__action button button__font-size_large button_large button_large button_background_blue"><span class="button__title">Показать еще</span></button>
                    </div>
                </div>
            </div>
            <div js-path-point data-clip="true" class="articles__pathPoint-2"></div>
        </div>
    </div>


    <div js-scroll-block data-end='3' class="mapSection">
        <div js-parallaxify-position data-parallaxify-range="8" data-scroll="toggle(.is-visible, .is-invisible)" class="mapSection__bg-cloud"></div>
        <div js-parallaxify-position data-parallaxify-range="11" data-scroll="toggle(.is-visible, .is-invisible)" class="mapSection__bg-sign"></div>
        <div class="mapSection__bg-ball"></div>
        <div s-parallaxify-position data-parallaxify-range="23" data-scroll="toggle(.is-visible, .is-invisible)" class="mapSection__bg-balloon"></div>
        <div s-parallaxify-position data-parallaxify-range="6"  class="mapSection__bg-cloud-2"></div>
        <div class="block">
            <div class="mapSection__wrapper block-wrapper">
                <h2 class="mapSection__title"><span class="mapSection__title-text">Карта центра <span js-path-point class="mapSection__pathPoint-1"></span></span></h2>
            </div>
        </div>

        <div class="mapSection__map">
            <div class="map">
                <div class="map__clip">
                    <div js-scroll-connect data-scroll="map/overflow" class="map__overflow">
                        <div class="map__wrapper">
                            <img js-map-img class="map__img" src="<?= SITE_TEMPLATE_PATH ?>/images/map/map-preloader.jpg" alt="">
                            <div js-map-block class="map__svg"></div>

                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "points",
                                array(
                                    "ACTIVE_DATE_FORMAT" => "j F Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "N",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "N",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "N",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_point'),
                                    "IBLOCK_TYPE" => "-",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "20",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => "Новости",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "LINK",
                                        2 => "TITLE",
                                        3 => "DESCRIPTION",
                                        4 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "SORT",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "COMPONENT_TEMPLATE" => "points",
                                    "STRICT_SECTION_CHECK" => "N"
                                ),
                                false
                            );?>
                        </div>
                    </div>
                </div>
                <div js-scroll data-scroll="map/overflow" class="map__scroll">
                    <div js-scroll-track class="map__scroll-track"></div>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="mapSection__wrapper block-wrapper">
                <div class="mapSection__actions">
                    <button js-open-layer="main/modal" js-goal-anketa data-from="Хочу сходить с друзьями!" class="mapSection__action button button_background_orange button_large button_font-size_large"><span class="button__title">Хочу сходить с друзьями!</span> <span js-path-point data-clip="true" class="mapSection__pathPoint-2"></span></button>
                </div>
            </div>
        </div>
    </div>


    <div js-scroll-block data-end="4" class="articles articles_gallery">
        <div data-scroll="toggle(.is-visible,.is-invisible)" js-parallaxify-position data-parallaxify-range="8" class="articles__bg-ball"></div>
        <div class="articles__bg-flowers"></div>
        <div class="articles-header block">
            <div class="articles-header__wrapper block-wrapper">
                <h2 js-path-point class="articles-header__title">Фотогалерея</h2>
            </div>
        </div>

        <div class="articles-sections block">
            <div class="articles-sections__wrapper block-wrapper">
                <div js-articlesSlider class="articles-section">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "gallery",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => Creonit\Core\Iblock::getInstance()->getIblockId('veselkino_photogallery'),
                            "IBLOCK_TYPE" => "-",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "20",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "LINK",
                                2 => "TITLE",
                                3 => "DESCRIPTION",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "COMPONENT_TEMPLATE" => "gallery",
                            "STRICT_SECTION_CHECK" => "N"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>


    <div js-scroll-block data-end='5' class="reviews block">
        <div js-parallaxify-position data-parallaxify-range="21" data-scroll="toggle(.is-visible, .is-invisible)" class="reviews__lego-1"></div>
        <div js-parallaxify-position data-parallaxify-range="14" data-scroll="toggle(.is-visible, .is-invisible)" class="reviews__lego-2"></div>
        <div js-parallaxify-position data-parallaxify-range="6" class="reviews__cloud-1"></div>
        <div js-parallaxify-position data-parallaxify-range="29" data-scroll="toggle(.is-visible, .is-invisible)" class="reviews__bg"></div>
        <div js-parallaxify-position data-parallaxify-range="10" data-scroll="toggle(.is-visible, .is-invisible)" class="reviews__cloud-2"></div>
        <div class="reviews__wrapper block-wrapper">
            <div js-path-point data-line="true" class="reviews__pathPoint-1"></div>
            <div js-path-point data-clip="true" data-line="true" class="reviews__pathPoint-2"></div>

            <h2 class="reviews__title">Отзывы на <b>FLAMP</b></h2>
            <div class="reviews__container">
                <a class="flamp-widget" href="https://barnaul.flamp.ru/firm/vesjolkino_detskijj_razvlekatelnyjj_centr-70000001030296653"  data-flamp-widget-type="responsive-new" data-flamp-widget-count="1" data-flamp-widget-id="70000001030296653" data-flamp-widget-width="100%">Отзывы о нас на Флампе</a>
                <script>!function(d,s){var js,fjs=d.getElementsByTagName(s)[0];js=d.createElement(s);js.async=1;js.src="//widget.flamp.ru/loader.js";fjs.parentNode.insertBefore(js,fjs);}(document,"script");</script>
            </div>
        </div>
    </div>


    <div class="extras block">
        <div class="extras__wrapper block-wrapper">
            <div js-path-point data-line="true" class="extras__pathPoint-1"></div>
            <div js-path-point data-clip="false" data-line="true" class="extras__pathPoint-2"></div>
            <h2 class="extras__title">А еще вы можете посетить ;)</h2>
            <div class="extras__list">
                <div class="extras__item">
                    <div class="extras-item extras-item_cloud-1 extras-item_rink">
                        <div class="extras-item__wrapper">
                            <div class="extras-item__side">
                                <div class="extras-item__image"></div>
                            </div>
                            <div class="extras-item__main">
                                <div class="extras-item__title">
                                    <a target="_blank" href="<?=$arProp["EXTRA1_LINK"]["VALUE"]?>" class="extras-item__title-link"><?=$arProp["EXTRA1_TITLE"]["VALUE"]?></a>
                                </div>
                                <div class="extras-item__description"><?=$arProp["EXTRA1_DESCRIPTION"]["~VALUE"]["TEXT"]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="extras__item">
                    <div class="extras-item extras-item_cloud-2 extras-item_food">
                        <div class="extras-item__wrapper">
                            <div class="extras-item__side">
                                <div class="extras-item__image"></div>
                            </div>
                            <div class="extras-item__main">
                                <div class="extras-item__title">
                                    <a target="_blank" href="<?=$arProp["EXTRA2_LINK"]["VALUE"]?>" class="extras-item__title-link"><?=$arProp["EXTRA2_TITLE"]["VALUE"]?></a>
                                </div>
                                <div class="extras-item__description"><?=$arProp["EXTRA2_DESCRIPTION"]["~VALUE"]["TEXT"]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="extras__item">
                    <div class="extras-item extras-item_cloud-3 extras-item_cinema">
                        <div class="extras-item__wrapper">
                            <div class="extras-item__side">
                                <div class="extras-item__image"></div>
                            </div>
                            <div class="extras-item__main">
                                <div class="extras-item__title">
                                    <a target="_blank" href="<?=$arProp["EXTRA3_LINK"]["VALUE"]?>" class="extras-item__title-link"><?=$arProp["EXTRA3_TITLE"]["VALUE"]?></a>
                                </div>
                                <div class="extras-item__description"><?=$arProp["EXTRA3_DESCRIPTION"]["~VALUE"]["TEXT"]?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div js-scroll-block data-end='6' class="contacts block">
        <div class="contacts__block block-wrapper">
            <h2 class="contacts__title">Контакты</h2>
            <div class="contacts__content">
                <div class="contacts__side">
                    <div js-path-point class="contacts__pathPoint-1"></div>
                    <div class="contacts__map">
                        <div class="contacts__map-wrapper">
                            <div js-simple-map data-coordinates="[53.344958, 83.761181]" class="contacts__map-container"></div>
                        </div>
                    </div>
                </div>
                <div class="contacts__main">
                    <div class="contacts__main-bg">
                        <div class="contacts__bg-main"></div>
                        <div class="contacts__bg-grass"></div>
                        <div class="contacts__bg-cloud-1"></div>
                        <div class="contacts__bg-cloud-2"></div>
                        <div class="contacts__bg-cloud-3"></div>
                        <div class="contacts__bg-cloud-4"></div>
                        <div class="contacts__bg-cloud-5"></div>
                    </div>
                    <div class="contacts__main-wrapper">
                        <div class="contacts__info">
                            <div class="contacts__info-list">
                                <div class="contacts__info-item">
                                    <a href="tel:<?=$arProp["PHONE"]["VALUE"]?>" js-goal-phone><?=$arProp["PHONE_TITLE"]["~VALUE"]["TEXT"]?></a>
                                </div>
                                <div class="contacts__info-item">
                                    <?=$arProp["ADDRESS"]["~VALUE"]["TEXT"]?>
                                </div>
                                <div class="contacts__info-item">
                                    <?=$arProp["WORKING_HOURS"]["~VALUE"]["TEXT"]?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div js-balloon class="floatingBalloon"></div>

    <svg class="balloonPath" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path id="dotted-line" stroke-dasharray="20,10" fill="none" stroke="none" stroke-width="2px" />
        <g js-balloon-paths></g>
    </svg>

    <div js-layer-modal class="layer layer_overlay layer_form" data-id="main/modal">
        <div class="layer__inside">
            <button type="button" js-close-layer class="layer-close button button_icon button_clean button_xlarge">
                <span class="button__content"><span class="button__icon button__icon_side_left button__icon_arrow-left"></span>
                    <span class="button__title">Назад</span>
                </span>
            </button>

            <div class="layer__content">
                <h1 class="title-h1 title-h1_placement-center title-h1_colored-orange title-h1_simple">Обратная связь</h1>
                 <form action="/ajax/form.php?action=callback" method="post" js-callback-form>
                    <label js-inputShadow class="field">
                        <span class="field__title">Фамилия и имя</span>
                        <span class="field__error">Как к вам обратиться?</span>
                        <input type="text" name="NAME" class="field__input" tabindex="1">
                    </label>
                    <label js-inputShadow class="field">
                        <span class="field__title">Номер телефона</span>
                        <span class="field__error">На какой номер нам перезвонить?</span>
                        <input data-masked="phone" type="text" name="PHONE" class="field__input" tabindex="2">
                    </label>
                    <label js-inputShadow class="field">
                        <span class="field__title">Эл. почта</span>
                        <span class="field__error">На эту почту мы напишем ответ</span>
                        <input type="text" name="EMAIL" class="field__input" tabindex="3">
                    </label>
                    <label js-inputShadow class="field">
                        <span class="field__title">Вопрос или комментарий</span>
                        <span class="field__error">Задайте вопрос, оставьте комментарий</span>
                        <textarea type="text" name="MESSAGE" class="field__input field__input_massage" tabindex="4"></textarea>
                    </label>
                    <label class="checkbox">
                        <span class="checkbox__text checkbox__text_margin-left_none">
                           Отправляя форму, вы соглашаетесь с <a href="#" class="contact-us__link">политикой конфиденциальности</a>
                        </span>
                    </label>
                    <input js-fos-from type="hidden" name="FROM" value="">
                    <div class="actions-set actions-set_margin-top_field actions-set_justify_center">
                        <div class="actions-set__main">
                            <button class="actions-set__action button"><span class="button__title" tabindex="5">Оставить заявку</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div js-layer-article class="layer layer_overlay layer_form" data-id="main/notification">
        <div class="layer__inside">
            <button type="button" js-close-layer class="layer-close button button_icon button_clean button_xlarge">
                    <span class="button__content"><span class="button__icon button__icon_side_left button__icon_arrow-left"></span>
                        <span class="button__title">Назад</span>
                    </span>
            </button>

            <div class="layer__content">
                <h1 class="title-h1 title-h1_placement-center title-h1_colored-orange title-h1_simple">Спасибо!</h1>
                <div class="layer__success">
                    <div class="layer__success-text">
                        <p>Ваша заявка отправлена</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div js-modals style="display: none"></div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
