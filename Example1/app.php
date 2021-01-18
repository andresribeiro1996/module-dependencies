<?php

/**
 * Module B
 * Both Service A and Service B2 depend upon Service B [ doSomething(): string ]
 *
 * What if Service A needs Service B [ doSomething(): string ] to attach a Date?
 * Service B [doSomething()] would need to return Array[] instead string''
 * If Service B [ doSomething(): string ] returns Array[] the Service B2 would break
 * And even if it doesnt break, does Service B2 really need the Date? It seems like an implementation detail from Service A is leaking to Service B2.
 * Of course we could add to Service B a method called [ doSomethingWithDateAttached(): Array[] ]
 * And our Services would look like this:
 * Service B [
 *              doSomething(): string
 *              doSomethingWithDateAttached(): Array[]
 *           ]
 *
 * Service B2 [
 *              doSomething(): string {
 *                  return $this->description() . $this->serviceB->doSomething();
 *              }
 *           ]
 *
 * Service A [
 *              doSomething(): string {
 *                  return $this->description() . $this->serviceB->doSomethingWithDateAttached();
 *              }
 *           ]
 *
 * Yes, seems ok for now, but Service B design is rigid. We cant change Service B methods
 * without breaking the services that depend on him.
 * So, should Service B really have ownership (he is the one defining the signatures) of other services requirements?
 * If he does then Service B would be overloaded with methods that dont mean anything to him, this will read to unreliable services,
 * their methods will be spread across multiple other services that depend on him and we dont know where it begins and where it ends.
 *
 */
$serviceB = new ServiceB();

/**
 * Module B2
 */
$serviceB2 = new ServiceB2($serviceB);
$serviceB2->doSomething(); // Expects B2B

/**
 * Module A
 */
$serviceA = new ServiceA($serviceB);
$serviceA->doSomething(); // Expects AB