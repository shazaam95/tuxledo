 <!-- Jquery JS-->
    <script src="<?php echo base_url('a_assets/jquery-3.2.1.min.js')?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('a_assets/bootstrap-4.1/popper.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/bootstrap-4.1/bootstrap.min.js')?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('a_assets/slick/slick.min.js')?>">
    </script>
    <script src="<?php echo base_url('a_assets/wow/wow.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/animsition/animsition.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/bootstrap-progressbar/bootstrap-progressbar.min.js')?>">
    </script>
    <script src="<?php echo base_url('a_assets/counter-up/jquery.waypoints.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/counter-up/jquery.counterup.min.js')?>">
    </script>
    <script src="<?php echo base_url('a_assets/circle-progress/circle-progress.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
    <script src="<?php echo base_url('a_assets/chartjs/Chart.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/select2/select2.min.js')?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script src="<?php echo base_url('a_assets/jquery.mask.min.js') ?>"></script>
    <!-- Main JS-->
    <script src="<?php echo base_url('a_js/main.js')?>"></script>
    <script src="<?php echo base_url('a_assets/piexif.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/purify.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/sortable.min.js')?>"></script>
    <script src="<?php echo base_url('a_assets/fileinput.js')?>"></script>
    
    

<script type="text/javascript">
     $(document).ready( function () {

        $('table.data_table').DataTable({
        "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "columns": [
                    null,
                    { "orderable": false },
                    null,
                    null,
                    { "orderable": false },
                    { "orderable": false }
                  ]
        });

        $('.uang').mask('#.##0', {reverse: true});
        $('.ukuran').mask('#,', {reverse: true});
    }); 
    </script>

    <script>
    const BASE_URL = "<?php echo base_url();?>";
</script>