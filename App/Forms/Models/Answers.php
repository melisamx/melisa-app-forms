<?php namespace App\Forms\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Answers extends BaseUuid
{
    
    protected $connection = 'forms';
    
    protected $table = 'Answers';
    
    protected $fillable = [
        'id', 'idForm', 'idIdentityCreated', 'answers', 'averageQuestions', 'createdAt'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
