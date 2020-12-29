<?php

namespace Laravel\PricingPlans\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use InvalidArgumentException;
use Laravel\PricingPlans\Events\SubscriptionRenewed;
use Laravel\PricingPlans\Period;
use Laravel\PricingPlans\SubscriptionAbility;
use Laravel\PricingPlans\SubscriptionUsageManager;
use Laravel\PricingPlans\Models\Concerns\BelongsToPlanModel;
use LogicException;

/**
 * Class Group
 * @package Laravel\PricingPlans\Models
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $with = ['plans'];


    /**
     * Plan constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(Config::get('plans.tables.groups'));
    }

    /**
     * Get plans
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(
            Config::get('plans.models.Plan'),
            Config::get('plans.models.PlanGroup'),
            'group_id',
            'plan_id'
        );
    }
}
