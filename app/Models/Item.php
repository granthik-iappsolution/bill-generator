<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;use Illuminate\Database\Eloquent\Factories\HasFactory;
class Item extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'items';

    public $fillable = [
        'id',
        'name',
        'description',
        'sold_qty',
        'rate',
        'discount',
        'uuid',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'rate' => 'string',
        'discount' => 'string',
        'uuid' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'sold_qty' => 'required|string',
        'rate' => 'required|string',
        'discount' => 'required|string'
    ];

    

    /**
     * Changing route key name
     * @return string
     */
    public function getRouteKeyName() {
        return 'uuid';
    }

    /**
     * The Item is created by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The Item is updated by some user.
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
        self::creating(function (Item $item) {
            $item->uuid = Str::uuid()->toString();
        });

        self::creating(function (Item $item){
            $item->created_by = Auth::id();
            $item->updated_by = Auth::id();
        });

        self::updating(function (Item $item){
            $item->updated_by = Auth::id();
        });
    }

    /**
     * Things require after the boot
     */
    protected static function booted() {
        parent::booted();

        static::creating(function(Item $item){

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
