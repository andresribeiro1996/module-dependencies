<?php


class ServiceBApi implements ServiceBPortC, ServiceBPortA
{
    /**
     * @var ServiceBInterface
     */
    private $serviceBInterface;

    public function __construct(ServiceBInterface $serviceBInterface) {

        $this->serviceBInterface = $serviceBInterface;
    }

    public function doSomethingWithDateAttached(): array
    {
        return [
            [$this->serviceBInterface->doSomething(), new DateTimeImmutable()]
        ];
    }

    public function doSomethingWithServiceCRequirements(): array
    {
        return [];
    }

    public function doSomethingWithServiceDRequirements(): array
    {
        return [];
    }
}