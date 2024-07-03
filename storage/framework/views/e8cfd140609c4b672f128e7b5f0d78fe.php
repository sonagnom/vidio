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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span>Список всех категорий</span>
            <?php $__currentLoopData = $arrcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrcatval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($arrcatval->name); ?></p>
                <form method="post" action="<?php echo e(route('deletecat', $arrcatval->id)); ?>">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="text" value="<?php echo e($arrcatval->id); ?>" name="id" hidden>
                    <button type="submit">Удалить категорию</button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <form method="POST" action="<?php echo e(route('admin.cat')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" placeholder="Название категории" name="namecat" required>
                <button type="submit">Добавить категорию</button>
            </form>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><a href="<?php echo e(route('videos', $ar->id)); ?>">Название:</a><?php echo e($ar->title); ?>

                            <span>Описание:</span><?php echo e($ar->description); ?>

                        </p>
                        <img src="<?php echo e('image/' . $ar->imageSRC); ?>" alt="fgh" width="500px">
                        <form method='post' action="<?php echo e(route('editvideo')); ?>">
                        <input type="text" value="<?php echo e($ar->id); ?>" hidden name="id_vid">
                        <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <select name="status">
                                <option value="none">без ограничений</option>
                                <option value="breach">нарушение</option>
                                <option value="shadowBan">теневой бан</option>
                                <option value="ban">бан</option>
                            </select>
                            <button type="submit">Отправить</button>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\21048\Desktop\Новая папка\main\resources\views/admin.blade.php ENDPATH**/ ?>