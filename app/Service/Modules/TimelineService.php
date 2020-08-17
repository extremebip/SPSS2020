<?php

namespace App\Service\Modules;

use App\Service\Contracts\ITimelineService;
use App\Repository\Contracts\ITimelineRepository;

class TimelineService implements ITimelineService
{
    private $timelineRepository;

    public function __construct(ITimelineRepository $timelineRepository) {
        $this->timelineRepository = $timelineRepository;
    }

    public function GetTimelines()
    {
        return $this->timelineRepository->FindAll();
    }

    public function GetTimelineByID($timeline_id)
    {
        return $this->timelineRepository->Find($timeline_id);
    }

    public function UpdateTimeline($data)
    {
        $timeline = $this->timelineRepository->Find($data['id']);
        $timeline->DateTime = $data['DateTime'];

        $this->timelineRepository->InsertUpdate($timeline);
    }
}
