<?php

final class A2_Sample_Review_Queue_Repository {
    private wpdb $db;
    private string $table;

    public function __construct(wpdb $db) {
        $this->db = $db;
        $this->table = $db->prefix . 'a2_marketplace_review_sample';
    }

    public function next_items(int $limit = 20): array {
        return $this->db->get_results(
            $this->db->prepare(
                "SELECT item_id, seller_id, status, submitted_at
                 FROM {$this->table}
                 WHERE status IN ('submitted', 'needs_information')
                 ORDER BY submitted_at ASC
                 LIMIT %d",
                max(1, min(50, $limit))
            ),
            ARRAY_A
        ) ?: array();
    }
}

