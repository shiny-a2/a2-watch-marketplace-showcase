<?php

declare(strict_types=1);

namespace A2\Showcase\Marketplace\Infrastructure;

final class MarketplaceStateTransitionGuard
{
    private array $allowed = array(
        'draft' => array('submitted'),
        'submitted' => array('reviewing', 'rejected'),
        'reviewing' => array('certified', 'needs-info', 'rejected'),
        'certified' => array('listed'),
        'listed' => array('reserved'),
        'reserved' => array('in-custody', 'released'),
        'in-custody' => array('settlement-ready'),
    );

    public function allow(string $from, string $to): bool
    {
        return in_array($to, $this->allowed[$from] ?? array(), true);
    }
}
