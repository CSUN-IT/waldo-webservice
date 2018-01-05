<?php

namespace App\Classes;

/**
 * This class exists to perform well-known calculations for the State Plane
 * Coordinate system. Its primary use is to convert X/Y relative coordinates
 * in a given zone to absolute latitude/longitude coordinates for mapping.
 */
class StatePlaneMapping
{
	/**
	 * Constant describing the conversion metric from kilometers to meters.
	 *
	 * @var float
	 */
	const KILOMETERS_TO_METERS = 1000.0;

	/**
	 * Constant describing the conversion metric from meters to kilometers.
	 *
	 * @var float
	 */
	const METERS_TO_KILOMETERS = 0.001;

	/**
	 * Constant describing the conversion metric from meters to feet.
	 *
	 * @var float
	 */
	const METERS_TO_FEET = 3.28084;

	/**
	 * Constant describing the conversion metric from feet to meters.
	 *
	 * @var float
	 */
	const FEET_TO_METERS = 0.3048;

	/**
	 * Constant describing the approximate radius of the Earth in kilometers.
	 * This is used in lat/long calculations due to the Earth's curviture.
	 *
	 * @var float
	 */
	const EARTH_RADIUS_KILOMETERS = 6371.0;

	/**
	 * Constant describing source units as feet for calculations.
	 *
	 * @var string
	 */
	const UNITS_FEET = "feet";

	/**
	 * Constant describing source units as meters for calculations.
	 *
	 * @var string
	 */
	const UNITS_METERS = "meters";

	/**
	 * Calculates and returns the number of meters per degree of longtitude. This
	 * can be used in calculations regarding northing.
	 *
	 * @param float $longitude The longitude for which to calculate the meters
	 * @return float
	 *
	 * @see https://stackoverflow.com/a/7478827
	 */
	public static function metersPerLongitudeDegree($longitude) {
		return ((2.0 * M_PI) / 360.0) *
			self::EARTH_RADIUS_KILOMETERS * self::KILOMETERS_TO_METERS *
			cos($longitude);
	}

	/**
	 * Calculates and returns the number of meters per degree of latitude. This
	 * can be used in calculations regarding easting.
	 *
	 * @param float $latitude The latitude for which to calculate the meters
	 * @return float
	 *
	 * @see https://stackoverflow.com/a/7478827
	 */
	public static function metersPerLatitudeDegree($latitude) {
		return ((2.0 * M_PI) / 360.0) *
			self::EARTH_RADIUS_KILOMETERS * self::KILOMETERS_TO_METERS;
	}
}