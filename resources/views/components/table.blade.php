@props(['column', 'nextOrder', 'confirmed', 'deaths', 'recovered', 'countries', 'order'])

@php
    $lang = app()->getLocale();
@endphp
<div class="w-full md:my-14 mt-10">
    <div class="md:h-[600px] xs:h-[350px] overflow-y-scroll">
        <table class="w-full text-sm text-left border border-[#F6F6F7]">
            <tr class="bg-[#F6F6F7] h-14 border border-[#F6F6F7]">
                <th class="w-1/4 md:pl-10 xs:pl-4 rounded-tl-lg">
                    <x-table-sort title="location" column="{{ $column }}" nextOrder="{{ $nextOrder }}"
                        sortby="country" order="{{ $order }}" />
                </th>
                <th class="w-[25%] md:pl-10 xs:pl-4">
                    <x-table-sort title="new_cases" column="{{ $column }}" nextOrder="{{ $nextOrder }}"
                        sortby="confirmed" order="{{ $order }}" />

                </th>
                <th class="md:w-1/5 xs:h-1/4 md:pl-10 xs:pl-4">
                    <x-table-sort title="deaths" column="{{ $column }}" nextOrder="{{ $nextOrder }}"
                        sortby="deaths" order="{{ $order }}" />
                </th>
                <th class="md:pl-10 xs:pl-4 rounded-tr-lg">
                    <x-table-sort title="recovered" column="{{ $column }}" nextOrder="{{ $nextOrder }}"
                        sortby="recovered" order="{{ $order }}" />
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
background: #808189;
border-radius: 4px;
}
</style>
