<!-- jQuery -->    

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD'
             });
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/jquery.confirm.min.js"></script>
    <script src="<?php echo base_url()?>assets/confirm/confirm-bootstrap.js"></script>
     <script src="<?php echo base_url()?>assets/drowdown/jquery-select7.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>assets/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $("#mceu_39-inp").mouseover(function(){alert();}); 
        
    </script>
    <!--tinymce-->
    <script>
        
        tinymce.init({
          selector: 'textarea',
          imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
          content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
          ]
        });

    
        $(".select7").select7()
    
    </script>


</body>

</html>
