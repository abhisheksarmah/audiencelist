<?php

namespace Tests\Unit;

use App\Attendee;
use App\Ticket;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttendeeTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_attendee_has_many_tickets()
    {
        $attendee = factory(Attendee::class)->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $attendee->tickets);
    }
}
