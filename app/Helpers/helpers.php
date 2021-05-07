<?php

use App\Models\Song;
use App\Models\User;

function getUsername($userId) {
 return User::where('id', $userId)->first()->name;
}

function getStatusBadge($statusId) {
    if($statusId == 1) {
        return "success";
    } elseif($statusId == 2) {
        return "primary";
    } elseif($statusId == 3) {
        return "warning";
    } elseif($statusId == 4) {
        return "info";
   }
}

function getAccessBadge($access) {
    if($access == 0) {
        return ([
            'accesstype' => 'Private',
            'badge_type' => 'danger',]);
    } elseif($access == 1) {
        return ([
            'accesstype' => 'Public',
            'badge_type' => 'success',]);
    }
}

function getStatusCount($statusId) {
    if($statusId > 0) {
        return Song::where('status_id', $statusId)->count();
    } else {
        return Song::all()->count();
    }
    
}