<?php

namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\MyClasses\GeneralHelperFunctions;
use App\Models\{UserProfile, User};

class UserProfileRepository extends BaseRepository
{
    protected $fieldSearchable = [
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
        'country_code'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return UserProfile::class;
    }

    /**
     * request handler for store and update
     * @param Request $request
     * @return array
     */
    public static function requestHandler(Request $request) {
        return [
            'user_id' => GeneralHelperFunctions::getModelIdFromUuid(User::query(), $request->input('user_id')),
            'is_company' => $request->input('is_company') ?? 0,
            'enable_gst' => $request->input('enable_gst') ?? 0,
            'enable_shipping' => $request->input('enable_shipping') ?? 0,
        ];
    }

    /**
   * @param UserProfile $userProfile
   * @param Request $request
   * @return bool|Media
   */
    public function updateOrCreate_logo(UserProfile $userProfile, Request $request) {
        $defaultMedia = 'https://ui-avatars.com/api/?' . http_build_query(['name' => $userProfile->name, 'size' => '500']);
        return GeneralHelperFunctions::updateOrCreate_singleMedia_viaDropZone($userProfile, $request->input('logo'),  $defaultMedia, 'logo');
    }

    /**
   * @param UserProfile $userProfile
   * @param Request $request
   * @return bool|Media
   */
    public function updateOrCreate_sign(UserProfile $userProfile, Request $request) {
        $defaultMedia = 'https://ui-avatars.com/api/?' . http_build_query(['name' => $userProfile->name, 'size' => '500']);
        return GeneralHelperFunctions::updateOrCreate_singleMedia_viaDropZone($userProfile, $request->input('sign'),  $defaultMedia, 'sign');
    }

    /**
   * @param UserProfile $userProfile
   * @param Request $request
   * @return bool|Media
   */
    public function updateOrCreate_upiCode(UserProfile $userProfile, Request $request) {
        $defaultMedia = 'https://ui-avatars.com/api/?' . http_build_query(['name' => $userProfile->name, 'size' => '500']);
        return GeneralHelperFunctions::updateOrCreate_singleMedia_viaDropZone($userProfile, $request->input('upi_code'),  $defaultMedia, 'upi_code');
    }
}
