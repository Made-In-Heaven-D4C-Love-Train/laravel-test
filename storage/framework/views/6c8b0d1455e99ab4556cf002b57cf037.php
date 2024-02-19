<html>
    <body>
        <form action="<?php echo e(url('/')); ?> " method="POST">
        <input type="number" name="number" min="0" value="">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit">Envoyer</button>
        </form>
        <?php if(isset($estPremier)): ?>
            <?php if($estPremier): ?>
                <p>Le nombre <?php echo e($nombre); ?> est premier.</p>
            <?php else: ?>
                <p>Le nombre <?php echo e($nombre); ?> n'est pas premier.</p>
            <?php endif; ?>
        <?php endif; ?>
    </body>
</html><?php /**PATH C:\Users\33781\Desktop\laravel\example-app\resources\views/test.blade.php ENDPATH**/ ?>