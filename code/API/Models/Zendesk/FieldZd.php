<?php

namespace API\Models\Zendesk;

class FieldZd
{
    private int $id;
    private $value;

    function __construct(int $id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }
    public static function fromArray(array $array): FieldZd{
        return new FieldZd(
            $array["id"],
            $array["value"]
        );
    }
}