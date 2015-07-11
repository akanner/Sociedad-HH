<?php

/**
 *
 */
abstract class BasicTest extends TestCase
{

  public function setUp()
  {
    parent::setUp();
    Artisan::call("migrate",["--seed"]);
    Mail::pretend(true);
  }
}
