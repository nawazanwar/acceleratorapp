<?php
declare(strict_types=1);

namespace App\Enum\TableHeadings\Definition;

use App\Enum\AbstractEnum;

class Province extends AbstractEnum
{
    public const NAME = 'name';
    public const COUNTRY = 'country';
    public const STATUS = 'status';

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
            self::NAME => __(sprintf('%s.%s', 'general', self::NAME)),
            self::COUNTRY => __(sprintf('%s.%s', 'general', self::COUNTRY)),
            self::STATUS => __(sprintf('%s.%s', 'general', self::STATUS)),
        ];
    }
}
