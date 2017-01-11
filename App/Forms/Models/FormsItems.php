<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FormsItems extends BaseUuid
{
    
    protected $connection = 'forms';
    
    protected $table = 'FormsItems';
    
    protected $fillable = [
        'id', 'idForm', 'idItemType', 'idIdentityCreated', 'order', 'required', 'removable', 'title', 'description', 'createdAt', 'idIdentityUpdatedAt', 'properties', 'updatedAt'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
