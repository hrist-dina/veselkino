"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function e(e,t){for(var o=0;o<t.length;o++){var i=t[o];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,o,i){return o&&e(t.prototype,o),i&&e(t,i),t}}();!function(e,t,o){var i=function(){function e(){_classCallCheck(this,e),this.stack=[],this.started=!1,this.sorted=!1}return _createClass(e,[{key:"use",value:function(t,o){var i=this;t=e.normalizeScope(t),this.sorted||(this.stack.sort(function(e,t){return e.order===t.order?0:e.order>t.order?1:-1}),this.sorted=!0),this.stack.filter(function(e){return t.some(function(t){return e.scope.indexOf(t)>-1})}).map(function(e){return e.callback.call(i,o,t)})}},{key:"bind",value:function(t,o,i){void 0===i&&(void 0===o?(o=t,t=["default"]):"number"==typeof o&&(i=o||0,o=t,t=["default"])),void 0===i&&(i=0),t=e.normalizeScope(t),this.stack.push({scope:t,callback:o,order:i}),this.sorted=!1}},{key:"start",value:function(){var e=this;!1===this.started&&(this.started=!0,t(function(){e.use("default")}))}}],[{key:"normalizeScope",value:function(e){return"string"==typeof e&&(e=e.split(" ").map(function(e){return e.trim()})),0===e.length&&(e=["default"]),e}}]),e}();e.app=new i}(window,jQuery),$(function(){window.PswpInit=function(e){var t,o=$("[js-pswp]").eq(0);o.length||(o=$('<div js-pswp class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Закрыть (Esc)"></button><button class="pswp__button pswp__button--fs" title="На весь экран"></button><button class="pswp__button pswp__button--zoom" title="Масштаб"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Назад"></button><button class="pswp__button pswp__button--arrow--right" title="Вперёд"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>').appendTo($("body")));var i=$("[js-pswp-item]",e);if(i.length){var s=[];i.each(function(e,t){var o=i.eq(e);if(!o.attr("href").length)return void o.removeData("pswp-index");var n={},a=o.data("size");if(n.src=o.attr("href"),a)n.w=a.split("x")[0],n.h=a.split("x")[1],s.push(n);else{var r=o.children("img");if(!r.length)return;r.imagesLoaded().done(function(t){n.w=r[0].naturalWidth,n.h=r[0].naturalHeight,s.splice(e,0,n)})}o.data("pswp-index",e)}),i.off(".pswp").on({"click.pswp":function(e){e.preventDefault();var i=$(this).data("pswp-index");void 0!==i&&(t=new PhotoSwipe(o[0],PhotoSwipeUI_Default,s,{history:!1,closeOnScroll:!1,loop:!1,bgOpacity:.7,index:i}),t.init())}})}}}),$(function(){$("[js-goal-uslugi]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonUslugi")}),$("[js-goal-akcii]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonAkcii")}),$("[js-goal-novosti]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonNovosti")}),$("[js-goal-sobytiya]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonSobytiya")}),$("[js-goal-anketa]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonAnketa")}),$("[js-goal-mk]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("click_MK")}),$("[js-goal-vopros]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonVopros")}),$("[js-goal-promokod]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("click_promokod")}),$("[js-goal-phone]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("buttonNumber")}),$("[js-goal-vk]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("clickVK")}),$("[js-goal-ok]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("clickOK")}),$("[js-goal-fb]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("clickFB")}),$("[js-goal-insta]").on("click",function(){"undefined"!=typeof yaCounter47451490&&yaCounter47451490.reachGoal("clickINSTA")})}),app.bind("default layer",function(e){var t=$(window),o=$("[js-headerFixed]",e);$("[js-header-layer]",e).layer({isOverlayer:!0,beforeOpen:function(e,i){o.addClass("is-hide"),t.trigger("pauseHeader")},afterClose:function(e,i){o.removeClass("is-hide"),t.trigger("unpauseHeader")}}),$("[js-layer-article]",e).layer({isOverlayer:!0,beforeOpen:function(e,i){o.addClass("is-hide"),t.trigger("pauseHeader")},afterOpen:function(e,t){app.use("showMore",t),setTimeout(function(){app.use("articleSlider",t)},350)},afterClose:function(){o.removeClass("is-hide"),t.trigger("unpauseHeader")}}),$("[js-header-open]",e).on("click",function(e){e.preventDefault(),Layer.open("main/header")}),$("[js-layer-modal]",e).layer({isOverlayer:!0})}),$(function(){$.parallaxify({positionProperty:"transform",responsive:!0,motionType:"natural",mouseMotionType:"gaussian",motionAngleX:50,motionAngleY:50,alphaFilter:.5,adjustBasePosition:!0,alphaPosition:.025,useGyroscope:!1})}),$(function(){var e=$(window),t=$("[js-simple-map]"),o=e.width();"undefined"!=typeof ymaps&&ymaps.ready(function(){t.each(function(t,i){var s=$(i),n=s.data("coordinates"),a=new ymaps.Map(s[0],{center:[53.342201,83.750318],zoom:16,controls:[],margin:o>600?[50,100,0,0]:0}),r=new ymaps.GeoObjectCollection,l={iconLayout:"default#image",iconImageHref:"/local/templates/veselkino/images/contacts/mark.png",iconImageSize:[107,94],iconImageOffset:[-16,-94]};a.behaviors.disable("scrollZoom"),r.add(new ymaps.Placemark([53.342201,83.750318],{},l)),a.geoObjects.add(r),s.off(".simple-map").on({"updateMap.simple-map":function(e){e.stopPropagation(),a.container.fitToViewport()}}),e.one("touchstart",function(e){a.behaviors.disable("drag"),s.off(".enterFullscreen").on("click.enterFullscreen",function(e){e.preventDefault(),e.stopPropagation(),a.container.enterFullscreen()}),a.container.events.add("fullscreenenter",function(e){a.behaviors.enable("drag"),a.controls.add("fullscreenControl"),a.controls.add("zoomControl"),s.off(".enterFullscreen")}).add("fullscreenexit",function(e){a.behaviors.disable("drag"),a.controls.remove("fullscreenControl"),a.controls.remove("zoomControl"),a.setCenter(n),s.off(".enterFullscreen").on("click.enterFullscreen",function(e){e.preventDefault(),e.stopPropagation(),a.container.enterFullscreen()})})}).on("resize",function(){o=e.width(),o>600?(a.margin.setDefaultMargin([50,100,0,0]),a.setCenter([53.342201,83.750318],16,{useMapMargin:!0})):(a.margin.setDefaultMargin(0),a.setCenter([53.342201,83.750318],16,{useMapMargin:!0}))})})})}),$(function(){var e=$(window),t=$("[js-share-tip]"),o=$("[js-about-map-mark]");o.each(function(e,i){var s=$(i);s.qtip({content:{text:t.clone(!0,!0)},position:{my:"top right",at:"bottom right",target:"event",adjust:{x:-25,y:0}},show:{solo:!0,target:s},hide:{when:{event:"mouseout unfocus"},fixed:!0,delay:200},style:{classes:"qtip-clean",tip:{corner:!1}},events:{show:function(e,t){o.filter(".is-active").removeClass("is-active"),s.addClass("is-active")},hide:function(e,t){s.removeClass("is-active")}}})}),$("[js-map-mark]").each(function(o,i){var s=$(i),n=s.find("[js-map-mark-tip]"),a=s.find("[js-map-mark-tip-close]"),r=s.find("[js-map-mark-tip-shareFloat]");a.on("click",function(e){e.preventDefault(),s.qtip("hide")}),deviceType.mobile||r.qtip({content:{text:t.clone(!0,!0).on("mouseleave",function(){r.qtip("hide")})},position:{my:"top right",at:"bottom right",target:"event",adjust:{x:-22,y:-20}},show:{},hide:{event:"unfocus"},style:{classes:"qtip-clean",tip:{corner:!1}},events:{show:function(e,t){},hide:function(e,t){}}}),s.qtip({content:{text:n},position:{my:"top right",at:"bottom right",viewport:e,effect:!1,adjust:{y:-40,method:"shift none"}},show:{solo:!0,event:"click",target:s},hide:{event:"unfocus"},style:{classes:"qtip-clean",tip:{corner:!1}},events:{show:function(e,t){s.addClass("is-show")},hide:function(e,t){s.removeClass("is-show")}}})})}),$(function(){var e=$(window),t=$("[js-scroll]"),o=$("[js-scroll-connect]");t.each(function(t,i){function s(){c.scrollWidth=l[0].scrollWidth,c.scrollLeftWidth=c.scrollWidth,c.scrollTrackWidth=100*l.outerWidth()/c.scrollWidth,r.css({width:c.scrollTrackWidth+"%"}),c.scrollTrackWidth>=100&&!a.hasClass("is-full")?(a.addClass("is-full"),l.addClass("scroll-visible")):c.scrollTrackWidth<100&&a.hasClass("is-full")&&(a.removeClass("is-full"),l.removeClass("scroll-visible")),n()}function n(){c.scrollLeft=l.scrollLeft(),c.scrollTrackLeft=100*c.scrollLeft/c.scrollLeftWidth,r.css({left:c.scrollTrackLeft+"%"})}var a=$(i),r=a.find("[js-scroll-track]"),l=o.filter('[data-scroll="'+i.dataset.scroll+'"]'),c={};s(),l.off(".scroll").on("scroll.scroll",function(e){n()}),e.on("resize.scroll",function(e){s()})})}),$(function(){var e=$("[js-servicesList]"),t=e.find("[js-servicesList-list]");t.on("init",function(e){var t=$(this),o=t.find(".slick-current"),i=$("[js-setted-text]"),s=o.data("text");i.text(s)}).on("afterChange",function(e,t){var o=$(this),i=o.find(".slick-current"),s=$("[js-setted-text]"),n=i.data("text");s.text(n)}),t.slick({prevArrow:'<button type="button" class="slick-prev"><span class="slick-arrow-icon"></span></button>',nextArrow:'<button type="button" class="slick-next"><span class="slick-arrow-icon"></span></button>',slidesToShow:1,rows:0,swipeToSlide:!0,touchThreshold:30,centerMode:!0,infinite:!1,centerPadding:"100px",adaptiveHeight:!0,responsive:[{breakpoint:750,settings:{centerPadding:"25px"}}]})}),$(function(){$("[js-articlesSlider]").each(function(e,t){var o=$(t).find("[js-articlesSlider-list]");o.slick({prevArrow:'<button type="button" class="slick-prev"><span class="slick-arrow-icon"></span></button>',nextArrow:'<button type="button" class="slick-next"><span class="slick-arrow-icon"></span></button>',slidesToShow:3,rows:0,swipeToSlide:!0,touchThreshold:30,infinite:void 0===o.data("infinite")||o.data("infinite"),adaptiveHeight:!0,responsive:[{breakpoint:1200,settings:{centerMode:!0,centerPadding:"50px"}},{breakpoint:900,settings:{slidesToShow:2,centerMode:!0,centerPadding:"50px"}},{breakpoint:600,settings:{slidesToShow:1,centerMode:!0,centerPadding:"30px"}}]})})}),app.bind("default showMore",function(e){$("[js-articles-section]",e).each(function(e,t){var o=$(t),i=$.extend({initial:3,step:6,section:o.data("section")||"base"},o.data("paginator")),s=o.find("[js-articles-section-item]").filter(function(e,t){return $(t).data("section")==i.section}),n=s.length,a=!1;if(n>=i.step+Math.floor(i.step/2-1)){var r=o.find("[js-articles-section-more]").filter(function(e,t){return $(t).data("section")==i.section}),l=s.filter(function(e,t){return e>i.initial-1}).addClass("is-hide");r.off(".articles-more").on({"click.articles-more":function(e){e.preventDefault(),a?(a=!1,l=s.filter(function(e,t){return e>i.initial-1}).addClass("is-hide"),o.attr("data-tabby")?$.scrollTo($("[js-scroll-block][data-end='2']"),1e3,{axis:"y",limit:!1,offset:-80}):$.scrollTo($("[js-scroll-block][data-end='7']"),1e3,{axis:"y",limit:!1,offset:-80}),r.find(".button__title").text("Показать ещё")):(l.filter(function(e,t){return e<i.step}).removeClass("is-hide"),l=l.filter(".is-hide"),l.length<=Math.floor(i.step/2)&&(a=!0,l.removeClass("is-hide"),r.find(".button__title").text("Свернуть"))),o.trigger("pathUpdate")}})}else o.find("[js-articles-section-more]").filter(function(e,t){return $(t).data("section")==i.section}).remove();o.on("tabChanged",function(e,t){o.trigger("pathUpdate")})})}),$(function(){var e=$('[data-masked="phone"]');e.on("keydown",function(t){if(13!=t.keyCode&&48!=t.keyCode&&49!=t.keyCode&&50!=t.keyCode&&51!=t.keyCode&&52!=t.keyCode&&53!=t.keyCode&&54!=t.keyCode&&55!=t.keyCode&&56!=t.keyCode&&57!=t.keyCode&&96!=t.keyCode&&97!=t.keyCode&&98!=t.keyCode&&99!=t.keyCode&&100!=t.keyCode&&101!=t.keyCode&&102!=t.keyCode&&103!=t.keyCode&&104!=t.keyCode&&105!=t.keyCode&&116!=t.keyCode)return!1;e.inputmask("+7 (999) 999-99-99",{showMaskOnHover:!1})}),e.on("keydown",function(t){8==t.keyCode&&(e.inputmask("remove"),e.val(""))}),e.on("focusout",function(){});var t=$('[data-masked="date"]');t.on("keydown",function(e){if(13!=e.keyCode&&48!=e.keyCode&&49!=e.keyCode&&50!=e.keyCode&&51!=e.keyCode&&52!=e.keyCode&&53!=e.keyCode&&54!=e.keyCode&&55!=e.keyCode&&56!=e.keyCode&&57!=e.keyCode&&96!=e.keyCode&&97!=e.keyCode&&98!=e.keyCode&&99!=e.keyCode&&100!=e.keyCode&&101!=e.keyCode&&102!=e.keyCode&&103!=e.keyCode&&104!=e.keyCode&&105!=e.keyCode&&116!=e.keyCode)return!1;t.inputmask("99.99.9999",{showMaskOnHover:!1})}),t.on("keydown",function(e){8==e.keyCode&&(t.inputmask("remove"),t.val(""))})}),$(function(){$("[js-notify]").on("click",function(e){return Layer.close("main/modal",{}),Layer.open("main/notification"),!1})}),$(function(){if(!deviceType.mobile){new ScrollTrigger({toggle:{visible:"is-visible",hidden:"is-invisible"},offset:{x:-1e3,y:0},once:!0})}setTimeout("$('.intro__bg-city').addClass('is-visible');",500),setTimeout("$('.intro__bg-balloon_main').addClass('is-visible');",1500),setTimeout("$('.intro__bg-balloon_text').addClass('is-visible');",1500),setTimeout("$('.intro__bg-balloon_pink').addClass('is-visible');",1800),setTimeout("$('.intro__bg-balloon_colored').addClass('is-visible');",2500),setTimeout("$('.intro__bg-balloon_white-large').addClass('is-visible');",2550),setTimeout("$('.intro__bg-balloon_white-medium').addClass('is-visible');",2570),setTimeout("$('.intro__bg-balloon_white-small').addClass('is-visible');",2590),setTimeout("$('.intro__bg-balloon_white-xsmall').addClass('is-visible');",2610)}),app.bind("default fancybox",function(e){$.fn.fancybox&&$("[js-fancybox]",e).fancybox({loop:!0,buttons:["zoom","thumbs","fullScreen","close"]})}),$(function(){var e=$("[js-start-open-modal]");e&&e.data("modal")&&setTimeout(function(){Layer.open(e.data("modal"))},170)}),$(function(){var e=$("[js-scrollbar]");e.length&&e.each(function(e,t){new SimpleBar(t,{autoHide:!1})})}),$(function(){$("[js-promocode]").each(function(){var e=$(this),t=e.find("[js-promocode-bg]");e.on("submit",function(o){o.preventDefault(),o.stopPropagation(),e.find(".field.is-error").removeClass("is-error"),$.ajax({url:e.attr("action"),dataType:"json",data:e.serialize(),type:"post",success:function(o){if(o.error)for(var i in o.error){var s=e.find('[name="'+i+'"]'),n=s.closest(".field").addClass("is-error");n.find(".field__error").html(o.error[i].join("; "))}else if(o.success){e[0].reset();var a=e.find("[js-promocode-content]");a.html(o.promocode),t.hasClass("is-active")||t.addClass("is-active")}}})})})}),app.bind("default articleSlider",function(e){var t=$("[js-article-slider]",e),o=$(window);console.log(e),t.off("[js-article-slider]").each(function(e,t){var i=$(t).find("[js-article-slider-list]");$(t).find("[js-article-slider-item]");i.data("slicked")&&i.slick("unslick"),o.on("resize",function(){i.slick("setPosition")}),i.data("slicked",!0).slick({prevArrow:'<button type="button" class="slick-prev"><span class="slick-arrow-icon"></span></button>',nextArrow:'<button type="button" class="slick-next"><span class="slick-arrow-icon"></span></button>',rows:0,speed:400,slidesToShow:1,variableWidth:!0,swipeToSlide:!0,centerMode:!0,infinite:!1,centerPadding:"0px",adaptiveHeight:!0,responsive:[{breakpoint:850,settings:{centerMode:!1,variableWidth:!1,adaptiveHeight:!1}}]})})}),$(function(){$("[js-article-video-play]").on("click",function(){var e=$(this),t=e.closest(".article-video");e.html('<iframe width="'+t.width()+'" height="'+t.height()+'" src="//www.youtube.com/embed/'+$(this).data("video-id")+'?autoplay=1" autoplay="1" frameborder="0" allowfullscreen></iframe>')})}),$(function(){$("[js-close-modal]").on("click",function(){Layer.closeAll()})}),$(function(){$.ajax({url:"/ajax/veselkino.php?action=map",dataType:"json",data:{},type:"get",success:function(e){var t=$(e.map);$("[js-map-block]").html(t.html()),$("[js-map-img]").addClass("-desktop-hidden")}})}),$(function(){$("[js-callback-form]").each(function(){var e=$(this);e.on("submit",function(t){t.preventDefault(),t.stopPropagation(),e.find(".field.is-error").removeClass("is-error"),$.ajax({url:e.attr("action"),dataType:"json",data:e.serialize(),type:"post",success:function(t){if(t.error)for(var o in t.error){var i=e.find('[name="'+o+'"]'),s=i.closest(".field").addClass("is-error");s.find(".field__error").html(t.error[o].join("; "))}else t.success&&(e.trigger("layer-close"),e[0].reset(),Layer.close("main/modal",{}),Layer.open("main/notification"))}})})}),$(document).on("click","[js-open-layer]",function(e){e.preventDefault(),e.stopPropagation();var t=$(this).data("from");t&&setTimeout(function(){$("[js-fos-from]").val(t)}.bind(this),15)})}),$(function(){var e=$(window);$("[js-header]").each(function(t,o){var i=void 0,s=void 0,n=$(o),a=0,r=n.offset().top,l=n.offset().top,c=!1,d=void 0,u=n.height(),f=e.height(),p=void 0,h=0;e.on("resize",function(e){s()}).on("pauseHeader",function(e){setTimeout(function(){h=parseFloat($(".body__wrapper").css("top"))},300)}).on("unpauseHeader",function(e){c=!1,h=0}).on("load",function(e){s(),window.requestAnimationFrame(i)}),s=function(){window.requestAnimationFrame(function(){u=n.height(),f=e.height()})},i=function(){if(c)return void window.requestAnimationFrame(i);p=window.pageYOffset,d=n.offset().top,u<=f?n.css({position:"fixed",top:"",bottom:""}):p>a?("fixed"!=n.css("position")&&f+p>=d+u&&n.css({position:"fixed",bottom:0,top:"auto"}),d-p>=r&&n.css({position:"absolute",bottom:"auto",top:l})):p<a&&(d-p>=r?"fixed"!=n.css("position")&&n.css({position:"fixed",bottom:"auto",top:r}):"absolute"!=n.css("position")&&n.css({position:"absolute",bottom:"auto",top:l-h})),a=p,l=d,window.requestAnimationFrame(i)}})}),$(function(){function e(){var e=document.documentElement.scrollTop/(document.documentElement.scrollHeight-document.documentElement.clientHeight),t=h.getPointAtLength(v*e);n.css({left:t.x,top:t.y}),!b&&document.elementFromPoint(t.x,t.y-document.documentElement.scrollTop)&&"YMAPS"==document.elementFromPoint(t.x,t.y-document.documentElement.scrollTop).tagName&&(b=!0,s.addClass("is-active")),o(t.y)?c||(c=!0,n.addClass("is-hide")):c&&(c=!1,n.removeClass("is-hide"))}function t(){u="",a.empty(),f=[],p={left:r.offset().left,top:r.offset().top},l.each(function(e,t){f.push({line:t.dataset.line||!1,clip:t.dataset.clip||!1,top:$(t).offset().top,left:$(t).offset().left})}),f.forEach(function(e,t){var o=document.createElementNS("http://www.w3.org/2000/svg","path"),i="";o.setAttribute("fill","none"),o.setAttribute("stroke-width","2px"),o.setAttribute("stroke-dasharray","20,10"),0==t?(e.shiftX=Math.abs(e.left-p.left)/2,e.shiftY=Math.abs(e.top-p.top)/2,e.shiftX=300,e.shiftY=300,i="M "+p.left+","+p.top+"C "+(p.left+e.shiftX)+","+(p.top+e.shiftY)+" "+(e.left-e.shiftX)+","+(e.top-e.shiftY)+" "+e.left+","+e.top,o.setAttribute("d",i),e.clip?o.setAttribute("stroke","none"):o.setAttribute("stroke","#60b800")):(e.shiftX=Math.abs(e.left-f[t-1].left)/2,e.shiftY=Math.abs(e.top-f[t-1].top)/2,e.shiftX=300,e.shiftY=300,i=e.line?"M "+f[t-1].left+","+f[t-1].top+"L "+e.left+","+e.top:"M "+f[t-1].left+","+f[t-1].top+"C "+(f[t-1].left+f[t-1].shiftX)+","+(f[t-1].top+f[t-1].shiftY)+" "+(e.left-e.shiftX)+","+(e.top-e.shiftY)+" "+e.left+","+e.top,o.setAttribute("d",i),e.clip?o.setAttribute("stroke","none"):o.setAttribute("stroke","#60b800")),u+=i,e.path=o,a.prepend(o),e.pathBBox=o.getBBox(),e.pathYEnd=e.pathBBox.y+e.pathBBox.height}),d.attr("d",u),v=h.getTotalLength(),h.getBoundingClientRect(),e()}function o(e){return f.filter(function(t,o){return t.clip&&e>t.pathBBox.y&&e<t.pathYEnd&&e>f[o-1].pathYEnd}).length>0}var i=$(window),s=$("[js-simple-map]");if(deviceType.mobile)return void s.addClass("is-active");var n=$("[js-balloon]"),a=$("[js-balloon-paths]"),r=$("[js-path-start]"),l=$("[js-path-point]"),c=!1,d=$("#dotted-line"),u="",f=[],p={left:r.offset().left,top:r.offset().top},h=d[0],v=0,m=null,b=!1;t(),i.on("load",function(e){t()}),i.on("pathUpdate",function(e){t()}),i.on("resize",function(e){clearTimeout(m),m=setTimeout(function(){t()},300)}),i.on("scroll",function(t){e()})}),$(function(){$("[js-sales-slider]").each(function(e,t){var o=$(t),i=o.find("[js-sales-slider-list]"),s=o.find("[js-sales-slider-nav]");i.slick({vertical:!0,verticalSwiping:!0,slidesToShow:2,touchThreshold:30,appendArrows:s,prevArrow:'<a js-sales-slider-nav-prev class="sales-slider__nav-item sales-slider__nav-item_prev" href="#"></a>',nextArrow:'<a js-sales-slider-nav-next class="sales-slider__nav-item sales-slider__nav-item_next" href="#"></a>'})})}),$(function(){var e=$("[js-scroll-container]");e.find("[js-scroll-item]").on("click",function(t){t.preventDefault();var o=$(this),i=$("[js-scroll-block][data-end='"+o.data("scroll")+"']");if(3==o.data("scroll")){var s=$("[js-tabby-tab][data-tabby='articles-sections:news']"),n=$("[js-tabby-panel][data-tabby='articles-sections:news']");s.siblings(".is-active").removeClass("is-active").end().addClass("is-active"),e.find("[js-tabby-tab]").removeClass("is-active"),e.find(s).addClass("is-active"),n.siblings(".is-active").removeClass("is-active").end().addClass("is-active"),e.find("[js-tabby-panel]").removeClass("is-active"),e.find(n).addClass("is-active")}setTimeout(function(){$.scrollTo(i,1e3,{axis:"y",limit:!1,offset:-110})},50)}),$("[js-menu-trigger]").on("click",function(e){e.preventDefault();var t=$(this),o=$("[js-scroll-block][data-end='"+t.data("scroll")+"']");Layer.close("main/header",{scrollTo:o}),setTimeout(function(){$.scrollTo(o,1e3,{axis:"y",limit:!1,offset:-100})},500)}),e.find("[js-scroll-tab]").on("click",function(t){t.preventDefault();var o=$(this),i=$("[js-scroll-block][data-end='"+o.data("scroll")+"']"),s=$("[js-tabby-tab][data-tabby='"+o.data("tab")+"']"),n=$("[js-tabby-panel][data-tabby='"+o.data("tab")+"']");setTimeout(function(){$.scrollTo(i,1e3,{axis:"y",limit:!1,offset:-110})},50),s.siblings(".is-active").removeClass("is-active").end().addClass("is-active"),e.find("[js-tabby-tab]").removeClass("is-active"),e.find(s).addClass("is-active"),n.siblings(".is-active").removeClass("is-active").end().addClass("is-active"),e.find("[js-tabby-panel]").removeClass("is-active"),e.find(n).addClass("is-active")})});