<script src="{{ asset('vendor/dashboard') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/calander.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/script.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-2').select2({
            allowClear: true
        });
        $('#table').DataTable({
            responsive: true
        });
        document.getElementById("key_visual").setAttribute("accept", "image/*")
        document.getElementById("key_visual_mobile").setAttribute("accept", "image/*")
    });
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            }, {
                targets: [1],
                orderData: [1, 0]
            }, {
                targets: [4],
                orderData: [4, 0]
            }]
        });
    });
</script>


<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<script src="{{ asset('vendor/sweetalert') }}/sweetalert.min.js"></script>



@include('vendor.sweet.alert')
@yield('scripts')
