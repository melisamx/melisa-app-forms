<?php namespace App\Forms\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DataSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->call(Data\ItemsTypeSeeder::class);
        $this->call(Data\OptionsTypesSeeder::class);
        
    }
    
}
