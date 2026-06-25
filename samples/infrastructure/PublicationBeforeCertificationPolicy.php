<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * "Listed" and "authenticity certified" are different guarantees.
 *
 * An item becomes publicly visible and purchasable once an operator approves
 * it, even before physical authentication is complete. The certified label is
 * a separate, later signal that is only true once the item has been received
 * and verified in custody. Buyer actions gate on publication, not on the label.
 */
final class PublicationBeforeCertificationPolicy
{
    public function purchasable(array $listing): bool
    {
        $state = $listing['listing_state'] ?? '';

        return in_array($state, ['approved_pending_authentication', 'authenticated'], true)
            && ($listing['public_listing'] ?? false) === true;
    }

    public function showsCertifiedLabel(array $listing): bool
    {
        return ($listing['authentication_state'] ?? '') === 'verified_in_custody';
    }
}
