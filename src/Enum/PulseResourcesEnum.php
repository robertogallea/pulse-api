<?php

namespace Robertogallea\PulseApi\Enum;

enum PulseResourcesEnum: string
{
    case SERVERS = 'servers';
    case USAGE = 'usage';
    case QUEUES = 'queues';
    case CACHE = 'cache';
    case SLOW_QUERIES = 'slow_queries';
    case EXCEPTIONS = 'exceptions';
    case SLOW_REQUESTS = 'slow_requests';
    case SLOW_JOBS = 'slow_jobs';
    case SLOW_OUTGOING_REQUESTS = 'slow_outgoing_requests';
}
