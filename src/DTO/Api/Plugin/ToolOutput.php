<?php

namespace DataMat\CheshireCat\DTO\Api\Plugin;

class ToolOutput
{
    public string $name;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
