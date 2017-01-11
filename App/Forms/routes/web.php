<?php 

Route::group([
    'prefix'=>'modules',
    'namespace'=>'Modules'
], function() {
    
    require realpath(base_path() . '/routes/modules.php');
    
});

Route::group([
    'prefix'=>'forms',
], function() {
    
    require realpath(base_path() . '/routes/modules/forms.php');
    
});
