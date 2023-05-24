<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = Event::with('rlEventMembers')->get();

        $data['datatables'] = true;
        $data['swal'] = true;
        $data['act_events'] = true;
        return view('adminpages.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpages.events.create');
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
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'status'      => $request->input('status'),
            'startdate'   => $request->input('startdate'),
            'enddate'     => $request->input('enddate'),
        ];
        $dataValidate = [
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required',
            'startdate'   => 'required',
            'enddate'     => 'required',
        ];
        $validator = Validator::make($dataInputValidation, $dataValidate);

        if ($validator->fails()) {
            return redirect('/adminpages/events')->withErrors($validator)->withInput($request->all());
        }

        DB::beginTransaction();
        try {
            Event::create([
                'title'       => $request->input('title'),
                'slug'        => \Illuminate\Support\Str::slug($request->input('title')),
                'description' => $request->input('description'),
                'status'      => $request->input('status'),
                'startdate'   => $request->input('startdate'),
                'enddate'     => $request->input('enddate'),
            ]);

            DB::commit();
            Session::flash('messages', 'Yash! Success input');
            Session::flash('messages_type', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('messages', 'Huh! Failed input error: ' . $th->getMessage());
            Session::flash('messages_type', 'warning');
        }

        return redirect('/adminpages/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data['event'] = $event;
        return view('adminpages.events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $dataInputValidation = [
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'status'      => $request->input('status'),
            'startdate'   => $request->input('startdate'),
            'enddate'     => $request->input('enddate'),
        ];
        $dataValidate = [
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required',
            'startdate'   => 'required',
            'enddate'     => 'required',
        ];
        $validator = Validator::make($dataInputValidation, $dataValidate);

        if ($validator->fails()) {
            return redirect('/adminpages/events')->withErrors($validator)->withInput($request->all());
        }

        DB::beginTransaction();
        try {
            $event->update([
                'title'       => $request->input('title'),
                'slug'        => \Illuminate\Support\Str::slug($request->input('title')),
                'description' => $request->input('description'),
                'status'      => $request->input('status'),
                'startdate'   => $request->input('startdate'),
                'enddate'     => $request->input('enddate'),
            ]);

            DB::commit();
            Session::flash('messages', 'Yash! Success input');
            Session::flash('messages_type', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('messages', 'Huh! Failed input error: ' . $th->getMessage());
            Session::flash('messages_type', 'warning');
        }

        return redirect('/adminpages/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        Session::flash('messages', 'Yash! Success delete');
        Session::flash('messages_type', 'success');
        return redirect('/adminpages/events');
    }
}
