<?php

namespace Robertogallea\PulseApi\Http\Resources;

use Illuminate\Http\Request;

class DashboardResource extends PulseResource
{
    public function toArray(Request $request): array
    {
        $resources = config('pulse-api.resources');

        $result = collect($resources)->mapWithKeys(function (string $resource, string $key) use ($request) {
            return (new $resource(null, $this->period))->toArray($request);
        });

        return $result->toArray();
    }
}
