<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Items are expected to ship prepaid into custody. Some arrive carriage-due
 * (the recipient pays the carrier on delivery).
 *
 * Rather than absorbing that cost silently, a carriage-due arrival is
 * reconciled against the seller's settlement. Prepaid arrivals need no
 * adjustment. The carriage amount is data on the shipment, never a literal here.
 */
final class PrepaidHandoffReconciliationPolicy
{
    public function settlementAdjustment(array $shipment): int
    {
        if (($shipment['carriage'] ?? 'prepaid') === 'carriage_due') {
            return -1 * max(0, (int) ($shipment['carriage_cost'] ?? 0));
        }

        return 0;
    }
}
