<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
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

        return view('admin.profile.edit', ['profile' => $target_profile]);
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
