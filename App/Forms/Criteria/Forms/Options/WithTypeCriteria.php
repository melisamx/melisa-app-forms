<?php namespace App\Forms\Criteria\Forms\Options;

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
        
        return $model->join('OptionsTypes as ot', 'ot.id', '=', 'FormsOptions.idOptionType')
            ->select([
                'FormsOptions.*',
                'ot.name as type'
            ])
            ->where('FormsOptions.idFormItem', $input['idFormItem'])
            ->orderBy('FormsOptions.order');
        
    }
    
}
