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
}
