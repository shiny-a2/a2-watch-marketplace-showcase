<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of a direct-purchase eligibility gate.
 *
 * A certified watch is only buyable when it is published AND currently in
 * custody and not flagged. Composing the listing's publication state with the
 * certificate's availability in one policy prevents a returned-but-certified or
 * flagged item from ever being offered for checkout. Pricing and checkout
 * integration stay private.
 */
final class PurchaseEligibilityPolicy
{
    /**
     * @param array<string,mixed> $state
     * @return array{purchasable:bool, reason:string}
     */
    public function decision(array $state): array
    {
        $published = ($state['listing_status'] ?? '') === 'certified_published'
            && ($state['visibility'] ?? '') === 'public';

        if (! $published) {
            return ['purchasable' => false, 'reason' => 'not-published'];
        }

        $available = ($state['certificate_available'] ?? true) === true;
        if (! $available) {
            return ['purchasable' => false, 'reason' => 'out-of-custody-or-flagged'];
        }

        return ['purchasable' => true, 'reason' => 'ok'];
    }
}
