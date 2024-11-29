<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserProfileDataTable;
use App\Http\Requests\Admin\UserProfile\CreateRequest;
use App\Http\Requests\Admin\UserProfile\UpdateRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\UserProfileRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\MyClasses\GeneralHelperFunctions;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Response;

class UserProfileController extends AppBaseController
{
    /** @var UserProfileRepository $userProfileRepository*/
    private $userProfileRepository;

    public function __construct(UserProfileRepository $userProfileRepo)
    {
        $this->userProfileRepository = $userProfileRepo;
    }

    /**
     * Display a listing of the UserProfile.
     *
     * @param UserProfileDataTable $userProfileDataTable
     * @return Response
     */
    public function index(UserProfileDataTable $userProfileDataTable) {
        return $userProfileDataTable->render('admin.user_profiles.index');
    }


    /**
     * Show the form for creating a new UserProfile.
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function create() {
        $countries = Country::pluck('name','id')->toArray();
        $countriesWithLang = Language::pluck('name','code')->toArray();
        return view('admin.user_profiles.create');
    }

    /**
     * Store a newly created UserProfile in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateRequest $request) {

        DB::beginTransaction();
        $userProfile = UserProfile::create($request->validated());
        DB::commit();

        return redirect()->route('admin.user-profiles.edit', $userProfile);

        // return Response::json(['message' => 'UserProfile has been created successfully.'
        //     . GeneralHelperFunctions::getSuccessResponseBtn($userProfile, route('admin.user-profiles.edit', $userProfile))]);
    }

    /**
     * Display the specified UserProfile.
     *
     * @param UserProfile $userProfile
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function show(UserProfile $userProfile) {
        return view('admin.user_profiles.show')->with('userProfile', $userProfile);
    }

    /**
     * Show the form for editing the specified UserProfile.
     *
     * @param UserProfile $userProfile
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|void
     */
    public function edit(UserProfile $userProfile) {
        return view('admin.user_profiles.edit')->with('userProfile', $userProfile);
    }

    /**
     * Update the specified UserProfile in storage.
     *
     * @param UserProfile $userProfile
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(UserProfile $userProfile, UpdateRequest $request) {
        DB::beginTransaction();
        $userProfile->update($request->validated());
        $this->userProfileRepository->updateOrCreate_logo($userProfile,$request);
        $this->userProfileRepository->updateOrCreate_sign($userProfile,$request);
        $this->userProfileRepository->updateOrCreate_upiCode($userProfile,$request);
        DB::commit();

        return Response::json(['message' => 'UserProfile updated successfully.']);
    }

    /**
     * Remove the specified UserProfile from storage.
     *
     * @param UserProfile $userProfile
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(UserProfile $userProfile) {
        $userProfile->delete();

        return Response::json(['message' => 'UserProfile deleted successfully']);
    }
}
