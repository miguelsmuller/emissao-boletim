let mix = require('laravel-mix');

mix.scripts([
      'node_modules/jquery/dist/jquery.min.js',
      'node_modules/select2/dist/js/select2.full.min.js',
      'node_modules/moment/min/moment-with-locales.min.js',
      'node_modules/jquery.easing/jquery.easing.min.js',
      'node_modules/chart.js/dist/Chart.min.js',
      'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js'
   ], 'public/js/vendor.js')
   .scripts([
      'node_modules/datatables.net/js/jquery.dataTables.min.js',
      'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
      'node_modules/datatables.net-buttons/js/buttons.print.min.js',
      'node_modules/datatables.net-buttons/js/buttons.colVis.min.js',
      'node_modules/datatables.net-buttons/js/buttons.flash.min.js',
      'node_modules/datatables.net-buttons/js/buttons.html5.min.js',

      'node_modules/jszip/dist/jszip.min.js',
      'node_modules/pdfmake/build/pdfmake.min.js',

      'node_modules/datatables.net-autofill/js/dataTables.autoFill.min.js',
      'node_modules/datatables.net-colreorder/js/dataTables.colReorder.min.js',
      'node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js',
      'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
      'node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js',
      'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
      'node_modules/datatables.net-rowgroup/js/dataTables.rowGroup.min.js',
      'node_modules/datatables.net-rowreorder/js/dataTables.rowReorder.min.js',
      'node_modules/datatables.net-scroller/js/dataTables.scroller.js',
      'node_modules/datatables.net-select/js/dataTables.select.min.js',

   ], 'public/js/datatable.js')
   .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/vendor.scss', 'public/css');
