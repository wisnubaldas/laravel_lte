<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HorizontalLineChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $width;
    public $height;
    public function __construct($id,$width,$height)
    {
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.horizontal-line-chart');
    }
}
