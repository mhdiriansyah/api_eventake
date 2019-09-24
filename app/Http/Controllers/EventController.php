<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Http\Resources\EventResource;
use Ramsey\Uuid\Uuid;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', 
        ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('categories')->orderBy('created_at', 'desc')->get();
        return EventResource::collection($events);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = $request->isMethod('put') ? Event::findOrFail($request->input('id')) : new Event;
        
        $event->id = $request->isMethod('put') ? $request->input('id') : Uuid::uuid4()->getHex();
        $event->categories_id = $request->input('categories_id');
        $event->event_name = $request->input('event_name');
        $event->event_desc = $request->input('event_desc');
        $event->event_date_start = $request->input('event_date_start');
        $event->event_date_end = $request->input('event_date_end');
        $event->event_time_start = $request->input('event_time_start');
        $event->event_time_end = $request->input('event_time_end');
        $event->event_venue = $request->input('event_venue');
        $event->event_address = $request->input('event_address');
        $event->event_latitude = $request->input('event_latitude');
        $event->event_longitude = $request->input('event_longitude');
        $event->event_organizer = $request->input('event_organizer');
        $event->event_registrant_quota = $request->input('event_registrant_quota');
        $event->event_active = $request->input('event_active');
        ($request->isMethod('put')) ? $event->updated_at = date('Y-m-d H:i:s') : $event->created_at = date('Y-m-d H:i:s');

        if($event->save()) {
            return EventResource::collection(Event::all()->sortByDesc('created_at'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if($event->delete()){
            return EventResource::collection(Event::all()->sortByDesc('created_at'));
        }
    }
}
