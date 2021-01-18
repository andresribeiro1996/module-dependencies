<?php


class ServiceC
{
    private $portB;

    public function __construct(ServiceBPortC $portB) {
        $this->portB = $portB;
    }

    private function description(): string {
        return 'C';
    }

    public function doSomething(): string {
        return $this->description() . $this->portB->doSomethingWithServiceCRequirements();
    }
}