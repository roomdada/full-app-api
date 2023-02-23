<?php

use Filament\Notifications\Notification;

if(! function_exists('flasher')){
    function flasher(
      string $message,
      string $type = 'success'
      ) : Notification
    {
    return Notification::make()
            ->success()
            ->title($message)
            ->iconColor($type)
            ->duration(5000)
            ->send();
    }
}
