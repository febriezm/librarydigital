<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KoleksiTable extends Component
{
    public $koleksipribadi;
    /**
     * Create a new component instance.
     */
    public function __construct($koleksipribadi)
    {
        $this->koleksipribadi = $koleksipribadi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.koleksi-table');
    }
}
