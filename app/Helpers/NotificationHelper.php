<?php

namespace App\Helpers;

class NotificationHelper
{
    public static function notification($notification, $type = 'success', $message)
    {
        switch ($type) {
            case 'success':
            case 'info':
            case 'warning':
            case 'error':
                $notification->alert($type, $message, [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                break;
            default:
                // Default to 'info' type if an unrecognized type is provided
                $notification->alert('info', $message, [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                break;
        }
    }
}
