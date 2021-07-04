<?php


namespace App\View\Components;


class AuthLayout extends \Illuminate\View\Component
{

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.auth');
    }
}
