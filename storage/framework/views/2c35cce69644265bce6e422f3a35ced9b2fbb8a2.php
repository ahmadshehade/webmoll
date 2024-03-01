<?php $__env->startSection('content'); ?>
<?php
    $comments = [
    [
        'user' =>'Fade',
        'text' => "This mall is more than wonderful. I wish you continued prosperity and success. It was a very good experience. Thank you for what you have provided.",
    ],
    [
        'user' => 'Ali',
        'text' =>  "This model is excellent and contains a large number of products. Its sections are wonderful and it offers numerous services and events. I was very pleased with my experience dealing with you.",
    ],
    [
        'user' => 'Ammar',
        'text' => "I am truly impressed by this model. It offers a vast range of products and its sections are remarkable. Moreover, it provides numerous services and exciting events. My experience with you has been extremely satisfying.",
    ],
    [
        'user' => 'Kalid',
        'text' => '"This model is truly remarkable, offering an extensive selection of products. Its sections are impressive, and it provides a multitude of services and captivating events. I had an immensely positive experience dealing with you."',
    ],
];
?>
<style>

    body {
        background-image: url(<?php echo e(asset('molee.jpg')); ?>);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .comment-card {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    .comment-card .comment-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .comment-card .comment-body {
        color: #6c757d;
    }

</style>

<body>
    <?php if(Auth::user()->role <3): ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Auth::user()->role=="1"): ?>
                    <a class="btn btn-outline-info" href="<?php echo e(route('mole.index')); ?>"><?php echo e(__('Moll')); ?></a>
                    <?php endif; ?>
                    <?php if(Auth::user()->role<3): ?>
                    <a class="btn btn-outline-info" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('Departments')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employes')); ?></a>
                    <a class="btn btn-outline-info" href="<?php echo e(route('baskets.allindex')); ?>"><?php echo e(__('Mange_Basket')); ?></a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container">
<header><h3>Comments</h3></header>
<div class='card '>
    
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-card">
            <h4 class="comment-title"><?php echo e($comment['user']); ?></h4>
            <p class="comment-body"><?php echo e($comment['text']); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/home.blade.php ENDPATH**/ ?>