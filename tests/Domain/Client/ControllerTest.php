<?php

namespace Domain\Client;

class ControllerTest extends \TestCase
{
    public function testCreate()
    {
        $data = [
        'name'=> 'Victor Hugo', 
        ];
        $this->post('v1/client', $data);
    }
}
