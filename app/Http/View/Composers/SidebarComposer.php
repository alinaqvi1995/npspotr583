<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Quote;
use App\Models\User;

class SidebarComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'usersCount'    => User::count(),
            'categoriesCount'    => Category::count(),
            'subcategoriesCount' => Subcategory::count(),
            'quotesCount'        => Quote::count(),
            'quoteStatusCounts'  => Quote::selectRaw('status, COUNT(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
                ->toArray(),
        ]);
    }
}
