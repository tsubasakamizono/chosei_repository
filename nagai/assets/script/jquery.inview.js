(function (factory) {
    if (typeof define == 'function' && define.amd) {
      // AMD
      define(['jquery'], factory);
    } else if (typeof exports === 'object') {
      // Node, CommonJS
      module.exports = factory(require('jquery'));
    } else {
        // Browser globals
      factory(jQuery);
    }
  }(function ($) {
  
    var inviewObjects = [], viewportSize, viewportOffset,
        d = document, w = window, documentElement = d.documentElement, timer;
  
    $.event.special.inview = {
      add: function(data) {
        inviewObjects.push({ data: data, $element: $(this), element: this });
        if (!timer && inviewObjects.length) {
           timer = setInterval(checkInView, 250);
        }
      },
  
      remove: function(data) {
        for (var i=0; i<inviewObjects.length; i++) {
          var inviewObject = inviewObjects[i];
          if (inviewObject.element === this && inviewObject.data.guid === data.guid) {
            inviewObjects.splice(i, 1);
            break;
          }
        }
  
        if (!inviewObjects.length) {
           clearInterval(timer);
           timer = null;
        }
      }
    };
  
    function getViewportSize() {
      var mode, domObject, size = { height: w.innerHeight, width: w.innerWidth };
  
      // if this is correct then return it. iPad has compat Mode, so will
      // go into check clientHeight/clientWidth (which has the wrong value).
      if (!size.height) {
        mode = d.compatMode;
        if (mode || !$.support.boxModel) { // IE, Gecko
          domObject = mode === 'CSS1Compat' ?
            documentElement : // Standards
            d.body; // Quirks
          size = {
            height: domObject.clientHeight,
            width:  domObject.clientWidth
          };
        }
      }
  
      return size;
    }
  
    function getViewportOffset() {
      return {
        top:  w.pageYOffset || documentElement.scrollTop   || d.body.scrollTop,
        left: w.pageXOffset || documentElement.scrollLeft  || d.body.scrollLeft
      };
    }
  
    function checkInView() {
      if (!inviewObjects.length) {
        return;
      }
  
      var i = 0, $elements = $.map(inviewObjects, function(inviewObject) {
        var selector  = inviewObject.data.selector,
            $element  = inviewObject.$element;
        return selector ? $element.find(selector) : $element;
      });
  
      viewportSize   = viewportSize   || getViewportSize();
      viewportOffset = viewportOffset || getViewportOffset();
  
      for (; i<inviewObjects.length; i++) {
        // Ignore elements that are not in the DOM tree
        if (!$.contains(documentElement, $elements[i][0])) {
          continue;
        }
  
        var $element      = $($elements[i]),
            elementSize   = { height: $element[0].offsetHeight, width: $element[0].offsetWidth },
            elementOffset = $element.offset(),
            inView        = $element.data('inview');
  
        if (!viewportOffset || !viewportSize) {
          return;
        }
  
        if (elementOffset.top + elementSize.height > viewportOffset.top &&
            elementOffset.top < viewportOffset.top + viewportSize.height &&
            elementOffset.left + elementSize.width > viewportOffset.left &&
            elementOffset.left < viewportOffset.left + viewportSize.width) {
          if (!inView) {
            $element.data('inview', true).trigger('inview', [true]);
          }
        } else if (inView) {
          $element.data('inview', false).trigger('inview', [false]);
        }
      }
    }
  
    $(w).on("scroll resize scrollstop", function() {
      viewportSize = viewportOffset = null;
    });
  
    // IE < 9 scrolls to focused elements without firing the "scroll" event
    if (!documentElement.addEventListener && documentElement.attachEvent) {
      documentElement.attachEvent("onfocusin", function() {
        viewportOffset = null;
      });
    }
  }));