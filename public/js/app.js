/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  "use strict"; // Start of use strict


  /***************** DROPDOWN BUTTON ******************/

  $("[data-dropdown='true']").on('click', function (e) {
    $(this).toggleClass("dropdown-opened");

    var posTop = $(this).offset().top + $(this).outerHeight(true);
    var posLeft = 85;

    $(this).children('.dropdown-content').css({
      "top": posTop + "px",
      "right": posLeft + "px"
    });
  });

  $(window).on('click', function (e) {
    if (!event.target.matches("button")) {
      $('.dropdown.dropdown-opened').each(function () {
        $(this).removeClass('dropdown-opened');
      });
    }
  });

  /***************** TOGGLE THE SIDE NAVIGATION ******************/
  $("#sidebarToggle").on('click', function (e) {
    e.preventDefault();
    $(".page-app-sidebar").toggleClass("toggled");
  });

  /***************** PREVENT THE CONTENT WRAPPER FROM SCROLLING WHEN THE FIXED SIDE NAVIGATION HOVERED OVER ******************/
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  /***************** SCROLL TO TOP BUTTON APPEAR ******************/
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  /***************** SMOOTH SCROLLING USING JQUERY EASING ******************/
  $(document).on('click', 'a.scroll-to-top', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });

  /***************** MASK - CPF ******************/
  if ($(".mask-cpf").length) {
    $('.mask-cpf').mask('000.000.000-00', { reverse: true });
  }

  /***************** MASK - DATE ******************/
  if ($(".mask-date").length) {
    $('.mask-date').datepicker({
      orientation: "bottom auto",
      language: "pt-BR",
      autoclose: true,
      todayHighlight: true
    });
  }

  /***************** DATA TABLE ******************/
  try {
    $.extend(true, $.fn.dataTable.defaults, _defineProperty({
      "dom": '<"top">rt' + "<'table-footer'<'table-footer-length'l><'table-footer-paginate'p>>" + '<"clear">',
      "ordering": false,
      "paging": false,
      "searching": false,
      "info": false,
      "responsive": true,
      "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json" }
    }, "language", {
      "lengthMenu": '<select>' + '<option value="10">10 registros</option>' + '<option value="25">25 registros</option>' + '<option value="50">50 registros</option>' + '<option value="100">100 registros</option>' + '<option value="-1">Todos os registros</option>' + '</select>'
    }));
  } catch (e) {}
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);