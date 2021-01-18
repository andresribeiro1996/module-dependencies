<?php


class ServiceBAdapter implements ServiceBPortD
{
    /**
     * @var ServiceBApi
     */
    private $serviceBApi;

    public function __construct(ServiceBApi $serviceBApi)
    {

        $this->serviceBApi = $serviceBApi;
    }

    public function doSomethingWithServiceDRequirements(): array
    {
        $this->serviceBApi->doSomethingWithServiceDRequirements();
        return [];
    }
}