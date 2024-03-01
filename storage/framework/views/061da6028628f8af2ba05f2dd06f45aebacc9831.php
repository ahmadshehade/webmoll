<?php $__env->startSection('content'); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Strategy - Responsive HTML Template</title>
<!--
Strategy Template
http://www.templatemo.com/tm-489-strategy
-->        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- load CSS files -->
 <!-- Bootstrap css (v4-alpha.getbootstrap.com/) -->
<link rel="stylesheet" href="<?php echo e(asset('emp/css/hero-slider-style.css')); ?>"> <!-- Hero slider css (https://codyhouse.co/gem/hero-slider/) -->
<link rel="stylesheet" href="<?php echo e(asset('emp/css/style.css')); ?>"> <!-- Your custom css -->

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="<?php echo e(asset('emp/font-awesome-4.5.0/css/font-awesome.min.css')); ?>">                <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('emp/css/bootstrap.min.css')); ?>">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="<?php echo e(asset('emp/css/hero-slider-style.cs')); ?>">                                  <!-- Hero slider style -->
    <link rel="stylesheet" href="<?php echo e(asset('emp/css/templatemo-style.css')); ?>">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>
<style>



            .table-container {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .centered-table {
                width: 100%;
                max-width: 800px;
            }

            footer {
    background-color: #f5f5f5;
    padding: 20px;
    text-align: center;
}
        </style>







    <body>
        <section class="cd-hero">
            <ul class="cd-hero-slider autoplay">
                <li class="selected">
                    <div class="cd-full-width">
                        <div class="tm-slide-content-div">
                            <div id="search-form">
                                <i class="fa fa-cogs tm-slide-icon"></i>
                                <h2 class="text-uppercase">Employees</h2>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <a href="#" class="btn btn-primary" onclick="toggleCreateSection()">Create Employe</a>
        <section>
            <div class="cd-full-width table-container" style="margin-left:6% ">
                <table class="centered-table table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Rank</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $employs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($employee->employ_name); ?></td>
                            <td><?php echo e($employee->rank); ?></td>
                          <td style="display: flex">
                                <a href="<?php echo e(route('employe.show',['employe'=>$employee->id])); ?>" class="btn btn-outline-success " >Show</a>
                                <a href="<?php echo e(route('employe.edit',['employe'=>$employee->id])); ?>" class="btn btn-outline-primary">Update</a>
                               <?php if(Auth::check() && Auth::user()->role=="1"): ?>

                                <form action="<?php echo e(route('employe.destroy',['employe'=>$employee->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <div class="container" style="padding: 10px 0;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- الشفرة الأخرى للنموذج هنا -->
                    </div>
                </div>
            </div>
        </section>

        <section id="CreateSection" class="book_section layout_padding container" style="display: none;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Create Employee</div>

                            <div class="card-body">
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <form method="POST" action="<?php echo e(route('employe.store')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="employ_name">Employee Name</label>
                                        <input type="text" name="employ_name" class="form-control" id="employ_name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sallary">Salary</label>
                                        <input type="number" name="sallary" class="form-control" id="sallary" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="rank">Rank</label>
                                        <input type="text" name="rank" class="form-control" id="rank" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="floor">Floor</label>
                                        <select name="floor_name" class="form-control" id="floor" required>

                                            <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($floor->floor_name); ?>"><?php echo e($floor->floor_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select name="department_name" class="form-control" id="department" required>

                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->department_name); ?>"><?php echo e($department->department_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
           <footer class='footer footer-area'>
            <div class="#" aria-labelledby="navbarDropdown">
                <?php if(Auth::user()->role=="1"): ?>
                <a class="btn btn-outline-info" href="<?php echo e(route('mole.index')); ?>"><?php echo e(__('Moll')); ?></a>
                <?php endif; ?>
                <a class="btn btn-outline-info" href="<?php echo e(route('onner.index')); ?>"><?php echo e(__('Owner')); ?></a>
                <a class="btn btn-outline-info" href="<?php echo e(route('investors.index')); ?>"><?php echo e(__('Investors')); ?></a>
                <a class="btn btn-outline-info" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('Floors')); ?></a>
                <a class="btn btn-outline-info" href="<?php echo e(route('departments.index')); ?>"><?php echo e(__('Departments')); ?></a>
                <a class="btn btn-outline-info" href="<?php echo e(route('employe.index')); ?>"><?php echo e(__('Employes')); ?></a>
                <?php if(Auth::user()->role=="1"): ?>
                <a class="btn btn-outline-info" href="<?php echo e(route('baskets.allindex')); ?>"><?php echo e(__('Mange_Basket')); ?></a>
            </div>
                <?php endif; ?>
                
           </footer>
                


        <!-- load JS files -->
        <script src="<?php echo e(asset('emp/js/jquery-3.2.1.min.js')); ?>"></script> <!-- jQuery -->
        <script src="<?php echo e(asset('emp/js/bootstrap.min.js')); ?>"></script> <!-- Bootstrap js -->
        <script src="<?php echo e(asset('emp/js/hero-slider-main.js')); ?>"></script> <!-- Hero slider js -->
        <script src="<?php echo e(asset('emp/js/main.js')); ?>"></script> <!-- Your custom js -->
        <script>
            function toggleCreateSection() {
              var createSection = document.getElementById("CreateSection");
              if (createSection.style.display === "none") {
                createSection.style.display = "block";
                setTimeout(function() {
                  window.scrollTo({
                    top: createSection.offsetTop,
                    behavior: "smooth"
                  });
                }, 200);
              }
            }

            </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\projects\moole\resources\views/employ/index.blade.php ENDPATH**/ ?>