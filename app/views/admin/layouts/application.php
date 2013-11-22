<!DOCTYPE html>
<html>
    <head>
        <title><?= isset($title) ? $title : 'Codesleeve' ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?= stylesheetLinkTag('admin/application') ?>
    </head>
    
    <body>
        <?= View::make('admin.layouts._navbar') ?>       
        <div class="container-fluid push-down">
            <div class="row-fluid">
                <div class="span2">
                    <?=  View::make('admin.layouts._leftNav') ?>
                </div>
                <div class="span10">
                    <?= View::make('admin.layouts._messages') ?>
                    
                    <?= $content ?>
                </div>
            </div><hr>
            
            <div class="row-fluid">
                <div class="footer">
                    <p>&copy;Code Sleeve Platform <?= date('Y') ?></p>
                </div>
            </div>
        </div>
        
        <script src="<?= asset('vendors/ckeditor/ckeditor.js') ?>"></script>
        <?= javascriptIncludeTag('admin/application') ?>
    </body>
</html>
