<aside class="h-dvh w-72 fixed z-50 bg-brand-500">
    <div class="w-full h-full flex flex-col bg-brand-500 border-r border-brand-500 shadow-lg shadow-brand-500">
        {{-- sidebar header --}}
        <div class="w-full h-24 px-6 flex items-center">
            <div class="w-full flex flex-col">
                <span class="text-xs text-white mb-0 font-light">Platform Desa</span>
                <span class="text-accent-500 font-bold text-lg"><span class="text-white">Beran</span>Digital.id</span>
            </div>
        </div>

        {{-- sidebar item --}}
        <div class="w-full flex-1 flex flex-col gap-1 px-4 py-3 overflow-y-auto">
            <x-sidebar.sidebar-item to="{{ route('web-panel.dashboard') }}" text="Dashboard" icon="house" />
            <x-sidebar.sidebar-item-tree text="Surat Online" icon="mailbox" :routes="[
                'web-panel.online-letter.domicile',
                'web-panel.online-letter.death',
                'web-panel.online-letter.birth',
                'web-panel.online-letter.police-clearance',
                'web-panel.online-letter.single-status',
                'web-panel.online-letter.incapacity',
                'web-panel.online-letter.income',
                'web-panel.online-letter.widower',
                'web-panel.online-letter.widow',
                'web-panel.online-letter.parent-income',
            ]">
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.domicile') }}"
                    text="Domisili" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.death') }}" text="Kematian" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.birth') }}" text="Kelahiran" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.police-clearance') }}"
                    text="Catatan Kepolisian" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.single-status') }}"
                    text="Belum Menikah" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.incapacity') }}"
                    text="Tidak Mampu" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.income') }}"
                    text="Penghasilan" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.widower') }}" text="Duda" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.widow') }}" text="Janda" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.online-letter.parent-income') }}"
                    text="Penghasilan Orang Tua" />
            </x-sidebar.sidebar-item-tree>
            <x-sidebar.sidebar-item to="{{ route('web-panel.micro-business') }}" text="Produk UMKM"
                icon="shopping-bag" />
            <x-sidebar.sidebar-item-tree text="Profil Desa" icon="info" :routes="[
                'web-panel.history',
                'web-panel.regional',
                'web-panel.community',
                'web-panel.potention',
                'web-panel.staff',
                'web-panel.vission-mission',
            ]">
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.history') }}" text="Sejarah Desa" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.regional') }}" text="Wilayah Desa" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.community') }}" text="Masyarakat Desa" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.potention') }}" text="Potensi Desa" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.vission-mission') }}"
                    text="Visi dan Misi" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.staff') }}" text="Perangkat Desa" />
            </x-sidebar.sidebar-item-tree>
            <x-sidebar.sidebar-item-tree text="Publikasi" icon="rss" :routes="[
                'web-panel.news',
                'web-panel.library',
                'web-panel.gallery',
            ]">
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.news') }}" text="Berita" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.library') }}" text="Perpustakaan Online" />
                <x-sidebar.sidebar-item-tree-child to="{{ route('web-panel.gallery') }}" text="Galeri" />
            </x-sidebar.sidebar-item-tree>
        </div>
    </div>
</aside>
