<?php $__env->startSection('content'); ?>
    <div class="col-md-11 col-md-offset-1 pull-right">
        <h2><?php echo e($video->title); ?></h2>
        <hr/>

        <div class="col-md-8">
            <video controls id="video-player">
                <source src="<?php echo e(route('fileVideo', ['filename' => $video->video_path])); ?>"/>
                Tu navegador no es compatible con HTML5
            </video>
        </div>

        <div class="panel panel-default video-data">
            <div class="panel-heading">
                <div class="panel-title">
                    Subido por <strong><?php echo e($video->user->name.' '.$video->user->surname); ?></strong> el <?php echo e(\FormatTime::LongTimeFilter($video->created_at)); ?>

                </div>
            </div>
            <div class="panel-body">
                <?php echo e($video->description); ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>