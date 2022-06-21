<?php
declare(strict_types=1);

namespace App\Enum\TableHeadings\RealEstate;

use App\Enum\AbstractEnum;

class Floors extends AbstractEnum
{
    public const FLOOR_NAME = 'floor_name';
    public const FLOOR_NUMBER = 'floor_number';
    public const TYPE = 'type';
    public const AREA = 'area';

    /**
     * @inheritDoc
     */
    public static function getValues(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function getTranslationKeys(): array
    {
        return [
            self::FLOOR_NAME => __(sprintf('%s.%s', 'general', self::FLOOR_NAME)),
            self::FLOOR_NUMBER => __(sprintf('%s.%s', 'general', self::FLOOR_NUMBER)),
            self::TYPE => __(sprintf('%s.%s', 'general', self::TYPE)),
            self::AREA => __(sprintf('%s.%s', 'general', self::AREA)),
        ];
    }
}
