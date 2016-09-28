<?php

namespace Domain\Client;

class ControllerTest extends \TestCase
{
    public function testCreate()
    {
        $name = 'Victor Hugo';
        $data = [
        'name'=> $name, 
        ];

        $this->post('client', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name'=> $name,
            ]);
        $this->seeInDatabase('clients',[
            'name'=> $name,
            ]);
    }
}
