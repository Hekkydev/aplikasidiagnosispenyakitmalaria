
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                {{ str_replace('_',' ',env('APP_NAME'))}}
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2015 <a href="#">Sistem Pakar</a>.</strong> All rights reserved.
        </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/jquery/dist/jquery.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/admin-lte.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/datatables.net/js/jquery.dataTables.js")}}" type="text/javascript"></script>
    
    <script src="{{ asset("/bower_components\dualist\dist\js\multiselect.js")}}"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    <script>
            jQuery(document).ready(function(){
                $(".table").dataTable();
                  $('.multiselect').multiselect();
            });
    </script>
        
    </body>
</html>