<html>
    <body>
        <form action="<?php echo e(url('/crud')); ?> " method="POST">
        <?php if(!isset($userUpdate)): ?>
        Nom : <input type="text" name="name"><br>
        Email : <input type="email" name="email"><br>
        Mot de passe : <input type="text" name="password">
        <?php else: ?>
        Nom : <input type="text" name="name" value="<?php echo e($userUpdate->name); ?>"><br>
        Email : <input type="email" name="email" value="<?php echo e($userUpdate->email); ?>"><br>
        <?php endif; ?>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit">Envoyer</button>
        </form>
        <?php if(isset($userUpdate)): ?>
        <a href="<?php echo e(route('crud.delete', ['id' => $userUpdate->id] )); ?>">Supprimer</a>
        <?php endif; ?>
        <?php if(isset($users)): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>Nom : <?php echo e($user->name); ?>  </p>
                <p>Email : <?php echo e($user->email); ?></p>
                <a href="<?php echo e(route('crud', ['id' => $user->id] )); ?>">Modifier</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php
        if(DB::connection()->getPdo())
        {
            echo "Connexion ok =>". DB::connection()->getDatabaseName();
        }
        ?>
    </body>
</html><?php /**PATH C:\Users\33781\Desktop\laravel\example-app\resources\views/crud.blade.php ENDPATH**/ ?>