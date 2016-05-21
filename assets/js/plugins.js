/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );


/**
 * sidebarEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
 var SidebarMenuEffects = (function() {

     function hasParentClass(e, classname) {
         if (e === document) return false;
         if (classie.has(e, classname)) {
             return true;
         }
         return e.parentNode && hasParentClass(e.parentNode, classname);
     }

     // http://coveroverflow.com/a/11381730/989439
     function mobilecheck() {
         var check = false;
         (function(a) {
             if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
         })(navigator.userAgent || navigator.vendor || window.opera);
         return check;
     }

     function init() {

         var container = document.getElementById( 'page' ),
             closeMenu = document.getElementById('closemenu'),
             buttons = Array.prototype.slice.call(document.querySelectorAll('.mobile-menu-button')),
             // Event type (if mobile use touch events)
             eventtype = mobilecheck() ? 'touchstart' : 'click',
             resetMenu = function() {
                 classie.remove(container, 'st-menu-open');
             },
             bodyClickFn = function(evt) {
                 if (!hasParentClass(evt.target, 'st-menu')) {
                     resetMenu();
                     document.removeEventListener(eventtype, bodyClickFn);
                 }
             },
             closeMenuClickFn = function(evt) {
                 resetMenu();
                 document.removeEventListener(eventtype, closeMenuClickFn);
             }

         buttons.forEach(function(el, i) {
             var effect = el.getAttribute('data-effect');

             el.addEventListener(eventtype, function(ev) {
                 ev.stopPropagation();
                 ev.preventDefault();
                 container.className = 'site'; // clear
                 classie.add(container, effect);
                 setTimeout(function() {
                     classie.add(container, 'st-menu-open');
                 }, 25);
                 document.addEventListener(eventtype, bodyClickFn);
                 closeMenu.addEventListener(eventtype, closeMenuClickFn);
             });
         });

     }

     init();

 })();


 // Sticky Plugin v1.0.4 for jQuery
 // =============
 // Author: Anthony Garand
 // Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
 // Improvements by Leonardo C. Daronco (daronco)
 // Created: 02/14/2011
 // Date: 07/20/2015
 // Website: http://stickyjs.com/
 // Description: Makes an element on the page stick on the screen as you scroll
 //              It will only set the 'top' and 'position' of your element, you
 //              might need to adjust the width in some cases.

 (function (factory) {
     if (typeof define === 'function' && define.amd) {
         // AMD. Register as an anonymous module.
         define(['jquery'], factory);
     } else if (typeof module === 'object' && module.exports) {
         // Node/CommonJS
         module.exports = factory(require('jquery'));
     } else {
         // Browser globals
         factory(jQuery);
     }
 }(function ($) {
     var slice = Array.prototype.slice; // save ref to original slice()
     var splice = Array.prototype.splice; // save ref to original slice()

   var defaults = {
       topSpacing: 0,
       bottomSpacing: 0,
       className: 'is-sticky',
       wrapperClassName: 'sticky-wrapper',
       center: false,
       getWidthFrom: '',
       widthFromWrapper: true, // works only when .getWidthFrom is empty
       responsiveWidth: false,
       zIndex: 'auto'
     },
     $window = $(window),
     $document = $(document),
     sticked = [],
     windowHeight = $window.height(),
     scroller = function() {
       var scrollTop = $window.scrollTop(),
         documentHeight = $document.height(),
         dwh = documentHeight - windowHeight,
         extra = (scrollTop > dwh) ? dwh - scrollTop : 0;

       for (var i = 0, l = sticked.length; i < l; i++) {
         var s = sticked[i],
           elementTop = s.stickyWrapper.offset().top,
           etse = elementTop - s.topSpacing - extra;

         //update height in case of dynamic content
         s.stickyWrapper.css('height', s.stickyElement.outerHeight());

         if (scrollTop <= etse) {
           if (s.currentTop !== null) {
             s.stickyElement
               .css({
                 'width': '',
                 'position': '',
                 'top': '',
                 'z-index': ''
               });
             s.stickyElement.parent().removeClass(s.className);
             s.stickyElement.trigger('sticky-end', [s]);
             s.currentTop = null;
           }
         }
         else {
           var newTop = documentHeight - s.stickyElement.outerHeight()
             - s.topSpacing - s.bottomSpacing - scrollTop - extra;
           if (newTop < 0) {
             newTop = newTop + s.topSpacing;
           } else {
             newTop = s.topSpacing;
           }
           if (s.currentTop !== newTop) {
             var newWidth;
             if (s.getWidthFrom) {
                 newWidth = $(s.getWidthFrom).width() || null;
             } else if (s.widthFromWrapper) {
                 newWidth = s.stickyWrapper.width();
             }
             if (newWidth == null) {
                 newWidth = s.stickyElement.width();
             }
             s.stickyElement
               .css('width', newWidth)
               .css('position', 'fixed')
               .css('top', newTop)
               .css('z-index', s.zIndex);

             s.stickyElement.parent().addClass(s.className);

             if (s.currentTop === null) {
               s.stickyElement.trigger('sticky-start', [s]);
             } else {
               // sticky is started but it have to be repositioned
               s.stickyElement.trigger('sticky-update', [s]);
             }

             if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {
               // just reached bottom || just started to stick but bottom is already reached
               s.stickyElement.trigger('sticky-bottom-reached', [s]);
             } else if(s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {
               // sticky is started && sticked at topSpacing && overflowing from top just finished
               s.stickyElement.trigger('sticky-bottom-unreached', [s]);
             }

             s.currentTop = newTop;
           }

           // Check if sticky has reached end of container and stop sticking
           var stickyWrapperContainer = s.stickyWrapper.parent();
           var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);

           if( unstick ) {
             s.stickyElement
               .css('position', 'absolute')
               .css('top', '')
               .css('bottom', 0)
               .css('z-index', '');
           } else {
             s.stickyElement
               .css('position', 'fixed')
               .css('top', newTop)
               .css('bottom', '')
               .css('z-index', s.zIndex);
           }
         }
       }
     },
     resizer = function() {
       windowHeight = $window.height();

       for (var i = 0, l = sticked.length; i < l; i++) {
         var s = sticked[i];
         var newWidth = null;
         if (s.getWidthFrom) {
             if (s.responsiveWidth) {
                 newWidth = $(s.getWidthFrom).width();
             }
         } else if(s.widthFromWrapper) {
             newWidth = s.stickyWrapper.width();
         }
         if (newWidth != null) {
             s.stickyElement.css('width', newWidth);
         }
       }
     },
     methods = {
       init: function(options) {
         var o = $.extend({}, defaults, options);
         return this.each(function() {
           var stickyElement = $(this);

           var stickyId = stickyElement.attr('id');
           var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
           var wrapper = $('<div></div>')
             .attr('id', wrapperId)
             .addClass(o.wrapperClassName);

           stickyElement.wrapAll(wrapper);

           var stickyWrapper = stickyElement.parent();

           if (o.center) {
             stickyWrapper.css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
           }

           if (stickyElement.css("float") === "right") {
             stickyElement.css({"float":"none"}).parent().css({"float":"right"});
           }

           o.stickyElement = stickyElement;
           o.stickyWrapper = stickyWrapper;
           o.currentTop    = null;

           sticked.push(o);

           methods.setWrapperHeight(this);
           methods.setupChangeListeners(this);
         });
       },

       setWrapperHeight: function(stickyElement) {
         var element = $(stickyElement);
         var stickyWrapper = element.parent();
         if (stickyWrapper) {
           stickyWrapper.css('height', element.outerHeight());
         }
       },

       setupChangeListeners: function(stickyElement) {
         if (window.MutationObserver) {
           var mutationObserver = new window.MutationObserver(function(mutations) {
             if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {
               methods.setWrapperHeight(stickyElement);
             }
           });
           mutationObserver.observe(stickyElement, {subtree: true, childList: true});
         } else {
           stickyElement.addEventListener('DOMNodeInserted', function() {
             methods.setWrapperHeight(stickyElement);
           }, false);
           stickyElement.addEventListener('DOMNodeRemoved', function() {
             methods.setWrapperHeight(stickyElement);
           }, false);
         }
       },
       update: scroller,
       unstick: function(options) {
         return this.each(function() {
           var that = this;
           var unstickyElement = $(that);

           var removeIdx = -1;
           var i = sticked.length;
           while (i-- > 0) {
             if (sticked[i].stickyElement.get(0) === that) {
                 splice.call(sticked,i,1);
                 removeIdx = i;
             }
           }
           if(removeIdx !== -1) {
             unstickyElement.unwrap();
             unstickyElement
               .css({
                 'width': '',
                 'position': '',
                 'top': '',
                 'float': '',
                 'z-index': ''
               })
             ;
           }
         });
       }
     };

   // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
   if (window.addEventListener) {
     window.addEventListener('scroll', scroller, false);
     window.addEventListener('resize', resizer, false);
   } else if (window.attachEvent) {
     window.attachEvent('onscroll', scroller);
     window.attachEvent('onresize', resizer);
   }

   $.fn.sticky = function(method) {
     if (methods[method]) {
       return methods[method].apply(this, slice.call(arguments, 1));
     } else if (typeof method === 'object' || !method ) {
       return methods.init.apply( this, arguments );
     } else {
       $.error('Method ' + method + ' does not exist on jQuery.sticky');
     }
   };

   $.fn.unstick = function(method) {
     if (methods[method]) {
       return methods[method].apply(this, slice.call(arguments, 1));
     } else if (typeof method === 'object' || !method ) {
       return methods.unstick.apply( this, arguments );
     } else {
       $.error('Method ' + method + ' does not exist on jQuery.sticky');
     }
   };
   $(function() {
     setTimeout(scroller, 0);
   });
 }));
