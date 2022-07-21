<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('back/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('back/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('back/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('back/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('back/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('back/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('back/dist/js/pages/dashboard2.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
</script>
<script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>

{{-- <script type="text/javascript">
    $(function () {
        var params = window.location.pathname;
        params = params.toLowerCase();
 
        if (params != "/") {
            $(".nav-sidebar li a").each(function (i) {
                var obj = this;
                var url = $(this).attr("href");
                if (url == "" || url == "#") {
                    return true;
                }
                url = url.toLowerCase();
                if (url.indexOf(params) > -1) {
                    $(this).parent().addClass("active open menu-open");
                    $(this).parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().parent().parent().addClass("active open menu-open");
                    return false;
                }
            });
        }
    });
</script> --}}

//bootstrap-tagsinput CDN 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>