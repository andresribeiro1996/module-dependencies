<?php


class ServiceB2
{
    /**
     * @var ServiceB
     */
    private $serviceB;

    public function __construct(ServiceB $serviceB) {
        $this->serviceB = $serviceB;
    }

    private function description(): string {
        return 'B2';
    }

    public function doSomething(): string {
        return $this->description() . $this->serviceB->doSomething();
    }
}