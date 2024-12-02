<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\MyClasses\GeneralHelperFunctions;

class UserProfile extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'user_profiles';

    public $fillable = [
        'id',
        'user_id',
        'name',
        'address',
        'city',
        'state',
        'country',
        'email',
        'mobile',
        'website',
        'is_company',
        'logo',
        'sign',
        'upi_code',
        'default_template_id',
        'enable_gst',
        'gstin',
        'default_bill_due_in',
        'default_terms',
        'enable_shipping',
        'currency_code',
        'country_code',
        'uuid',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'email' => 'string',
        'mobile' => 'integer',
        'website' => 'string',
        'is_company' => 'boolean',
        'logo' => 'string',
        'sign' => 'string',
        'upi_code' => 'string',
        'default_template_id' => 'integer',
        'enable_gst' => 'boolean',
        'gstin' => 'string',
        'default_bill_due_in' => 'integer',
        'enable_shipping' => 'boolean',
        'currency_code' => 'string',
        'country_code' => 'string',
        'uuid' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'required|nullable',
        'name' => 'required|nullable',
        'address' => 'nullable',
        'city' => 'nullable',
        'state' => 'nullable',
        'country' => 'nullable',
        'email' => 'nullable',
        'mobile' => 'nullable',
        'website' => 'nullable',
        'is_company' => 'nullable',
        'logo' => 'nullable',
        'sign' => 'nullable',
        'upi_code' => 'nullable',
        'default_template_id' => 'nullable',
        'enable_gst' => 'nullable',
        'gstin' => 'nullable',
        'default_bill_due_in' => 'nullable',
        'default_terms' => 'nullable',
        'enable_shipping' => 'nullable',
        'currency_code' => 'nullable',
        'country_code' => 'nullable'
    ];



    /**
     * Changing route key name
     * @return string
     */
    public function getRouteKeyName() {
        return 'uuid';
    }

    /**
     * The User Profile is created by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The User Profile is updated by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * The User Profile is updated by some user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Things require during the boot
     */
    protected static function boot() {
        parent::boot();

        //Auto-adding uuid to newly created instances
        self::creating(function (UserProfile $userProfile) {
            $userProfile->uuid = Str::uuid()->toString();
        });

        self::creating(function (UserProfile $userProfile){
            $userProfile->created_by = Auth::id();
            $userProfile->updated_by = Auth::id();
        });

        self::updating(function (UserProfile $userProfile){
            $userProfile->updated_by = Auth::id();
        });
    }

    /**
     * Things require after the boot
     */
    protected static function booted() {
        parent::booted();

        static::creating(function(UserProfile $userProfile){

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



    /**
     * Returns avatar url
     * @return mixed
     */
    public function getLogoUrlAttribute(){
        return GeneralHelperFunctions::getSingleMediaUrls($this, 'user_profiles', 'logo');
    }

    /**
     * Returns avatar url
     * @return mixed
     */
    public function getSignUrlAttribute(){
        return GeneralHelperFunctions::getSingleMediaUrls($this, 'user_profiles', 'sign');
    }

        /**
     * Returns avatar url
     * @return mixed
     */
    public function getUpiCodeUrlAttribute(){
        return GeneralHelperFunctions::getSingleMediaUrls($this, 'user_profiles', 'upi_code');
    }

    /**
     * Registering media collection
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType,['image/gif','image/png','image/jpeg']);
            })
            ->withResponsiveImages()
            ->singleFile();

        $this
            ->addMediaCollection('sign')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType,['image/gif','image/png','image/jpeg']);
            })
            ->withResponsiveImages()
            ->singleFile();

        $this
            ->addMediaCollection('upi_code')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType,['image/gif','image/png','image/jpeg']);
            })
            ->withResponsiveImages()
            ->singleFile();
    }

    /**
     * Register Media Conversions.
     * @param Media|null $media
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb_100x100')
            ->width(100)
            ->height(100)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('logo');

        $this->addMediaConversion('thumb_250x250')
            ->width(250)
            ->height(250)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('logo');

        $this->addMediaConversion('thumb_100x100')
            ->width(100)
            ->height(100)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('sign');

        $this->addMediaConversion('thumb_250x250')
            ->width(250)
            ->height(250)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('sign');

        $this->addMediaConversion('thumb_100x100')
            ->width(100)
            ->height(100)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('upi_code');

        $this->addMediaConversion('thumb_250x250')
            ->width(250)
            ->height(250)
            ->nonQueued()
            ->keepOriginalImageFormat()
            ->performOnCollections('upi_code');
    }

}
