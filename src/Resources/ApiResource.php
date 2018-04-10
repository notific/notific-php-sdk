<?php

namespace Notific\PhpSdk\Resources;

class ApiResource
{
    /**
     * @var array
     */
    public $attributes = [];

    /**
     * The notific SDK instance.
     *
     * @var notific
     */
    protected $notific;

    /**
     * Create a new resource instance.
     *
     * @param array   $attributes
     * @param Notific $notific
     *
     * @return void
     */
    public function __construct(array $attributes, $notific = null)
    {
        $this->notific = $notific;
        $this->attributes = $attributes;
        $this->fill();
    }

    private function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    private function camelCase($key)
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Flatten (multidimensional) arrays.
     *
     * @param $array
     * @param $depth
     *
     * @return array
     */
    protected function flatten($array, $depth = INF)
    {
        $result = [];

        foreach ($array as $item) {
            if (!is_array($item)) {
                $result[] = $item;
            } elseif ($depth === 1) {
                $result = array_merge($result, array_values($item));
            } else {
                $result = array_merge($result, $this->flatten($item, $depth - 1));
            }
        }

        return $result;
    }
}
