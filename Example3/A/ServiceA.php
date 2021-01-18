<?php


class ServiceA
{
    private $portB;

    public function __construct(ServiceBPortA $portB) {
        $this->portB = $portB;
    }

    private function description(): string {
        return 'A';
    }

    public function doSomething(): string {
        return $this->description() . $this->portB->doSomethingWithDateAttached();
    }
}