<?php namespace App\Forms\Criteria\Forms\Items;

use Melisa\Repositories\Criteria\Criteria;
use Melisa\Repositories\Contracts\RepositoryInterface;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WithTypeCriteria extends Criteria
{
    
    public function apply($model, RepositoryInterface $repository, array $input = [])
    {
        
        return $model->join('ItemsTypes as it', 'it.id', '=', 'FormsItems.idItemType')
            ->select([
                'FormsItems.*',
                'it.name as type'
            ])
            ->orderBy('FormsItems.order');
        
    }
    
}
