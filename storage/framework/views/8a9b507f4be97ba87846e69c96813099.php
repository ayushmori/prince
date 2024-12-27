

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Setting</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">About Us</li>
                    <li class="breadcrumb-item active">About-Us Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<!-- Card Wrapper for About Us Settings -->
<form action="<?php echo e(url('admin/settings/about-us')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    

    <!-- Card Wrapper for About Us Settings -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mt-2">About Us Setting</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Section 1 -->
                <div class="col-md-4 mb-3">
                    <label for="about_us_image_1" class="form-label">Image 1</label>
                    <input type="file" id="about_us_image_1" name="about_us_image_1" class="form-control">
                    <img src="<?php echo e(asset($setting->about_us_image_1 ?? '')); ?>" width="100" alt="Image 1">
                    
                    <label for="about_us_title_1" class="form-label mt-2">Title 1</label>
                    <input type="text" id="about_us_title_1" name="about_us_title_1" class="form-control"
                        value="<?php echo e($setting->about_us_title_1 ?? ''); ?>" required>
                    <?php $__errorArgs = ['about_us_title_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <label for="about_us_description_1" class="form-label mt-2">Description 1</label>
                    <textarea id="about_us_description_1" name="about_us_description_1" class="form-control" rows="3"><?php echo e($setting->about_us_description_1 ?? ''); ?></textarea>
                    <?php $__errorArgs = ['about_us_description_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Section 2 -->
                <div class="col-md-4 mb-3">
                    <label for="about_us_image_2" class="form-label">Image 2</label>
                    <input type="file" id="about_us_image_2" name="about_us_image_2" class="form-control">
                    <img src="<?php echo e(asset($setting->about_us_image_2 ?? '')); ?>" width="100" alt="Image 2">
                    
                    <label for="about_us_title_2" class="form-label mt-2">Title 2</label>
                    <input type="text" id="about_us_title_2" name="about_us_title_2" class="form-control"
                        value="<?php echo e($setting->about_us_title_2 ?? ''); ?>" required>
                    <?php $__errorArgs = ['about_us_title_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <label for="about_us_description_2" class="form-label mt-2">Description 2</label>
                    <textarea id="about_us_description_2" name="about_us_description_2" class="form-control" rows="3"><?php echo e($setting->about_us_description_2 ?? ''); ?></textarea>
                    <?php $__errorArgs = ['about_us_description_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Section 3 -->
                <div class="col-md-4 mb-3">
                    <label for="about_us_image_3" class="form-label">Image 3</label>
                    <input type="file" id="about_us_image_3" name="about_us_image_3" class="form-control">
                    <img src="<?php echo e(asset($setting->about_us_image_3 ?? '')); ?>" width="100" alt="Image 3">
                    
                    <label for="about_us_title_3" class="form-label mt-2">Title 3</label>
                    <input type="text" id="about_us_title_3" name="about_us_title_3" class="form-control"
                        value="<?php echo e($setting->about_us_title_3 ?? ''); ?>" required>
                    <?php $__errorArgs = ['about_us_title_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <label for="about_us_description_3" class="form-label mt-2">Description 3</label>
                    <textarea id="about_us_description_3" name="about_us_description_3" class="form-control" rows="3"><?php echo e($setting->about_us_description_3 ?? ''); ?></textarea>
                    <?php $__errorArgs = [' about_us_description_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
    </div>


<!-- Card Wrapper for About Us Settings -->
<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        <h3 class="mt-2">Our Mission, Vision, and Goals</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <!-- Our Mission Section -->
            <div class="col-md-4 mb-3">
                <label for="mission_image" class="form-label">Mission Image</label>
                <input type="file" id="mission_image" name="mission_image" class="form-control">
                <img src="<?php echo e(asset($setting->mission_image ?? '')); ?>" width="100" alt="Mission Image">
                
                <label for="mission_title" class="form-label mt-2">Mission Title</label>
                <input type="text" id="mission_title" name="mission_title" class="form-control"
                    value="<?php echo e($setting->mission_title ?? ''); ?>" required>
                <?php $__errorArgs = ['mission_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <label for="mission_description" class="form-label mt-2">Mission Description</label>
                <textarea id="mission_description" name="mission_description" class="form-control" rows="3"><?php echo e($setting->mission_description ?? ''); ?></textarea>
                <?php $__errorArgs = ['mission_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Our Vision Section -->
            <div class="col-md-4 mb-3">
                <label for="vision_image" class="form-label">Vision Image</label>
                <input type="file" id="vision_image" name="vision_image" class="form-control">
                <img src="<?php echo e(asset($setting->vision_image ?? '')); ?>" width="100" alt="Vision Image">
                
                <label for="vision_title" class="form-label mt-2">Vision Title</label>
                <input type="text" id="vision_title" name="vision_title" class="form-control"
                    value="<?php echo e($setting->vision_title ?? ''); ?>" required>
                <?php $__errorArgs = ['vision_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <label for="vision_description" class="form-label mt-2">Vision Description</label>
                <textarea id="vision_description" name="vision_description" class="form-control" rows="3"><?php echo e($setting->vision_description ?? ''); ?></textarea>
                <?php $__errorArgs = ['vision_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Our Goals Section -->
            <div class="col-md-4 mb-3">
                <label for="goals_image" class="form-label">Goals Image</label>
                <input type="file" id="goals_image" name="goals_image" class="form-control">
                <img src="<?php echo e(asset($setting->goals_image ?? '')); ?>" width="100" alt="Goals Image">
                
                <label for="goals_title" class="form-label mt-2">Goals Title</label>
                <input type="text" id="goals_title" name="goals_title" class="form-control"
                    value="<?php echo e($setting->goals_title ?? ''); ?>" required>
                <?php $__errorArgs = ['goals_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <label for="goals_description" class="form-label mt-2">Goals Description</label>
                <textarea id="goals_description" name="goals_description" class="form-control" rows="3"><?php echo e($setting->goals_description ?? ''); ?></textarea>
                <?php $__errorArgs = ['goals_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
</div>

 <!-- Submit Button -->
 <div class="text-center">
    <button type="submit" class="btn btn-primary text-white">Update Settings</button>
</div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/admin/settings/about-us.blade.php ENDPATH**/ ?>