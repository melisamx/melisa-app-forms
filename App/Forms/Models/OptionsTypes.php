<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsTypes extends Base
{
    
    protected $connection = 'forms';
    
    protected $table = 'OptionsTypes';
    
    protected $fillable = [
        'id', 'name', 'accountant', 'active', 'properties'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
