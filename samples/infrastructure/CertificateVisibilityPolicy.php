<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

final class CertificateVisibilityPolicy
{
    public function visible(array $listing): bool
    {
        return ($listing['review_state'] ?? '') === 'approved'
            && ($listing['certificate_state'] ?? '') === 'verified'
            && ($listing['public_listing'] ?? false) === true;
    }
}
