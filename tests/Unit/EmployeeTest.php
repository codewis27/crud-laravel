<?php

namespace Tests\Unit;

use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_update_data()
    {
        $response = $this->call('POST', 'update/1', [
            'name' => 'Pegawai update',
            'gender' => 'Male',
            'contact' => '089'
        ]);
        $response->assertStatus(302);
    }
}
