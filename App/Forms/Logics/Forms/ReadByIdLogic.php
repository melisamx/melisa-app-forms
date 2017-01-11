<?php namespace App\Forms\Logics\Forms;

use Melisa\core\LogicBusiness;
use App\Forms\Repositories\FormsRepository;
use App\Forms\Repositories\FormsItemsRepository;
use App\Forms\Repositories\FormsOptionsRepository;
use App\Forms\Criteria\Forms\Items\WithTypeCriteria as ItemsCriteria;
use App\Forms\Criteria\Forms\Options\WithTypeCriteria as OptionsCriteria;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ReadByIdLogic
{
    use LogicBusiness;
    
    protected $formsrepo;
    protected $itemsrepo;
    protected $optionsrepo;
    protected $itemscriteria;
    protected $optionscriteria;

    public function __construct(
        FormsRepository $formsrepo,
        FormsItemsRepository $itemsrepo,
        FormsOptionsRepository $optionsrepo,
        ItemsCriteria $itemscriteria,
        OptionsCriteria $optionscriteria
    ) {
        
        $this->forms = $formsrepo;
        $this->itemsrepo = $itemsrepo;
        $this->optionsrepo = $optionsrepo;
        $this->itemscriteria = $itemscriteria;
        $this->optionscriteria = $optionscriteria;
        
    }
    
    public function init($id) {
        
        $form = $this->forms->find($id);
        $data = $form->getAttributes();
        $data ['items']= [];
        
        $formItems = $this->itemsrepo
                ->getByCriteria($this->itemscriteria)
                ->findAllBy('idForm', $id);
        
        if( !count($formItems)) {
            return response()->data($data);
        }
        
        foreach($formItems as $formItem) {
            
            $item = $formItem->getAttributes();
            $item ['options']= [];
            
            if( $formItem->type === 'header') {
                $data ['items'][]= $item;
                continue;
            }
            
            $formOptions = $this->optionsrepo->getByCriteriaReset($this->optionscriteria, [
                'idFormItem'=>$formItem->id
            ])->get();
            
            if( !count($formOptions)) {
                $data ['items'][]= $item;
                continue;
            }
            
            $item ['options']= $formOptions->toArray();
            $data ['items'][]= $item;
            
        }
        
        return response()->data($data);
        
    }
    
}
