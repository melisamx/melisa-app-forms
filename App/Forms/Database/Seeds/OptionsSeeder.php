<?php namespace App\Forms\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installOption('option.forms.access', [
            'name'=>'Option main de aplicación forms',
            'text'=>'Forms',
            'isSubMenu'=>true
        ]);
        
    }
    
}
