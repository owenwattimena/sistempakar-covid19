<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppMenuCard extends Component
{
    public $title;
    public $icon;
    public $alt;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon, $alt, $link)
    {
        //
        $this->title = $title;
        $this->icon = $icon;
        $this->alt = $alt;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.app-menu-card');
    }
}