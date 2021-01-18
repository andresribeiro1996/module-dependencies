<?php


class ServiceD
{
    private $portB;

    public function __construct(ServiceBPortD $portB) {
        $this->portB = $portB;
    }

    private function description(): string {
        return 'C';
    }

    public function doSomething(): string {
        return $this->description() . $this->portB->doSomethingWithServiceDRequirements();
    }
}