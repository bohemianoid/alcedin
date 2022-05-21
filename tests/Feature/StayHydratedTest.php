<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StayHydratedTest extends TestCase
{
    /**
     * Stay hydrated test.
     *
     * @return void
     */
    public function test_stay_hydrated()
    {
        Http::fake();

        $this->artisan('notify:drink')->assertSuccessful();
    }
}
