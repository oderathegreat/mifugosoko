!function(e){var t={};function o(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,o),r.l=!0,r.exports}o.m=e,o.c=t,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)o.d(n,r,function(t){return e[t]}.bind(null,r));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=155)}({155:function(e,t,o){e.exports=o(156)},156:function(e,t){function o(e,t){for(var o=0;o<t.length;o++){var n=t[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var n=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n,r;return t=e,(n=[{key:"init",value:function(){$(document).on("click",".btn-trigger-active-theme",(function(e){e.preventDefault();var t=$(e.currentTarget);t.addClass("button-loading"),$.ajax({url:route("theme.active"),data:{theme:t.data("theme")},type:"POST",success:function(e){e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),window.location.reload()),t.removeClass("button-loading")},error:function(e){Botble.handleError(e),t.removeClass("button-loading")}})})),$(document).on("click",".btn-trigger-remove-theme",(function(e){e.preventDefault(),$("#confirm-remove-theme-button").data("theme",$(e.currentTarget).data("theme")),$("#remove-theme-modal").modal("show")})),$(document).on("click","#confirm-remove-theme-button",(function(e){e.preventDefault();var t=$(e.currentTarget);t.addClass("button-loading"),$.ajax({url:route("theme.remove",{theme:t.data("theme")}),type:"POST",success:function(e){e.error?Botble.showError(e.message):(Botble.showSuccess(e.message),window.location.reload()),t.removeClass("button-loading"),$("#remove-theme-modal").modal("hide")},error:function(e){Botble.handleError(e),t.removeClass("button-loading"),$("#remove-theme-modal").modal("hide")}})}))}}])&&o(t.prototype,n),r&&o(t,r),e}();$(document).ready((function(){(new n).init()}))}});