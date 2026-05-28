<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

final class SettlementEligibilityPolicy
{
    public function decision(array $state): array
    {
        $eligible = ($state['payment_state'] ?? '') === 'captured'
            && ($state['custody_state'] ?? '') === 'final'
            && ($state['certificate_state'] ?? '') === 'verified';

        return array(
            'eligible' => $eligible,
            'reason' => $eligible ? 'ready' : 'waiting-for-boundary',
        );
    }
}
