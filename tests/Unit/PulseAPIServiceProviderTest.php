<?php

namespace Tests\Unit;

use function PHPUnit\Framework\assertNotNull;

it('can load configuration', function () {
    assertNotNull(config('pulse-api'));
});
