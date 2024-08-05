<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests;

abstract class BaseRequest
{
    abstract public function method(): string;

    abstract public function body(): array;

    abstract public function endpoint(): string;

    abstract public function responseClass(): ?string;
}
