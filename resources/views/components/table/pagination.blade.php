@props([
    'store',
    'stateTotalRows' => 'totalRows',
    'statePage' => 'page',
    'statePageSize' => 'pageSize',
    'statePageSizeOptions' => 'pageSizeOptions',
    'stateLoading' => 'loading',
    'dispatcher' => 'dispatch',
])

@if (empty($store))
    @php
        throw new Exception('The "store" property is required.');
    @endphp
@endif

<div class="w-full flex items-center justify-between mt-3" x-bind:store="'{{ $store }}'"
    x-bind:state-total-rows="'{{ $stateTotalRows }}'" x-bind:state-page="'{{ $statePage }}'"
    x-bind:state-page-size="'{{ $statePageSize }}'" x-bind:state-page-size-options="'{{ $statePageSizeOptions }}'"
    x-bind:dispatcher="'{{ $dispatcher }}'" x-bind:state-loading="'{{ $stateLoading }}'" x-bind="tablePagination">
    <div x-show="loading" class="flex items-center gap-1">
        <x-loader.shimmer class="!w-24" />
        <x-loader.shimmer class="!w-8" />
    </div>
    <div x-cloak x-show="!loading" class="flex items-center">
        <span class="text-xs text-neutral-700">Total Rows :</span>
        <span class="text-xs text-neutral-700 ms-1" x-text="totalRows"></span>
    </div>
    <div class="flex items-center gap-3">
        <div x-show="loading" class="flex items-center gap-1">
            <x-loader.shimmer />
            <x-loader.shimmer class="!w-8 !h-6" />
        </div>

        <div x-show="loading" class="flex items-center gap-1">
            <template x-for="i in 3">
                <x-loader.shimmer class="!h-4 !w-4" />
            </template>
        </div>

        <div x-cloak x-show="!loading" class="flex items-center gap-1">
            <span class="text-xs text-neutral-700">Rows Per Page :</span>
            <select
                class="border border-neutral-500 w-fit appearance-none rounded-[4px] text-xs text-neutral-700 pl-2 !pr-[1.5rem] py-1 outline-none focus:outline-none focus:ring-0 focus:border-neutral-500 cursor-pointer"
                x-model="pageSize"
                style="
                        background-position: right 0.5rem center;
                        background-image: url('data:image/svg+xml,%3csvg aria-hidden=%27true%27 xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 16 16%27%3e%3cpath stroke=%27%236B7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272%27 d=%27m2 6 6-6 6 6 m-12 4 6 6 6-6%27/%3e%3c/svg%3e');
                        ">
                <template x-for="(option, index) in pageSizeOptions" :key="index">
                    <option :value="option" x-text="option"></option>
                </template>
            </select>
        </div>
        <div x-cloak x-show="!loading" class="flex items-center gap-1" wire:ignore>
            <button x-bind:disabled="page === 1 || totalPages <= 0"
                class="h-6 w-6 bg-white rounded-md flex items-center justify-center text-neutral-700 text-xs hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in-out disabled:text-neutral-300 disabled:cursor-default disabled:hover:bg-transparent"
                x-on:click="onPreviouspage()">
                <i data-lucide="chevron-left" class="h-4 w-4">
                </i>
            </button>
            <template x-for="(v, index) in shownPages" :key="index">
                <button
                    class="h-6 w-6 rounded-md flex items-center justify-center text-xs hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in-out disabled:text-neutral-300 disabled:cursor-default disabled:hover:bg-transparent"
                    x-bind:class="v === page ? 'bg-brand-500 text-white' : 'bg-white text-brand-500'"
                    x-on:click="onPageChange(v)">
                    <span x-text="v"></span>
                </button>
            </template>
            <button x-bind:disabled="page === totalPages || totalPages <= 0"
                class="h-6 w-6 bg-white rounded-md flex items-center justify-center text-neutral-700 text-xs hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in-out disabled:text-neutral-300 disabled:cursor-default disabled:hover:bg-transparent"
                x-on:click="onNextpage()">
                <i data-lucide="chevron-right" class="h-4 w-4">
                </i>
            </button>
        </div>
    </div>
</div>
