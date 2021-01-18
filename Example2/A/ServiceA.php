<?php


class ServiceA
{
    private $serviceB;

    public function __construct(ServiceBInterface $serviceB) {
        $this->serviceB = $serviceB;
    }

    private function description(): string {
        return 'A';
    }

    public function doSomething(): string {
        return $this->description() . $this->serviceB->doSomething();
    }
}