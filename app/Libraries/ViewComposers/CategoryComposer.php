<?php

namespace App\Libraries\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Entities\CategoryEntity;

class CategoryComposer
{
    /**
     * Bind data to the view.
     * Bind data vào view. $view->with('ten_key_se_dung_trong_view', $data);
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $load_categories = Category::where("active", 1)->get();

        // dd($load_categories);
        // bind to view
        $view->with('categories',  $load_categories);
    }
}
