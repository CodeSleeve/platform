<div id="recoverPasswordModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Recover Password</h4>
            </div>
            
            <div class="modal-body">
                <p>Hey, it happens. Let us know your email address and we will get this fixed.</p>
                <form method="post" action="<?= action("{$namespace}\PasswordResetController@store") ?>">
                    <?= Form::token() ?>
                    
                    <div class="form-group">
                        <input type="text" name="email" placeholder="your@email.com" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Recover</button>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>
            </div>
        </div>
    </div>
</div>