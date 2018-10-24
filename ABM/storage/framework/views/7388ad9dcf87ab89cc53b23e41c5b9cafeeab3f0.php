<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h2>Editar <?php echo e($video->title); ?></h2>
            <hr/>
            <form action="<?php echo e(route('updateVideo', ['video_id' => $video->id])); ?>" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                    <input type="text" class="form-control" id="title" name="title" pattern="[A-Za-z0-9 ]+" value="<?php echo e($video->title); ?>"/>
                </div>

                <div class="form-group">
                    <label for="title">Descripcion</label>
                    <textarea class="form-control" id="description" name="description" pattern="[A-Za-z0-9]+ " value="<?php echo e($video->description); ?>"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Miniatura</label>
                    <?php if(Storage::disk('images')->has($video->image)): ?>
                        <div class="video-image-thumb">
                            <div class="video-image-mask">
                                <img src="<?php echo e(url('/miniatura/'.$video->image)); ?>" class="video-image"/>
                            </div>
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
                </div>

                <div class="form-group">
                    <label for="video">Archivo de video</label>
                    <video controls id="video-player">
                        <source src="<?php echo e(route('fileVideo', ['filename' => $video->video_path])); ?>"/>
                        Tu navegador no es compatible con HTML5
                    </video>
                    <input type="file" class="form-control" id="video" name="video" accept="video/*"/>
                </div>
                <button type="submit" class="btn btn-success">Modificar video</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>