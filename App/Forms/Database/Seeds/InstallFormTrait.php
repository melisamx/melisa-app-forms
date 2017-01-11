<?php namespace App\Forms\Database\Seeds;

use App\Forms\Models\Forms;
use App\Forms\Models\ItemsTypes;
use App\Forms\Models\OptionsTypes;
use App\Forms\Models\FormsItems;
use App\Forms\Models\FormsOptions;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
trait InstallFormTrait
{
    
    public function installForm($title, array $items = [])
    {
        
        $idIdentity = $this->findIdentity()->id;
        
        $form = Forms::updateOrCreate([
            'title'=>$title,
        ], [
            'idIdentityCreated'=>$idIdentity,
            'totalQuestions'=>0,
        ]);
        
        if( empty($items)) {
            return;
        }
        
        $totalQuestions = 0;
        $order = 0;
        
        foreach($items as $item) {
            
            if( $item['type'] === 'question') {
                ++$totalQuestions;
            }
            
            $idFormItem = $this->formAppendItem($form->id, $item, $order);
            ++$order;
            
            if( !isset($item['options'])) {
                continue;
            }
            
            $orderOption = 0;
            
            foreach($item['options'] as $option) {
                
                $this->formAppendOption($idFormItem, $option, $orderOption);
                ++$orderOption;
                
            }
            
        }
        
        $form->totalQuestions = $totalQuestions;
        $form->save();
        
    }
    
    public function formAppendOption($idFormItem, $option, $order = 0)
    {
        
        $idOptionType = $this->findFormOptionType($option['type']);
        $idIdentity = $this->findIdentity()->id;
        
        $default = melisa('array')->mergeDefault($option, [
            'order'=>$order,
            'value'=>$option['text'],
        ]);
        
        $formOption = FormsOptions::updateOrCreate([
            'idFormItem'=>$idFormItem,
            'idOptionType'=>$idOptionType,
            'text'=>$default['text'],
            'order'=>$default['order'],
            'value'=>$default['value'],
        ], [
            'idIdentityCreated'=>$idIdentity,
        ]);
        
        return $formOption->id;
        
    }
    
    public function formAppendItem($idForm, array $item, $order = 0)
    {
        
        $idItemType = $this->findFormItemType($item['type']);
        $idIdentity = $this->findIdentity()->id;
        
        $default = melisa('array')->mergeDefault($item, [
            'order'=>$order,
            'required'=>true,
            'removable'=>false,
        ]);
        
        $formItem = FormsItems::updateOrCreate([
            'idForm'=>$idForm,
            'idItemType'=>$idItemType,
            'order'=>$default['order'],
        ], [
            'idIdentityCreated'=>$idIdentity,
            'title'=>$default['title'],
            'required'=>$default['required'],
            'removable'=>$default['removable'],
        ]);
        
        return $formItem->id;
        
    }
    
    public function findForm($title)
    {
        
        return Forms::where('title', $title)->first()->id;
        
    }
    
    public function findFormItemType($type)
    {
        
        return ItemsTypes::where('name', $type)->first()->id;
        
    }
    
    public function findFormOptionType($type)
    {
        
        return OptionsTypes::where('name', $type)->first()->id;
        
    }
    
}
