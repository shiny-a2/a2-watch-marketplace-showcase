<?php
/**
 * Sample: two-axis authenticity label resolution.
 *
 * Illustrative only. Names, labels and thresholds are generic; verification
 * rules and operator procedures are deliberately not represented.
 *
 * @package Showcase
 */

namespace Showcase\Catalog;

/**
 * Authenticity is two independent facts: who reached the judgement, and what
 * the judgement was. Collapsing them into one column makes "we inspected this
 * and it is genuine" indistinguishable from "the seller says it is genuine".
 *
 * Every normalisation path below is biased toward understating trust. A bug
 * should make an item look less certain than it is, never more.
 */
final class AuthenticityLabel {
    public const SOURCE_MARKETPLACE = 'marketplace_verified';
    public const SOURCE_SELLER      = 'seller_declared';

    public const ORIGINAL   = 'original';
    public const REPLICA    = 'replica';
    public const UNDECLARED = 'undeclared';

    /**
     * Unknown input becomes the seller's own claim, never the marketplace's.
     */
    public static function normalizeSource( mixed $value ): string {
        $value = is_string( $value ) ? strtolower( trim( $value ) ) : '';

        return self::SOURCE_MARKETPLACE === $value ? self::SOURCE_MARKETPLACE : self::SOURCE_SELLER;
    }

    /**
     * Unknown input becomes undeclared, never genuine.
     */
    public static function normalizeOriginality( mixed $value ): string {
        $value = is_string( $value ) ? strtolower( trim( $value ) ) : '';

        return in_array( $value, array( self::ORIGINAL, self::REPLICA ), true ) ? $value : self::UNDECLARED;
    }

    /**
     * Undeclared items are not publishable: the catalogue would otherwise carry
     * an item with no honest statement about what it is.
     */
    public static function isPublishable( string $originality ): bool {
        return self::UNDECLARED !== self::normalizeOriginality( $originality );
    }

    /**
     * All four publishable combinations, each with its own presentation.
     *
     * @return array<string,array{tone:string,verified:bool,original:bool}>
     */
    public static function map(): array {
        return array(
            self::SOURCE_MARKETPLACE . ':' . self::ORIGINAL => array(
                'tone'     => 'verified-original',
                'verified' => true,
                'original' => true,
            ),
            self::SOURCE_MARKETPLACE . ':' . self::REPLICA => array(
                'tone'     => 'verified-replica',
                'verified' => true,
                'original' => false,
            ),
            self::SOURCE_SELLER . ':' . self::ORIGINAL => array(
                'tone'     => 'declared-original',
                'verified' => false,
                'original' => true,
            ),
            self::SOURCE_SELLER . ':' . self::REPLICA => array(
                'tone'     => 'declared-replica',
                'verified' => false,
                'original' => false,
            ),
        );
    }

    /**
     * Parse a catalogue facet key.
     *
     * Anything that does not round-trip is rejected rather than normalised
     * through, so a hand-edited query string cannot widen a filter.
     *
     * @return array{source:string,originality:string}|null
     */
    public static function parseFacetKey( string $key ): ?array {
        if ( ! str_contains( $key, ':' ) ) {
            return null;
        }

        [ $source, $originality ] = explode( ':', $key, 2 );
        $source                   = self::normalizeSource( $source );
        $originality              = self::normalizeOriginality( $originality );

        if ( $source . ':' . $originality !== $key ) {
            return null;
        }

        // Undeclared is a pre-publication state, never a public filter.
        return self::UNDECLARED === $originality
            ? null
            : array( 'source' => $source, 'originality' => $originality );
    }

    /**
     * The marketplace label may only be claimed when an inspection is on record.
     *
     * @param array{source?:string,originality?:string,inspected_at?:?string} $item
     */
    public static function assertPublishable( array $item ): ?string {
        $source      = self::normalizeSource( $item['source'] ?? '' );
        $originality = self::normalizeOriginality( $item['originality'] ?? '' );

        if ( ! self::isPublishable( $originality ) ) {
            return 'originality_undeclared';
        }

        if ( self::SOURCE_MARKETPLACE === $source && empty( $item['inspected_at'] ) ) {
            return 'verification_unbacked';
        }

        return null;
    }
}
