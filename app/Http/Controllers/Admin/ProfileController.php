<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input_names = [
            ['japanese_name' => '氏名', 'english_name' => 'name'],
            ['japanese_name' => '性別', 'english_name' => 'gender'],
            ['japanese_name' => '趣味', 'english_name' => 'introduction'],
        ];

        return view('admin.profile.create', ['input_names' => $input_names]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'introduction' => 'required',
        ]);

        $profile = new Profile();
        $profile->name = $validatedData['name'];
        $profile->gender = $validatedData['gender'];
        $profile->hobby = $validatedData['hobby'];
        $profile->introduction = $validatedData['introduction'];
        $profile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target_profile = Profile::find($id);
        $histories = $target_profile->profile_histories()->get();

        return view('admin.profile.edit', ['profile' => $target_profile, 'histories' => $histories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'introduction' => 'required',
        ]);
        $target_profile = Profile::find($id);
        $target_profile->name = $validatedData['name'];
        $target_profile->gender = $validatedData['gender'];
        $target_profile->hobby = $validatedData['hobby'];
        $target_profile->introduction = $validatedData['introduction'];
        $target_profile->save();

        $profile_history = new ProfileHistory();
        $profile_history->profile_id = $id;
        $profile_history->save();

        return view('admin.profile.edit', ['profile' => $target_profile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
