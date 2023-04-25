@props(['confirmed', 'deaths', 'recovered', 'countries'])

@php
    $lang = app()->getLocale();
@endphp
<div class="w-full md:my-14 mt-10">
    <div class="md:h-[600px] xs:h-[350px] overflow-y-scroll">
        <table class="w-full md:text-sm xs:text-[10px] text-left border border-[#F6F6F7]">
            <tr class="bg-[#F6F6F7] h-14 border border-[#F6F6F7]">
                <th class="w-1/4 md:pl-10 xs:pl-4 rounded-tl-lg">
                    <x-table-sort title="location" sortby="name" />
                </th>
                <th class="w-[25%] md:pl-10 xs:pl-2">
                    <x-table-sort title="new_cases" sortby="confirmed" />

                </th>
                <th class="md:w-1/5 xs:h-1/4 md:pl-10 xs:pl-2">
                    <x-table-sort title="deaths" sortby="deaths" />
                </th>
                <th class="md:pl-10 xs:pl-2 rounded-tr-lg">
                    <x-table-sort title="recovered" sortby="recovered" />
                </th>
            </tr>
            <tbody>
                <tr>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">@lang('dashboard.worldwide')</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($confirmed) }}</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($deaths) }}</td>
                    <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($recovered) }}</td>
                </tr>
                @foreach ($countries as $country)
                    <tr>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">
                            {{ json_decode($country->name) != null ? json_decode($country->name)->$lang : $country->name }}
                        </td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">
                            {{ number_format($country->confirmed) }}</td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">{{ number_format($country->deaths) }}
                        </td>
                        <td class="md:pl-10 py-4 xs:pl-4 border border-[#F6F6F7]">
                            {{ number_format($country->recovered) }}</td>
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
