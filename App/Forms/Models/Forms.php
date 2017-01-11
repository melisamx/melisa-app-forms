<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Forms extends BaseUuid
{
    
    protected $connection = 'forms';
    
    protected $table = 'Forms';
    
    protected $fillable = [
        'id', 'idIdentityCreated', 'title', 'description', 'active', 'totalQuestions', 'totalAnswers', 'closed', 'createdAt', 'averageAllAnswers', 'idIdentityUpdatedAt', 'updatedAt'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
