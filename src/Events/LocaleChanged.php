<?php

namespace Mortezamasumi\FilamentLanguageSwitch\Events;

class LocaleChanged
{
    public function __construct(
        public string $locale
    ) {
    }
}
