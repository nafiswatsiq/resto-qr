<?php

namespace App\Filament\Widgets;

use App\Models\Menu;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsMenu extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Menu', Menu::count()),
            Stat::make('Total Order', Order::count()),
        ];
    }
}
