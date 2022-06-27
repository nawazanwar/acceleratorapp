<?php

namespace App\Services;

use App\Models\WorkingSpace\Flat;
use App\Models\WorkingSpace\Floor;
use App\Models\Sales\Installment;
use Carbon\Carbon;

class HomeService
{
    public static function getTotalFlatsCount()
    {
        return Flat::count();
    }

    public static function getTotalFloorsCount()
    {
        return Floor::count();
    }
    public static function getTotalSoldFlatsCount()
    {
        return Flat::where('sales_status', '!=', 'open')
            ->count();
    }
    public static function getAllMonthName(): array
    {
        return [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
    }

    public static function daysInMonth($month): array
    {
        $totalDays = Carbon::now()->month($month)->daysInMonth;
        $days = [];
        for ($i = 1; $i <= $totalDays; $i++) {
            $days[] = $i;
        }
        return $days;
    }

    public static function installmentStatistics()
    {
        $recordsCollectable = Installment::whereMonth('installment_date', Carbon::today()->month)
            ->whereYear('installment_date', Carbon::today()->year)
            ->where('status', 'unpaid')->get();
        $recordsCollection = Installment::whereMonth('installment_date', Carbon::today()->month)
            ->whereYear('installment_date', Carbon::today()->year)
            ->where('status', 'paid')->get();

        return [
            'collectableAmount' => $recordsCollectable->sum('installment_amount'),
            'collectionAmount' => $recordsCollection->sum('installment_amount'),
            'collectableCount' => $recordsCollectable->count(),
            'collectionCount' => $recordsCollection->count(),
            'month' => Carbon::today()->monthName . '-' . Carbon::today()->year,
            'year' => Carbon::today()->year,
        ];

    }
}
