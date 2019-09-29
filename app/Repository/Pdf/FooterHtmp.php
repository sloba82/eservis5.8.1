<?php

namespace App\Repository\Pdf;

trait FooterHtmp {


    /**
     * Html footer of document template
     * @return string
     */
    public function footerHtmlstring() : string
    {
        return '<h1>footer</h1>';
    }
}

