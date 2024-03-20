<?php

namespace Mortezamasumi\FilamentLanguageSwitch\Http\Livewire;

use Mortezamasumi\FilamentLanguageSwitch\Events\LocaleChanged;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FilamentLanguageSwitch extends Component
{
    public function changeLocale($locale)
    {
        session()->put('locale', $locale);

        cookie()->queue(cookie()->forever('filament_language_switch_locale', $locale));

        $this->dispatch('filament-language-changed');

        event(new LocaleChanged($locale));

        $this->redirect(request()->header('Referer'));
    }

    public function render(): View
    {
        return view('filament-language-switch::language-switch');
    }
}
