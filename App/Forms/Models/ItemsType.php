<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ItemsType extends Base
{
    
    protected $connection = 'forms';
    
    protected $table = 'ItemsType';
    
    protected $fillable = [
        'id', 'name', 'active', 'properties'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
