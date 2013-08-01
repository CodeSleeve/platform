<!-- alerts -->
<div class="row">
    <div class="span12">
        <?php if (Session::has('error')): ?>
            <div class="application alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?= Session::get('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (Session::has('success')): ?>
            <div class="application alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?= Session::get('success'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
