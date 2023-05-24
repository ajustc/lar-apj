<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['event_members'] = EventMember::with('rlEvent')->get();

        $data['datatables']        = true;
        $data['swal']              = true;
        $data['act_event_members'] = true;

        return view('adminpages.event_members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['events'] = Event::all();
        return view('adminpages.event_members.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect('/adminpages/event_members')->withErrors($validator)->withInput($request->all());
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
                    return redirect('/adminpages/event_members');
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

        return redirect('/adminpages/event_members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function show(EventMember $eventMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function edit(EventMember $eventMember)
    {
        $data['event_members'] = $eventMember;
        return view('adminpages.event_members.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventMember $eventMember)
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
            return redirect('/adminpages/event_members')->withErrors($validator)->withInput($request->all());
        }

        DB::beginTransaction();
        try {
            $avatar = $request->input('old_participant_avatar');
            $file = $request->file('participant_avatar');
            if (!empty($file)) {
                $avatar = date('YmdHis') . '-' . $file->getClientOriginalName() . '-' . rand();

                if (Storage::exists('public/event_members/' . $avatar)) {
                    Session::flash('messages', 'Failed any file has exist');
                    Session::flash('messages_type', 'success');
                    return redirect('/adminpages/event_members');
                }

                Storage::putFileAs('public/event_members', $file, $avatar);

                $avatar = $avatar;
            }

            $eventMember->update([
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

        return redirect('/adminpages/event_members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventMember  $eventMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventMember $eventMember)
    {
        $eventMember->delete();
        Session::flash('messages', 'Yash! Success delete');
        Session::flash('messages_type', 'success');
        return redirect('/adminpages/event_members');
    }
}
