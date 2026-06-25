<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * The verification step at point of sale is mandatory and priced by policy,
 * never by a number baked into the checkout path.
 *
 * The fee resolves to either a flat amount or a proportion of the item value,
 * chosen per deployment. Additional services are optional, additive line items.
 * Amounts and rates are configuration, not part of this showcase.
 */
final class VerificationFeePolicy
{
    public function isMandatory(): bool
    {
        return true;
    }

    public function fee(array $config, int $itemValue): int
    {
        $mode = $config['mode'] ?? 'flat';

        if ($mode === 'proportional') {
            $rate = (float) ($config['rate'] ?? 0.0);

            return (int) round($itemValue * $rate);
        }

        return max(0, (int) ($config['amount'] ?? 0));
    }
}
