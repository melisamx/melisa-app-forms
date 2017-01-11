<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ItemsTypes extends Base
{
    
    protected $connection = 'forms';
    
    protected $table = 'ItemsTypes';
    
    protected $fillable = [
        'id', 'name', 'active', 'properties'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
