<aside class="h-dvh w-72 fixed z-50">
    <div class="w-full h-full flex flex-col bg-white border-r border-neutral-300 shadow-lg">
        {{-- sidebar header --}}
        <div class="w-full h-16 px-6 flex items-center">
            <div class="w-full flex items-end gap-3">
                <img src="{{ asset('static/images/logo-image.png') }}" alt="brand-logo" class="h-10" />
                <span class="text-accent-500 font-bold"><span class="text-brand-500">Beran</span>Digital.id</span>
            </div>
        </div>

        {{-- sidebar item --}}
        <div class="w-full flex-1 flex flex-col gap-1 px-3 py-6 overflow-y-auto">
            <x-sidebar.sidebar-item to="/dashboard" text="Dashboard" icon="house" />
            <x-sidebar.sidebar-item-tree text="Surat Online" icon="mailbox">
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.domicile') }}"
                    text="Domisili" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.death') }}" text="Kematian" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.birth') }}" text="Kelahiran" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.police-clearance') }}"
                    text="Catatan Kepolisian" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.single-status') }}"
                    text="Belum Menikah" />
            </x-sidebar.sidebar-item-tree>
        </div>
    </div>
</aside>
