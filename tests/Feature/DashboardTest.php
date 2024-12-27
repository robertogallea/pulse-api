<?php

use Illuminate\Support\Facades\Config;

beforeEach(function () {
    $this->withoutMiddleware(\Laravel\Pulse\Http\Middleware\Authorize::class);
});

it('can access full dashboard', function () {
    $this->getJson(route('api.pulse.dashboard'))
        ->assertExactJsonStructure([
            'data' => [
                'servers',
                'usage',
                'queues',
                'cache',
                'slow_queries',
                'exceptions',
                'slow_requests',
                'slow_jobs',
                'slow_outgoing_requests',
            ],
        ])
        ->assertOk();
});

it('can access single resource', function () {
    $this->getJson(route('api.pulse.resource', 'servers'))
        ->assertExactJsonStructure([
            'data' => [
                'servers',
            ],
        ])
        ->assertOk();
});

it('returns 404 if resource does not exist', function () {
    $this->getJson(route('api.pulse.resource', 'not-existing'))
        ->assertJson([
            'data' => [
                'message' => 'Metric type "not-existing" does not exist.',
            ],
        ])
        ->assertNotFound();
});

it('can register new resources', function () {
    createFakeResourceClass();

    $this->getJson(route('api.pulse.dashboard'))
        ->assertExactJsonStructure([
            'data' => [
                'fake-resource',
            ],
        ])
        ->assertOk();
});

function createFakeResourceClass()
{
    class FakeResource extends \Robertogallea\PulseApi\Http\Resources\PulseResource
    {
        public function toArray($request)
        {
            return [
                'fake-resource' => [],
            ];
        }
    }

    Config::set(
        'pulse-api.resources',
        ['fake-resource' => FakeResource::class]
    );
}
