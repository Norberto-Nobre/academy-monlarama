'use strict';
/*!
 * Quform jQuery plugin
 *
 * Copyright (c) 2009 - 2021 ThemeCatcher
 */
(function ($) {
   var Quform = function ($form, options) {
      var self = this,
         submitted = false;
      self.$form = $form;
      self.options = options;
      self.$container = $(options.container, $form);
      self.$loading = $(options.loading, $form);
      self.$submitButton = $(options.submitButton, $form);
      self.reset = function (resetValues) {
         if (window.grecaptcha) {
            $('.g-recaptcha', self.$form).each(function () {
               var $recaptcha = $(this);
               if ($recaptcha.data('version') !== 'v3') {
                  try {
                     grecaptcha.reset($recaptcha.data('recaptcha-id'));
                  } catch (e) {}
               }
            });
         }
         submitted = false;
         self.$submitButton.prop('disabled', false);
         self.$loading.stop(true, true).hide();
         $('.quform-success-message', $form).remove();
         $('.quform-error-message', $form).remove();
         $('.quform-has-error', $form).removeClass('quform-has-error');
         $('.quform-errors-wrap', $form).remove();
         if (options.reset && resetValues) {
            $form.resetForm();
            $('input[type="file"]', $form).each(function () {
               $(this).replaceWith($(this).val('').clone(true));
            });
         }
      };
      self.errorMessage = function (html, showTitle) {
         var $message = $('<div class="quform-error-message"/>');
         if (showTitle !== false) {
            $message.append($('<div class="quform-error-title"/>').html(options.errorTitle));
         }
         $message.append(html).hide();
         if (options.errorPosition === 'below') {
            $message.insertAfter(self.$container);
         } else {
            $message.insertBefore(self.$container);
         }
         $message.fadeIn('slow');
         self.scrollTo($message);
      };
      self.scrollTo = function ($target) {
         if (options.scrolling && $target && $target.length && $(window).scrollTop() >= ($target.offset().top - options.scrollThreshold)) {
            $.scrollTo($target, options.scrollSpeed, {
               axis: 'y',
               offset: options.scrollOffset
            });
         }
      };
      self.submit = function () {
         if (submitted) {
            return;
         }
         submitted = true;
         self.$submitButton.prop('disabled', true);
         self.$loading.fadeIn('slow');
         if (window.grecaptcha) {
            var $recaptcha = self.$form.find('.g-recaptcha');
            if ($recaptcha.length && $recaptcha.data('size') === 'invisible') {
               if ($recaptcha.data('version') === 'v3') {
                  grecaptcha.execute($recaptcha.data('recaptcha-id'), {
                     action: 'quform'
                  }).then(function (token) {
                     $recaptcha.find('.g-recaptcha-response').val(token);
                     self.ajaxSubmit();
                  });
                  return;
               } else {
                  grecaptcha.execute($recaptcha.data('recaptcha-id'));
                  return;
               }
            }
         }
         self.ajaxSubmit();
      };
      self.ajaxSubmit = function () {
         $form.ajaxSubmit({
            async: false,
            dataType: 'json',
            data: {
               'quform_ajax': 1
            },
            iframe: true,
            iframeSrc: 'about:blank',
            method: 'POST',
            success: function (response) {
               if (response === null || typeof response === 'undefined') {
                  self.reset();
                  self.errorMessage(options.errorResponseEmpty);
               } else if (typeof response === 'object') {
                  if (response.type === 'success') {
                     if (typeof response.redirect === 'string') {
                        window.location = response.redirect;
                        return;
                     }
                     if (typeof options.successStart === 'function') {
                        options.successStart.call(self, response);
                     }
                     if (typeof options.success === 'function') {
                        options.success.call(self, response);
                     } else {
                        var success = function () {
                           self.reset(true);
                           var $successMessage = $('<div class="quform-success-message"/>').html(response.message).hide().insertBefore(self.$container).fadeIn(options.successFadeInSpeed).show(0, function () {
                              if (typeof options.successEnd === 'function') {
                                 options.successEnd.call(self, response, $successMessage);
                              }
                           });
                           self.scrollTo($successMessage);
                           if (options.successTimeout > 0) {
                              setTimeout(function () {
                                 $successMessage.fadeOut(options.successFadeOutSpeed).hide(0, function () {
                                    $successMessage.remove();
                                 });
                              }, options.successTimeout);
                           }
                        };
                        if (options.hideFormSpeed) {
                           self.$container.fadeOut(options.hideFormSpeed).hide(0, function () {
                              success();
                           });
                        } else {
                           success();
                        }
                     }
                  } else if (response.type === 'error') {
                     if (typeof options.errorStart === 'function') {
                        options.errorStart.call(self, response);
                     }
                     if (typeof options.error === 'function') {
                        options.error.call(self, response);
                     } else {
                        var scrolled = false;
                        self.reset();
                        if (response.error.length) {
                           self.errorMessage(response.error, false);
                           scrolled = true;
                        }
                        var $firstError;
                        $.each(response.elementErrors, function (index, info) {
                           if (typeof info.errors === 'object' && info.errors.length > 0) {
                              var $element = $("[name='" + index + "']", $form);
                              if ($element.length) {
                                 var $errorList = $('<div class="quform-errors quform-cf"/>'),
                                    $errorWrap = $('<div class="quform-errors-wrap"/>').append($errorList);
                                 $errorList.append('<div class="quform-error">' + info.errors[0] + '</div>');
                                 $element.parents('.quform-input').append($errorWrap).end().parents('.quform-element').addClass('quform-has-error');
                                 if (!$firstError) $firstError = $element;
                              } else {
                                 alert("Element '" + index + "' does not exist in the HTML but failed validation, you must either add the HTML for this element into the form or remove the element configuration from the process file.");
                              }
                           }
                        });
                        $('.quform-errors', $form).fadeIn('slow');
                        if (!scrolled) {
                           self.scrollTo($firstError);
                        }
                        if (typeof options.errorEnd === 'function') {
                           options.errorEnd.call(self, response);
                        }
                     }
                  }
               }
            },
            error: function (response) {
               self.reset();
               if (typeof response.responseText === 'string' && response.responseText.length > 0) {
                  self.errorMessage('<pre>' + response.responseText + '</pre>');
               } else {
                  self.errorMessage(options.errorAjax);
               }
            }
         });
      };
      $form.on('submit', function (event) {
         event.preventDefault();
         self.submit();
      });
   };
//    $.fn.Quform = function (options) {
//       var defaults = {
//             container: '.quform-elements',
//             loading: '.quform-loading-wrap',
//             submitButton: '.quform-submit',
//             reset: true,
//             hideFormSpeed: false,
//             successFadeInSpeed: 'slow',
//             successFadeOutSpeed: 'slow',
//             successTimeout: 8000,
//             scrolling: true,
//             scrollSpeed: 400,
//             scrollThreshold: 20,
//             scrollOffset: -50,
//             errorTitle: 'There was a problem',
//             errorResponseEmpty: 'An error occurred and the response from the server was empty.',
//             errorAjax: 'An Ajax error occurred.',
//             errorPosition: 'above'
//          },
//          settings = $.extend({}, defaults, options);
//       if (typeof $.scrollTo !== 'function') {
//          settings.scrolling = false;
//       }
//       return this.each(function () {
//          var $this = $(this);
//          if (!$this.data('quform')) {
//             $this.data('quform', new Quform($(this), settings));
//          }
//       });
//    };
})(jQuery);
(function ($) {
   $.fn.replaceSelectWithTextInput = function (options) {
      var defaults = {
         onValue: 'Other',
         cancel: 'Cancel'
      };
      options = $.extend({}, defaults, options);
      return this.each(function () {
         var $this = $(this),
            $wrapper = $this.parent(),
            $element = $this.parents('.quform-element').addClass('quform-select-replaced'),
            html = $wrapper.html();
         $wrapper.on('change', 'select', function () {
            if ($(this).val() === options.onValue) {
               $wrapper.html('<input type="text" name="' + $this.attr('name') + '" id="' + $this.attr('id') + '" value="" />');
               $element.removeClass('quform-element-select').addClass('quform-element-text');
               var $cancel = $('<a>').on('click', function () {
                  $wrapper.html(html);
                  $element.removeClass('quform-element-text').addClass('quform-element-select');
                  $(this).remove();
                  return false;
               }).attr('href', '#').addClass('quform-cancel-button').attr('title', options.cancel);
               $wrapper.append($cancel);
            }
         });
         $this.triggerHandler('change');
      });
   };
})(jQuery);
(function ($) {
   $.preloadImages = function (images, prefix) {
      if (!this.cache) {
         this.cache = [];
      }
      for (var i = 0; i < images.length; i++) {
         var elem = new Image();
         elem.src = prefix ? prefix + images[i] : images[i];
         this.cache.push(elem);
      }
   }
})(jQuery);;
(function (f) {
   "use strict";
   "function" === typeof define && define.amd ? define(["jquery"], f) : "undefined" !== typeof module && module.exports ? module.exports = f(require("jquery")) : f(jQuery)
})(function ($) {
   "use strict";

   function n(a) {
      return !a.nodeName || -1 !== $.inArray(a.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"])
   }

   function h(a) {
      return $.isFunction(a) || $.isPlainObject(a) ? a : {
         top: a,
         left: a
      }
   }
   var p = $.scrollTo = function (a, d, b) {
      return $(window).scrollTo(a, d, b)
   };
   p.defaults = {
      axis: "xy",
      duration: 0,
      limit: !0
   };
   $.fn.scrollTo = function (a, d, b) {
      "object" === typeof d && (b = d, d = 0);
      "function" === typeof b && (b = {
         onAfter: b
      });
      "max" === a && (a = 9E9);
      b = $.extend({}, p.defaults, b);
      d = d || b.duration;
      var u = b.queue && 1 < b.axis.length;
      u && (d /= 2);
      b.offset = h(b.offset);
      b.over = h(b.over);
      return this.each(function () {
         function k(a) {
            var k = $.extend({}, b, {
               queue: !0,
               duration: d,
               complete: a && function () {
                  a.call(q, e, b)
               }
            });
            r.animate(f, k)
         }
         if (null !== a) {
            var l = n(this),
               q = l ? this.contentWindow || window : this,
               r = $(q),
               e = a,
               f = {},
               t;
            switch (typeof e) {
               case "number":
               case "string":
                  if (/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)) {
                     e = h(e);
                     break
                  }
                  e = l ? $(e) : $(e, q);
               case "object":
                  if (e.length === 0) return;
                  if (e.is || e.style) t = (e = $(e)).offset()
            }
            var v = $.isFunction(b.offset) && b.offset(q, e) || b.offset;
            $.each(b.axis.split(""), function (a, c) {
               var d = "x" === c ? "Left" : "Top",
                  m = d.toLowerCase(),
                  g = "scroll" + d,
                  h = r[g](),
                  n = p.max(q, c);
               t ? (f[g] = t[m] + (l ? 0 : h - r.offset()[m]), b.margin && (f[g] -= parseInt(e.css("margin" + d), 10) || 0, f[g] -= parseInt(e.css("border" + d + "Width"), 10) || 0), f[g] += v[m] || 0, b.over[m] && (f[g] += e["x" === c ? "width" : "height"]() * b.over[m])) : (d = e[m], f[g] = d.slice && "%" === d.slice(-1) ? parseFloat(d) / 100 * n : d);
               b.limit && /^\d+$/.test(f[g]) && (f[g] = 0 >= f[g] ? 0 : Math.min(f[g], n));
               !a && 1 < b.axis.length && (h === f[g] ? f = {} : u && (k(b.onAfterFirst), f = {}))
            });
            k(b.onAfter)
         }
      })
   };
   p.max = function (a, d) {
      var b = "x" === d ? "Width" : "Height",
         h = "scroll" + b;
      if (!n(a)) return a[h] - $(a)[b.toLowerCase()]();
      var b = "client" + b,
         k = a.ownerDocument || a.document,
         l = k.documentElement,
         k = k.body;
      return Math.max(l[h], k[h]) - Math.min(l[b], k[b])
   };
   $.Tween.propHooks.scrollLeft = $.Tween.propHooks.scrollTop = {
      get: function (a) {
         return $(a.elem)[a.prop]()
      },
      set: function (a) {
         var d = this.get(a);
         if (a.options.interrupt && a._last && a._last !== d) return $(a.elem).stop();
         var b = Math.round(a.now);
         d !== b && ($(a.elem)[a.prop](b), a._last = this.get(a))
      }
   };
   return p
});
/*!
 * jQuery Form Plugin
 * version: 4.3.0
 * Requires jQuery v1.7.2 or later
 * Project repository: https://github.com/jquery-form/form

 * Copyright 2017 Kevin Morris
 * Copyright 2006 M. Alsup

 * Dual licensed under the LGPL-2.1+ or MIT licenses
 * https://github.com/jquery-form/form#license

 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 */
