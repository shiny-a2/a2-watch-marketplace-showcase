<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

final class ReservationIdempotencyPolicy
{
    public function key(int $listingId, int $buyerId, string $intentRef): string
    {
        return hash('sha256', implode('|', array('reservation', $listingId, $buyerId, $intentRef)));
    }
}
