<?php namespace App\Forms\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class OptionsTypesRepository extends Repository
{
    
    public function model() {
        
        return 'App\Forms\Models\OptionsTypes';
        
    }
    
}
