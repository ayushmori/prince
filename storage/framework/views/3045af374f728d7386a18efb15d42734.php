<?php $__env->startSection('title', 'About Us'); ?>

<?php $__env->startSection('content'); ?>

    <div class="containerr">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3340.089035850808!2d70.76460357474984!3d22.31892064222126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c9909e845a83%3A0x4863465519cad832!2sFuerte%20Developers!5e1!3m2!1sen!2sin!4v1733203903876!5m2!1sen!2sin"
                width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-form">
            <h1 class="title">Contact Us</h1>
            <h2 class="subtitle">We are here assist you.</h2>
            <!-- resources/views/form.blade.php -->

            <form action="<?php echo e(url('/submit-form')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Your Name" required />
                <input type="email" name="e-mail" placeholder="Your E-mail Address" required />
                <input type="tel" name="phone" placeholder="Your Phone Number" required />
                <textarea name="text" rows="8" placeholder="Your Message" required></textarea>
                <button class="btn-send">Get a Call Back</button>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\group-porject\resources\views/frontend/pages/contact-us.blade.php ENDPATH**/ ?>