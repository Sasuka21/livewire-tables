<?php

namespace Tai\App\Models;

use Illuminate\Support\Str;

/**
 *
 */
class Column
{
    protected $heading;
    protected $attribute;
    protected $searchable = false;
    protected $sortable = false;
    protected $sortCallback;
    protected $view;


    public function __construct($heading, $attribute)
    {
        $this->heading = $heading;
        $this->attribute = $attribute ?? Str::snake(Str::lower($heading));
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public static function make($heading = null, $attribute = null)
    {
        return new static($heading, $attribute);
    }

    public function searchable()
    {
        $this->searchable = true;
    }


    public function sortable(): Column
    {
        $this->sortable = true;
        return $this;
    }

    public function sortUsing(callable $callback): Column
    {
        $this->sortCallback = $callback;
        return $this;
    }

    public function view($view): Column
    {
        $this->view = $view;
        return $this;
    }
}
