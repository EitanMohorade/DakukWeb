<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{
    public $name;
    public $headers;
    public $rows;
    public $actions;
    public $notFoundMessage;
    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param array $headers
     * @param array $rows
     * @param bool $actions
     * @return void
     */
    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
