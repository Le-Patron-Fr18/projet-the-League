<?php

class PageController extends AbstractController
{
    public function index() : void
    {
        $this->render("index", []);
    }
}