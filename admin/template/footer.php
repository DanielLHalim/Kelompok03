
        <!-- awal:footer -->
        <footer>
            <div class="container">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                   <div class="footer-widget">
                        <h1 class="page-header">About <strong>Us</strong></h1> 
                        <span class="divider-hr"></span>
                        <div class="row content-widget-footer">
                            <div class="col-sm-4">
                                <div class="icon-footer">
                                    <i class="fa fa-cubes fa-4x"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <p>Kami merupakan anggota dari Kelompok 3</p>
                                <p>1. Daniel Lexandrosth Halim (03081220025)</p>
                                <p>2. Davidsen Cuaca (03081220040)</p>
                                <p>3. John Michael Chenardy (03081220008)</p>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-widget">
                        <h1 class="page-header">About <strong>Webiste</strong></h1>
                        <span class="divider-hr"></span>
                        <div class="row content-widget-footer">
                            <div class="col-sm-4">
                                <div class="icon-footer">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <p>Website ini dibuat untuk mendapatkan nilai dan ini merupakan projek dari pak des sebagai penentu nilai ujian akhir semester dalam mata kuliah Perancangan & Pemograman Web.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-widget">
                        <h1 class="page-header">Why <strong>US</strong>?</h1>
                        <span class="divider-hr"></span>
                        <div class="row content-widget-footer">
                            <div class="col-sm-4">
                                <div class="icon-footer">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <p>Karena kita merupakan mahasiswa dari kelas 22SI2 dan wajib mengikuti pelajaran ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-widget">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                            <span class="sosmed-footer">
                                <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="Google Plus"></i></a>
                                <a href="#"><i class="fa fa-youtube" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                                <a href="#"><i class="fa fa-instagram" data-toggle="tooltip" data-placement="top" title="Instagram"></i></a>
                            </span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="footer-bottom-links">
                                &copy; 2024 <strong>John</strong>Riady<strong></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir:footer -->
    </div>
    <!-- akhir:wrapper -->

    <!-- awal:javascript -->
    <!-- javascript default for all pages-->
    <script src="assets/js/jquery-1.12.3.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>

    <!-- javascript -->
    <script src="assets/js/themes.js"></script>
    <!--<script src="assets/back/js/count.js"></script>-->
    <!-- akhir:javascript -->

     <!-- Datatables -->
     <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
     <script src="assets/datatables/js/dataTables.bootstrap.min.js"></script>
     <script src="assets/datatables/js/responsive.bootstrap.min.js"></script>
     
    <script type="text/javascript">
      $(document).ready(function() {
         //$.fn.datepicker.defaults.format = 'dd-mm-yyyy';
         $('.datepicker').datepicker({
              todayBtn: 'linked',
              clearBtn: true,
              forceParse: false,
              calendarWeeks: true,
              autoclose: true,
              todayHighlight: true,
              startDate: '-3d'
          });
        });
        </script>


    <?php

    if($_GET['page'] == 'bahan'){
        
        ?><script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "pagingType": "full_numbers",
          "serverSide": true,
          "columnDefs": [ {
                    "targets": 3, // rubah sesuai banyak tabel
                    "orderable": false
                    } ],
          "ajax":{
            url :"modul/bahan/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        } );
      } );
        </script><?php

    }

    if($_GET['page'] == 'produk'){
        
        ?><script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "pagingType": "full_numbers",
          "serverSide": true,
          "columnDefs": [ {
                    "targets": 4,
                    "orderable": false
                    } ],
          "ajax":{
            url :"modul/produk/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        } );
      } );
        </script><?php

    }

    if($_GET['page'] == 'pembuatan'){
        
        ?><script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "pagingType": "full_numbers",
          "serverSide": true,
          "columnDefs": [ {
                    "targets": 6,
                    "orderable": false
                    } ],
          "ajax":{
            url :"modul/produksi/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        } );
      } );
        </script><?php

    }

    if($_GET['page'] == 'pekerja'){
        
        ?><script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "pagingType": "full_numbers",
          "serverSide": true,
          "columnDefs": [ {
                    "targets": 3,
                    "orderable": false
                    } ],
          "ajax":{
            url :"modul/pekerja/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        } );
      } );
        </script><?php

    }

    if($_GET['page'] == 'laporan'){
        ?>
          <script src="assets/datatables/js/dataTables.buttons.min.js"></script>
          <script src="assets/datatables/js/jszip.min.js"></script>
          <script src="assets/datatables/js/pdfmake.min.js"></script>
          <script src="assets/datatables/js/vfs_fonts.js"></script>
          <script src="assets/datatables/js/buttons.html5.min.js"></script>
          <!-- <script src="assets/datatables/js/buttons.bootstrap.min.js"></script>          
          <script src="assets/datatables/js/buttons.print.min.js"></script>-->
          <script src="assets/js/moment.min.js"></script>
          <script src="assets/js/daterangepicker.js"></script>

        <script>
        $(document).ready(function() {

        var dataTable = $('#lookup').DataTable( {
          
          "responsive": true,
          "pagingType": "full_numbers",
          "processing": true,
          "serverSide": true,
          select: true,
          "ajax":{
            url :"modul/laporan/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          },
          "dom":"<'row'<'col-sm-6'B><'col-sm-6 pull-right'<'toolbar pull-right'>>>" +
                "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12 table-responsive'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]

        } );

          $("div.toolbar").html('<div id="lookup_filter" class="dataTables_filter" ><label>Date :<input id="date_range" type="text" class="form-control input-sm" aria-controls="lookup"></label></div>');  
          //END of the data table

          // Date range script - Start of the sscript
          $("#date_range").daterangepicker({
            autoUpdateInput: false,
            locale: {
              "cancelLabel": "Clear",
                  }
          });

          $("#date_range").on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
              table.draw();
          });

          $("#date_range").on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
              table.draw();
          });
          // Date range script - END of the script

          $.fn.dataTableExt.afnFiltering.push(
          function( oSettings, aData, iDataIndex ) {
            
              var grab_daterange = $("#date_range").val();
              var give_results_daterange = grab_daterange.split(" to ");
              var filterstart = give_results_daterange[0];
              var filterend = give_results_daterange[1];
              var iStartDateCol = 3; //using column 2 in this instance
              var iEndDateCol = 3;
              var tabledatestart = aData[iStartDateCol];
              var tabledateend= aData[iEndDateCol];
            
              if ( !filterstart && !filterend )
              {
                  return true;
              }
              else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "")
              {
                  return true;
              }
              else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "")
              {
                  return true;
              }
              else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend)))
              {
                  return true;
              }
              return false;
          }
          );

      } );
        </script>
       
        <?php

    }

    if($_GET['page'] == 'pengguna'){
        
        ?><script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "processing": true,
          "pagingType": "full_numbers",
          "serverSide": true,
          "columnDefs": [ {
                    "targets": 6,
                    "orderable": false
                    } ],
          "ajax":{
            url :"modul/pengguna/model.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Ditemukan</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
          }
        } );
      } );
        </script><?php

    }

    if($_GET['page'] == 'beranda' ){
        
    $bahan = mysqli_query($koneksi, "SELECT * FROM bahan");
    $produk = mysqli_query($koneksi, "SELECT * FROM produk");
    $produksi = mysqli_query($koneksi, "SELECT * FROM produksi");
    $pekerja = mysqli_query($koneksi, "SELECT * FROM pekerja");
   

            ?>


        <script type="text/javascript">
          function countUp(count)
          {
              var div_by = 100,
                  speed = Math.round(count / div_by),
                  $display = $('.count'),
                  run_count = 1,
                  int_speed = 24;

              var int = setInterval(function() {
                  if(run_count < div_by){
                      $display.text(speed * run_count);
                      run_count++;
                  } else if(parseInt($display.text()) < count) {
                      var curr_count = parseInt($display.text()) + 1;
                      $display.text(curr_count);
                  } else {
                      clearInterval(int);
                  }
              }, int_speed);
          }

          countUp(<?php echo mysqli_num_rows($bahan); ?>);

          function countUp2(count)
          {
              var div_by = 100,
                  speed = Math.round(count / div_by),
                  $display = $('.count2'),
                  run_count = 1,
                  int_speed = 24;

              var int = setInterval(function() {
                  if(run_count < div_by){
                      $display.text(speed * run_count);
                      run_count++;
                  } else if(parseInt($display.text()) < count) {
                      var curr_count = parseInt($display.text()) + 1;
                      $display.text(curr_count);
                  } else {
                      clearInterval(int);
                  }
              }, int_speed);
          }

          countUp2(<?php echo mysqli_num_rows($produk); ?>);

          function countUp3(count)
          {
              var div_by = 100,
                  speed = Math.round(count / div_by),
                  $display = $('.count3'),
                  run_count = 1,
                  int_speed = 24;

              var int = setInterval(function() {
                  if(run_count < div_by){
                      $display.text(speed * run_count);
                      run_count++;
                  } else if(parseInt($display.text()) < count) {
                      var curr_count = parseInt($display.text()) + 1;
                      $display.text(curr_count);
                  } else {
                      clearInterval(int);
                  }
              }, int_speed);
          }

          countUp3(<?php echo mysqli_num_rows($produksi); ?>);

          function countUp4(count)
          {
              var div_by = 100,
                  speed = Math.round(count / div_by),
                  $display = $('.count4'),
                  run_count = 1,
                  int_speed = 24;

              var int = setInterval(function() {
                  if(run_count < div_by){
                      $display.text(speed * run_count);
                      run_count++;
                  } else if(parseInt($display.text()) < count) {
                      var curr_count = parseInt($display.text()) + 1;
                      $display.text(curr_count);
                  } else {
                      clearInterval(int);
                  }
              }, int_speed);
          }

          countUp4(<?php echo mysqli_num_rows($pekerja); ?>);
        </script>
        <?php

    }

    ?>

</body>
</html> 