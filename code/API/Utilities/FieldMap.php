<?php

namespace API\Utilities;

class FieldMap
{
    private array $map;

    function __construct()
    {
        $this->map =[
            ''=>''
        ];
    }
    public function getMap(): array
    {
        return $this->map;
    }


}