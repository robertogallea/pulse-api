<?php

namespace Robertogallea\PulseApi\Http\Controllers;

use Illuminate\Http\Request;
use Robertogallea\PulseApi\Http\Resources\DashboardResource;

class DashboardController
{
    public function index(Request $request)
    {
        $period = $request->query('period', '');

        return new DashboardResource(null, $period);
    }

    public function show(Request $request, string $type)
    {
        $period = $request->query('period', '');
        if (array_key_exists($type, config('pulse-api.resources'))) {
            return new (config('pulse-api.resources.'.$type))(null, $period);
        }

        return response()->json([
            'data' => [
                'message' => 'Metric type "'.$type.'" does not exist.',
            ],
        ], 404);
    }
}
