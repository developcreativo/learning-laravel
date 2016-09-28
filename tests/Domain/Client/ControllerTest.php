<?php

namespace Domain\Client;

use Domain\User\User;

class ControllerTest extends \TestCase
{
    public function testCreate()
    {
        $this->login();

        $name = 'Victor Hugo';
        $data = [
        'name' => $name,
        ];

        $this->post('client', $data, []);
        $this->seeStatusCode(200);
        $this->seeJson([
            'name'=> $name,
            ]);
        $this->seeInDatabase('clients',[
            'name'=> $name,
            ]);
    }
}
