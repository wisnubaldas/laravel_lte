<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Knob extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $id;
    public function __construct($id,$label)
    {
        $this->label = $label;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.knob');
    }
}
