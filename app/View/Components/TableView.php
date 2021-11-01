<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableView extends Component
{

    public $header;
    public $source;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    public function indexNo($index) {
        return $index + 1 + ($this->source->currentPage() - 1) * $this->source->perPage();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-view');
    }
}
