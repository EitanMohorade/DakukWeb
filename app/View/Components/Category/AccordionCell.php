<?php

namespace App\View\Components\Category;

use Illuminate\View\Component;
use App\Models\Category;

class AccordionCell extends Component
{
    public Category $category;

    /**
     * Create a new component instance.
     * 
     * @param App\Models\Category $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category.accordion-cell');
    }
}
