$(document).ready(function() {
  "use strict"; // Start of use strict


  /***************** DROPDOWN BUTTON ******************/
  $("[data-dropdown='true']").on('click',function(e) {
    $(this).toggleClass( "dropdown-opened" );

    let posTop = $(this).offset().top + $(this).outerHeight(true);
    let posLeft = 85;

    $(this).children('.dropdown-content').css({
      "top": posTop + "px",
      "right": posLeft + "px"
    });
  });

  $(window).on('click',function(e) {
    if (!event.target.matches("button")) {
      $('.dropdown.dropdown-opened').each(function(){
        $(this).removeClass( 'dropdown-opened' );
      });
    }
  });


  /***************** TOGGLE THE SIDE NAVIGATION ******************/
  $("#sidebarToggle").on('click',function(e) {
    e.preventDefault();
    $(".page-app-sidebar").toggleClass("toggled");
  });


  /***************** PREVENT THE CONTENT WRAPPER FROM SCROLLING WHEN THE FIXED SIDE NAVIGATION HOVERED OVER ******************/
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });


  /***************** SCROLL TO TOP BUTTON APPEAR ******************/
  $(document).on('scroll',function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });


  /***************** SMOOTH SCROLLING USING JQUERY EASING ******************/
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });


  /***************** MASK - CPF ******************/
  if ( $( ".mask-cpf" ).length ) {
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
  }


  /***************** MASK - DATE ******************/
  if ( $( ".mask-date" ).length ) {
    $('.mask-date').datepicker({
      orientation: "bottom auto",
      language: "pt-BR",
      autoclose: true,
      todayHighlight: true
    });
  }

  /***************** DATA TABLE ******************/
  try {
    $.extend( true, $.fn.dataTable.defaults, {
      "dom": '<"top">rt' + "<'table-footer'<'table-footer-length'l><'table-footer-paginate'p>>" + '<"clear">',
      "ordering": false,
      "paging":   false,
      "searching": false,
      "info":     false,
      "responsive": true,
      "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json" },
      "language": {
        "lengthMenu": '<select>'+
          '<option value="10">10 registros</option>'+
          '<option value="25">25 registros</option>'+
          '<option value="50">50 registros</option>'+
          '<option value="100">100 registros</option>'+
          '<option value="-1">Todos os registros</option>'+
          '</select>'
      }
    });
  } catch (e) {}
});


