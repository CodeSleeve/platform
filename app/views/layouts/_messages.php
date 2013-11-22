<div class="current messages">
    <?php if (Session::has('error')): ?>
        <?php if (Session::has('reason')): ?>
            <div class="application alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?= trans(Session::get('reason')) ?>
            </div>
        <?php else: ?>
            <div class="application alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?= Session::get('error') ?>
            </div>
        <?php endif ?>
    <?php endif ?>

    <?php if (Session::has('success')): ?>
        <?php if (Session::get('success') == 1): ?>
            <div class="application alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                An e-mail with password reset information has been sent.
            </div>
        <?php else: ?>
            <div class="application alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?= Session::get('success') ?>
            </div>
        <?php endif ?>
    <?php endif ?>    
</div>
