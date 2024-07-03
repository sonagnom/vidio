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
            <p><?php echo e($time); ?></p>

            <video width="800" controls="controls">
                <source src="<?php echo e(asset('storage/video') . '/' . $ar->videoSRC); ?>"
                    type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            </video>
            <?php if(Auth::check()): ?>
                <form method="post" action="<?php echo e(route('like')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="text" value="<?php echo e($ar->id); ?>" name="id_like" hidden>
                    <button type="submit">Лайк</button>
                    <span><?php echo e($likes); ?></span>
                </form>

                <form method='post' action="<?php echo e(route('dislike')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="text" value="<?php echo e($ar->id); ?>" hidden name="id_dislike">
                    <button type="submit">Дизлайк</button>
                    <span><?php echo e($dislike); ?></span>
                </form>

                <form method='post' action="<?php echo e(route('comments')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="text" value="<?php echo e($ar->id); ?>" hidden name="video_id">
                    <span>Оставьте комментарий</span>
                    <textarea name="text" required maxlength="255"></textarea>
                    <button>Отпрваить</button>
                </form>
            <?php endif; ?>

            <div>
                <span>Комментарии</span>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="w-[800px] text-1xl break-words"><?php echo e($comment->name); ?>:<?php echo e($comment->text); ?></div>
                        <?php if(Auth::check()): ?>
                            <?php if($comment->user_id == Auth::user()->id): ?>


                                <div class="inline-flex">
                                    <div>
                                        <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'left','width' => '30']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'left','width' => '30']); ?>
                                             <?php $__env->slot('trigger', null, []); ?> 
                                                <button>
                                                    <div class="ms-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                             <?php $__env->endSlot(); ?>

                                             <?php $__env->slot('content', null, []); ?> 
                                                <form method="post" action="<?php echo e(route('editcomment')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" value="<?php echo e($comment->id); ?>" name="editid" hidden>
                                                    <input type="text" value="<?php echo e($comment->text); ?>" name="editcom">
                                                    <button type="submit">Редактировать</button>
                                                </form>

                                                <form action="<?php echo e(route('deletecomment')); ?>" method="post">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" value="<?php echo e($comment->id); ?>" name="editid" hidden>
                                                    <button type="submit">Удалить</button>
                                                </form>
                                             <?php $__env->endSlot(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                                    </div>
                                </div>



                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
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
<?php endif; ?><?php /**PATH C:\Users\21039\Desktop\Новая папка (2)\main\resources\views/videos.blade.php ENDPATH**/ ?>