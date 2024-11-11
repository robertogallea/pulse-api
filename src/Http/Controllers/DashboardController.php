<?php

namespace Robertogallea\PulseApi\Http\Controllers;

use Robertogallea\PulseApi\Http\Resources\DashboardResource;

class DashboardController
{
    public function index()
    {
        return new DashboardResource(null);
    }

    public function show(string $type)
    {
        if (array_key_exists($type, config('pulse-api.resources')->toArray())) {
            return new (config('pulse-api.resources.'.$type))(null);
        }

        return response()->json([
            'data' => [
                'message' => 'Metric type "'.$type.'" does not exist.',
            ],
        ], 404);
    }
}
