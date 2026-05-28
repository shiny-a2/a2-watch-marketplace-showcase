<?php

final class A2_Sample_Publication_Policy {
    public function can_publish(array $item): bool {
        return ($item['status'] ?? '') === 'approved'
            && ($item['certification_status'] ?? '') === 'verified'
            && !empty($item['operator_reviewed_at'])
            && empty($item['seller_hold']);
    }

    public function public_payload(array $item): array {
        if (!$this->can_publish($item)) {
            throw new RuntimeException('Item is not publishable.');
        }

        return array(
            'title' => sanitize_text_field($item['title'] ?? ''),
            'summary' => sanitize_textarea_field($item['summary'] ?? ''),
            'status' => 'available',
        );
    }
}