! function (r) {
   "function" == typeof define && define.amd ? define(["jquery"], r) : "object" == typeof module && module.exports ? module.exports = function (e, t) {
      return void 0 === t && (t = "undefined" != typeof window ? require("jquery") : require("jquery")(e)), r(t), t
   } : r(jQuery)
}(function (q) {
   "use strict";
   var m = /\r?\n/g,
      S = {};
   S.fileapi = void 0 !== q('<input type="file">').get(0).files, S.formdata = void 0 !== window.FormData;
   var _ = !!q.fn.prop;

   function o(e) {
      var t = e.data;
      e.isDefaultPrevented() || (e.preventDefault(), q(e.target).closest("form").ajaxSubmit(t))
   }

   function i(e) {
      var t = e.target,
         r = q(t);
      if (!r.is("[type=submit],[type=image]")) {
         var a = r.closest("[type=submit]");
         if (0 === a.length) return;
         t = a[0]
      }
      var n, o = t.form;
      "image" === (o.clk = t).type && (void 0 !== e.offsetX ? (o.clk_x = e.offsetX, o.clk_y = e.offsetY) : "function" == typeof q.fn.offset ? (n = r.offset(), o.clk_x = e.pageX - n.left, o.clk_y = e.pageY - n.top) : (o.clk_x = e.pageX - t.offsetLeft, o.clk_y = e.pageY - t.offsetTop)), setTimeout(function () {
         o.clk = o.clk_x = o.clk_y = null
      }, 100)
   }

   function N() {
      var e;
      q.fn.ajaxSubmit.debug && (e = "[jquery.form] " + Array.prototype.join.call(arguments, ""), window.console && window.console.log ? window.console.log(e) : window.opera && window.opera.postError && window.opera.postError(e))
   }
   q.fn.attr2 = function () {
      if (!_) return this.attr.apply(this, arguments);
      var e = this.prop.apply(this, arguments);
      return e && e.jquery || "string" == typeof e ? e : this.attr.apply(this, arguments)
   }, q.fn.ajaxSubmit = function (M, e, t, r) {
      if (!this.length) return N("ajaxSubmit: skipping submit process - no element selected"), this;
      var O, a, n, o, X = this;
      "function" == typeof M ? M = {
         success: M
      } : "string" == typeof M || !1 === M && 0 < arguments.length ? (M = {
         url: M,
         data: e,
         dataType: t
      }, "function" == typeof r && (M.success = r)) : void 0 === M && (M = {}), O = M.method || M.type || this.attr2("method"), n = (n = (n = "string" == typeof (a = M.url || this.attr2("action")) ? q.trim(a) : "") || window.location.href || "") && (n.match(/^([^#]+)/) || [])[1], o = /(MSIE|Trident)/.test(navigator.userAgent || "") && /^https/i.test(window.location.href || "") ? "javascript:false" : "about:blank", M = q.extend(!0, {
         url: n,
         success: q.ajaxSettings.success,
         type: O || q.ajaxSettings.type,
         iframeSrc: o
      }, M);
      var i = {};
      if (this.trigger("form-pre-serialize", [this, M, i]), i.veto) return N("ajaxSubmit: submit vetoed via form-pre-serialize trigger"), this;
      if (M.beforeSerialize && !1 === M.beforeSerialize(this, M)) return N("ajaxSubmit: submit aborted via beforeSerialize callback"), this;
      var s = M.traditional;
      void 0 === s && (s = q.ajaxSettings.traditional);
      var u, c, C = [],
         l = this.formToArray(M.semantic, C, M.filtering);
      if (M.data && (c = q.isFunction(M.data) ? M.data(l) : M.data, M.extraData = c, u = q.param(c, s)), M.beforeSubmit && !1 === M.beforeSubmit(l, this, M)) return N("ajaxSubmit: submit aborted via beforeSubmit callback"), this;
      if (this.trigger("form-submit-validate", [l, this, M, i]), i.veto) return N("ajaxSubmit: submit vetoed via form-submit-validate trigger"), this;
      var f = q.param(l, s);
      u && (f = f ? f + "&" + u : u), "GET" === M.type.toUpperCase() ? (M.url += (0 <= M.url.indexOf("?") ? "&" : "?") + f, M.data = null) : M.data = f;
      var d, m, p, h = [];
      M.resetForm && h.push(function () {
         X.resetForm()
      }), M.clearForm && h.push(function () {
         X.clearForm(M.includeHidden)
      }), !M.dataType && M.target ? (d = M.success || function () {}, h.push(function (e, t, r) {
         var a = arguments,
            n = M.replaceTarget ? "replaceWith" : "html";
         q(M.target)[n](e).each(function () {
            d.apply(this, a)
         })
      })) : M.success && (q.isArray(M.success) ? q.merge(h, M.success) : h.push(M.success)), M.success = function (e, t, r) {
         for (var a = M.context || this, n = 0, o = h.length; n < o; n++) h[n].apply(a, [e, t, r || X, X])
      }, M.error && (m = M.error, M.error = function (e, t, r) {
         var a = M.context || this;
         m.apply(a, [e, t, r, X])
      }), M.complete && (p = M.complete, M.complete = function (e, t) {
         var r = M.context || this;
         p.apply(r, [e, t, X])
      });
      var v = 0 < q("input[type=file]:enabled", this).filter(function () {
            return "" !== q(this).val()
         }).length,
         g = "multipart/form-data",
         x = X.attr("enctype") === g || X.attr("encoding") === g,
         y = S.fileapi && S.formdata;
      N("fileAPI :" + y);
      var b, T = (v || x) && !y;
      !1 !== M.iframe && (M.iframe || T) ? M.closeKeepAlive ? q.get(M.closeKeepAlive, function () {
         b = w(l)
      }) : b = w(l) : b = (v || x) && y ? function (e) {
         for (var r = new FormData, t = 0; t < e.length; t++) r.append(e[t].name, e[t].value);
         if (M.extraData) {
            var a = function (e) {
               var t, r, a = q.param(e, M.traditional).split("&"),
                  n = a.length,
                  o = [];
               for (t = 0; t < n; t++) a[t] = a[t].replace(/\+/g, " "), r = a[t].split("="), o.push([decodeURIComponent(r[0]), decodeURIComponent(r[1])]);
               return o
            }(M.extraData);
            for (t = 0; t < a.length; t++) a[t] && r.append(a[t][0], a[t][1])
         }
         M.data = null;
         var n = q.extend(!0, {}, q.ajaxSettings, M, {
            contentType: !1,
            processData: !1,
            cache: !1,
            type: O || "POST"
         });
         M.uploadProgress && (n.xhr = function () {
            var e = q.ajaxSettings.xhr();
            return e.upload && e.upload.addEventListener("progress", function (e) {
               var t = 0,
                  r = e.loaded || e.position,
                  a = e.total;
               e.lengthComputable && (t = Math.ceil(r / a * 100)), M.uploadProgress(e, r, a, t)
            }, !1), e
         });
         n.data = null;
         var o = n.beforeSend;
         return n.beforeSend = function (e, t) {
            M.formData ? t.data = M.formData : t.data = r, o && o.call(this, e, t)
         }, q.ajax(n)
      }(l) : q.ajax(M), X.removeData("jqxhr").data("jqxhr", b);
      for (var j = 0; j < C.length; j++) C[j] = null;
      return this.trigger("form-submit-notify", [this, M]), this;

      function w(e) {
         var t, r, l, f, o, d, m, p, a, n, h, v, i = X[0],
            g = q.Deferred();
         if (g.abort = function (e) {
               p.abort(e)
            }, e)
            for (r = 0; r < C.length; r++) t = q(C[r]), _ ? t.prop("disabled", !1) : t.removeAttr("disabled");
         (l = q.extend(!0, {}, q.ajaxSettings, M)).context = l.context || l, o = "jqFormIO" + (new Date).getTime();
         var s = i.ownerDocument,
            u = X.closest("body");
         if (l.iframeTarget ? (n = (d = q(l.iframeTarget, s)).attr2("name")) ? o = n : d.attr2("name", o) : (d = q('<iframe name="' + o + '" src="' + l.iframeSrc + '" />', s)).css({
               position: "absolute",
               top: "-1000px",
               left: "-1000px"
            }), m = d[0], p = {
               aborted: 0,
               responseText: null,
               responseXML: null,
               status: 0,
               statusText: "n/a",
               getAllResponseHeaders: function () {},
               getResponseHeader: function () {},
               setRequestHeader: function () {},
               abort: function (e) {
                  var t = "timeout" === e ? "timeout" : "aborted";
                  N("aborting upload... " + t), this.aborted = 1;
                  try {
                     m.contentWindow.document.execCommand && m.contentWindow.document.execCommand("Stop")
                  } catch (e) {}
                  d.attr("src", l.iframeSrc), p.error = t, l.error && l.error.call(l.context, p, t, e), f && q.event.trigger("ajaxError", [p, l, t]), l.complete && l.complete.call(l.context, p, t)
               }
            }, (f = l.global) && 0 == q.active++ && q.event.trigger("ajaxStart"), f && q.event.trigger("ajaxSend", [p, l]), l.beforeSend && !1 === l.beforeSend.call(l.context, p, l)) return l.global && q.active--, g.reject(), g;
         if (p.aborted) return g.reject(), g;
         (a = i.clk) && (n = a.name) && !a.disabled && (l.extraData = l.extraData || {}, l.extraData[n] = a.value, "image" === a.type && (l.extraData[n + ".x"] = i.clk_x, l.extraData[n + ".y"] = i.clk_y));
         var x = 1,
            y = 2;

         function b(t) {
            var r = null;
            try {
               t.contentWindow && (r = t.contentWindow.document)
            } catch (e) {
               N("cannot get iframe.contentWindow document: " + e)
            }
            if (r) return r;
            try {
               r = t.contentDocument ? t.contentDocument : t.document
            } catch (e) {
               N("cannot get iframe.contentDocument: " + e), r = t.document
            }
            return r
         }
         var c = q("meta[name=csrf-token]").attr("content"),
            T = q("meta[name=csrf-param]").attr("content");

         function j() {
            var e = X.attr2("target"),
               t = X.attr2("action"),
               r = X.attr("enctype") || X.attr("encoding") || "multipart/form-data";
            i.setAttribute("target", o), O && !/post/i.test(O) || i.setAttribute("method", "POST"), t !== l.url && i.setAttribute("action", l.url), l.skipEncodingOverride || O && !/post/i.test(O) || X.attr({
               encoding: "multipart/form-data",
               enctype: "multipart/form-data"
            }), l.timeout && (v = setTimeout(function () {
               h = !0, A(x)
            }, l.timeout));
            var a = [];
            try {
               if (l.extraData)
                  for (var n in l.extraData) l.extraData.hasOwnProperty(n) && (q.isPlainObject(l.extraData[n]) && l.extraData[n].hasOwnProperty("name") && l.extraData[n].hasOwnProperty("value") ? a.push(q('<input type="hidden" name="' + l.extraData[n].name + '">', s).val(l.extraData[n].value).appendTo(i)[0]) : a.push(q('<input type="hidden" name="' + n + '">', s).val(l.extraData[n]).appendTo(i)[0]));
               l.iframeTarget || d.appendTo(u), m.attachEvent ? m.attachEvent("onload", A) : m.addEventListener("load", A, !1), setTimeout(function e() {
                  try {
                     var t = b(m).readyState;
                     N("state = " + t), t && "uninitialized" === t.toLowerCase() && setTimeout(e, 50)
                  } catch (e) {
                     N("Server abort: ", e, " (", e.name, ")"), A(y), v && clearTimeout(v), v = void 0
                  }
               }, 15);
               try {
                  i.submit()
               } catch (e) {
                  document.createElement("form").submit.apply(i)
               }
            } finally {
               i.setAttribute("action", t), i.setAttribute("enctype", r), e ? i.setAttribute("target", e) : X.removeAttr("target"), q(a).remove()
            }
         }
         T && c && (l.extraData = l.extraData || {}, l.extraData[T] = c), l.forceSync ? j() : setTimeout(j, 10);
         var w, S, k, D = 50;

         function A(e) {
            if (!p.aborted && !k) {
               if ((S = b(m)) || (N("cannot access response document"), e = y), e === x && p) return p.abort("timeout"), void g.reject(p, "timeout");
               if (e === y && p) return p.abort("server abort"), void g.reject(p, "error", "server abort");
               if (S && S.location.href !== l.iframeSrc || h) {
                  m.detachEvent ? m.detachEvent("onload", A) : m.removeEventListener("load", A, !1);
                  var t, r = "success";
                  try {
                     if (h) throw "timeout";
                     var a = "xml" === l.dataType || S.XMLDocument || q.isXMLDoc(S);
                     if (N("isXml=" + a), !a && window.opera && (null === S.body || !S.body.innerHTML) && --D) return N("requeing onLoad callback, DOM not available"), void setTimeout(A, 250);
                     var n = S.body ? S.body : S.documentElement;
                     p.responseText = n ? n.innerHTML : null, p.responseXML = S.XMLDocument ? S.XMLDocument : S, a && (l.dataType = "xml"), p.getResponseHeader = function (e) {
                        return {
                           "content-type": l.dataType
                        } [e.toLowerCase()]
                     }, n && (p.status = Number(n.getAttribute("status")) || p.status, p.statusText = n.getAttribute("statusText") || p.statusText);
                     var o, i, s, u = (l.dataType || "").toLowerCase(),
                        c = /(json|script|text)/.test(u);
                     c || l.textarea ? (o = S.getElementsByTagName("textarea")[0]) ? (p.responseText = o.value, p.status = Number(o.getAttribute("status")) || p.status, p.statusText = o.getAttribute("statusText") || p.statusText) : c && (i = S.getElementsByTagName("pre")[0], s = S.getElementsByTagName("body")[0], i ? p.responseText = i.textContent ? i.textContent : i.innerText : s && (p.responseText = s.textContent ? s.textContent : s.innerText)) : "xml" === u && !p.responseXML && p.responseText && (p.responseXML = F(p.responseText));
                     try {
                        w = E(p, u, l)
                     } catch (e) {
                        r = "parsererror", p.error = t = e || r
                     }
                  } catch (e) {
                     N("error caught: ", e), r = "error", p.error = t = e || r
                  }
                  p.aborted && (N("upload aborted"), r = null), p.status && (r = 200 <= p.status && p.status < 300 || 304 === p.status ? "success" : "error"), "success" === r ? (l.success && l.success.call(l.context, w, "success", p), g.resolve(p.responseText, "success", p), f && q.event.trigger("ajaxSuccess", [p, l])) : r && (void 0 === t && (t = p.statusText), l.error && l.error.call(l.context, p, r, t), g.reject(p, "error", t), f && q.event.trigger("ajaxError", [p, l, t])), f && q.event.trigger("ajaxComplete", [p, l]), f && !--q.active && q.event.trigger("ajaxStop"), l.complete && l.complete.call(l.context, p, r), k = !0, l.timeout && clearTimeout(v), setTimeout(function () {
                     l.iframeTarget ? d.attr("src", l.iframeSrc) : d.remove(), p.responseXML = null
                  }, 100)
               }
            }
         }
         var F = q.parseXML || function (e, t) {
               return window.ActiveXObject ? ((t = new ActiveXObject("Microsoft.XMLDOM")).async = "false", t.loadXML(e)) : t = (new DOMParser).parseFromString(e, "text/xml"), t && t.documentElement && "parsererror" !== t.documentElement.nodeName ? t : null
            },
            L = q.parseJSON || function (e) {
               return window.eval("(" + e + ")")
            },
            E = function (e, t, r) {
               var a = e.getResponseHeader("content-type") || "",
                  n = ("xml" === t || !t) && 0 <= a.indexOf("xml"),
                  o = n ? e.responseXML : e.responseText;
               return n && "parsererror" === o.documentElement.nodeName && q.error && q.error("parsererror"), r && r.dataFilter && (o = r.dataFilter(o, t)), "string" == typeof o && (("json" === t || !t) && 0 <= a.indexOf("json") ? o = L(o) : ("script" === t || !t) && 0 <= a.indexOf("javascript") && q.globalEval(o)), o
            };
         return g
      }
   }, q.fn.ajaxForm = function (e, t, r, a) {
      if (("string" == typeof e || !1 === e && 0 < arguments.length) && (e = {
            url: e,
            data: t,
            dataType: r
         }, "function" == typeof a && (e.success = a)), (e = e || {}).delegation = e.delegation && q.isFunction(q.fn.on), e.delegation || 0 !== this.length) return e.delegation ? (q(document).off("submit.form-plugin", this.selector, o).off("click.form-plugin", this.selector, i).on("submit.form-plugin", this.selector, e, o).on("click.form-plugin", this.selector, e, i), this) : (e.beforeFormUnbind && e.beforeFormUnbind(this, e), this.ajaxFormUnbind().on("submit.form-plugin", e, o).on("click.form-plugin", e, i));
      var n = {
         s: this.selector,
         c: this.context
      };
      return !q.isReady && n.s ? (N("DOM not ready, queuing ajaxForm"), q(function () {
         q(n.s, n.c).ajaxForm(e)
      })) : N("terminating; zero elements found by selector" + (q.isReady ? "" : " (DOM not ready)")), this
   }, q.fn.ajaxFormUnbind = function () {
      return this.off("submit.form-plugin click.form-plugin")
   }, q.fn.formToArray = function (e, t, r) {
      var a = [];
      if (0 === this.length) return a;
      var n, o, i, s, u, c, l, f, d, m, p = this[0],
         h = this.attr("id"),
         v = (v = e || void 0 === p.elements ? p.getElementsByTagName("*") : p.elements) && q.makeArray(v);
      if (h && (e || /(Edge|Trident)\//.test(navigator.userAgent)) && (n = q(':input[form="' + h + '"]').get()).length && (v = (v || []).concat(n)), !v || !v.length) return a;
      for (q.isFunction(r) && (v = q.map(v, r)), o = 0, c = v.length; o < c; o++)
         if ((m = (u = v[o]).name) && !u.disabled)
            if (e && p.clk && "image" === u.type) p.clk === u && (a.push({
               name: m,
               value: q(u).val(),
               type: u.type
            }), a.push({
               name: m + ".x",
               value: p.clk_x
            }, {
               name: m + ".y",
               value: p.clk_y
            }));
            else if ((s = q.fieldValue(u, !0)) && s.constructor === Array)
         for (t && t.push(u), i = 0, l = s.length; i < l; i++) a.push({
            name: m,
            value: s[i]
         });
      else if (S.fileapi && "file" === u.type) {
         t && t.push(u);
         var g = u.files;
         if (g.length)
            for (i = 0; i < g.length; i++) a.push({
               name: m,
               value: g[i],
               type: u.type
            });
         else a.push({
            name: m,
            value: "",
            type: u.type
         })
      } else null != s && (t && t.push(u), a.push({
         name: m,
         value: s,
         type: u.type,
         required: u.required
      }));
      return e || !p.clk || (m = (d = (f = q(p.clk))[0]).name) && !d.disabled && "image" === d.type && (a.push({
         name: m,
         value: f.val()
      }), a.push({
         name: m + ".x",
         value: p.clk_x
      }, {
         name: m + ".y",
         value: p.clk_y
      })), a
   }, q.fn.formSerialize = function (e) {
      return q.param(this.formToArray(e))
   }, q.fn.fieldSerialize = function (n) {
      var o = [];
      return this.each(function () {
         var e = this.name;
         if (e) {
            var t = q.fieldValue(this, n);
            if (t && t.constructor === Array)
               for (var r = 0, a = t.length; r < a; r++) o.push({
                  name: e,
                  value: t[r]
               });
            else null != t && o.push({
               name: this.name,
               value: t
            })
         }
      }), q.param(o)
   }, q.fn.fieldValue = function (e) {
      for (var t = [], r = 0, a = this.length; r < a; r++) {
         var n = this[r],
            o = q.fieldValue(n, e);
         null == o || o.constructor === Array && !o.length || (o.constructor === Array ? q.merge(t, o) : t.push(o))
      }
      return t
   }, q.fieldValue = function (e, t) {
      var r = e.name,
         a = e.type,
         n = e.tagName.toLowerCase();
      if (void 0 === t && (t = !0), t && (!r || e.disabled || "reset" === a || "button" === a || ("checkbox" === a || "radio" === a) && !e.checked || ("submit" === a || "image" === a) && e.form && e.form.clk !== e || "select" === n && -1 === e.selectedIndex)) return null;
      if ("select" !== n) return q(e).val().replace(m, "\r\n");
      var o = e.selectedIndex;
      if (o < 0) return null;
      for (var i = [], s = e.options, u = "select-one" === a, c = u ? o + 1 : s.length, l = u ? o : 0; l < c; l++) {
         var f = s[l];
         if (f.selected && !f.disabled) {
            var d = (d = f.value) || (f.attributes && f.attributes.value && !f.attributes.value.specified ? f.text : f.value);
            if (u) return d;
            i.push(d)
         }
      }
      return i
   }, q.fn.clearForm = function (e) {
      return this.each(function () {
         q("input,select,textarea", this).clearFields(e)
      })
   }, q.fn.clearFields = q.fn.clearInputs = function (r) {
      var a = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
      return this.each(function () {
         var e = this.type,
            t = this.tagName.toLowerCase();
         a.test(e) || "textarea" === t ? this.value = "" : "checkbox" === e || "radio" === e ? this.checked = !1 : "select" === t ? this.selectedIndex = -1 : "file" === e ? /MSIE/.test(navigator.userAgent) ? q(this).replaceWith(q(this).clone(!0)) : q(this).val("") : r && (!0 === r && /hidden/.test(e) || "string" == typeof r && q(this).is(r)) && (this.value = "")
      })
   }, q.fn.resetForm = function () {
      return this.each(function () {
         var t = q(this),
            e = this.tagName.toLowerCase();
         switch (e) {
            case "input":
               this.checked = this.defaultChecked;
            case "textarea":
               return this.value = this.defaultValue, !0;
            case "option":
            case "optgroup":
               var r = t.parents("select");
               return r.length && r[0].multiple ? "option" === e ? this.selected = this.defaultSelected : t.find("option").resetForm() : r.resetForm(), !0;
            case "select":
               return t.find("option").each(function (e) {
                  if (this.selected = this.defaultSelected, this.defaultSelected && !t[0].multiple) return t[0].selectedIndex = e, !1
               }), !0;
            case "label":
               var a = q(t.attr("for")),
                  n = t.find("input,select,textarea");
               return a[0] && n.unshift(a[0]), n.resetForm(), !0;
            case "form":
               return "function" != typeof this.reset && ("object" != typeof this.reset || this.reset.nodeType) || this.reset(), !0;
            default:
               return t.find("form,input,label,select,textarea").resetForm(), !0
         }
      })
   }, q.fn.enable = function (e) {
      return void 0 === e && (e = !0), this.each(function () {
         this.disabled = !e
      })
   }, q.fn.selected = function (r) {
      return void 0 === r && (r = !0), this.each(function () {
         var e, t = this.type;
         "checkbox" === t || "radio" === t ? this.checked = r : "option" === this.tagName.toLowerCase() && (e = q(this).parent("select"), r && e[0] && "select-one" === e[0].type && e.find("option").selected(!1), this.selected = r)
      })
   }, q.fn.ajaxSubmit.debug = !1
});
! function (e, t) {
   "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define.amd ? define(["exports"], t) : t((e = e || self).Popper = {})
}(this, (function (e) {
   function t(e) {
      return {
         width: (e = e.getBoundingClientRect()).width,
         height: e.height,
         top: e.top,
         right: e.right,
         bottom: e.bottom,
         left: e.left,
         x: e.left,
         y: e.top
      }
   }

   function n(e) {
      return "[object Window]" !== e.toString() ? (e = e.ownerDocument) && e.defaultView || window : e
   }

   function r(e) {
      return {
         scrollLeft: (e = n(e)).pageXOffset,
         scrollTop: e.pageYOffset
      }
   }

   function o(e) {
      return e instanceof n(e).Element || e instanceof Element
   }

   function i(e) {
      return e instanceof n(e).HTMLElement || e instanceof HTMLElement
   }

   function a(e) {
      return e ? (e.nodeName || "").toLowerCase() : null
   }

   function s(e) {
      return ((o(e) ? e.ownerDocument : e.document) || window.document).documentElement
   }

   function f(e) {
      return t(s(e)).left + r(e).scrollLeft
   }

   function c(e) {
      return n(e).getComputedStyle(e)
   }

   function p(e) {
      return e = c(e), /auto|scroll|overlay|hidden/.test(e.overflow + e.overflowY + e.overflowX)
   }

   function l(e, o, c) {
      void 0 === c && (c = !1);
      var l = s(o);
      e = t(e);
      var u = i(o),
         d = {
            scrollLeft: 0,
            scrollTop: 0
         },
         m = {
            x: 0,
            y: 0
         };
      return (u || !u && !c) && (("body" !== a(o) || p(l)) && (d = o !== n(o) && i(o) ? {
         scrollLeft: o.scrollLeft,
         scrollTop: o.scrollTop
      } : r(o)), i(o) ? ((m = t(o)).x += o.clientLeft, m.y += o.clientTop) : l && (m.x = f(l))), {
         x: e.left + d.scrollLeft - m.x,
         y: e.top + d.scrollTop - m.y,
         width: e.width,
         height: e.height
      }
   }

   function u(e) {
      return {
         x: e.offsetLeft,
         y: e.offsetTop,
         width: e.offsetWidth,
         height: e.offsetHeight
      }
   }

   function d(e) {
      return "html" === a(e) ? e : e.assignedSlot || e.parentNode || e.host || s(e)
   }

   function m(e, t) {
      void 0 === t && (t = []);
      var r = function e(t) {
         return 0 <= ["html", "body", "#document"].indexOf(a(t)) ? t.ownerDocument.body : i(t) && p(t) ? t : e(d(t))
      }(e);
      e = "body" === a(r);
      var o = n(r);
      return r = e ? [o].concat(o.visualViewport || [], p(r) ? r : []) : r, t = t.concat(r), e ? t : t.concat(m(d(r)))
   }

   function h(e) {
      if (!i(e) || "fixed" === c(e).position) return null;
      if (e = e.offsetParent) {
         var t = s(e);
         if ("body" === a(e) && "static" === c(e).position && "static" !== c(t).position) return t
      }
      return e
   }

   function g(e) {
      for (var t = n(e), r = h(e); r && 0 <= ["table", "td", "th"].indexOf(a(r)) && "static" === c(r).position;) r = h(r);
      if (r && "body" === a(r) && "static" === c(r).position) return t;
      if (!r) e: {
         for (e = d(e); i(e) && 0 > ["html", "body"].indexOf(a(e));) {
            if ("none" !== (r = c(e)).transform || "none" !== r.perspective || r.willChange && "auto" !== r.willChange) {
               r = e;
               break e
            }
            e = e.parentNode
         }
         r = null
      }
      return r || t
   }

   function v(e) {
      var t = new Map,
         n = new Set,
         r = [];
      return e.forEach((function (e) {
         t.set(e.name, e)
      })), e.forEach((function (e) {
         n.has(e.name) || function e(o) {
            n.add(o.name), [].concat(o.requires || [], o.requiresIfExists || []).forEach((function (r) {
               n.has(r) || (r = t.get(r)) && e(r)
            })), r.push(o)
         }(e)
      })), r
   }

   function b(e) {
      var t;
      return function () {
         return t || (t = new Promise((function (n) {
            Promise.resolve().then((function () {
               t = void 0, n(e())
            }))
         }))), t
      }
   }

   function y(e) {
      return e.split("-")[0]
   }

   function O(e, t) {
      var r, o = t.getRootNode && t.getRootNode();
      if (e.contains(t)) return !0;
      if ((r = o) && (r = o instanceof(r = n(o).ShadowRoot) || o instanceof ShadowRoot), r)
         do {
            if (t && e.isSameNode(t)) return !0;
            t = t.parentNode || t.host
         } while (t);
      return !1
   }

   function w(e) {
      return Object.assign(Object.assign({}, e), {}, {
         left: e.x,
         top: e.y,
         right: e.x + e.width,
         bottom: e.y + e.height
      })
   }

   function x(e, o) {
      if ("viewport" === o) {
         o = n(e);
         var a = s(e);
         o = o.visualViewport;
         var p = a.clientWidth;
         a = a.clientHeight;
         var l = 0,
            u = 0;
         o && (p = o.width, a = o.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (l = o.offsetLeft, u = o.offsetTop)), e = w(e = {
            width: p,
            height: a,
            x: l + f(e),
            y: u
         })
      } else i(o) ? ((e = t(o)).top += o.clientTop, e.left += o.clientLeft, e.bottom = e.top + o.clientHeight, e.right = e.left + o.clientWidth, e.width = o.clientWidth, e.height = o.clientHeight, e.x = e.left, e.y = e.top) : (u = s(e), e = s(u), l = r(u), o = u.ownerDocument.body, p = Math.max(e.scrollWidth, e.clientWidth, o ? o.scrollWidth : 0, o ? o.clientWidth : 0), a = Math.max(e.scrollHeight, e.clientHeight, o ? o.scrollHeight : 0, o ? o.clientHeight : 0), u = -l.scrollLeft + f(u), l = -l.scrollTop, "rtl" === c(o || e).direction && (u += Math.max(e.clientWidth, o ? o.clientWidth : 0) - p), e = w({
         width: p,
         height: a,
         x: u,
         y: l
      }));
      return e
   }

   function j(e, t, n) {
      return t = "clippingParents" === t ? function (e) {
         var t = m(d(e)),
            n = 0 <= ["absolute", "fixed"].indexOf(c(e).position) && i(e) ? g(e) : e;
         return o(n) ? t.filter((function (e) {
            return o(e) && O(e, n) && "body" !== a(e)
         })) : []
      }(e) : [].concat(t), (n = (n = [].concat(t, [n])).reduce((function (t, n) {
         return n = x(e, n), t.top = Math.max(n.top, t.top), t.right = Math.min(n.right, t.right), t.bottom = Math.min(n.bottom, t.bottom), t.left = Math.max(n.left, t.left), t
      }), x(e, n[0]))).width = n.right - n.left, n.height = n.bottom - n.top, n.x = n.left, n.y = n.top, n
   }

   function M(e) {
      return 0 <= ["top", "bottom"].indexOf(e) ? "x" : "y"
   }

   function E(e) {
      var t = e.reference,
         n = e.element,
         r = (e = e.placement) ? y(e) : null;
      e = e ? e.split("-")[1] : null;
      var o = t.x + t.width / 2 - n.width / 2,
         i = t.y + t.height / 2 - n.height / 2;
      switch (r) {
         case "top":
            o = {
               x: o,
               y: t.y - n.height
            };
            break;
         case "bottom":
            o = {
               x: o,
               y: t.y + t.height
            };
            break;
         case "right":
            o = {
               x: t.x + t.width,
               y: i
            };
            break;
         case "left":
            o = {
               x: t.x - n.width,
               y: i
            };
            break;
         default:
            o = {
               x: t.x,
               y: t.y
            }
      }
      if (null != (r = r ? M(r) : null)) switch (i = "y" === r ? "height" : "width", e) {
         case "start":
            o[r] = Math.floor(o[r]) - Math.floor(t[i] / 2 - n[i] / 2);
            break;
         case "end":
            o[r] = Math.floor(o[r]) + Math.ceil(t[i] / 2 - n[i] / 2)
      }
      return o
   }

   function D(e) {
      return Object.assign(Object.assign({}, {
         top: 0,
         right: 0,
         bottom: 0,
         left: 0
      }), e)
   }

   function P(e, t) {
      return t.reduce((function (t, n) {
         return t[n] = e, t
      }), {})
   }

   function L(e, n) {
      void 0 === n && (n = {});
      var r = n;
      n = void 0 === (n = r.placement) ? e.placement : n;
      var i = r.boundary,
         a = void 0 === i ? "clippingParents" : i,
         f = void 0 === (i = r.rootBoundary) ? "viewport" : i;
      i = void 0 === (i = r.elementContext) ? "popper" : i;
      var c = r.altBoundary,
         p = void 0 !== c && c;
      r = D("number" != typeof (r = void 0 === (r = r.padding) ? 0 : r) ? r : P(r, T));
      var l = e.elements.reference;
      c = e.rects.popper, a = j(o(p = e.elements[p ? "popper" === i ? "reference" : "popper" : i]) ? p : p.contextElement || s(e.elements.popper), a, f), p = E({
         reference: f = t(l),
         element: c,
         strategy: "absolute",
         placement: n
      }), c = w(Object.assign(Object.assign({}, c), p)), f = "popper" === i ? c : f;
      var u = {
         top: a.top - f.top + r.top,
         bottom: f.bottom - a.bottom + r.bottom,
         left: a.left - f.left + r.left,
         right: f.right - a.right + r.right
      };
      if (e = e.modifiersData.offset, "popper" === i && e) {
         var d = e[n];
         Object.keys(u).forEach((function (e) {
            var t = 0 <= ["right", "bottom"].indexOf(e) ? 1 : -1,
               n = 0 <= ["top", "bottom"].indexOf(e) ? "y" : "x";
            u[e] += d[n] * t
         }))
      }
      return u
   }

   function k() {
      for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
      return !t.some((function (e) {
         return !(e && "function" == typeof e.getBoundingClientRect)
      }))
   }

   function B(e) {
      void 0 === e && (e = {});
      var t = e.defaultModifiers,
         n = void 0 === t ? [] : t,
         r = void 0 === (e = e.defaultOptions) ? V : e;
      return function (e, t, i) {
         function a() {
            f.forEach((function (e) {
               return e()
            })), f = []
         }
         void 0 === i && (i = r);
         var s = {
               placement: "bottom",
               orderedModifiers: [],
               options: Object.assign(Object.assign({}, V), r),
               modifiersData: {},
               elements: {
                  reference: e,
                  popper: t
               },
               attributes: {},
               styles: {}
            },
            f = [],
            c = !1,
            p = {
               state: s,
               setOptions: function (i) {
                  return a(), s.options = Object.assign(Object.assign(Object.assign({}, r), s.options), i), s.scrollParents = {
                     reference: o(e) ? m(e) : e.contextElement ? m(e.contextElement) : [],
                     popper: m(t)
                  }, i = function (e) {
                     var t = v(e);
                     return N.reduce((function (e, n) {
                        return e.concat(t.filter((function (e) {
                           return e.phase === n
                        })))
                     }), [])
                  }(function (e) {
                     var t = e.reduce((function (e, t) {
                        var n = e[t.name];
                        return e[t.name] = n ? Object.assign(Object.assign(Object.assign({}, n), t), {}, {
                           options: Object.assign(Object.assign({}, n.options), t.options),
                           data: Object.assign(Object.assign({}, n.data), t.data)
                        }) : t, e
                     }), {});
                     return Object.keys(t).map((function (e) {
                        return t[e]
                     }))
                  }([].concat(n, s.options.modifiers))), s.orderedModifiers = i.filter((function (e) {
                     return e.enabled
                  })), s.orderedModifiers.forEach((function (e) {
                     var t = e.name,
                        n = e.options;
                     n = void 0 === n ? {} : n, "function" == typeof (e = e.effect) && (t = e({
                        state: s,
                        name: t,
                        instance: p,
                        options: n
                     }), f.push(t || function () {}))
                  })), p.update()
               },
               forceUpdate: function () {
                  if (!c) {
                     var e = s.elements,
                        t = e.reference;
                     if (k(t, e = e.popper))
                        for (s.rects = {
                              reference: l(t, g(e), "fixed" === s.options.strategy),
                              popper: u(e)
                           }, s.reset = !1, s.placement = s.options.placement, s.orderedModifiers.forEach((function (e) {
                              return s.modifiersData[e.name] = Object.assign({}, e.data)
                           })), t = 0; t < s.orderedModifiers.length; t++)
                           if (!0 === s.reset) s.reset = !1, t = -1;
                           else {
                              var n = s.orderedModifiers[t];
                              e = n.fn;
                              var r = n.options;
                              r = void 0 === r ? {} : r, n = n.name, "function" == typeof e && (s = e({
                                 state: s,
                                 options: r,
                                 name: n,
                                 instance: p
                              }) || s)
                           }
                  }
               },
               update: b((function () {
                  return new Promise((function (e) {
                     p.forceUpdate(), e(s)
                  }))
               })),
               destroy: function () {
                  a(), c = !0
               }
            };
         return k(e, t) ? (p.setOptions(i).then((function (e) {
            !c && i.onFirstUpdate && i.onFirstUpdate(e)
         })), p) : p
      }
   }

   function W(e) {
      var t, r = e.popper,
         o = e.popperRect,
         i = e.placement,
         a = e.offsets,
         f = e.position,
         c = e.gpuAcceleration,
         p = e.adaptive,
         l = window.devicePixelRatio || 1;
      e = Math.round(a.x * l) / l || 0, l = Math.round(a.y * l) / l || 0;
      var u = a.hasOwnProperty("x");
      a = a.hasOwnProperty("y");
      var d, m = "left",
         h = "top",
         v = window;
      if (p) {
         var b = g(r);
         b === n(r) && (b = s(r)), "top" === i && (h = "bottom", l -= b.clientHeight - o.height, l *= c ? 1 : -1), "left" === i && (m = "right", e -= b.clientWidth - o.width, e *= c ? 1 : -1)
      }
      return r = Object.assign({
         position: f
      }, p && z), c ? Object.assign(Object.assign({}, r), {}, ((d = {})[h] = a ? "0" : "", d[m] = u ? "0" : "", d.transform = 2 > (v.devicePixelRatio || 1) ? "translate(" + e + "px, " + l + "px)" : "translate3d(" + e + "px, " + l + "px, 0)", d)) : Object.assign(Object.assign({}, r), {}, ((t = {})[h] = a ? l + "px" : "", t[m] = u ? e + "px" : "", t.transform = "", t))
   }

   function A(e) {
      return e.replace(/left|right|bottom|top/g, (function (e) {
         return G[e]
      }))
   }

   function H(e) {
      return e.replace(/start|end/g, (function (e) {
         return J[e]
      }))
   }

   function R(e, t, n) {
      return void 0 === n && (n = {
         x: 0,
         y: 0
      }), {
         top: e.top - t.height - n.y,
         right: e.right - t.width + n.x,
         bottom: e.bottom - t.height + n.y,
         left: e.left - t.width - n.x
      }
   }

   function S(e) {
      return ["top", "right", "bottom", "left"].some((function (t) {
         return 0 <= e[t]
      }))
   }
   var T = ["top", "bottom", "right", "left"],
      q = T.reduce((function (e, t) {
         return e.concat([t + "-start", t + "-end"])
      }), []),
      C = [].concat(T, ["auto"]).reduce((function (e, t) {
         return e.concat([t, t + "-start", t + "-end"])
      }), []),
      N = "beforeRead read afterRead beforeMain main afterMain beforeWrite write afterWrite".split(" "),
      V = {
         placement: "bottom",
         modifiers: [],
         strategy: "absolute"
      },
      I = {
         passive: !0
      },
      _ = {
         name: "eventListeners",
         enabled: !0,
         phase: "write",
         fn: function () {},
         effect: function (e) {
            var t = e.state,
               r = e.instance,
               o = (e = e.options).scroll,
               i = void 0 === o || o,
               a = void 0 === (e = e.resize) || e,
               s = n(t.elements.popper),
               f = [].concat(t.scrollParents.reference, t.scrollParents.popper);
            return i && f.forEach((function (e) {
                  e.addEventListener("scroll", r.update, I)
               })), a && s.addEventListener("resize", r.update, I),
               function () {
                  i && f.forEach((function (e) {
                     e.removeEventListener("scroll", r.update, I)
                  })), a && s.removeEventListener("resize", r.update, I)
               }
         },
         data: {}
      },
      U = {
         name: "popperOffsets",
         enabled: !0,
         phase: "read",
         fn: function (e) {
            var t = e.state;
            t.modifiersData[e.name] = E({
               reference: t.rects.reference,
               element: t.rects.popper,
               strategy: "absolute",
               placement: t.placement
            })
         },
         data: {}
      },
      z = {
         top: "auto",
         right: "auto",
         bottom: "auto",
         left: "auto"
      },
      F = {
         name: "computeStyles",
         enabled: !0,
         phase: "beforeWrite",
         fn: function (e) {
            var t = e.state,
               n = e.options;
            e = void 0 === (e = n.gpuAcceleration) || e, n = void 0 === (n = n.adaptive) || n, e = {
               placement: y(t.placement),
               popper: t.elements.popper,
               popperRect: t.rects.popper,
               gpuAcceleration: e
            }, null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign(Object.assign({}, t.styles.popper), W(Object.assign(Object.assign({}, e), {}, {
               offsets: t.modifiersData.popperOffsets,
               position: t.options.strategy,
               adaptive: n
            })))), null != t.modifiersData.arrow && (t.styles.arrow = Object.assign(Object.assign({}, t.styles.arrow), W(Object.assign(Object.assign({}, e), {}, {
               offsets: t.modifiersData.arrow,
               position: "absolute",
               adaptive: !1
            })))), t.attributes.popper = Object.assign(Object.assign({}, t.attributes.popper), {}, {
               "data-popper-placement": t.placement
            })
         },
         data: {}
      },
      X = {
         name: "applyStyles",
         enabled: !0,
         phase: "write",
         fn: function (e) {
            var t = e.state;
            Object.keys(t.elements).forEach((function (e) {
               var n = t.styles[e] || {},
                  r = t.attributes[e] || {},
                  o = t.elements[e];
               i(o) && a(o) && (Object.assign(o.style, n), Object.keys(r).forEach((function (e) {
                  var t = r[e];
                  !1 === t ? o.removeAttribute(e) : o.setAttribute(e, !0 === t ? "" : t)
               })))
            }))
         },
         effect: function (e) {
            var t = e.state,
               n = {
                  popper: {
                     position: t.options.strategy,
                     left: "0",
                     top: "0",
                     margin: "0"
                  },
                  arrow: {
                     position: "absolute"
                  },
                  reference: {}
               };
            return Object.assign(t.elements.popper.style, n.popper), t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow),
               function () {
                  Object.keys(t.elements).forEach((function (e) {
                     var r = t.elements[e],
                        o = t.attributes[e] || {};
                     e = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce((function (e, t) {
                        return e[t] = "", e
                     }), {}), i(r) && a(r) && (Object.assign(r.style, e), Object.keys(o).forEach((function (e) {
                        r.removeAttribute(e)
                     })))
                  }))
               }
         },
         requires: ["computeStyles"]
      },
      Y = {
         name: "offset",
         enabled: !0,
         phase: "main",
         requires: ["popperOffsets"],
         fn: function (e) {
            var t = e.state,
               n = e.name,
               r = void 0 === (e = e.options.offset) ? [0, 0] : e,
               o = (e = C.reduce((function (e, n) {
                  var o = t.rects,
                     i = y(n),
                     a = 0 <= ["left", "top"].indexOf(i) ? -1 : 1,
                     s = "function" == typeof r ? r(Object.assign(Object.assign({}, o), {}, {
                        placement: n
                     })) : r;
                  return o = (o = s[0]) || 0, s = ((s = s[1]) || 0) * a, i = 0 <= ["left", "right"].indexOf(i) ? {
                     x: s,
                     y: o
                  } : {
                     x: o,
                     y: s
                  }, e[n] = i, e
               }), {}))[t.placement],
               i = o.x;
            o = o.y, null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += i, t.modifiersData.popperOffsets.y += o), t.modifiersData[n] = e
         }
      },
      G = {
         left: "right",
         right: "left",
         bottom: "top",
         top: "bottom"
      },
      J = {
         start: "end",
         end: "start"
      },
      K = {
         name: "flip",
         enabled: !0,
         phase: "main",
         fn: function (e) {
            var t = e.state,
               n = e.options;
            if (e = e.name, !t.modifiersData[e]._skip) {
               var r = n.mainAxis;
               r = void 0 === r || r;
               var o = n.altAxis;
               o = void 0 === o || o;
               var i = n.fallbackPlacements,
                  a = n.padding,
                  s = n.boundary,
                  f = n.rootBoundary,
                  c = n.altBoundary,
                  p = n.flipVariations,
                  l = void 0 === p || p,
                  u = n.allowedAutoPlacements;
               p = y(n = t.options.placement), i = i || (p !== n && l ? function (e) {
                  if ("auto" === y(e)) return [];
                  var t = A(e);
                  return [H(e), t, H(t)]
               }(n) : [A(n)]);
               var d = [n].concat(i).reduce((function (e, n) {
                  return e.concat("auto" === y(n) ? function (e, t) {
                     void 0 === t && (t = {});
                     var n = t.boundary,
                        r = t.rootBoundary,
                        o = t.padding,
                        i = t.flipVariations,
                        a = t.allowedAutoPlacements,
                        s = void 0 === a ? C : a,
                        f = t.placement.split("-")[1];
                     0 === (i = (t = f ? i ? q : q.filter((function (e) {
                        return e.split("-")[1] === f
                     })) : T).filter((function (e) {
                        return 0 <= s.indexOf(e)
                     }))).length && (i = t);
                     var c = i.reduce((function (t, i) {
                        return t[i] = L(e, {
                           placement: i,
                           boundary: n,
                           rootBoundary: r,
                           padding: o
                        })[y(i)], t
                     }), {});
                     return Object.keys(c).sort((function (e, t) {
                        return c[e] - c[t]
                     }))
                  }(t, {
                     placement: n,
                     boundary: s,
                     rootBoundary: f,
                     padding: a,
                     flipVariations: l,
                     allowedAutoPlacements: u
                  }) : n)
               }), []);
               n = t.rects.reference, i = t.rects.popper;
               var m = new Map;
               p = !0;
               for (var h = d[0], g = 0; g < d.length; g++) {
                  var v = d[g],
                     b = y(v),
                     O = "start" === v.split("-")[1],
                     w = 0 <= ["top", "bottom"].indexOf(b),
                     x = w ? "width" : "height",
                     j = L(t, {
                        placement: v,
                        boundary: s,
                        rootBoundary: f,
                        altBoundary: c,
                        padding: a
                     });
                  if (O = w ? O ? "right" : "left" : O ? "bottom" : "top", n[x] > i[x] && (O = A(O)), x = A(O), w = [], r && w.push(0 >= j[b]), o && w.push(0 >= j[O], 0 >= j[x]), w.every((function (e) {
                        return e
                     }))) {
                     h = v, p = !1;
                     break
                  }
                  m.set(v, w)
               }
               if (p)
                  for (r = function (e) {
                        var t = d.find((function (t) {
                           if (t = m.get(t)) return t.slice(0, e).every((function (e) {
                              return e
                           }))
                        }));
                        if (t) return h = t, "break"
                     }, o = l ? 3 : 1; 0 < o && "break" !== r(o); o--);
               t.placement !== h && (t.modifiersData[e]._skip = !0, t.placement = h, t.reset = !0)
            }
         },
         requiresIfExists: ["offset"],
         data: {
            _skip: !1
         }
      },
      Q = {
         name: "preventOverflow",
         enabled: !0,
         phase: "main",
         fn: function (e) {
            var t = e.state,
               n = e.options;
            e = e.name;
            var r = n.mainAxis,
               o = void 0 === r || r;
            r = void 0 !== (r = n.altAxis) && r;
            var i = n.tether;
            i = void 0 === i || i;
            var a = n.tetherOffset,
               s = void 0 === a ? 0 : a;
            n = L(t, {
               boundary: n.boundary,
               rootBoundary: n.rootBoundary,
               padding: n.padding,
               altBoundary: n.altBoundary
            }), a = y(t.placement);
            var f = t.placement.split("-")[1],
               c = !f,
               p = M(a);
            a = "x" === p ? "y" : "x";
            var l = t.modifiersData.popperOffsets,
               d = t.rects.reference,
               m = t.rects.popper,
               h = "function" == typeof s ? s(Object.assign(Object.assign({}, t.rects), {}, {
                  placement: t.placement
               })) : s;
            if (s = {
                  x: 0,
                  y: 0
               }, l) {
               if (o) {
                  var v = "y" === p ? "top" : "left",
                     b = "y" === p ? "bottom" : "right",
                     O = "y" === p ? "height" : "width";
                  o = l[p];
                  var w = l[p] + n[v],
                     x = l[p] - n[b],
                     j = i ? -m[O] / 2 : 0,
                     E = "start" === f ? d[O] : m[O];
                  f = "start" === f ? -m[O] : -d[O], m = t.elements.arrow, m = i && m ? u(m) : {
                     width: 0,
                     height: 0
                  };
                  var D = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
                     top: 0,
                     right: 0,
                     bottom: 0,
                     left: 0
                  };
                  v = D[v], b = D[b], m = Math.max(0, Math.min(d[O], m[O])), E = c ? d[O] / 2 - j - m - v - h : E - m - v - h, c = c ? -d[O] / 2 + j + m + b + h : f + m + b + h, h = t.elements.arrow && g(t.elements.arrow), d = t.modifiersData.offset ? t.modifiersData.offset[t.placement][p] : 0, h = l[p] + E - d - (h ? "y" === p ? h.clientTop || 0 : h.clientLeft || 0 : 0), c = l[p] + c - d, i = Math.max(i ? Math.min(w, h) : w, Math.min(o, i ? Math.max(x, c) : x)), l[p] = i, s[p] = i - o
               }
               r && (r = l[a], i = Math.max(r + n["x" === p ? "top" : "left"], Math.min(r, r - n["x" === p ? "bottom" : "right"])), l[a] = i, s[a] = i - r), t.modifiersData[e] = s
            }
         },
         requiresIfExists: ["offset"]
      },
      Z = {
         name: "arrow",
         enabled: !0,
         phase: "main",
         fn: function (e) {
            var t, n = e.state;
            e = e.name;
            var r = n.elements.arrow,
               o = n.modifiersData.popperOffsets,
               i = y(n.placement),
               a = M(i);
            if (i = 0 <= ["left", "right"].indexOf(i) ? "height" : "width", r && o) {
               var s = n.modifiersData[e + "#persistent"].padding,
                  f = u(r),
                  c = "y" === a ? "top" : "left",
                  p = "y" === a ? "bottom" : "right",
                  l = n.rects.reference[i] + n.rects.reference[a] - o[a] - n.rects.popper[i];
               o = o[a] - n.rects.reference[a], l = (r = (r = g(r)) ? "y" === a ? r.clientHeight || 0 : r.clientWidth || 0 : 0) / 2 - f[i] / 2 + (l / 2 - o / 2), i = Math.max(s[c], Math.min(l, r - f[i] - s[p])), n.modifiersData[e] = ((t = {})[a] = i, t.centerOffset = i - l, t)
            }
         },
         effect: function (e) {
            var t = e.state,
               n = e.options;
            e = e.name;
            var r = n.element;
            if (r = void 0 === r ? "[data-popper-arrow]" : r, n = void 0 === (n = n.padding) ? 0 : n, null != r) {
               if ("string" == typeof r && !(r = t.elements.popper.querySelector(r))) return;
               O(t.elements.popper, r) && (t.elements.arrow = r, t.modifiersData[e + "#persistent"] = {
                  padding: D("number" != typeof n ? n : P(n, T))
               })
            }
         },
         requires: ["popperOffsets"],
         requiresIfExists: ["preventOverflow"]
      },
      $ = {
         name: "hide",
         enabled: !0,
         phase: "main",
         requiresIfExists: ["preventOverflow"],
         fn: function (e) {
            var t = e.state;
            e = e.name;
            var n = t.rects.reference,
               r = t.rects.popper,
               o = t.modifiersData.preventOverflow,
               i = L(t, {
                  elementContext: "reference"
               }),
               a = L(t, {
                  altBoundary: !0
               });
            n = R(i, n), r = R(a, r, o), o = S(n), a = S(r), t.modifiersData[e] = {
               referenceClippingOffsets: n,
               popperEscapeOffsets: r,
               isReferenceHidden: o,
               hasPopperEscaped: a
            }, t.attributes.popper = Object.assign(Object.assign({}, t.attributes.popper), {}, {
               "data-popper-reference-hidden": o,
               "data-popper-escaped": a
            })
         }
      },
      ee = B({
         defaultModifiers: [_, U, F, X]
      }),
      te = [_, U, F, X, Y, K, Q, Z, $],
      ne = B({
         defaultModifiers: te
      });
   e.applyStyles = X, e.arrow = Z, e.computeStyles = F, e.createPopper = ne, e.createPopperLite = ee, e.defaultModifiers = te, e.detectOverflow = L, e.eventListeners = _, e.flip = K, e.hide = $, e.offset = Y, e.popperGenerator = B, e.popperOffsets = U, e.preventOverflow = Q, Object.defineProperty(e, "__esModule", {
      value: !0
   })
}));
! function (t, e) {
   "object" == typeof exports && "undefined" != typeof module ? module.exports = e(require("@popperjs/core")) : "function" == typeof define && define.amd ? define(["@popperjs/core"], e) : (t = t || self).tippy = e(t.Popper)
}(this, (function (t) {
   "use strict";
   var e = {
      passive: !0,
      capture: !0
   };

   function n(t, e, n) {
      if (Array.isArray(t)) {
         var r = t[e];
         return null == r ? Array.isArray(n) ? n[e] : n : r
      }
      return t
   }

   function r(t, e) {
      var n = {}.toString.call(t);
      return 0 === n.indexOf("[object") && n.indexOf(e + "]") > -1
   }

   function i(t, e) {
      return "function" == typeof t ? t.apply(void 0, e) : t
   }

   function o(t, e) {
      return 0 === e ? t : function (r) {
         clearTimeout(n), n = setTimeout((function () {
            t(r)
         }), e)
      };
      var n
   }

   function a(t, e) {
      var n = Object.assign({}, t);
      return e.forEach((function (t) {
         delete n[t]
      })), n
   }

   function s(t) {
      return [].concat(t)
   }

   function u(t, e) {
      -1 === t.indexOf(e) && t.push(e)
   }

   function c(t) {
      return t.split("-")[0]
   }

   function p(t) {
      return [].slice.call(t)
   }

   function f() {
      return document.createElement("div")
   }

   function l(t) {
      return ["Element", "Fragment"].some((function (e) {
         return r(t, e)
      }))
   }

   function d(t) {
      return r(t, "MouseEvent")
   }

   function v(t) {
      return !(!t || !t._tippy || t._tippy.reference !== t)
   }

   function m(t) {
      return l(t) ? [t] : function (t) {
         return r(t, "NodeList")
      }(t) ? p(t) : Array.isArray(t) ? t : p(document.querySelectorAll(t))
   }

   function g(t, e) {
      t.forEach((function (t) {
         t && (t.style.transitionDuration = e + "ms")
      }))
   }

   function h(t, e) {
      t.forEach((function (t) {
         t && t.setAttribute("data-state", e)
      }))
   }

   function b(t) {
      var e = s(t)[0];
      return e && e.ownerDocument || document
   }

   function y(t, e, n) {
      var r = e + "EventListener";
      ["transitionend", "webkitTransitionEnd"].forEach((function (e) {
         t[r](e, n)
      }))
   }
   var w = {
         isTouch: !1
      },
      E = 0;

   function T() {
      w.isTouch || (w.isTouch = !0, window.performance && document.addEventListener("mousemove", C))
   }

   function C() {
      var t = performance.now();
      t - E < 20 && (w.isTouch = !1, document.removeEventListener("mousemove", C)), E = t
   }

   function x() {
      var t = document.activeElement;
      if (v(t)) {
         var e = t._tippy;
         t.blur && !e.state.isVisible && t.blur()
      }
   }
   var A = "undefined" != typeof window && "undefined" != typeof document ? navigator.userAgent : "",
      O = /MSIE |Trident\//.test(A),
      L = Object.assign({
         appendTo: function () {
            return document.body
         },
         aria: {
            content: "auto",
            expanded: "auto"
         },
         delay: 0,
         duration: [300, 250],
         getReferenceClientRect: null,
         hideOnClick: !0,
         ignoreAttributes: !1,
         interactive: !1,
         interactiveBorder: 2,
         interactiveDebounce: 0,
         moveTransition: "",
         offset: [0, 10],
         onAfterUpdate: function () {},
         onBeforeUpdate: function () {},
         onCreate: function () {},
         onDestroy: function () {},
         onHidden: function () {},
         onHide: function () {},
         onMount: function () {},
         onShow: function () {},
         onShown: function () {},
         onTrigger: function () {},
         onUntrigger: function () {},
         onClickOutside: function () {},
         placement: "top",
         plugins: [],
         popperOptions: {},
         render: null,
         showOnCreate: !1,
         touch: !0,
         trigger: "mouseenter focus",
         triggerTarget: null
      }, {
         animateFill: !1,
         followCursor: !1,
         inlinePositioning: !1,
         sticky: !1
      }, {}, {
         allowHTML: !1,
         animation: "fade",
         arrow: !0,
         content: "",
         inertia: !1,
         maxWidth: 350,
         role: "tooltip",
         theme: "",
         zIndex: 9999
      }),
      D = Object.keys(L);

   function k(t) {
      var e = (t.plugins || []).reduce((function (e, n) {
         var r = n.name,
            i = n.defaultValue;
         return r && (e[r] = void 0 !== t[r] ? t[r] : i), e
      }), {});
      return Object.assign({}, t, {}, e)
   }

   function R(t, e) {
      var n = Object.assign({}, e, {
         content: i(e.content, [t])
      }, e.ignoreAttributes ? {} : function (t, e) {
         return (e ? Object.keys(k(Object.assign({}, L, {
            plugins: e
         }))) : D).reduce((function (e, n) {
            var r = (t.getAttribute("data-tippy-" + n) || "").trim();
            if (!r) return e;
            if ("content" === n) e[n] = r;
            else try {
               e[n] = JSON.parse(r)
            } catch (t) {
               e[n] = r
            }
            return e
         }), {})
      }(t, e.plugins));
      return n.aria = Object.assign({}, L.aria, {}, n.aria), n.aria = {
         expanded: "auto" === n.aria.expanded ? e.interactive : n.aria.expanded,
         content: "auto" === n.aria.content ? e.interactive ? null : "describedby" : n.aria.content
      }, n
   }

   function M(t, e) {
      t.innerHTML = e
   }

   function P(t) {
      var e = f();
      return !0 === t ? e.className = "tippy-arrow" : (e.className = "tippy-svg-arrow", l(t) ? e.appendChild(t) : M(e, t)), e
   }

   function V(t, e) {
      l(e.content) ? (M(t, ""), t.appendChild(e.content)) : "function" != typeof e.content && (e.allowHTML ? M(t, e.content) : t.textContent = e.content)
   }

   function j(t) {
      var e = t.firstElementChild,
         n = p(e.children);
      return {
         box: e,
         content: n.find((function (t) {
            return t.classList.contains("tippy-content")
         })),
         arrow: n.find((function (t) {
            return t.classList.contains("tippy-arrow") || t.classList.contains("tippy-svg-arrow")
         })),
         backdrop: n.find((function (t) {
            return t.classList.contains("tippy-backdrop")
         }))
      }
   }

   function I(t) {
      var e = f(),
         n = f();
      n.className = "tippy-box", n.setAttribute("data-state", "hidden"), n.setAttribute("tabindex", "-1");
      var r = f();

      function i(n, r) {
         var i = j(e),
            o = i.box,
            a = i.content,
            s = i.arrow;
         r.theme ? o.setAttribute("data-theme", r.theme) : o.removeAttribute("data-theme"), "string" == typeof r.animation ? o.setAttribute("data-animation", r.animation) : o.removeAttribute("data-animation"), r.inertia ? o.setAttribute("data-inertia", "") : o.removeAttribute("data-inertia"), o.style.maxWidth = "number" == typeof r.maxWidth ? r.maxWidth + "px" : r.maxWidth, r.role ? o.setAttribute("role", r.role) : o.removeAttribute("role"), n.content === r.content && n.allowHTML === r.allowHTML || V(a, t.props), r.arrow ? s ? n.arrow !== r.arrow && (o.removeChild(s), o.appendChild(P(r.arrow))) : o.appendChild(P(r.arrow)) : s && o.removeChild(s)
      }
      return r.className = "tippy-content", r.setAttribute("data-state", "hidden"), V(r, t.props), e.appendChild(n), n.appendChild(r), i(t.props, t.props), {
         popper: e,
         onUpdate: i
      }
   }
   I.$$tippy = !0;
   var S = 1,
      B = [],
      H = [];

   function N(r, a) {
      var l, v, m, E, T, C, x, A, D, M = R(r, Object.assign({}, L, {}, k((l = a, Object.keys(l).reduce((function (t, e) {
            return void 0 !== l[e] && (t[e] = l[e]), t
         }), {}))))),
         P = !1,
         V = !1,
         I = !1,
         N = !1,
         U = [],
         _ = o(bt, M.interactiveDebounce),
         F = S++,
         W = (D = M.plugins).filter((function (t, e) {
            return D.indexOf(t) === e
         })),
         X = {
            id: F,
            reference: r,
            popper: f(),
            popperInstance: null,
            props: M,
            state: {
               isEnabled: !0,
               isVisible: !1,
               isDestroyed: !1,
               isMounted: !1,
               isShown: !1
            },
            plugins: W,
            clearDelayTimeouts: function () {
               clearTimeout(v), clearTimeout(m), cancelAnimationFrame(E)
            },
            setProps: function (t) {
               if (X.state.isDestroyed) return;
               it("onBeforeUpdate", [X, t]), gt();
               var e = X.props,
                  n = R(r, Object.assign({}, X.props, {}, t, {
                     ignoreAttributes: !0
                  }));
               X.props = n, mt(), e.interactiveDebounce !== n.interactiveDebounce && (st(), _ = o(bt, n.interactiveDebounce));
               e.triggerTarget && !n.triggerTarget ? s(e.triggerTarget).forEach((function (t) {
                  t.removeAttribute("aria-expanded")
               })) : n.triggerTarget && r.removeAttribute("aria-expanded");
               at(), rt(), q && q(e, n);
               X.popperInstance && (Tt(), xt().forEach((function (t) {
                  requestAnimationFrame(t._tippy.popperInstance.forceUpdate)
               })));
               it("onAfterUpdate", [X, t])
            },
            setContent: function (t) {
               X.setProps({
                  content: t
               })
            },
            show: function () {
               var t = X.state.isVisible,
                  e = X.state.isDestroyed,
                  r = !X.state.isEnabled,
                  o = w.isTouch && !X.props.touch,
                  a = n(X.props.duration, 0, L.duration);
               if (t || e || r || o) return;
               if (Z().hasAttribute("disabled")) return;
               if (it("onShow", [X], !1), !1 === X.props.onShow(X)) return;
               X.state.isVisible = !0, Q() && ($.style.visibility = "visible");
               rt(), ft(), X.state.isMounted || ($.style.transition = "none");
               if (Q()) {
                  var s = et(),
                     c = s.box,
                     p = s.content;
                  g([c, p], 0)
               }
               x = function () {
                     if (X.state.isVisible && !N) {
                        if (N = !0, $.offsetHeight, $.style.transition = X.props.moveTransition, Q() && X.props.animation) {
                           var t = et(),
                              e = t.box,
                              n = t.content;
                           g([e, n], a), h([e, n], "visible")
                        }
                        ot(), at(), u(H, X), X.state.isMounted = !0, it("onMount", [X]), X.props.animation && Q() && function (t, e) {
                           dt(t, e)
                        }(a, (function () {
                           X.state.isShown = !0, it("onShown", [X])
                        }))
                     }
                  },
                  function () {
                     var t, e = X.props.appendTo,
                        n = Z();
                     t = X.props.interactive && e === L.appendTo || "parent" === e ? n.parentNode : i(e, [n]);
                     t.contains($) || t.appendChild($);
                     Tt()
                  }()
            },
            hide: function () {
               var t = !X.state.isVisible,
                  e = X.state.isDestroyed,
                  r = !X.state.isEnabled,
                  i = n(X.props.duration, 1, L.duration);
               if (t || e || r) return;
               if (it("onHide", [X], !1), !1 === X.props.onHide(X)) return;
               X.state.isVisible = !1, X.state.isShown = !1, N = !1, P = !1, Q() && ($.style.visibility = "hidden");
               if (st(), lt(), rt(), Q()) {
                  var o = et(),
                     a = o.box,
                     s = o.content;
                  X.props.animation && (g([a, s], i), h([a, s], "hidden"))
               }
               ot(), at(), X.props.animation ? Q() && function (t, e) {
                  dt(t, (function () {
                     !X.state.isVisible && $.parentNode && $.parentNode.contains($) && e()
                  }))
               }(i, X.unmount) : X.unmount()
            },
            hideWithInteractivity: function (t) {
               tt().addEventListener("mousemove", _), u(B, _), _(t)
            },
            enable: function () {
               X.state.isEnabled = !0
            },
            disable: function () {
               X.hide(), X.state.isEnabled = !1
            },
            unmount: function () {
               X.state.isVisible && X.hide();
               if (!X.state.isMounted) return;
               Ct(), xt().forEach((function (t) {
                  t._tippy.unmount()
               })), $.parentNode && $.parentNode.removeChild($);
               H = H.filter((function (t) {
                  return t !== X
               })), X.state.isMounted = !1, it("onHidden", [X])
            },
            destroy: function () {
               if (X.state.isDestroyed) return;
               X.clearDelayTimeouts(), X.unmount(), gt(), delete r._tippy, X.state.isDestroyed = !0, it("onDestroy", [X])
            }
         };
      if (!M.render) return X;
      var Y = M.render(X),
         $ = Y.popper,
         q = Y.onUpdate;
      $.setAttribute("data-tippy-root", ""), $.id = "tippy-" + X.id, X.popper = $, r._tippy = X, $._tippy = X;
      var z = W.map((function (t) {
            return t.fn(X)
         })),
         J = r.hasAttribute("aria-expanded");
      return mt(), at(), rt(), it("onCreate", [X]), M.showOnCreate && At(), $.addEventListener("mouseenter", (function () {
         X.props.interactive && X.state.isVisible && X.clearDelayTimeouts()
      })), $.addEventListener("mouseleave", (function (t) {
         X.props.interactive && X.props.trigger.indexOf("mouseenter") >= 0 && (tt().addEventListener("mousemove", _), _(t))
      })), X;

      function G() {
         var t = X.props.touch;
         return Array.isArray(t) ? t : [t, 0]
      }

      function K() {
         return "hold" === G()[0]
      }

      function Q() {
         var t;
         return !!(null == (t = X.props.render) ? void 0 : t.$$tippy)
      }

      function Z() {
         return A || r
      }

      function tt() {
         var t = Z().parentNode;
         return t ? b(t) : document
      }

      function et() {
         return j($)
      }

      function nt(t) {
         return X.state.isMounted && !X.state.isVisible || w.isTouch || T && "focus" === T.type ? 0 : n(X.props.delay, t ? 0 : 1, L.delay)
      }

      function rt() {
         $.style.pointerEvents = X.props.interactive && X.state.isVisible ? "" : "none", $.style.zIndex = "" + X.props.zIndex
      }

      function it(t, e, n) {
         var r;
         (void 0 === n && (n = !0), z.forEach((function (n) {
            n[t] && n[t].apply(void 0, e)
         })), n) && (r = X.props)[t].apply(r, e)
      }

      function ot() {
         var t = X.props.aria;
         if (t.content) {
            var e = "aria-" + t.content,
               n = $.id;
            s(X.props.triggerTarget || r).forEach((function (t) {
               var r = t.getAttribute(e);
               if (X.state.isVisible) t.setAttribute(e, r ? r + " " + n : n);
               else {
                  var i = r && r.replace(n, "").trim();
                  i ? t.setAttribute(e, i) : t.removeAttribute(e)
               }
            }))
         }
      }

      function at() {
         !J && X.props.aria.expanded && s(X.props.triggerTarget || r).forEach((function (t) {
            X.props.interactive ? t.setAttribute("aria-expanded", X.state.isVisible && t === Z() ? "true" : "false") : t.removeAttribute("aria-expanded")
         }))
      }

      function st() {
         tt().removeEventListener("mousemove", _), B = B.filter((function (t) {
            return t !== _
         }))
      }

      function ut(t) {
         if (!(w.isTouch && (I || "mousedown" === t.type) || X.props.interactive && $.contains(t.target))) {
            if (Z().contains(t.target)) {
               if (w.isTouch) return;
               if (X.state.isVisible && X.props.trigger.indexOf("click") >= 0) return
            } else it("onClickOutside", [X, t]);
            !0 === X.props.hideOnClick && (X.clearDelayTimeouts(), X.hide(), V = !0, setTimeout((function () {
               V = !1
            })), X.state.isMounted || lt())
         }
      }

      function ct() {
         I = !0
      }

      function pt() {
         I = !1
      }

      function ft() {
         var t = tt();
         t.addEventListener("mousedown", ut, !0), t.addEventListener("touchend", ut, e), t.addEventListener("touchstart", pt, e), t.addEventListener("touchmove", ct, e)
      }

      function lt() {
         var t = tt();
         t.removeEventListener("mousedown", ut, !0), t.removeEventListener("touchend", ut, e), t.removeEventListener("touchstart", pt, e), t.removeEventListener("touchmove", ct, e)
      }

      function dt(t, e) {
         var n = et().box;

         function r(t) {
            t.target === n && (y(n, "remove", r), e())
         }
         if (0 === t) return e();
         y(n, "remove", C), y(n, "add", r), C = r
      }

      function vt(t, e, n) {
         void 0 === n && (n = !1), s(X.props.triggerTarget || r).forEach((function (r) {
            r.addEventListener(t, e, n), U.push({
               node: r,
               eventType: t,
               handler: e,
               options: n
            })
         }))
      }

      function mt() {
         var t;
         K() && (vt("touchstart", ht, {
            passive: !0
         }), vt("touchend", yt, {
            passive: !0
         })), (t = X.props.trigger, t.split(/\s+/).filter(Boolean)).forEach((function (t) {
            if ("manual" !== t) switch (vt(t, ht), t) {
               case "mouseenter":
                  vt("mouseleave", yt);
                  break;
               case "focus":
                  vt(O ? "focusout" : "blur", wt);
                  break;
               case "focusin":
                  vt("focusout", wt)
            }
         }))
      }

      function gt() {
         U.forEach((function (t) {
            var e = t.node,
               n = t.eventType,
               r = t.handler,
               i = t.options;
            e.removeEventListener(n, r, i)
         })), U = []
      }

      function ht(t) {
         var e, n = !1;
         if (X.state.isEnabled && !Et(t) && !V) {
            var r = "focus" === (null == (e = T) ? void 0 : e.type);
            T = t, A = t.currentTarget, at(), !X.state.isVisible && d(t) && B.forEach((function (e) {
               return e(t)
            })), "click" === t.type && (X.props.trigger.indexOf("mouseenter") < 0 || P) && !1 !== X.props.hideOnClick && X.state.isVisible ? n = !0 : At(t), "click" === t.type && (P = !n), n && !r && Ot(t)
         }
      }

      function bt(t) {
         var e = t.target,
            n = Z().contains(e) || $.contains(e);
         "mousemove" === t.type && n || function (t, e) {
            var n = e.clientX,
               r = e.clientY;
            return t.every((function (t) {
               var e = t.popperRect,
                  i = t.popperState,
                  o = t.props.interactiveBorder,
                  a = c(i.placement),
                  s = i.modifiersData.offset;
               if (!s) return !0;
               var u = "bottom" === a ? s.top.y : 0,
                  p = "top" === a ? s.bottom.y : 0,
                  f = "right" === a ? s.left.x : 0,
                  l = "left" === a ? s.right.x : 0,
                  d = e.top - r + u > o,
                  v = r - e.bottom - p > o,
                  m = e.left - n + f > o,
                  g = n - e.right - l > o;
               return d || v || m || g
            }))
         }(xt().concat($).map((function (t) {
            var e, n = null == (e = t._tippy.popperInstance) ? void 0 : e.state;
            return n ? {
               popperRect: t.getBoundingClientRect(),
               popperState: n,
               props: M
            } : null
         })).filter(Boolean), t) && (st(), Ot(t))
      }

      function yt(t) {
         Et(t) || X.props.trigger.indexOf("click") >= 0 && P || (X.props.interactive ? X.hideWithInteractivity(t) : Ot(t))
      }

      function wt(t) {
         X.props.trigger.indexOf("focusin") < 0 && t.target !== Z() || X.props.interactive && t.relatedTarget && $.contains(t.relatedTarget) || Ot(t)
      }

      function Et(t) {
         return !!w.isTouch && K() !== t.type.indexOf("touch") >= 0
      }

      function Tt() {
         Ct();
         var e = X.props,
            n = e.popperOptions,
            i = e.placement,
            o = e.offset,
            a = e.getReferenceClientRect,
            s = e.moveTransition,
            u = Q() ? j($).arrow : null,
            c = a ? {
               getBoundingClientRect: a,
               contextElement: a.contextElement || Z()
            } : r,
            p = [{
               name: "offset",
               options: {
                  offset: o
               }
            }, {
               name: "preventOverflow",
               options: {
                  padding: {
                     top: 2,
                     bottom: 2,
                     left: 5,
                     right: 5
                  }
               }
            }, {
               name: "flip",
               options: {
                  padding: 5
               }
            }, {
               name: "computeStyles",
               options: {
                  adaptive: !s
               }
            }, {
               name: "$$tippy",
               enabled: !0,
               phase: "beforeWrite",
               requires: ["computeStyles"],
               fn: function (t) {
                  var e = t.state;
                  if (Q()) {
                     var n = et().box;
                     ["placement", "reference-hidden", "escaped"].forEach((function (t) {
                        "placement" === t ? n.setAttribute("data-placement", e.placement) : e.attributes.popper["data-popper-" + t] ? n.setAttribute("data-" + t, "") : n.removeAttribute("data-" + t)
                     })), e.attributes.popper = {}
                  }
               }
            }];
         Q() && u && p.push({
            name: "arrow",
            options: {
               element: u,
               padding: 3
            }
         }), p.push.apply(p, (null == n ? void 0 : n.modifiers) || []), X.popperInstance = t.createPopper(c, $, Object.assign({}, n, {
            placement: i,
            onFirstUpdate: x,
            modifiers: p
         }))
      }

      function Ct() {
         X.popperInstance && (X.popperInstance.destroy(), X.popperInstance = null)
      }

      function xt() {
         return p($.querySelectorAll("[data-tippy-root]"))
      }

      function At(t) {
         X.clearDelayTimeouts(), t && it("onTrigger", [X, t]), ft();
         var e = nt(!0),
            n = G(),
            r = n[0],
            i = n[1];
         w.isTouch && "hold" === r && i && (e = i), e ? v = setTimeout((function () {
            X.show()
         }), e) : X.show()
      }

      function Ot(t) {
         if (X.clearDelayTimeouts(), it("onUntrigger", [X, t]), X.state.isVisible) {
            if (!(X.props.trigger.indexOf("mouseenter") >= 0 && X.props.trigger.indexOf("click") >= 0 && ["mouseleave", "mousemove"].indexOf(t.type) >= 0 && P)) {
               var e = nt(!1);
               e ? m = setTimeout((function () {
                  X.state.isVisible && X.hide()
               }), e) : E = requestAnimationFrame((function () {
                  X.hide()
               }))
            }
         } else lt()
      }
   }

   function U(t, n) {
      void 0 === n && (n = {});
      var r = L.plugins.concat(n.plugins || []);
      document.addEventListener("touchstart", T, e), window.addEventListener("blur", x);
      var i = Object.assign({}, n, {
            plugins: r
         }),
         o = m(t).reduce((function (t, e) {
            var n = e && N(e, i);
            return n && t.push(n), t
         }), []);
      return l(t) ? o[0] : o
   }
   U.defaultProps = L, U.setDefaultProps = function (t) {
      Object.keys(t).forEach((function (e) {
         L[e] = t[e]
      }))
   }, U.currentInput = w;
   var _ = {
      mouseover: "mouseenter",
      focusin: "focus",
      click: "click"
   };
   var F = {
      name: "animateFill",
      defaultValue: !1,
      fn: function (t) {
         var e;
         if (!(null == (e = t.props.render) ? void 0 : e.$$tippy)) return {};
         var n = j(t.popper),
            r = n.box,
            i = n.content,
            o = t.props.animateFill ? function () {
               var t = f();
               return t.className = "tippy-backdrop", h([t], "hidden"), t
            }() : null;
         return {
            onCreate: function () {
               o && (r.insertBefore(o, r.firstElementChild), r.setAttribute("data-animatefill", ""), r.style.overflow = "hidden", t.setProps({
                  arrow: !1,
                  animation: "shift-away"
               }))
            },
            onMount: function () {
               if (o) {
                  var t = r.style.transitionDuration,
                     e = Number(t.replace("ms", ""));
                  i.style.transitionDelay = Math.round(e / 10) + "ms", o.style.transitionDuration = t, h([o], "visible")
               }
            },
            onShow: function () {
               o && (o.style.transitionDuration = "0ms")
            },
            onHide: function () {
               o && h([o], "hidden")
            }
         }
      }
   };
   var W = {
         clientX: 0,
         clientY: 0
      },
      X = [];

   function Y(t) {
      var e = t.clientX,
         n = t.clientY;
      W = {
         clientX: e,
         clientY: n
      }
   }
   var $ = {
      name: "followCursor",
      defaultValue: !1,
      fn: function (t) {
         var e = t.reference,
            n = b(t.props.triggerTarget || e),
            r = !1,
            i = !1,
            o = !0,
            a = t.props;

         function s() {
            return "initial" === t.props.followCursor && t.state.isVisible
         }

         function u() {
            n.addEventListener("mousemove", f)
         }

         function c() {
            n.removeEventListener("mousemove", f)
         }

         function p() {
            r = !0, t.setProps({
               getReferenceClientRect: null
            }), r = !1
         }

         function f(n) {
            var r = !n.target || e.contains(n.target),
               i = t.props.followCursor,
               o = n.clientX,
               a = n.clientY,
               s = e.getBoundingClientRect(),
               u = o - s.left,
               c = a - s.top;
            !r && t.props.interactive || t.setProps({
               getReferenceClientRect: function () {
                  var t = e.getBoundingClientRect(),
                     n = o,
                     r = a;
                  "initial" === i && (n = t.left + u, r = t.top + c);
                  var s = "horizontal" === i ? t.top : r,
                     p = "vertical" === i ? t.right : n,
                     f = "horizontal" === i ? t.bottom : r,
                     l = "vertical" === i ? t.left : n;
                  return {
                     width: p - l,
                     height: f - s,
                     top: s,
                     right: p,
                     bottom: f,
                     left: l
                  }
               }
            })
         }

         function l() {
            t.props.followCursor && (X.push({
               instance: t,
               doc: n
            }), function (t) {
               t.addEventListener("mousemove", Y)
            }(n))
         }

         function v() {
            0 === (X = X.filter((function (e) {
               return e.instance !== t
            }))).filter((function (t) {
               return t.doc === n
            })).length && function (t) {
               t.removeEventListener("mousemove", Y)
            }(n)
         }
         return {
            onCreate: l,
            onDestroy: v,
            onBeforeUpdate: function () {
               a = t.props
            },
            onAfterUpdate: function (e, n) {
               var o = n.followCursor;
               r || void 0 !== o && a.followCursor !== o && (v(), o ? (l(), !t.state.isMounted || i || s() || u()) : (c(), p()))
            },
            onMount: function () {
               t.props.followCursor && !i && (o && (f(W), o = !1), s() || u())
            },
            onTrigger: function (t, e) {
               d(e) && (W = {
                  clientX: e.clientX,
                  clientY: e.clientY
               }), i = "focus" === e.type
            },
            onHidden: function () {
               t.props.followCursor && (p(), c(), o = !0)
            }
         }
      }
   };
   var q = {
      name: "inlinePositioning",
      defaultValue: !1,
      fn: function (t) {
         var e, n = t.reference;
         var r = -1,
            i = !1,
            o = {
               name: "tippyInlinePositioning",
               enabled: !0,
               phase: "afterWrite",
               fn: function (i) {
                  var o = i.state;
                  t.props.inlinePositioning && (e !== o.placement && t.setProps({
                     getReferenceClientRect: function () {
                        return function (t) {
                           return function (t, e, n, r) {
                              if (n.length < 2 || null === t) return e;
                              if (2 === n.length && r >= 0 && n[0].left > n[1].right) return n[r] || e;
                              switch (t) {
                                 case "top":
                                 case "bottom":
                                    var i = n[0],
                                       o = n[n.length - 1],
                                       a = "top" === t,
                                       s = i.top,
                                       u = o.bottom,
                                       c = a ? i.left : o.left,
                                       p = a ? i.right : o.right;
                                    return {
                                       top: s, bottom: u, left: c, right: p, width: p - c, height: u - s
                                    };
                                 case "left":
                                 case "right":
                                    var f = Math.min.apply(Math, n.map((function (t) {
                                          return t.left
                                       }))),
                                       l = Math.max.apply(Math, n.map((function (t) {
                                          return t.right
                                       }))),
                                       d = n.filter((function (e) {
                                          return "left" === t ? e.left === f : e.right === l
                                       })),
                                       v = d[0].top,
                                       m = d[d.length - 1].bottom;
                                    return {
                                       top: v, bottom: m, left: f, right: l, width: l - f, height: m - v
                                    };
                                 default:
                                    return e
                              }
                           }(c(t), n.getBoundingClientRect(), p(n.getClientRects()), r)
                        }(o.placement)
                     }
                  }), e = o.placement)
               }
            };

         function a() {
            var e;
            i || (e = function (t, e) {
               var n;
               return {
                  popperOptions: Object.assign({}, t.popperOptions, {
                     modifiers: [].concat(((null == (n = t.popperOptions) ? void 0 : n.modifiers) || []).filter((function (t) {
                        return t.name !== e.name
                     })), [e])
                  })
               }
            }(t.props, o), i = !0, t.setProps(e), i = !1)
         }
         return {
            onCreate: a,
            onAfterUpdate: a,
            onTrigger: function (e, n) {
               if (d(n)) {
                  var i = p(t.reference.getClientRects()),
                     o = i.find((function (t) {
                        return t.left - 2 <= n.clientX && t.right + 2 >= n.clientX && t.top - 2 <= n.clientY && t.bottom + 2 >= n.clientY
                     }));
                  r = i.indexOf(o)
               }
            },
            onUntrigger: function () {
               r = -1
            }
         }
      }
   };
   var z = {
      name: "sticky",
      defaultValue: !1,
      fn: function (t) {
         var e = t.reference,
            n = t.popper;

         function r(e) {
            return !0 === t.props.sticky || t.props.sticky === e
         }
         var i = null,
            o = null;

         function a() {
            var s = r("reference") ? (t.popperInstance ? t.popperInstance.state.elements.reference : e).getBoundingClientRect() : null,
               u = r("popper") ? n.getBoundingClientRect() : null;
            (s && J(i, s) || u && J(o, u)) && t.popperInstance && t.popperInstance.update(), i = s, o = u, t.state.isMounted && requestAnimationFrame(a)
         }
         return {
            onMount: function () {
               t.props.sticky && a()
            }
         }
      }
   };

   function J(t, e) {
      return !t || !e || (t.top !== e.top || t.right !== e.right || t.bottom !== e.bottom || t.left !== e.left)
   }
   return U.setDefaultProps({
      plugins: [F, $, q, z],
      render: I
   }), U.createSingleton = function (t, e) {
      void 0 === e && (e = {});
      var n, r = t,
         i = [],
         o = e.overrides,
         s = [];

      function u() {
         i = r.map((function (t) {
            return t.reference
         }))
      }

      function c(t) {
         r.forEach((function (e) {
            t ? e.enable() : e.disable()
         }))
      }

      function p(t) {
         return r.map((function (e) {
            var r = e.setProps;
            return e.setProps = function (i) {
                  r(i), e.reference === n && t.setProps(i)
               },
               function () {
                  e.setProps = r
               }
         }))
      }
      c(!1), u();
      var l = {
            fn: function () {
               return {
                  onDestroy: function () {
                     c(!0)
                  },
                  onTrigger: function (t, e) {
                     var a = e.currentTarget,
                        s = i.indexOf(a);
                     if (a !== n) {
                        n = a;
                        var u = (o || []).concat("content").reduce((function (t, e) {
                           return t[e] = r[s].props[e], t
                        }), {});
                        t.setProps(Object.assign({}, u, {
                           getReferenceClientRect: "function" == typeof u.getReferenceClientRect ? u.getReferenceClientRect : function () {
                              return a.getBoundingClientRect()
                           }
                        }))
                     }
                  }
               }
            }
         },
         d = U(f(), Object.assign({}, a(e, ["overrides"]), {
            plugins: [l].concat(e.plugins || []),
            triggerTarget: i
         })),
         v = d.setProps;
      return d.setProps = function (t) {
         o = t.overrides || o, v(t)
      }, d.setInstances = function (t) {
         c(!0), s.forEach((function (t) {
            return t()
         })), r = t, c(!1), u(), p(d), d.setProps({
            triggerTarget: i
         })
      }, s = p(d), d
   }, U.delegate = function (t, e) {
      var n = [],
         r = [],
         i = !1,
         o = e.target,
         u = a(e, ["target"]),
         c = Object.assign({}, u, {
            trigger: "manual",
            touch: !1
         }),
         p = Object.assign({}, u, {
            showOnCreate: !0
         }),
         f = U(t, c);

      function l(t) {
         if (t.target && !i) {
            var n = t.target.closest(o);
            if (n) {
               var a = n.getAttribute("data-tippy-trigger") || e.trigger || L.trigger;
               if (!n._tippy && !("touchstart" === t.type && "boolean" == typeof p.touch || "touchstart" !== t.type && a.indexOf(_[t.type]) < 0)) {
                  var s = U(n, p);
                  s && (r = r.concat(s))
               }
            }
         }
      }

      function d(t, e, r, i) {
         void 0 === i && (i = !1), t.addEventListener(e, r, i), n.push({
            node: t,
            eventType: e,
            handler: r,
            options: i
         })
      }
      return s(f).forEach((function (t) {
         var e = t.destroy,
            o = t.enable,
            a = t.disable;
         t.destroy = function (t) {
               void 0 === t && (t = !0), t && r.forEach((function (t) {
                  t.destroy()
               })), r = [], n.forEach((function (t) {
                  var e = t.node,
                     n = t.eventType,
                     r = t.handler,
                     i = t.options;
                  e.removeEventListener(n, r, i)
               })), n = [], e()
            }, t.enable = function () {
               o(), r.forEach((function (t) {
                  return t.enable()
               })), i = !1
            }, t.disable = function () {
               a(), r.forEach((function (t) {
                  return t.disable()
               })), i = !0
            },
            function (t) {
               var e = t.reference;
               d(e, "touchstart", l), d(e, "mouseover", l), d(e, "focusin", l), d(e, "click", l)
            }(t)
      })), f
   }, U.hideAll = function (t) {
      var e = void 0 === t ? {} : t,
         n = e.exclude,
         r = e.duration;
      H.forEach((function (t) {
         var e = !1;
         if (n && (e = v(n) ? t.reference === n : t.popper === n.popper), !e) {
            var i = t.props.duration;
            t.setProps({
               duration: r
            }), t.hide(), t.state.isDestroyed || t.setProps({
               duration: i
            })
         }
      }))
   }, U.roundArrow = '<svg width="16" height="6" xmlns="http://www.w3.org/2000/svg"><path d="M0 6s1.796-.013 4.67-3.615C5.851.9 6.93.006 8 0c1.07-.006 2.148.887 3.343 2.385C14.233 6.005 16 6 16 6H0z"></svg>', U
}));