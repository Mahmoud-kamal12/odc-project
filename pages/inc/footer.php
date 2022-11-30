
<script src="<?= URL."assets/plugins/jquery/jquery.min.js"?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src=""<?= URL."assets/plugins/jquery-ui/jquery-ui.min.js"?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= URL."assets/plugins/bootstrap/js/bootstrap.bundle.min.js"?>"></script>
<!-- ChartJS -->
<script src="<?= URL."assets/plugins/chart.js/Chart.min.js"?>"></script>
<!-- Sparkline -->
<script src="<?= URL."assets/plugins/sparklines/sparkline.js"?>"></script>
<!-- JQVMap -->
<script src="<?= URL."assets/plugins/jqvmap/jquery.vmap.min.js"?>"></script>
<script src="<?= URL."assets/plugins/jqvmap/maps/jquery.vmap.usa.js"?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= URL."assets/plugins/jquery-knob/jquery.knob.min.js"?>"></script>
<!-- daterangepicker -->
<script src="<?= URL."assets/plugins/moment/moment.min.js"?>"></script>
<script src="<?= URL."assets/plugins/daterangepicker/daterangepicker.js"?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= URL."assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"?>"></script>
<!-- Summernote -->
<script src="<?= URL."assets/plugins/summernote/summernote-bs4.min.js"?>"></script>
<!-- overlayScrollbars -->
<script src="<?= URL."assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"?>"></script>
<!-- AdminLTE App -->
<script src="<?= URL."assets/dist/js/adminlte.js"?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= URL."assets/dist/js/demo.js"?>"></script>
<!-- AdminLT dashboard demo (This is only for demo purposes) -->
<script src="<?= URL."assets/dist/js/pages/dashboard.js"?>"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });


    $(document).on('click' , '.add-to-card' , function (){
        let id  = $(this).data('idd')
        let name  = $(this).data('name')
        let price = $(this).data('price')

        $('#card-shop-body').prepend(`
             <tr>
                    <td><input type="text" value="${id}" name="products[${id}][id]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="text" value="${name}" name="products[${id}][name]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="text" value="${price}" name="products[${id}][price]" readonly style="width: 50px;border: none;"></td>
                    <td><input type="number" value="1" name="products[${id}][quantity]" min="0" style="width: 50px;"></td>
                    <th class="delete-row" style="color:red;cursor:pointer">X</th>
             </tr>
        `)
    })

    $(document).on('click' , '.delete-row' , function (){
        var whichtr = $(this).closest("tr");
        whichtr.remove();
    })

    $(document).on('click' , '#delete-all-row' , function (){
        $("#card-shop-body").empty();
    })

</script>
</body>
</html>
