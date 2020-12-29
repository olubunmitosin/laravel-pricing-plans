<?php

namespace Laravel\PricingPlans\Tests\Integration\Models;

use Laravel\PricingPlans\Models\Feature;
use Laravel\PricingPlans\Models\Group;
use Laravel\PricingPlans\Models\Plan;
use Laravel\PricingPlans\Tests\TestCase;

/**
 * Class GroupTest
 * @package Laravel\PricingPlans\Integration\Models
 */
class GroupTest extends TestCase
{
    /**
     * Test i can create a plan group
     */
    public function testICanCreateAGroup()
    {
        /** @var \Laravel\PricingPlans\Models\Group $group */
        Group::create([
            'name' => 'service1'
        ]);
        $this->assertEquals(1, Group::count());
    }

    /**
     * It can create a group and attach plans
     */
    public function testItCanCreateAGroupAndAttachPlans()
    {
        /** @var \Laravel\PricingPlans\Models\Group $group */
        $group = Group::create([
            'name' => "service1",
            'description' => "Service1 group"
        ]);

        /** @var \Laravel\PricingPlans\Models\Plan $plan */
        $plan = Plan::create([
            'name' => 'Pro',
            'code' => 'pro',
            'description' => 'Pro plan',
            'price' => 19.9,
            'interval_unit' => 'month',
            'interval_count' => 1,
            'trial_period_days' => 15,
            'sort_order' => 1,
        ]);

        $plan2 = Plan::create([
            'name' => 'Free',
            'code' => 'Free',
            'description' => 'Free plan',
            'price' => 0,
            'interval_unit' => 'month',
            'interval_count' => 1,
            'trial_period_days' => 30,
            'sort_order' => 1,
        ]);

        $group->plans()->attach($plan->id, [
            'created_at' => now(),
        ]);

        $group->plans()->attach($plan2->id, [
            'created_at' => now(),
        ]);


        // Reload from DB
        $group->fresh();

        $this->assertEquals('service1', $group->name);
        $this->assertEquals(2, $group->plans->count());
    }
}
