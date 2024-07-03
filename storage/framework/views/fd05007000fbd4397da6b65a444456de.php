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
            <video width="800" controls="controls">
                <source src="<?php echo e(asset('storage/video') . '/' . $ar->videoSRC); ?>"
                    type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            </video>
            <?php if(Auth::check()): ?>
                <span>Лайки</span>
                <span><?php echo e($likes); ?></span>
                <span>Дизлайки</span>
                <span><?php echo e($dislike); ?></span>

            <?php endif; ?>
            <p>Изменение данных</p>

            <form action="<?php echo e('myvid' . $ar->id); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="text" value="<?php echo e($ar->id); ?>" hidden name="id">
                <p>Название</p>
                <input type="text" name="name" placeholder="Название" required maxlength="255" value="<?php echo e($ar->title); ?>">
                <p>Описание</p>
                <input type="text" name="desc" placeholder="Описание" maxlength="255" value="<?php echo e($ar->description); ?>">
                <p>Файл видео</p>
                <input type="file" name="vid" required>
                <p>Файл превью</p>
                <input type="file" name="img" required>
                <p>Выберите категорию</p>
                <select name="category">
                    <?php $__currentLoopData = $catarr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <button type="submit">Обновить</button>
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
<?php endif; ?><?php /**PATH C:\Users\21039\Desktop\Новая папка (2)\main\resources\views/myvid.blade.php ENDPATH**/ ?>