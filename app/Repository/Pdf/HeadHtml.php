<?php

namespace App\Repository\Pdf;

trait HeadHtml {


    /**
     * Html head of document template
     * @return string
     */
    public function headHtmlstring() : string
    {
        return '<h1>head</h1>';
    }
}


