/*
jQWidgets v16.0.0 (2023-Mar)
Copyright (c) 2011-2023 jQWidgets.
License: https://jqwidgets.com/license/
*/
/* eslint-disable */

(function(a){a.jqx.jqxWidget("jqxNavBar","",{});a.extend(a.jqx._jqxNavBar.prototype,{defineInstance:function(){var b={height:"auto",minimizedHeight:30,popupAnimationDelay:250,minimizeButtonPosition:"left",width:"100%",selectedItem:0,selection:true,disabled:false,rtl:false,minimized:false,columns:null,minimizedTitle:"",orientation:"horizontal",events:["change"]};if(this===a.jqx._jqxNavBar.prototype){return b}a.extend(true,this,b);return b},createInstance:function(b){this.render()},render:function(){var b=this;if(b.ul&&b.ul.parent()[0]!==b.element){b.ul.detach();b.host.children().remove();b.host.append(b.ul);if(b.popup){b.popup.remove()}b.host.height(null);b.host.removeClass(b.toThemeProperty("jqx-widget-header"));b.host.removeClass(b.toThemeProperty("jqx-navbar-minimized"))}b.ul=b.host.children();b._items=b.ul.children();a.each(b._items,function(){a(this).removeClass()});if(this.width!==null&&(this.width.toString().indexOf("%")>=0||this.width.toString().indexOf("px")>=0)){this.element.style.width=this.width}else{this.element.style.width=this.width+"px"}b._layoutItems();b._addClasses();b._addHandlers();b._handleMinimize();a.jqx.utilities.resize(this.host,function(){b._resizePopup()})},_layoutItems:function(){var k=this;var t=1;var s=0;var o=this.height===null||this.height==="auto";if(k.orientation==="horizontal"){if(k._items.length>5){var c=50+"%";k._items.css("width",c);var q=k.height;t=Math.ceil(k._items.length/2);if(!o){var p;var h=false;if(q.toString().indexOf("%")>=0){p=parseInt(q)/t;p+="%";h=true}else{p=parseInt(q)/t}s=2;if(h){k._items.css("height",p);k._items.css("line-height",k._items.height()+"px")}else{k._items.height(p);k._items.css("line-height",p+"px")}}}else{var c=k.host.width/2;var g=k._items.length;var c=100/g+"%";k._items.css("width",c);if(!o){if(k.height.toString().indexOf("%")>=0){k._items.css("height",p);k._items.css("line-height",k.height)}else{k._items.height(k.height);k._items.css("line-height",parseInt(k.height)+"px")}}s=g}if(k.columns){var q=k.height;var l=0;for(var e=0;e<k._items.length;e++){var r=k._items[e];a(r).css("width",k.columns[l]);l++;if(l>=k.columns.length){l=0;if(k.columns.length!==k._items.length){t++}}}var h=false;var p;if(q.toString().indexOf("%")>=0){p=parseInt(q)/t;p+="%";h=true}else{p=parseInt(q)/t}if(!o){if(h){k._items.css("height",p);k._items.css("line-height",k._items.height()+"px")}else{k._items.height(p);k._items.css("line-height",p+"px")}}s=k.columns.length}}else{var q=k.height;var l=0;for(var e=0;e<k._items.length;e++){var r=k._items[e];a(r).css("width","100%")}t=k._items.length;if(!o){var h=false;var p;if(q.toString().indexOf("%")>=0){p=parseInt(q)/t;p+="%";h=true}else{p=parseInt(q)/t}if(h){k._items.css("height",p);k._items.css("line-height",k._items.height()+"px")}else{k._items.height(p);k._items.css("line-height",p+"px")}}s=1}if(k.selection){var b=0;var f=k._items.length/s;var n=false;if(f<t){n=true}for(var e=0;e<t;e++){for(var d=0;d<s;d++){if(d<s-1){var m=k.rtl?"left":"right";a(k._items[b]).css("border-"+m+"-width","1px");a(k._items[b]).css("border-"+m+"-style","solid")}if(t>1&&e>0){a(k._items[b]).css("border-top-width","1px");a(k._items[b]).css("border-top-style","solid")}if(n&&e===t-2&&d===s-1){a(k._items[b]).css("border-bottom-width","1px");a(k._items[b]).css("border-bottom-style","solid")}b++}}}if(a.jqx.browser.msie&&a.jqx.browser.version<8){k._items.css("padding-left","0px");k._items.css("padding-right","0px");a.each(k._items,function(){a(this).css("border-left-width","0px");a(this).css("border-right-width","0px");a(this).css("position","relative");a(this).css("margin-left","-1px")});k.host.css("border","none")}},_handlePopupHeight:function(){var b=this;if(!b.minimized){return}var d;var c=false;if(b.height.toString().indexOf("%")>=0){b.host.css("height",b.height);d=b.host.height()-b.minimizedHeight-1;c=true}if(c){b.popup.height(d);b.ul.height(d);b.host.height(b.minimizedHeight);b._layoutItems()}},_handleMinimize:function(){var d=this;if(d.minimized){var f=d.host;f.height(d.minimizedHeight);f.css("box-sizing","border-box");f.addClass(d.toThemeProperty("jqx-widget-header"));f.addClass(d.toThemeProperty("jqx-navbar-minimized"));var c=a('<div style="cursor: pointer; height: 100%; margin:0px; margin-left: 5px; margin-right:5px;"></div>');f.append(c);c.css("float",d.minimizeButtonPosition);var e=a('<div style="height: 100%; margin:0px; margin-left: 5px; margin-right:5px;"></div>');e.append(d.minimizedTitle);e.css("float",d.minimizeButtonPosition==="left"?"right":"left");if(d.minimizedHeight!=="auto"){if(d.minimizedHeight.toString().indexOf("%")>=0){e.css("line-height",d.minimizedHeight)}else{e.css("line-height",parseInt(d.minimizedHeight)+"px")}}f.append(e);c.addClass(d.toThemeProperty("jqx-menu-minimized-button"));f.removeClass(d.toThemeProperty("jqx-widget-content"));d.ul.detach();var b=a("<div style='box-sizing: border-box; z-index: 999999; display: none; position: absolute;'></div>");b.addClass(d.toThemeProperty("jqx-widget jqx-widget-content jqx-popup jqx-navbar jqx-navbar-popup"));b.append(d.ul);d.popup=b;a(document.body).append(b);d.opened=false;c.click(function(){if(!d.opened){d.open()}else{d.close()}});d.button=c}},close:function(){var b=this;b.popup.fadeOut(b.popupAnimationDelay);b.opened=false},open:function(){var b=this;b.popup.fadeIn(b.popupAnimationDelay);b.popup.css("top",parseInt(b.host.coord().top)+b.host.outerHeight()-1);b.popup.width(b.host.width());var c=b.host.coord().left;b.popup.css("left",c);if(c.toString().indexOf(".5")>=0){b.popup.width(b.host.width()-0.5)}b._handlePopupHeight();b.opened=true},_resizePopup:function(){var b=this;if(b.minimized&&b.popup){b.popup.width(b.host.width());var c=b.host.coord().left;b.popup.css("left",c);if(c.toString().indexOf(".5")>=0){b.popup.width(b.host.width()-0.5)}b.popup.css("top",parseInt(b.host.coord().top)+b.host.outerHeight()-1);b._handlePopupHeight()}},selectAt:function(c){var d=this;if(!d.selection){return}a(d._items[d.selectedItem]).removeClass(d.toThemeProperty("jqx-fill-state-pressed"));a(d._items[c]).addClass(d.toThemeProperty("jqx-fill-state-pressed"));var b=d.selectedItem;d.selectedItem=c;d._raiseEvent("0",{selectedItem:c,oldSelectedItem:b})},getSelectedIndex:function(){return this.selectedItem},destroy:function(){var b=this;b._removeHandlers();b.host.remove()},propertyChangedHandler:function(b,c,e,d){b.render()},_raiseEvent:function(h,e){var g=this;var c=g.events[h];var f=new a.Event(c);f.owner=g;f.args=e;try{var b=g.host.trigger(f)}catch(d){}return b},_removeHandlers:function(){var b=this;b.removeHandler(b._items,"click.navbar"+b.element.id);b.removeHandler(b._items,"mouseenter.navbar"+b.element.id);b.removeHandler(b._items,"mouseleave.navbar"+b.element.id)},_addClasses:function(){var b=this;b.host.addClass(b.toThemeProperty("jqx-navbar"));if(b.disabled){b.host.addClass(b.toThemeProperty("jqx-fill-state-disabled"))}b._items.addClass(b.toThemeProperty("jqx-navbar-block"));if(b.selection){b.host.addClass(b.toThemeProperty("jqx-widget"));b.host.addClass(b.toThemeProperty("jqx-widget-content"));b.host.addClass(b.toThemeProperty("jqx-fill-state-normal"));b._items.addClass(b.toThemeProperty("jqx-fill-state-normal"));b._items.addClass(b.toThemeProperty("jqx-button"));if(b.selectedItem!==-1){a(b._items[b.selectedItem]).addClass(b.toThemeProperty("jqx-fill-state-pressed"))}}else{this.host.css("border","none")}if(b.rtl){b._items.addClass(b.toThemeProperty("jqx-navbar-block-rtl"))}},_addHandlers:function(){var b=this;b.addHandler(b._items,"click.navbar"+b.element.id,function(d){if(!b.disabled&&b.selection){var c=a(b._items).index(this);b.selectAt(c)}});b.addHandler(b._items,"mouseenter.navbar"+b.element.id,function(c){if(!b.disabled&&b.selection){a(c.target).addClass(b.toThemeProperty("jqx-fill-state-hover"))}});b.addHandler(b._items,"mouseleave.navbar"+b.element.id,function(c){if(!b.disabled&&b.selection){a(c.target).removeClass(b.toThemeProperty("jqx-fill-state-hover"))}})}})})(jqxBaseFramework);

