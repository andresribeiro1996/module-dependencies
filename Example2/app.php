<?php

/**
 * Both Service A and Service B2 depend upon Service B Interface [ doSomething(): string ]
 * This interface provides a bit more assurance, since now there is an explicit contract controlling the Service B
 * dependencies, but it doesnt solve anything related with example1 issues.
 * Provides the benefits of depending on interface instead of implementation,
 * such as, reducing coupling and providing polymorphism
 *
 */
$serviceB = new ServiceB();

/**
 * Module B2 depends on Service B Interface
 */
$serviceB2 = new ServiceB2($serviceB);
$serviceB2->doSomething(); // Expects B2B

/**
 * Module A depends on Service B Interface
 */
$serviceA = new ServiceA($serviceB);
$serviceA->doSomething(); // Expects AB