<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <a href="">Регистрация</a>
    <a href="">Авторизация</a>
    <a href="">Главная</a>
    <h1>Видео xddd</h1>
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
    <p><a>Название:</a><?php echo e($ar->title); ?> <span>Описание:</span><?php echo e($ar->description); ?></p>

    <video width="400" height="300" controls="controls">
   <source src="<?php echo e('../' . 'app/video/' . $ar->videoSRC); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
  </video>
</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\Users\21039\Desktop\auth\auth\resources\views/videos.blade.php ENDPATH**/ ?>