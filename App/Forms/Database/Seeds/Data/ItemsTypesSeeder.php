<?php namespace App\Forms\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ItemsTypesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->updateOrCreate('App\Forms\Models\ItemsTypes', [
            [
                'id'=>1,
                'name'=>'header',
            ],
            [
                'id'=>2,
                'name'=>'section',
            ],
            [
                'id'=>3,
                'name'=>'question',
            ],
            [
                'id'=>4,
                'name'=>'image',
            ],
            [
                'id'=>5,
                'name'=>'video',
            ]
        ]);
        
    }
    
}
