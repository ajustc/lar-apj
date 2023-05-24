<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LandingPagesController extends Controller
{
    public function home()
    {
        $data['events'] = Event::with('rlEventMembers')->get();
        return view('template_landingpages.home.event', $data);
    }

    public function post(Request $request)
    {
        $dataInputValidation = [
            'event_id'                 => $request->input('event_id'),
            'company_name'             => $request->input('company_name'),
            'participant_name'         => $request->input('participant_name'),
            'participant_email'        => $request->input('participant_email'),
            'participant_phone_number' => $request->input('participant_phone_number'),
        ];
        $dataValidate = [
            'event_id'                 => 'required',
            'company_name'             => 'required',
            'participant_name'         => 'required',
            'participant_email'        => 'required',
            'participant_phone_number' => 'required',
        ];
        $validator = Validator::make($dataInputValidation, $dataValidate);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput($request->all());
        }

        DB::beginTransaction();
        try {
            $avatar = '';
            $file = $request->file('participant_avatar');
            if (!empty($file)) {
                $avatar = date('YmdHis') . '-' . $file->getClientOriginalName() . '-' . rand();

                if (Storage::exists('public/event_members/' . $avatar)) {
                    Session::flash('messages', 'Failed any file has exist');
                    Session::flash('messages_type', 'success');
                    return redirect('/');
                }

                Storage::putFileAs('public/event_members', $file, $avatar);

                $avatar = $avatar;
            }

            EventMember::create([
                'event_id'                 => $request->input('event_id'),
                'company_name'             => $request->input('company_name'),
                'participant_name'         => $request->input('participant_name'),
                'participant_email'        => $request->input('participant_email'),
                'participant_phone_number' => $request->input('participant_phone_number'),
                'participant_avatar'       => $avatar,
            ]);

            DB::commit();
            Session::flash('messages', 'Yash! Success input');
            Session::flash('messages_type', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('messages', 'Huh! Failed input error: ' . $th->getMessage());
            Session::flash('messages_type', 'warning');
        }

        return redirect('/');
    }
}
