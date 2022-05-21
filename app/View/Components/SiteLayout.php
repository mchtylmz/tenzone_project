<?php

namespace App\View\Components;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Boolean;

class SiteLayout extends Component
{
    public string $body;
    public string $class;
    public string $style;
    public string $menuStyle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->body  = 'homepage';
        $this->class = '';
        $this->style = '';
        $this->menuStyle = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.site');
    }
}
