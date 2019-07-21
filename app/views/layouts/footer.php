    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?= BASEURL ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= BASEURL ?>assets/js/popper.min.js"></script>
    <script src="<?= BASEURL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= BASEURL ?>assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= BASEURL ?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL ?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL ?>assets/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?= BASEURL ?>assets/js/bootstrap-select.js"></script>
    <script type="text/javascript">$('#tabel').DataTable();</script>
    <script type="text/javascript" src="<?= BASEURL ?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.peringatan').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Hapus Data',
                        text: 'You will not be able to recover this imaginary file!',
                        type: 'warning',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>

  </body>
</html>