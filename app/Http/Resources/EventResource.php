<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'categoriesId' => $this->categories_id,
            'eventName' => $this->event_name,
            'eventDesc' => $this->event_desc,
            'eventDateStart' => $this->event_date_start,
            'eventDateEnd' => $this->event_date_end,
            'eventTimeStart' => $this->event_time_start,
            'eventTimeEnd' => $this->event_time_end,
            'eventVenue' => $this->event_venue,
            'eventAddress' => $this->event_address,
            'eventLatitude' => (float) $this->event_latitude,
            'eventLongitude' => (float) $this->event_longitude,
            'eventOrganizer' => $this->event_organizer,
            'eventRegistrantQuota' => $this->event_registrant_quota,
            'eventActive' => $this->event_active,
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://pacegege.com')
        ];
    }
}
