<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputError extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $messages = "";
    public function __construct($messages)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.input-error');
    }
}
