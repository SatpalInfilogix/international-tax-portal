<x-app-layout>
    <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto py-12">

        <div class="flex justify-between">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Members Directory') }}
            </h1>

            <div>
                <a href="{{ route('members.email') }}"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md mr-4">
                    {{ __('Email All members') }}
                </a>
                <a href="{{ route('dashboard') }}"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                    {{ __('Back') }}
                </a>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-start-2 col-span-2 relative">
                <div class="sm:flex rounded-lg shadow-sm">
                    <input type="text" placeholder="Search Country" id="search-country" name="search-country"
                        class="py-2 px-4 pe-11 block w-full border-gray-200 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-gray-300 focus:ring-gray-300 disabled:opacity-50 disabled:pointer-events-none">

                    <button
                        class="py-2 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md search-country">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
                <div class="country-dropdown absolute z-[80] bg-white w-full"></div>
            </div>
        </div>

        <div id="map" class="mt-2" style="min-height: 500px;" data-countries="{{ json_encode($countries) }}">
        </div>

        <div class="py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($members as $member)
                <button data-country= "{{ $member->userAdditionalData->country }}" class="search-country-data">
                    <div class="px-4 py-4 col-span-1 lg:col-span-1 bg-white shadow-md">
                        <div class="flex">
                            <h2 class="font-extrabold text-md mb-2 mr-1">{{ $member->name }}</h2>
                            @if ($member->userAdditionalData && $member->userAdditionalData->country)
                                <span class="text-green-400">
                                    ({{ $member->userAdditionalData->country }})
                                </span>
                            @endif
                        </div>
                        @if ($member->userAdditionalData && $member->userAdditionalData->company_name)
                            <p class="text-gray-700 text-sm text-start"> ({{ $member->userAdditionalData->company_name }})</p>
                        @endif
                    </div>
                </button>
            @endforeach
        </div>

        <div data-modal="view-user-by-country"
            class="hidden country-members size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
            <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 class="text-xl font-bold text-gray-800">
                            <div class="country-name"></div>
                        </h3>
                        <button type="button"
                            class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>

                    <div class="p-4 overflow-y-auto">
                        <div class="members-list"></div>
                        <div class="flex justify-end items-center gap-x-2 py-3 border-t">
                            <button
                                class="rounded-full text-sm px-6 py-3 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 send-lead">
                                Send Lead</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function renderMembersByCountry(country) {
                $.ajax({
                    url: `{{ url('get-members-by-country') }}/${country}`,
                    method: "GET",
                    success: function(response) {
                        $('.country-members').removeClass('hidden');
                        let html = ``;
                        for (let i = 0; i < response.length; i++) {
                            html += ` <div class="flex items-center mt-2">
                            <div class="w-full bg-white">
                            <div class="rounded overflow-hidden shadow-lg px-4 py-2">
                                <div class="flex">
                                    <div class="flex w-full items-center">
                                        <img src="{{ asset('assets/icons/user-circle.jpg') }}" class="w-12 h-12" alt="User Image">
                                        <div class="px-6 py-2">
                                            <div class="font-bold">${response[i].name}</div>`;

                                    if (response[i].user_additionl_data && response[i].user_additionl_data.company_name) {
                                        html +=
                                            `<div class="font-bold text-md mt-2">${response[i].user_additionl_data.company_name}</div>`;
                                    }

                                html += `</div>
                                    </div>
                                        <div class="w-20 text-center">
                                            <input type="checkbox" name="member[]" value=${response[i].id} class="member rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 mb-2">
                                        <i class="ri-mail-line"></i>
                                        ${response[i].email}
                                    </div>
                                    <div class="mb-2">
                                        <i class="ri-phone-line"></i>
                                        ${response[i].phone_number}
                                    </div>`;

                            if (response[i].areas_of_expertise) {
                                let expertises = response[i].areas_of_expertise.split(', ');
                                let expertisesHtml = ``;

                                for (let j = 0; j < expertises.length; j++) {
                                    expertisesHtml += `<div class="font-bold text-sm mr-2 flex items-center">
                                                <span class="size-1.5 inline-block rounded-full bg-green-800 mr-1"></span>
                                                ${expertises[j]}
                                            </div>`;
                                }

                                html += `<div class="flex flex-wrap my-2">${expertisesHtml}</div>`;
                            }

                            html += `</div>
                            </div>
                        </div>`;
                        }

                        $('.country-name').text(country);
                        $('.members-list').html(html);
                        $(`#overlay`).removeClass('hidden');
                        $('body').addClass('overflow-y-hidden');
                    }
                })
            }


            function initMap() {
                var latlng = new google.maps.LatLng(-25.92, 151.25); // default location

                var myOptions = {
                    zoom: 1,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false
                };

                var map = new google.maps.Map(document.getElementById('map'), myOptions);

                var infowindow = new google.maps.InfoWindow(),
                    marker, lat, lng;

                var json = JSON.parse($('[data-countries]').attr('data-countries'));

                for (var o in json) {
                    lat = json[o].country_detail.latitude;
                    lng = json[o].country_detail.longitude;
                    name = json[o].country;

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat, lng),
                        name: name,
                        map: map,
                        title: name
                    });

                    google.maps.event.addListener(marker, 'click', function(e) {
                        let country_name = this.name;
                        renderMembersByCountry(country_name);
                    }.bind(marker));
                }
            }

            $('.send-lead').click(function() {
                var country = $('.country-name').text();
                var selected = new Array();

                $("input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    var members = selected.join(",");
                }

                if(!members){
                    members = '';
                }
                window.location.href = `{{ route('leads.create') }}?country=${country}&members=${members}`;
            });

            let availableCountries = $('[data-countries]').data('countries');

            let countries = [];
            availableCountries.forEach(country => {
                countries.push(country.country)
            });

            $("#search-country").autocomplete({
                source: countries,
                autoFocus: true,
                appendTo: ".country-dropdown",
                classes: {
                    "ui-autocomplete": "px-2 py-1",
                    "ui-menu-item-wrapper": "hover-bg-gray-100"
                },
            });


            $('.search-country').click(function() {
                var country_name = $('[name="search-country"]').val();
                renderMembersByCountry(country_name);

            });

            $('.search-country-data').click(function() {
                var country_name = $(this).data('country');
                renderMembersByCountry(country_name);
            });
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&callback=initMap">
        </script>
</x-app-layout>
