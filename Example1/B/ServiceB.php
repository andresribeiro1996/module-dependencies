<?php


class ServiceB
{
    public function __construct() {
    }

    private function description(): string {
        return 'B';
    }

    public function doSomething(): string {
        return $this->description();
    }
}