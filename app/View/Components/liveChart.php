<?php

namespace App\View\Components;

use Illuminate\View\Component;

class liveChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $height;
    public $width;
    public $label;
    public function __construct($id, $height, $width, $label = null)
    {
        $this->id = $id;
        $this->height = $height;
        $this->width = $width;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.live-chart');
    }
}
