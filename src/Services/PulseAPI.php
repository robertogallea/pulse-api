<?php

namespace Robertogallea\PulseApi\Services;

use Illuminate\Support\Collection;
use Robertogallea\PulseApi\Enum\PulseResourcesEnum;
use Robertogallea\PulseApi\Http\Resources\CacheResource;
use Robertogallea\PulseApi\Http\Resources\ExceptionsResource;
use Robertogallea\PulseApi\Http\Resources\QueueResource;
use Robertogallea\PulseApi\Http\Resources\ServersResource;
use Robertogallea\PulseApi\Http\Resources\SlowJobsResource;
use Robertogallea\PulseApi\Http\Resources\SlowOutgoingRequestsResource;
use Robertogallea\PulseApi\Http\Resources\SlowQueriesResource;
use Robertogallea\PulseApi\Http\Resources\SlowRequestsResource;
use Robertogallea\PulseApi\Http\Resources\UsageResource;

class PulseAPI
{
    public static function getDefaultResources(): Collection
    {
        return collect([
            PulseResourcesEnum::SERVERS->value => ServersResource::class,
            PulseResourcesEnum::USAGE->value => UsageResource::class,
            PulseResourcesEnum::QUEUES->value => QueueResource::class,
            PulseResourcesEnum::CACHE->value => CacheResource::class,
            PulseResourcesEnum::SLOW_QUERIES->value => SlowQueriesResource::class,
            PulseResourcesEnum::EXCEPTIONS->value => ExceptionsResource::class,
            PulseResourcesEnum::SLOW_REQUESTS->value => SlowRequestsResource::class,
            PulseResourcesEnum::SLOW_JOBS->value => SlowJobsResource::class,
            PulseResourcesEnum::SLOW_OUTGOING_REQUESTS->value => SlowOutgoingRequestsResource::class,
        ]);
    }
}
