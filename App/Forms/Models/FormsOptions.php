<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FormsOptions extends BaseUuid
{
    
    protected $connection = 'forms';
    
    protected $table = 'FormsOptions';
    
    protected $fillable = [
        'id', 'idFormItem', 'idOptionType', 'idIdentityCreated', 'text', 'order', 'createdAt', 'value', 'idIdentityUpdatedAt', 'properties', 'updatedAt'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
