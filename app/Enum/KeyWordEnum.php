<?php

namespace App\Enum;

class KeyWordEnum extends AbstractEnum
{

    public const DASHBOARD = 'dashboard';
    public const FRONT_DESK = 'front_desk';
    public const FIXED_ASSETS = 'fixed_assets';
    public const ASSETS_INVENTORY = 'assets_inventory';
    public const ASSETS_UNIT = 'assets_unit';
    public const ASSETS_LOCATION = 'assets_location';
    public const CALL_TYPE = 'call_type';
    public const PURPOSE = 'purpose';
    public const POSTAL_DISPATCH = 'postal_dispatch';
    public const POSTAL_RECEIVE = 'postal_receive';
    public const VISITOR_BOOK = 'visitor_book';
    public const COMPLAIN = 'complain';
    public const PHONE_CALL_LOG = 'phone_call_log';
    public const SOURCE = 'source';
    public const REFERENCE = 'reference';
    public const SALES_ENQUIRY = 'sales_enquiry';
    public const COMPLAIN_TYPE = 'complain_type';
    public const FRONT_DESK_SETUP = 'front_desk_setup';

    public const BUILDING_PRINT = 'building_print';
    public const FLAT_OWNERS = 'flat_owners';
    public const NOMINEE_PRINT = 'nominee_print';
    public const BUILDINGS = 'buildings';
    public const HR_PRINT = 'hr_print';
    public const FLATS_SHOPS = 'flats_shop';
    public const SHARED_SPACE = 'shared_space';
    public const BUILDING_UNITS_ALLOTMENT = 'building_units_allotment';
    public const HUMAN_RESOURCE = 'human_resource';
    public const HR_PERSONS = 'hr_persons';
    public const BUYERS = 'buyers';
    public const EMPLOYEES = 'employees';
    public const SALES = 'sales';
    public const TITLE_TRANSFER = 'title_transfer';
    public const SALES_LISTING = 'sales_listing';
    public const COMMODITY_DEAL_CLOSING = 'commodity_deal_closing';

    public const DEFINITIONS = 'definitions';
    public const FLOOR_NAMES = 'floor_names';
    public const FLOOR_SIZE = 'floor_size';

    public const LEDGER = 'ledger';

    public const INSTALLMENT_TERM = 'installment_term';
    public const SALES_QUOTATION = 'sales_quotation';
    public const SUPPLIER_LEDGER = 'supplier_ledger';
    public const SELLER_LEDGER = 'seller_ledger';
    public const BUYER_LEDGER = 'buyer_ledger';
    public const BROKER_LEDGER = 'broker_ledger';
    public const GENERAL_LEDGER = 'general_ledger';

    public const VOUCHER = 'voucher';
    public const BUYER_CASH_RECEIVING = 'buyer_cash_receiving';
    public const BUYER_INSTALLMENT_RECEIVING = 'buyer_installment_receiving';
    public const SUPPLIER_PAYMENT = 'supplier_payment';
    public const SELLER_PAYMENT = 'seller_payment';
    public const BROKER_PAYMENT = 'broker_payment';
    public const REPORTS = 'reports';
    public const TITLE_TRANSFER_PRINT = 'title_transfer_print';
    public const AGING_REPORT = 'aging_report';
    public const PENDING_COLLECTIONS = 'pending_collections';
    public const COLLECTED_PAYMENTS = 'collected_payments';
    public const CASH_ONLY_DEALINGS = 'cash_only_dealings';
    public const COMMODITY_ONLY_DEALINGS = 'commodity_only_dealings';
    public const CASH_COMMODITY_DEALINGS = 'cash_commodity_dealings';
    public const COMMODITY_EXPECTED_VALUE = 'commodity_expected_value';
    public const FLAT_WISE_PROFIT_LOSS = 'flat_wise_profit_loss';
    public const SALES_REPORT = 'sales_report';
    public const BROKER_WISE_SALES = 'broker_wise_sales';
    public const PURCHASE_REPORT = 'purchase_report';
    public const STOCK_REPORT = 'stock_report';
    public const NOMINEE_REGISTRATION = 'nominee_registration';
    public const INVENTORY = 'inventory';
    public const PURCHASE_STOCK = 'purchase_stock';
    public const OWN_STOCK = 'own_stock';
    public const INVESTOR_STOCK = 'investor_stock';

