<?php

namespace App\Service\Contracts;

interface ITimelineService
{
    public function GetTimelines();
    public function GetTimelineByID($timeline_id);
    public function UpdateTimeline($data);
}