<?php if($pageCount  && $pageCount > 1): ?>

    <!-- Pagination -->
    <div class="pagination center">
        <ul class="pagination-list">
            <?php if(isset($previous)): ?>
            <li><a href="<?php echo e($route); ?>?<?php echo e(http_build_query(array_merge($_GET,array('page' => $previous)))); ?>">&laquo;</a></li>
            <?php else: ?>
                <li class="disabled"><a href="javascript:void(0)" class="disabled">&laquo;</a></li>
            <?php endif; ?>
                <?php $__currentLoopData = $pagesInRange; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($page != $current): ?>
                <li><a href="<?php echo e($route); ?>?<?php echo e(http_build_query(array_merge($_GET,array('page' => $page)))); ?>"><?php echo e($page); ?></a></li>
                <?php else: ?>
            <li class="active "><a href="javascript:void(0)"><?php echo e($page); ?></a></li>
            <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(isset($next)): ?>
            <li><a href="<?php echo e($route); ?>?<?php echo e(http_build_query(array_merge($_GET,array('page' => $next)))); ?>">&raquo;</a></li>
                <?php else: ?>
                    <li><a href="javascript:void(0)">&raquo;</a></li>
                <?php endif; ?>

        </ul>
    </div>
    <!--/ End Pagination -->






<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\coba\app\public\templates/edugrids/views/site/catalog/paginator.blade.php ENDPATH**/ ?>