    public const PERMISSION = 'permissions';
    public const ROLE = 'roles';
    public const USER = 'users';

    public const GENERAL = 'general';

    public const COMMODITY_TYPES = 'commodity_types';
    public const PRINT = 'print';
    public const CASH_BOOK = 'cash_book';
    public const PROFIT_LOSS = 'profit_loss';
    public const BROKER_REPORT = 'broker_report';

    public const SYNC_PERMISSION = 'sync_permission';
    public const PAYROLL = 'payroll';
    public const ADVANCE_SALARY = 'advance_salary';
    public const SALARY_RECORDS = 'salary_records';
    public const EMPLOYEE_LOAN = 'employee_loan';
    public const EMPLOYEE_LOAN_RECORDS = 'employee_loan_records';
    public const EMPLOYEE_LOAN_RECEIVING = 'employee_loan_receiving';
    public const BALANCE_SHEET = 'balance_sheet';
    public const DEBIT_VOUCHER = 'debit_voucher';
    public const CREDIT_VOUCHER = 'credit_voucher';
    public const OPENING_BALANCE_VOUCHER = 'opening_balance_voucher';
    public const CREATE_ACCOUNT_HEAD = 'create_account_head';
    public const BUSINESS_SETTINGS = 'business_settings';
    //plan management
    public const PLAN_MANAGEMENT = 'plan_management';
    public const PLAN = 'plan';
    public const PLAN_LIST = 'plan_list';
    public const PLAN_NEW = 'new_plan';
    // system management
    public const SYSTEM_CONFIGURATION = 'system_configuration';
    public const SETTING = 'setting';
    //user management
    public const USER_MANAGEMENT = 'USER_MANAGEMENT';
    public const RELATIONS = 'relation';
    public const CAST = 'cast';
    public const EMPLOYEE_TYPE = 'employee_type';
    public const EMPLOYEE_SUB_TYPE = 'employee_sub_type';
    public const TAX_TYPE = 'tax_type';
    public const NATIONALITY = 'nationality';
    public const COUNTRY = 'country';
    public const PROVINCE = 'province';
    public const DISTRICT = 'district';
    public const TEHSIL = 'tehsil';
    public const COLONY = 'colony';
    public const DEPARTMENT = 'department';
    public const DESIGNATION = 'designation';
    public const MINISTRY = 'ministry';
    public const EMPLOYMENT = 'employment';
    public const PROFESSION = 'profession';
    public const ORGANIZATION = 'organization';
    public const TAX_STATUS = 'tax_status';
    public const HR_BUSINESS = 'hr_business';
    // event management
    public const EVENT_MANAGEMENT = 'event_management';
    public const EVENT = 'event';
    public const EVENT_LIST = 'event_list';
    public const EVENT_NEW = 'new_event';
    // flat management
    public const FLAT_MANAGEMENT = 'flat_management';
    public const FLAT = 'flat';
    public const FLAT_TYPE = 'flat_type';
    public const FLOOR = 'floor';
    public const FLOOR_TYPE = 'floor_type';
    //service management
    public const SERVICE_MANAGEMENT = 'service_management';
    public const SERVICE = 'service';
    //definition
    public const DEFINITION = 'definition';
    public const HR_PERSON = 'hr_person';
    public const RELATION = 'relation';

    static function getConstants()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    public static function getValues(): array
    {
        return KeyWordEnum::getConstants();
    }

    public static function getTranslationKeys(): array
    {
        return [];
    }
}
