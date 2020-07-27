<?php

namespace Tests\Feature;

use App\Appointment;
use App\Doctor;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str as Str;
use Tests\TestCase;
use App\User;
use App\Shift;
use Carbon\Carbon;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    private $users;

    public function setUp() : void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(VerifyCsrfToken::class);
        factory(Doctor::class,10)->create()->each(function($doctor){
            factory(Shift::class,1)->create();
        });
        $this->users=$user=factory(User::class,100)->create();
    }


    public function test_basic_appointment()
    {
        $date=Carbon::now()->toDateTimeString();

        $this->users->each(function($user) use ($date){
            echo 'I am user '.$user->name."\n";
            $data=[
                'doctor_id'=>1,
                'user_id'=>$user->id,
                'date'=>$date,
                'paid'=>1,
                'payment_id'=>Str::random(6)
            ];
            $this->actingAs($user);
            echo 'Applying for an appointment'."\n";
            $this->post(route('appointment'),$data)->getContent();
        });

        dd('done');


//        $this->assertEquals(50,Appointment::all()->count());
    }
}
