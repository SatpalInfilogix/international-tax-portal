<x-app-layout>
    <div class="py-12">

        <h1 class="font-semibold text-center text-2xl text-gray-800 leading-tight">
            {{ __('Welcome back to the Portal International Tax Portal') }}
        </h1>

        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('leads.create') }}" class="text-center">
                    <img src="{{ asset('assets/icons/new-lead.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">Register New Lead</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('leads.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/my-leads.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">My Leads</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('expertise.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/expertise-request.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">Expertise Request</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('news-and-events.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/news-and-events.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">News & Events</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('one-to-one.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/one-to-one.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">1-to-1</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('profile.edit') }}" class="text-center">
                    <img src="{{ asset('assets/icons/my-profile.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">My Profile</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('resources.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/resources.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">Resources</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('members.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/members.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">Members</h2>
                </a>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md p-4">
                <a href="{{ route('reports.index') }}" class="text-center">
                    <img src="{{ asset('assets/icons/reports.png') }}" alt="" class="mx-auto">
                    <h2 class="text-xl font-semibold mt-2">Reports</h2>
                </a>
            </div>
        </div>


    </div>
</x-app-layout>
