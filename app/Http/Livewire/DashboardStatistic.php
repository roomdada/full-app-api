<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardStatistic extends Component
{
    public function render()
    {
        return view('livewire.dashboard-statistic', [
            'services' => \App\Models\Course::count(),
            'categories' => \App\Models\Category::count(),
            'providers' => \App\Models\User::count(),
        ]);
    }
}
