<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/themes/admin/assets/modules/datatables/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/themes/admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('client/themes/admin/assets/modules/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/themes/admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('client/vendor/datatables/extensions/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/datatables/extensions/Buttons/js/buttons.flash.min.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/datatables/extensions/Buttons/js/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/datatables/extensions/Buttons/js/buttons.print.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->yieldContent('content'); ?>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            lengthMenu: [ [10, 25, 50,75, 100, -1], [10, 25, 50, 75, 100, "<?php echo e(__lang('all')); ?>"]  ],
            responsive: true,
            language: {
                "decimal":        "",
                "emptyTable":     "No data available in table",
                "info":           "<?php echo e(__lang('Showing')); ?> _START_ <?php echo e(__lang('to')); ?> _END_ <?php echo e(__lang('of')); ?> _TOTAL_ <?php echo e(__lang('entries')); ?>",
                "infoEmpty":      "<?php echo e(__lang('Showing')); ?> 0 to 0 <?php echo e(__lang('of')); ?> 0 <?php echo e(__lang('entries')); ?>",
                "infoFiltered":   "(<?php echo e(__lang('filtered-from')); ?>  _MAX_ <?php echo e(__lang('total')); ?> <?php echo e(__lang('entries')); ?>)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "<?php echo e(__lang('show')); ?> _MENU_ <?php echo e(__lang('entries')); ?>",
                "loadingRecords": "<?php echo e(__lang('loading')); ?>...",
                "processing":     "<?php echo e(__lang('processing')); ?>...",
                "search":         "<?php echo e(__lang('search')); ?>:",
                "zeroRecords":    "<?php echo e(__lang('no-matching-records')); ?>",
                "paginate": {
                    "first":      "<?php echo e(__lang('First')); ?>",
                    "last":       "<?php echo e(__lang('Last')); ?>",
                    "next":       "<?php echo e(__lang('Next')); ?>",
                    "previous":   "<?php echo e(__lang('Previous')); ?>"
                },
                "aria": {
                    "sortAscending":  ": <?php echo e(__lang('sort-ascending')); ?>",
                    "sortDescending": ": <?php echo e(__lang('sort-descending')); ?>"
                }
            }
        } );
    } );
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/report/report.blade.php ENDPATH**/ ?>