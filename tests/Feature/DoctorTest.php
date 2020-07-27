<?php

namespace Tests\Feature;

use App\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoctorTest extends TestCase
{
    use RefreshDatabase;

    public function test_doctor_crud()
    {
        factory(Doctor::class,10)->create();
        $this->withoutExceptionHandling();

        $res=$this->get(route('doctor.index'));
        $this->assertEquals($res->getContent(),Doctor::all()->count());

        $res=$this->post(route('doctor.store'),factory(Doctor::class,1)->make()->first()->toArray());

    }


}
