<?php

namespace App\Filament\Resources\ServiceCategoryResource\Widgets;

use App\Models\ServiceCategory;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ServiceCategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Count', ServiceCategory::count())->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('Active Count', ServiceCategory::where('is_active', 1)->count())->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('InActive Count', ServiceCategory::where('is_active', 0)->count())->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
        ];
    }
}
