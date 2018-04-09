<?php

namespace App\Support;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use JsonSerializable;


class Collection implements IteratorAggregate, JsonSerializable
{
    protected $items = [];

    /**
     * Initialization collection
    //  *
     * @param [type] $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Get iterator implementation
     *
     * @return void
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Json Serialize interface
     *
     * @return void
     */
    public function jsonSerialize()
    {
        return $this->items;
    }

    /**
     * Getting collection items
     *
     * @return array
     */
    public function get()
    {
        return $this->items;
    }

    /**
     * Getting count of items
     *
     * @return void
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Merge iterable into collection
     *
     * @param Collection $collection
     * @return void
     */
    public function merge(Collection $collection) 
    {
        return $this->add($collection->get());
    }

    /**
     * Add array to collection
     *
     * @param Iterable $items
     * @return void
     */
    public function add(Iterable $items)
    {
        $this->items = array_merge($this->items, $items);
    }

    /**
     * Encode collection to JSON 
     *
     * @return void
     */
    public function toJson()
    {
        return json_encode($this->items);
    }

    /**
     * Auto JSONing on echo
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}
