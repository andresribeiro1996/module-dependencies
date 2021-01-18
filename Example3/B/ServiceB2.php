<?php


class ServiceB2
{
    /**
     * @var ServiceBInterface
     */
    private $serviceB;

    public function __construct(ServiceBInterface $serviceB) {
        $this->serviceB = $serviceB;
    }

    private function description(): string {
        return 'B2';
    }

    public function doSomething(): string {
        return $this->description() . $this->serviceB->doSomething();
    }
}