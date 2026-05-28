<?php

final class A2_Sample_Marketplace_Status_Service {
    private const ALLOWED = array(
        'submitted' => array('under_review'),
        'under_review' => array('approved', 'rejected', 'needs_information'),
        'approved' => array('listed'),
        'listed' => array('reserved', 'withdrawn'),
        'reserved' => array('in_custody', 'released'),
        'in_custody' => array('delivered', 'returned'),
    );

    public function transition(string $current, string $next): string {
        $current = sanitize_key($current);
        $next = sanitize_key($next);

        if (!in_array($next, self::ALLOWED[$current] ?? array(), true)) {
            throw new InvalidArgumentException('Invalid marketplace status transition.');
        }

        return $next;
    }
}

