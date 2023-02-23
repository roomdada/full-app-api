@props(['label', 'value', 'icon'])

<!-- Card: Simple Widget with Icon -->
<div
    class="flex flex-col rounded-xl border-2 border-primary-500 shadow-lg bg-white overflow-hidden hover:shadow-sm hover:cursor-pointer">
    <!-- Card Body: Simple Widget with Icon -->
    <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
        <div class="flex justify-center items-center w-16 h-16 border-2  rounded-br-2xl border-primary-900">
            <x-icon name="{{ $icon }}" class="w-8 h-8 text-primary-900" />
        </div>
        <dl class="text-right">
            <dt class="text-2xl font-semibold text-primary-900">
                {{ $value }}
            </dt>
            <dd class="uppercase font-semibold text-sm text-primary-900 tracking-wider">
                {{ $label }}
            </dd>
        </dl>
    </div>
    <!-- END Card Body: Simple Widget with Icon -->
</div>
