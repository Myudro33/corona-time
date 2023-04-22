@props(['column', 'nextOrder', 'confirmed', 'deaths', 'recovered', 'countries', 'order'])

<div class="w-full md:my-14 mt-10">
    <div class="md:h-[600px] xs:h-[350px] overflow-y-scroll">
        <table class="w-full text-sm text-left border border-[#F6F6F7]">
            <tr class="bg-[#F6F6F7] h-14 border border-[#F6F6F7]">
                <th class="w-1/4 md:pl-10 xs:pl-4 rounded-tl-lg">
                    <div class="flex items-center">
                        <a href="?sort=country&order={{ $column == 'country' ? $nextOrder : 'asc' }}">@lang('dashboard.location')</a>
                        <x-sort-icons column="{{ $column }}" sortby="country" order="{{ $order }}" />
                    </div>
                </th>
                <th class="w-[25%] md:pl-10 xs:pl-4">
                    <div class="flex items-center">
                        <a href="?sort=confirmed&order={{ $column == 'confirmed' ? $nextOrder : 'asc' }}">@lang('dashboard.new_cases')</a>
                        <x-sort-icons column="{{ $column }}" sortby="confirmed" order="{{ $order }}" />

                    </div>
                </th>
                <th class="md:w-1/5 xs:h-1/4 md:pl-10 xs:pl-4">
                    <div class="flex items-center">
                        <a href="?sort=deaths&order={{ $column == 'deaths' ? $nextOrder : 'asc' }}">@lang('dashboard.deaths')</a>
                        <x-sort-icons column="{{ $column }}" sortby="deaths" order="{{ $order }}" />
                    </div>

                </th>
                <th class="md:pl-10 xs:pl-4 rounded-tr-lg">
                    <div class="flex items-center">
                        <a href="?sort=recovered&order={{ $column == 'recovered' ? $nextOrder : 'asc' }}">@lang('dashboard.recovered')</a>
                        <x-sort-icons column="{{ $column }}" sortby="recovered" order="{{ $order }}" />
                    </div>
                </th>
            </tr>
            <tbody>
                <tr >
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">@lang('dashboard.worldwide')</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($confirmed) }}</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($deaths) }}</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($recovered) }}</td>
                </tr>
                @foreach ($countries as $country)
                    <tr>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ $country->getTranslation('name', Session::get('locale')) }}</td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($country->confirmed) }}</td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($country->deaths) }}</td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($country->recovered) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<style>
    /* width */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #808189;
        border-radius: 4px;
    }
</style>
