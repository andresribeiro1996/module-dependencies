<?php

/**
 * In this example we are applying a solution to try solving the example 1 and 2 problems.
 *
 * So, Service B has 3 Services depending on him, Service A, Service C and Service B2.
 * However, this services are not the same, module wise they are divided in two categories, external and internal services
 * Internal:
 *  - Service B Interface
 *      This is an 'api' designed to be used by internal services/components
 *  - Service B2
 *      This service is internal because it is a service that makes sense to be inside the module, therefore he should
 *      depend on service internals, such as Service B Interface
 *
 * External:
 *  - Service B API
 *       Is the external API that all external services should use/depend to queries/operations related with Module B domain
 *  - Service A
 *  - Service C
 *      These are external services relatively to module B, if they need some information or logic that only Module B can
 *      provide then they have to depend on Service B Api.
 *
 *  - Service D
 *      Presents a different solution from Service A and C.
 *      Instead of Service B API implement the external Ports from other services, the service is used as a dependency
 *      by Service D adapter.
 *
 * The cons and benefits need to be discussed
 */

// Internal - module wise

/*
 * One of Module B internal APIs
 */
$serviceB = new ServiceB();

/**
 * Module B2 depends on Service B Interface
 */
$serviceB2 = new ServiceB2($serviceB);
$serviceB2->doSomething();

// External - module wise

/*
 * Module B external API
 */
$apiServiceB = new ServiceBApi($serviceB);

/**
 * Module A depends on Service B Interface
 */
$serviceA = new ServiceA($apiServiceB);
$serviceA->doSomething(); // Expects AB

$serviceD = new ServiceD(new ServiceBAdapter($apiServiceB));
$serviceD->doSomething();