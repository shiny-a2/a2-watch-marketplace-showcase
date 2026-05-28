<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

final class CustodyBoundaryPolicy
{
    public function canSettle(array $listing): bool
    {
        return ($listing['custody_state'] ?? '') === 'final'
            && ($listing['dispute_state'] ?? 'none') === 'none'
            && ($listing['review_state'] ?? '') === 'approved';
    }
}
