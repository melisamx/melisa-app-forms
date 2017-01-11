<?php namespace App\Forms\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use Validator;
use App\Forms\Logics\Forms\ReadByIdLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FormsController extends Controller
{
    
    public function readById($id, ReadByIdLogic $logic)
    {
        
        $validator = Validator::make([
            'id'=>$id
        ], [
            'id'=>'required|alpha_dash|size:36|exists:forms.Forms,id'
        ]);
        
        if($validator->fails()) {
            return response()->data(false);
        }
        
        return $logic->init($id);
        
    }
    
}
