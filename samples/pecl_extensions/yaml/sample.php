<?php
/**
 * Sample usage of yaml-parse function of PECL yaml package.
 *
 * Originally from PHP manual:
 *   - https://www.php.net/manual/ja/function.yaml-parse.php
 */

// Sample YAML data
$yaml = <<<EOD
---
invoice: 34843
date: "2001-01-23"
bill-to: &id001
  given: Chris
  family: Dumars
  address:
    lines: |-
      458 Walkman Dr.
              Suite #292
    city: Royal Oak
    state: MI
    postal: 48046
ship-to: *id001
product:
- sku: BL394D
  quantity: 4
  description: Basketball
  price: 450
- sku: BL4438H
  quantity: 1
  description: Super Hoop
  price: 2392
tax: 251.420000
total: 4443.520000
comments: Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338.
...
EOD;

// Parse YAML string
$parsed = yaml_parse($yaml);

// Print result
print_r($parsed);

// Test
$actual = json_encode($parsed);
$expect = '{"invoice":34843,"date":"2001-01-23","bill-to":{"given":"Chris","family":"Dumars","address":{"lines":"458 Walkman Dr.\n        Suite #292","city":"Royal Oak","state":"MI","postal":48046}},"ship-to":{"given":"Chris","family":"Dumars","address":{"lines":"458 Walkman Dr.\n        Suite #292","city":"Royal Oak","state":"MI","postal":48046}},"product":[{"sku":"BL394D","quantity":4,"description":"Basketball","price":450},{"sku":"BL4438H","quantity":1,"description":"Super Hoop","price":2392}],"tax":251.42,"total":4443.52,"comments":"Late afternoon is best. Backup contact is Nancy Billsmer @ 338-4338."}';

echo '- Function test ... ', ($expect === $actual) ? 'OK' : 'NG', PHP_EOL;
