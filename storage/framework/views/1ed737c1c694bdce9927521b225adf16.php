<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>



    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <p><a>Название:</a><?php echo e($ar->title); ?> <span>Описание:</span><?php echo e($ar->description); ?> Канал:<?php echo e($name); ?>

                Категория:<?php echo e($category_name); ?></p>
            <video width="400" height="300" controls="controls">
                <source src="<?php echo e('../' . 'video/' . $ar->videoSRC); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            </video>
            <form method="post" action="<?php echo e(route('like')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" value="<?php echo e($ar->id); ?>" hidden name="id_like">
                <button type="submit">Лайк</button>
            </form>

            <form method='post' action="<?php echo e(route('dislike')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" value="<?php echo e($ar->id); ?>" hidden name="id_dislike">
                <button type="submit">Дизлайк</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\21039\Desktop\main\main\resources\views/videos.blade.php ENDPATH**/ ?>