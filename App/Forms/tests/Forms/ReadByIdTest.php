<?php namespace App\Forms\tests\Forms;

use App\Forms\tests\TestCase;
use App\Forms\Models\Forms;
use Melisa\Laravel\Database\InstallUser;

class ReadByIdTest extends TestCase
{
    use InstallUser;
    
    public function testSimple()
    {
        
        $user = $this->findUser();
        $idForm = Forms::first()->id;
        
        $this->actingAs($user)
        ->json('get', 'forms/' . $idForm)
        ->seeJson([
            'success'=>true,
        ])
        ->seeJsonStructure([
            'data'=>[
                /* form */
                'id', 'title', 'items'=>[
                    '*'=>[
                        /* item */
                        'id', 'type', 'title', 'order', 'options'=>[
                            '*'=>[
                                /* option */
                                'id', 'type', 'text', 'order', 'value'
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        
    }
    
}
