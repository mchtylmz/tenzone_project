<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SiteMenu extends Component
{
    public string $style;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->style = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.site_menu');
    }
}
