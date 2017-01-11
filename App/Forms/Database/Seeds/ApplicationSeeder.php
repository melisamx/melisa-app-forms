<?php namespace App\Forms\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installApplication('forms', [
            'name'=>'Forms',
            'description'=>'Application Forms',
            'nameSpace'=>'Melisa.forms',
            'typeSecurity'=>'art'
        ]);
        
        $this->installAssetCss('app.forms.desktop.form.view', [
            'name'=>'CSS view form',
            'path'=>'/forms/css/form.css',
        ]);
        
    }
    
}
