<?php

declare(strict_types=1);

namespace App\Enum;

use App\Enum\AbstractEnum;

class MediaTypeEnum extends AbstractEnum
{
    public const BUILDING_DOCUMENT = 'building_document';

    public const OFFICE_DOCUMENT = 'office_document';
    public const FLOOR_DOCUMENT = 'floor_document';

    public const BUILDING_IMAGE = 'building_image';
    public const FLOOR_IMAGE = 'floor_image';
    public const OFFICE_IMAGE = 'office_image';

    public const HR_DOCUMENT = 'hr_document';
    public const HR_SIGNATURE = 'hr_signature';

    public const  HR_FIRST_IMAGE = 'hr_first_image';
    public const  HR_SECOND_IMAGE = 'hr_second_image';
    public const  HR_THIRD_IMAGE = 'hr_third_image';
    public const  HR_FOURTH_IMAGE = 'hr_fourth_image';

    public const  SUBSCRIPTION_RECEIPT = 'subscription_receipt';

    public const  SP_LOGO = 'sp_logo';
    public const  SP_FRONT_ID_CARD = 'sp_front_id_card';
    public const  SP_BACK_ID_CARD = 'sp_back_id_card';
    public const  SP_DOCUMENT = 'sp_document';
    public const  SP_CERTIFICATE = 'sp_certificate';

    public const  BA_LOGO = 'ba_logo';
    public const  BA_FRONT_ID_CARD = 'ba_front_id_card';
    public const  BA_BACK_ID_CARD = 'ba_back_id_card';
    public const  BA_DOCUMENT = 'ba_document';
    public const  BA_CERTIFICATE = 'ba_certificate';

    public const MEETING_IMAGE = 'meeting_image';
    public const EVENT_IMAGE = 'event_image';

    public const  MENTOR_LOGO = 'mentor_logo';
    public const  MENTOR_FRONT_ID_CARD = 'mentor_front_id_card';
    public const  MENTOR_BACK_ID_CARD = 'mentor_back_id_card';
    public const  MENTOR_DOCUMENT = 'mentor_document';
    public const  MENTOR_CERTIFICATE = 'mentor_certificate';
    public const CUSTOMER_LOGO = 'customer_logo';

    public static function getValues(): array
    {
        return array();
    }

    public static function getTranslationKeys(): array
    {
        return array();
    }
}
