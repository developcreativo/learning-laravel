<?php

namespace Domain\Auth;

use Domain\User\User;

class ControllerTest extends \TestCase
{
    public function testLogin()
    {
        //Sets
        $data = [
            'username' => 'testUser',
            'password' => 'testPassword',
        ];

        $user             = $data;
        $user['password'] = bcrypt($user['password']);
        $user['email']    = 'test@test.com';
        factory(User::class)->create($user);

        $this->post('auth/login', $data);

        //Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'username' => 'testUser',
        ]);
    }

    public function testLoginWithEmail()
    {
        //Sets
        $data = [
            'username' => 'test@test.com',
            'password' => 'testPassword',
        ];

        $user = [
            'username' => 'testUser',
            'password' => bcrypt($data['password']),
            'email'    => 'test@test.com',
        ];

        factory(User::class)->create($user);

        $this->post('auth/login', $data);

        //Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
            'username' => 'testUser',
        ]);
    }

    public function testCantLogin()
    {
        $data = [
            'username' => uniqid(),
            'password' => 'testPassword',
        ];
        $this->post('auth/login', $data);

        //Asserts
        $this->seeStatusCode(401);
    }
}
