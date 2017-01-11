<?php namespace App\Forms\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsTypesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->updateOrCreate('App\Forms\Models\OptionsTypes', [
            [
                'id'=>1,
                'name'=>'radiofield',
                'accountant'=>true,
            ],
            [
                'id'=>2,
                'name'=>'checkboxfield',
                'accountant'=>true,
            ],
            [
                'id'=>3,
                'name'=>'textfield',
                'accountant'=>false,
            ],
            [
                'id'=>4,
                'name'=>'areafield',
                'accountant'=>false,
            ],
            [
                'id'=>5,
                'name'=>'combobox',
                'accountant'=>true,
            ]
        ]);
        
    }
    
}
