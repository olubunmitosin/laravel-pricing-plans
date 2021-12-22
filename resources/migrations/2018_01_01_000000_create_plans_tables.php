<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreatePlansTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = Config::get('plans.tables');

        Schema::create($tables['features'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->string('interval_unit')->default('month');
            $table->smallInteger('interval_count')->unsigned()->default(1);

            $table->smallInteger('sort_order')->nullable();
            $table->timestamps();
        });

        Schema::create($tables['plans'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 4)->default('0.00');
            $table->string('interval_unit')->default('month');
            $table->smallInteger('interval_count')->unsigned()->default(1);
            $table->smallInteger('trial_period_days')->nullable();

            $table->smallInteger('sort_order')->nullable();
            $table->timestamps();
        });

        Schema::create($tables['groups'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create($tables['plan_groups'], function (Blueprint $table) use ($tables) {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamp('created_at');

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on($tables['groups'])->onDelete('cascade');
            $table->unique(['plan_id', 'group_id']);
        });

        Schema::create($tables['plan_features'], function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->integer('feature_id')->unsigned();
            $table->string('value');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->unique(['plan_id', 'feature_id']);
        });

        Schema::create($tables['plan_subscriptions'], function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('subscriber');
            $table->integer('plan_id')->unsigned();
            $table->string('name');
            $table->boolean('canceled_immediately')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->index(['subscriber_type', 'subscriber_id', 'plan_id']);
        });

        Schema::create($tables['plan_subscription_usages'], function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id')->unsigned();
            $table->string('feature_code');
            $table->bigInteger('used')->default(0);
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();

            $table->foreign('subscription_id')->references('id')->on('plan_subscriptions')->onDelete('cascade');
            $table->foreign('feature_code')->references('code')->on('features')->onDelete('cascade');
            $table->unique(['subscription_id', 'feature_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = Config::get('plans.tables');

        Schema::dropIfExists($tables['plan_groups']);
        Schema::dropIfExists($tables['groups']);
        Schema::dropIfExists($tables['plan_subscription_usages']);
        Schema::dropIfExists($tables['plan_subscriptions']);
        Schema::dropIfExists($tables['plan_features']);
        Schema::dropIfExists($tables['plans']);
        Schema::dropIfExists($tables['features']);
    }
}
