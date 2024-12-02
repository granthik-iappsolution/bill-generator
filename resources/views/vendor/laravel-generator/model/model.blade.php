@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->model }};

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
@if($config->options->softDelete){{ 'use Illuminate\Database\Eloquent\SoftDeletes;' }}@endif
@if($config->options->tests or $config->options->factory){{ 'use Illuminate\Database\Eloquent\Factories\HasFactory;' }}@endif

@if(isset($swaggerDocs)){!! $swaggerDocs  !!}@endif
class {{ $config->modelNames->name }} extends Model
{
@if($config->options->softDelete) {{ infy_tab().'use SoftDeletes;' }}@endif
@if($config->options->tests or $config->options->factory){{ infy_tab().'use HasFactory;' }}@endif
    public $table = '{{ $config->tableName }}';

@if($customPrimaryKey)@tab()protected $primaryKey = '{{ $customPrimaryKey }}';@nls(2)@endif
@if($config->connection)@tab()protected $connection = '{{ $config->connection }}';@nls(2)@endif
@if(!$timestamps)@tab()public $timestamps = false;@nls(2)@endif
@if($customSoftDelete)@tab()protected $dates = ['{{ $customSoftDelete }}'];@nls(2)@endif
@if($customCreatedAt)@tab()const CREATED_AT = '{{ $customCreatedAt }}';@nls(2)@endif
@if($customUpdatedAt)@tab()const UPDATED_AT = '{{ $customUpdatedAt }}';@nls(2)@endif
    public $fillable = [
        {!! $fillables !!}
    ];

    protected $casts = [
        {!! $casts !!}
    ];

    public static array $rules = [
        {!! $rules !!}
    ];

    {!! $relations !!}

    /**
     * Changing route key name
     * @return string
     */
    public function getRouteKeyName() {
        return 'uuid';
    }

    /**
     * The {{ $config->modelNames->human }} is created by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The {{ $config->modelNames->human }} is updated by some user.
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
        self::creating(function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}) {
            ${{ $config->modelNames->camel }}->uuid = Str::uuid()->toString();
        });

        self::creating(function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
            ${{ $config->modelNames->camel }}->created_by = Auth::id();
            ${{ $config->modelNames->camel }}->updated_by = Auth::id();
        });

        self::updating(function ({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){
            ${{ $config->modelNames->camel }}->updated_by = Auth::id();
        });
    }

    /**
     * Things require after the boot
     */
    protected static function booted() {
        parent::booted();

        static::creating(function({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}){

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
