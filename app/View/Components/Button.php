<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Button extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $color = 'lime',
        public string $label = 'Find out more',
        public string $url = '#',
        public string $getBackground = 'bg-lime',
        public string $getHoverBackground = 'hover:bg-lime/10',
    ) {}

    public function getBackground()
    {
        return match ($this->color) {
            'lime' => 'bg-lime',
            'white' => 'bg-white',
            default => false,
        };
    }

    public function getHoverBackground()
    {
        return match ($this->color) {
            'lime' => 'hover:bg-lime/10',
            'white' => 'hover:bg-white/30',
            default => false,
        };
    }


    public function getArrowColor()
    {
        return match ($this->color) {
            'lime' => 'text-black',
            'white' => 'text-orange',
            default => false,
        };
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.button');
    }
}
