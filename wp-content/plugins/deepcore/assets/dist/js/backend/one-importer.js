"use strict";!function(h){h.redux=h.redux||{},h.redux.one_importer=function(){function l(){h.ajax({url:ProgressData.ajax_url,type:"post",success:function(e){h(".wbc-progress-bar").attr("style","width:"+e+"%"),h(".wbc-progress-count").text(e+"%")},error:function(e){console.log(e)},complete:function(e){setTimeout(l,1e3)}})}function d(){var e={action:"reset_progress",nonce:OneImporter.nonce};h.ajax({url:OneImporter.ajax_url,type:"post",data:e,success:function(e){console.log(e)},error:function(e){console.log(e)}})}function p(e){e=h('.wn-lightbox[slug="'+e+'"]');e.children("h2").hide(),e.find(".wni-start").hide(),e.children(".wn-suc-imp-title").fadeIn(),e.find(".wn-suc-imp-t100").fadeIn(),e.find(".wn-suc-imp-links").fadeIn(),h(".wsw-menu").find("li.active:last").next().addClass("active"),h(".wsw-btn-step").hide()}h(document).on("click",".wrap-importer.theme.not-imported .importer-button",function(e){e.preventDefault();var t,n=h(this),i=h(".wn-lightbox-wrap"),o=n.closest(".wrap-importer"),s=o.attr("slug"),a=h("#wni-bad-status-message"),r=h('.wn-lightbox[slug="'+s+'"]'),e=h("#wnInvalidPurchaseCode"),c=r.closest(".wn-lightbox-wrap");0<e.length?(t=e.clone().show(),e.remove(),i.find('.wn-lightbox[slug="'+s+'"]').children("h2").after(t)):0<a.length&&(t=a.clone().show(),a.remove(),i.find('.wn-lightbox[slug="'+s+'"]').children("h2").after(t)),i.find('.wn-lightbox[slug="'+s+'"]').find(".wni-settings").niceScroll({scrollbarid:"wn-lb-content",cursorwidth:"10px",cursorborder:"0",touchbehavior:!0,autohidemode:!1,background:"#e7e7e7",cursorcolor:"#91989e"}),i.find('.wn-lightbox[slug="'+s+'"]').show().closest(".wn-lightbox-wrap").show(),h(r).find(".wn-import-demo-btn").on("click",function(e){e.preventDefault(),n=h(this);var t;0!=confirm("By importing the demo content, items such as pages, posts, images, sliders, theme options, widgets and other configurations will be imported. it will take several minutes.")&&(h(".wbc-progress-back").show(),h(".wn-lightbox-wrap").find("i.ti-close").hide(),n.text("Demo Is Importing"),r.find("#w-importing").text("Please do not refresh the page until import is complete. The time it takes to import depends on your host configuration and it may take up to 15 minutes, so please be patient."),t=[],h(r).find(".wn-checkbox-wrap").each(function(){var e=h(this).children("input");"checked"==e.attr("checked")&&t.push(e.val())}),e={action:"importing_demo_content",nonce:OneImporter.nonce,pagebuilder:h(".deep-demo-pg-list").children("li.active").find("span.pg-name").html(),demo:r.find("input#demo").val(),contents:t},h.ajax({type:"POST",url:OneImporter.ajax_url,data:e,success:function(e){console.log(e)},error:function(e){console.log(e)}}).done(function(){setTimeout(function(){h(".wn-lb-content.wni-settings").hide(),i.find('.wn-lightbox[slug="'+s+'"]').find(".wn-suc-imp-content-wrap").show(),o.find(".importer-button:not(#wbc-importer-reimport)").removeClass("button-primary").addClass("button").text("Imported").show(),o.find(".importer-button").attr("style",""),o.addClass("imported active").removeClass("not-imported"),o.find("#wbc-importer-reimport").hide(),c.find("i.ti-close").show(),p(s),d()},3e3)}),setTimeout(l,1e3))})}),h(".wn-setup-wizard").find(".wn-import-demo-btn").on("click",function(e){e.preventDefault();var t,n,i,o,s,a,r;0!=confirm("By importing the demo content, items such as pages, posts, images, sliders, theme options, widgets and other configurations will be imported. it will take several minutes.")&&(t=h(this).closest(".wn-lightbox"),n=t.attr("slug"),r=(r=t.find(".wn-radio-control.checked").children("input").val())||"Elementor",h(".wsw-btn-step").hide(),o=h('.wn-lightbox[slug="'+(i=n)+'"]'),s=o.closest(".wn-lightbox-wrap"),e=o.find(".wni-settings"),i=o.find(".wn-suc-imp-content-wrap"),o.find(".wni-start"),o=s.find(".nicescroll-rails"),s.find("i.ti-close").hide(),e.hide(),o.hide(),i.fadeIn(),i.find(".wn-suc-imp-t100").hide().end().find(".wn-suc-imp-links").hide(),a=[],h(t).find(".wn-checkbox-wrap").each(function(){var e=h(this).children("input");"checked"==e.attr("checked")&&a.push(e.val())}),r={action:"importing_demo_content",nonce:OneImporter.nonce,pagebuilder:r,demo:n,contents:a},h.ajax({type:"POST",url:OneImporter.ajax_url,data:r,success:function(e){console.log(e)},error:function(e){console.log(e)}}).done(function(){setTimeout(function(){h(".loader").hide(),h(".wn-lb-content.wni-settings").hide(),h(".wn-lightbox-wrap").find('.wn-lightbox-wrap[slug="'+n+'"]').find(".wn-suc-imp-content-wrap").show(),h(".wn-lightbox-wrap").find(".importer-button:not(#wbc-importer-reimport)").removeClass("button-primary").addClass("button").text("Imported").show(),h(".wn-lightbox-wrap").find(".importer-button").attr("style",""),h(".wn-lightbox-wrap").addClass("imported active").removeClass("not-imported"),h(".wn-lightbox-wrap").find("#wbc-importer-reimport").hide(),p(n),d()},3e3)}),setTimeout(l,1e3))}),h(document).on("click",".import-risk-btn",function(e){e.preventDefault(),h("#wni-bad-status-message").fadeOut()}),h(document).on("click",".wn-lightbox-wrap i.ti-close",function(){h(".wn-lightbox-wrap").hide(),h(".wn-checkbox-label").removeClass("checked"),h(".wn-import-content-wrap").find("input.wn-checkbox-input").attr("checked",!1)}),h(document).on("click",".wn-checkbox-label",function(){var e=h(this),t=e.next(),n=h(".all-contents");"all"==t.val()?e.hasClass("checked-a")?(e.removeClass("checked-a"),h(".wn-checkbox-label").removeClass("checked"),h(".wn-import-content-wrap").find("input.wn-checkbox-input").attr("checked",!1)):(e.addClass("checked-a"),h(".wn-checkbox-label").addClass("checked"),h(".wn-import-content-wrap").find("input.wn-checkbox-input").attr("checked",!0)):e.hasClass("checked")?(t.attr("checked",!1),e.removeClass("checked"),n.removeClass("checked"),n.attr("checked",!1)):(t.attr("checked",!0),e.addClass("checked"))});const n=h(".demo-show-cat"),s=h(".demo-cat-list"),a=h(".deep-demo-loop"),e=h(".deep-demo-pg-menu"),r=h(".deep-demo-filter"),c=h(".deep-demo-pg-list"),t=h("#deep-demo-search-form");function m(){var e=h("head"),t=h("#deep-demo-pg-style"),n=r.find("li.active").children("a").html(),i=s.find("li.active").children("a").html(),o=c.children("li.active").find("span.pg-name").html();"Free"==n?c.children("li").last().hide():c.children("li").last().show(),"Elementor"==o?(t.remove(),e.append('<style id="deep-demo-pg-style">.wn-plugin[data-plugin-name="Elementor"]{display: block}.wn-plugin[data-plugin-name="WPBakery Page Builder"]{display:none}</style>')):"WPBakery"==o&&(t.remove(),e.append('<style id="deep-demo-pg-style">.wn-plugin[data-plugin-name="WPBakery Page Builder"]{display: block}.wn-plugin[data-plugin-name="Elementor"]{display:none}</style>'));i={action:"deep_demo_listings",nonce:OneImporter.nonce,pageBuilder:o,type:n,category:i};h.ajax({type:"POST",url:OneImporter.ajax_url,data:i,success:function(e){a.html(e)},error:function(e){console.log(e)}})}n.on("click",function(e){e.preventDefault(),s.hasClass("active")?s.removeClass("active"):s.addClass("active")}),s.children("li").each(function(){var t=h(this);t.on("click",function(e){e.preventDefault();e=t.children("a").html();t.addClass("active").siblings().removeClass("active"),s.removeClass("active"),n.html(e),m()})}),e.on("click",function(){c.hasClass("active")?c.removeClass("active"):c.addClass("active")}),c.children("li").each(function(){var e,t,n=h(this),i=h(".pg-menu-name"),o=h(".pg-menu-src"),s=h("#select-builder");n.on("click",function(){n.addClass("active").siblings().removeClass("active"),e=n.children("span.pg-src").html(),t=n.children("span.pg-name").html(),o.html(e),i.html(t),s.val(t),c.removeClass("active"),m()})}),r.children("li").each(function(){var t=h(this);t.on("click",function(e){e.preventDefault(),t.addClass("active").siblings().removeClass("active"),m()})}),t.on("keyup",function(){var e=h(this).val(),t=h("head");h("#deep-demo-search").remove(),e&&t.append('<style id="deep-demo-search">.wrap-importer{display: none}.wrap-importer[slug*="'+e+'"] { display: block; }</style>')})},h(document).ready(function(){h.redux.one_importer()})}(jQuery);