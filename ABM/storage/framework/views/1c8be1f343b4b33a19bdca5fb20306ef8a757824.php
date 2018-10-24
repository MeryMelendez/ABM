<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h2>Crear un nuevo video</h2>
            <hr/>
            <form action="<?php echo e(url('/guardar-video')); ?>" method="post" enctype="multipart/form-data" class="col-lg-7">
                <?php echo csrf_field(); ?>


                <?php if($errors->any()): ?>
                    <div class="alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title" pattern="[A-Za-z0-9]+"/>
                </div>

                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control" id="description" name="description" pattern="[A-Za-z0-9]+"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Miniatura</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
                </div>

                <div class="form-group">
                    <label for="video">Archivo de video</label>
                    <input type="file" class="form-control" id="video" name="video" accept="video/*"/>
                </div>
                <button type="submit" class="btn btn-success">Crear video</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>