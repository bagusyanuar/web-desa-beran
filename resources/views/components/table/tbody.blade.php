<tbody>
    <tr x-cloak x-show="loading">
        <td colspan="100%">
            <div class="w-full h-[20rem] flex flex-col items-center justify-center">
                <svg class="w-6 h-6 animate-spinner me-1 text-accent-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24">
                    <g>
                        <circle cx="3" cy="12" r="1.5" class="fill-current" />
                        <circle cx="21" cy="12" r="1.5" class="fill-current" />
                        <circle cx="12" cy="21" r="1.5" class="fill-current" />
                        <circle cx="12" cy="3" r="1.5" class="fill-current" />
                        <circle cx="5.64" cy="5.64" r="1.5" class="fill-current" />
                        <circle cx="18.36" cy="18.36" r="1.5" class="fill-current" />
                        <circle cx="5.64" cy="18.36" r="1.5" class="fill-current" />
                        <circle cx="18.36" cy="5.64" r="1.5" class="fill-current" />
                    </g>
                </svg>
                <p class="text-sm text-accent-500">Please wait...</p>
            </div>
        </td>
    </tr>
    <template x-if="!loading && data.length > 0">
        {{ $slot }}
    </template>
    <tr x-cloak x-show="!loading && data.length <= 0">
        <td colspan="100%">
            <div class="w-full h-[20rem] flex flex-col items-center justify-center">
                <p class="text-sm text-accent-500">No Data</p>
            </div>
        </td>
    </tr>
</tbody>
