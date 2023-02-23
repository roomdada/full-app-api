<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-xl shadow-lg">
                    {{ __("Heureux de vous revoir ". auth()->user()->full_name." !") }}
                </div>
            </div>
            <hr class='bg-primary-400 h-1/4'>
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100 text-xl shadow-lg">
                     <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
                        <livewire:dashboard-statistic />
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
