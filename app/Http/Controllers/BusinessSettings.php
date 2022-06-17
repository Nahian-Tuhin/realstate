<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use App\Http\Requests\StoreBusinessSettingRequest;
use App\Http\Requests\UpdateBusinessSettingRequest;

class BusinessSettings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mailConfig(Request $request)
    {
        $data['title'] = 'Mail Config';
        $data['page'] = 'mail-config';
        if ($request->isMethod('post')) {
            BusinessSetting::updateOrInsert(
                ['key' => 'mail_config'],
                [
                    'value' => json_encode([
                        "name" => $request['name'],
                        "host" => $request['host'],
                        "driver" => $request['driver'],
                        "port" => $request['port'],
                        "username" => $request['username'],
                        "email_id" => $request['email'],
                        "encryption" => $request['encryption'],
                        "password" => $request['password']
                    ]),

                ]
            );
            return redirect()->back()->with('success', 'Configuration updated successfully');
        }
        return view('admin.pages.settings.mail-config', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBusinessSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusinessSettingRequest  $request
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessSettingRequest $request, BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessSetting $businessSetting)
    {
        //
    }
}
