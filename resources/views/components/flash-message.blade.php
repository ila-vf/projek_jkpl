@if (Session::has('success'))
    <div class="relative w-full p-4 text-white rounded-lg bg-emerald-500 mb-6">
        {{ Session::get('success') }}
    </div>
@endif