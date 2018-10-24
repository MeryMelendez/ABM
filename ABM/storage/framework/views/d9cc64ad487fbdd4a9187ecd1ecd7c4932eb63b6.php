<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <div id="video-list">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="video-item col-md-10 pull-left panel panel-default">
                        <div class="panel-body">
                            <!--imagen-->
                            <?php if(Storage::disk('images')->has($video->image)): ?>
                                <div class="video-image-thumb col-md-3 pull-left">
                                    <div class="video-image-mask">
                                        <img src="<?php echo e(url('/miniatura/'.$video->image)); ?>" class="video-image"/>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="data">
                                <h4 class="video-title"><a href=" <?php echo e(route('detailVideo', ['video_id' => $video->id])); ?>"> <?php echo e($video->title); ?> </a></h4>
                                <p><?php echo e($video->user->name.' '.$video->user->surname); ?></p>
                            </div>

                            <!--Botones de accion-->
                            <a href="" class="btn btn-success">Ver</a>
                            <?php if(Auth::check() && Auth::user()->id == $video->user->id): ?>
                                <a href="" class="btn btn-warning">Editar</a>

                                <a href="#meryModal<?php echo e($video->id); ?>" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>

                                <div id="meryModal<?php echo e($video->id); ?>" class="modal-fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">¿Estas seguro?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Seguro que quieres borrar este video?</p>
                                                <p class="text-warning"><small><?php echo e($video->title); ?></small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a href="<?php echo e(url('/delete-video/'.$video->id)); ?>" type="button" class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php echo e($videos->links()); ?>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>