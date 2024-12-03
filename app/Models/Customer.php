<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'customers';

    public $fillable = [
        'id',
        'name',
        'address',
        'pincode',
        'city',
        'state',
        'country',
        'mobile',
        'email',
        'uuid',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'pincode' => 'string',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'mobile' => 'string',
        'email' => 'string',
        'uuid' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
        'pincode' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
        'mobile' => 'required|numeric|digits:10',
        'email' => 'required|email'
    ];

    

    /**
     * Changing route key name
     * @return string
     */
    public function getRouteKeyName() {
        return 'uuid';
    }

    /**
     * The Customer is created by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The Customer is updated by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Things require during the boot
     */
    protected static function boot() {
        parent::boot();

        //Auto-adding uuid to newly created instances
        self::creating(function (Customer $customer) {
            $customer->uuid = Str::uuid()->toString();
        });

        self::creating(function (Customer $customer){
            $customer->created_by = Auth::id();
            $customer->updated_by = Auth::id();
        });

        self::updating(function (Customer $customer){
            $customer->updated_by = Auth::id();
        });
    }

    /**
     * Things require after the boot
     */
    protected static function booted() {
        parent::booted();

        static::creating(function(Customer $customer){

        });
    }

    /**
     * Get Object by UUID
     *
     * @param $query
     * @param $uuid
     * @param array $with
     * @return mixed
     */
    public function scopeFindWithUuid($query,$uuid,$with = []){
        return $query->where('uuid',$uuid)->with($with)->firstOrFail();
    }

}
