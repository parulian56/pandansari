<!-- Dashboard -->
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<!-- Tambah Calon -->
<x-nav-link :href="route('add-calon')" :active="request()->routeIs('add-calon')">
    {{ __('Tambah Calon') }}
</x-nav-link>

<!-- Data Calon -->
<x-nav-link :href="route('data-calon')" :active="request()->routeIs('data-calon')">
    {{ __('Data Calon') }}
</x-nav-link>

<!-- Tambah Masyarakat -->
<x-nav-link :href="route('add-people')" :active="request()->routeIs('add-people')">
    {{ __('Tambah Masyarakat') }}
</x-nav-link>

<!-- Data Masyarakat -->
<x-nav-link :href="route('data-people')" :active="request()->routeIs('data-people')">
    {{ __('Data Masyarakat') }}
</x-nav-link>

<!-- Hasil -->
<x-nav-link :href="route('result')" :active="request()->routeIs('result')">
    {{ __('Result') }}
</x-nav-link>
