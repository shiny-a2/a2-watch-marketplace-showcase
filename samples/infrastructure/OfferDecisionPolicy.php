<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

/**
 * Public-safe illustration of the price-offer decision boundary.
 *
 * A buyer offer moves through admin moderation, then a vendor decision
 * (accept / reject / counter), then a reserved-price checkout window. This
 * policy returns the actions allowed from a given state. Real pricing rules,
 * thresholds, and vendor identity stay private.
 */
final class OfferDecisionPolicy
{
    /**
     * @param array<string,string> $state
     * @return array{stage:string, actions:string[]}
     */
    public function decision(array $state): array
    {
        $status = $state['status'] ?? 'submitted';

        $actions = match ($status) {
            'submitted'          => ['admin_forward', 'admin_reject'],
            'sent_to_vendor'     => ['vendor_accept', 'vendor_counter', 'vendor_reject'],
            'counter_offered'    => ['buyer_accept', 'buyer_decline'],
            'accepted'           => ['issue_payment_link'],
            'payment_link_sent'  => ['await_payment', 'expire'],
            default              => [],
        };

        return ['stage' => $status, 'actions' => $actions];
    }
}
