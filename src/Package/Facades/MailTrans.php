<?php

namespace Hocza\MailTrans\Facades;

use Illuminate\Support\Facades\Facade;

class MailTrans extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'mailTrans'; }
}
