@extends('layouts.app')
@section('content')

    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white w-11/12 bg-white shadow-lg">

        <main class="my-4">

            <div class="container mx-auto px-6">
                <h3 class="text-gray-700 text-center text-3xl font-bold mb-8">Checkout</h3>

                <!-- Review items -->
                <div class="w-full flex justify-center">

                    <div class="border rounded-md p-10 mb-10 mx-8 w-full">

                        <h1 class="font-bold text-xl mb-4 uppercase">Review Items</h1>
    
                        @if ($cartAndProductRecords->count())
    
                            <table class="w-full text-sm lg:text-base" cellspacing="0">
    
                                <thead>
                                    <tr class="h-12">
                                        <th class="hidden md:table-cell"></th>
                                        <th class="text-left">Product</th>
                                        <th class="hidden text-center md:table-cell">Description</th>
                                        <th class="text-left lg:text-center pl-5 lg:pl-0">
                                            <span class="lg:hidden" title="Quantity">Qtd</span>
                                            <span class="hidden lg:inline">Quantity</span>
                                        </th>
                                    </tr>
                                </thead>
    
                                <tbody>
    
                                    @foreach ($cartAndProductRecords as $cartAndProductRecord)
    
                                        <tr>
                                            <td class="hidden pb-4 md:table-cell">
                                                <a href="#">
                                                    <img src="/images/products/{{ $cartAndProductRecord->prod_image }}"
                                                        class="w-20 rounded" alt="Thumbnail">
                                                </a>
                                            </td>
    
                                            <td>
                                                <a href="">
                                                    <p class="mb-2">{{ $cartAndProductRecord->prod_name }}</p>
                                                </a>
                                            </td>
    
                                            <td class="hidden text-center md:table-cell mb-1">
                                                @php
                                                    preg_match('/^([^.]+)/', $cartAndProductRecord->prod_descrip, $firstSentence);
                                                @endphp
                                                <span class="text-xs lg:text-base">
    
                                                    {{ $firstSentence[1] }} 
                                                </span>
                                            </td>
    
                                            <td class="text-left md:text-center md:mt-8">
                                                <p>{{ $cartAndProductRecord->product_quantity }}</p>
                                            </td>
    
                                            {{-- <td class="text-right">
                                                <form action="{{ route('cart.destroy', $cartAndProductRecord->product_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                    class="text-white bg-red-500 p-1 rounded-lg hover:bg-red-700 md:ml-4">
                                                        <small class="m-2">Remove item</small>
                                                    </button>
                                                </form>
                                            </td> --}}
    
                                        </tr>
    
                                    @endforeach
    
                                </tbody>
    
                            </table>
    
                        @endif
    
                    </div>

                </div>

                <!-- Form and order summary -->

                <div class="space-y-6 lg:space-y-0 lg:space-x-16 lg:flex lg:flex-row my-6 justify-center">

                    <!-- Form -->
                    <form
                        action="{{ route('checkout.add', [$total_price, $total_items_quantity, $cartAndProductRecords->count(), $currentDateTime]) }}"
                        method="POST" class="p-8">

                        @csrf
                        <div class="leading-loose">

                            <div class="space-y-5 md:flex justify-between md:space-y-0 md:space-x-10">

                                <!-- Final details -->
                                <div class="border rounded-md p-8 w-full md:w-6/12">

                                    <h1 class="text-center font-bold text-xl mb-8 uppercase">Final Details</h1>

                                    <div class="mb-8">
                                        <div class="mb-8 p-4 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">Collection Information</h1>
                                        </div>

                                        <!-- Collection day select -->

                                        <div class="sm:flex mb-6">

                                            <label class="text-sm w-4/12 font-bold text-gray-700 mr-2">Collection
                                                Day:</label>

                                            <select name="collectionDay" onchange="setCollectionDay()"
                                                id="select-collection-day"
                                                class="w-full h-10 md:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                                @if ($currentDateTime->format('l') == 'Wednesday')

                                                    @if ($friSlotsFull)

                                                        <option disabled>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option disabled>Friday (Slots Full)</option>

                                                    @elseif($thurSlotsFull)

                                                        <option disabled>Wednesday</option>
                                                        <option disabled>Thursday (Slots Full)</option>
                                                        <option>Friday</option>

                                                    @elseif(($thuLast2SlotsFull && ((strtotime($firstTimeSlot) / 3600) -
                                                        (strtotime($currentDateTime) / 3600)) < 24) || ($thuLastSlotFull &&
                                                            ((strtotime($secondTimeSlot) / 3600) -
                                                            (strtotime($currentDateTime) / 3600)) < 24)) <option disabled>
                                                            Wednesday</option>
                                                            <option disabled>Thursday (Slots Full)</option>
                                                            <option>Friday</option>

                                                        @else

                                                            <option disabled>Wednesday</option>
                                                            <option>Thursday</option>
                                                            <option>Friday</option>

                                                    @endif

                                                @elseif($currentDateTime->format('l') == 'Thursday')

                                                    <option disabled>Wednesday</option>
                                                    <option disabled>Thursday</option>
                                                    <option>Friday</option>

                                                @else

                                                    <!-- All were shown here before. -->

                                                    @if ($wedSlotsFull && $thurSlotsFull)

                                                        <option disabled>Wednesday (Slots Full)</option>
                                                        <option disabled>Thursday (Slots Full)</option>
                                                        <option>Friday</option>

                                                    @elseif((($wedLast2SlotsFull && ((strtotime($firstTimeSlot) / 3600)
                                                        - (strtotime($currentDateTime) / 3600)) < 24) || ($wedLastSlotFull
                                                            && ((strtotime($secondTimeSlot) / 3600) -
                                                            (strtotime($currentDateTime) / 3600)) < 24)) && $thurSlotsFull)
                                                            <option disabled>Wednesday (Slots Full)</option>
                                                            <option disabled>Thursday (Slots Full)</option>
                                                            <option>Friday</option>

                                                        @elseif($wedSlotsFull && $friSlotsFull)

                                                            <option disabled>Wednesday (Slots Full)</option>
                                                            <option>Thursday</option>
                                                            <option disabled>Friday (Slots Full)</option>

                                                        @elseif((($wedLast2SlotsFull && ((strtotime($firstTimeSlot) /
                                                            3600) - (strtotime($currentDateTime) / 3600)) < 24) ||
                                                                ($wedLastSlotFull && ((strtotime($secondTimeSlot) / 3600) -
                                                                (strtotime($currentDateTime) / 3600)) < 24)) &&
                                                                $friSlotsFull) <option disabled>Wednesday (Slots Full)
                                                                </option>
                                                                <option>Thursday</option>
                                                                <option disabled>Friday (Slots Full)</option>

                                                            @elseif($thurSlotsFull && $friSlotsFull)

                                                                <option>Wednesday</option>
                                                                <option disabled>Thursday (Slots Full)</option>
                                                                <option disabled>Friday (Slots Full)</option>

                                                            @elseif($wedSlotsFull)

                                                                <option disabled>Wednesday (Slots Full)</option>
                                                                <option>Thursday</option>
                                                                <option>Friday</option>

                                                            @elseif($thurSlotsFull)

                                                                <option>Wednesday</option>
                                                                <option disabled>Thursday (Slots Full)</option>
                                                                <option>Friday</option>

                                                            @elseif($friSlotsFull)

                                                                <option>Wednesday</option>
                                                                <option>Thursday</option>
                                                                <option disabled>Friday (Slots Full)</option>

                                                            @elseif(($wedLast2SlotsFull && ((strtotime($firstTimeSlot) /
                                                                3600) - (strtotime($currentDateTime) / 3600)) < 24) ||
                                                                    ($wedLastSlotFull && ((strtotime($secondTimeSlot) /
                                                                    3600) - (strtotime($currentDateTime) / 3600)) < 24))
                                                                    <option disabled>Wednesday (Slots Full)</option>
                                                                    <option>Thursday</option>
                                                                    <option>Friday</option>

                                                                @else

                                                                    <option>Wednesday</option>
                                                                    <option>Thursday</option>
                                                                    <option>Friday</option>

                                                    @endif

                                                @endif

                                            </select>

                                        </div>

                                        <!-- Collection time slot select -->

                                        <div class="sm:flex">

                                            <label class="text-sm w-4/12 font-bold text-gray-700 mr-2">Collection Slot
                                                Time:</label>

                                            <select name="collectionTime" onchange="setCollectionTime()"
                                                id="select-collection-time"
                                                class="w-full h-10 md:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                                @if ($currentDateTime->format('l') == 'Tuesday')

                                                    @if(((strtotime($thirdTimeSlot) / 3600) - (strtotime($currentDateTime) /
                                                    3600)) < 24) <!-- Show other days because the wednesday will be disabled
                                                        -->

                                                        <script>
                                                            var selectCollectionDay = document.getElementById('select-collection-day');
                                                            var thuSlotsFull = {!! json_encode($thurSlotsFull) !!};

                                                            if (thuSlotsFull) {
                                                                selectCollectionDay.options[2].selected = true;
                                                            } else {
                                                                selectCollectionDay.options[1].selected = true;
                                                            }

                                                            selectCollectionDay.options[0].disabled = true;

                                                            function setCollectionDay() {

                                                                // Change order summary's collection day:
                                                                var selectCollectionDay = document.getElementById('select-collection-day');
                                                                var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                                const collectionDay = document.querySelector('.collection-day');
                                                                collectionDay.innerHTML = selectedValue;

                                                                // If customer changes the day from wednesday to any other days:
                                                                var selectCollectionTime = document.getElementById('select-collection-time');

                                                                var wedCollectionDays = {!! json_encode($availableSlotsForWed) !!};
                                                                var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                function updateCollectionTime(dayCollectionTimes, index) {

                                                                    const emptySlots = [];

                                                                    for (let i = 0; i < 3; i++) {

                                                                        selectCollectionTime.options[i].disabled = false;
                                                                        selectCollectionTime.options[i].selected = false;
                                                                        selectCollectionTime.options[i].innerHTML = "";

                                                                    }

                                                                    for (let i = 0; i < 3; i++) {

                                                                        if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                            selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                ' (Slot full)');
                                                                            selectCollectionTime.options[i].disabled = true;

                                                                        } else {

                                                                            selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                        }

                                                                    }

                                                                    for (let i = 0; i < 3; i++) {

                                                                        if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                            emptySlots.push(i + index);

                                                                        }

                                                                    }

                                                                    if (emptySlots.length) {

                                                                        selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                    }

                                                                }

                                                                if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Friday") {

                                                                    updateCollectionTime(friCollectionDays, 6);
                                                                    selectCollectionDay.options[0].disabled = true;

                                                                } else {

                                                                    // Thursday is clicked
                                                                    updateCollectionTime(thuCollectionDays, 3);
                                                                    selectCollectionDay.options[0].disabled = true;

                                                                }

                                                                setCollectionTime();

                                                            }
                                                        </script>

                                                        @if ($availableSlotsForThu->count() && !$thurSlotsFull)

                                                            @foreach ($availableSlotsForThu as $slot)

                                                                @if ($slot->order_quantity == 20)

                                                                    <option disabled>{{ $slot->slot_time }} (Slot full)
                                                                    </option>

                                                                @else

                                                                    <option>{{ $slot->slot_time }}</option>

                                                                @endif

                                                            @endforeach

                                                        @elseif($availableSlotsForFri->count() && !$friSlotsFull)

                                                            @foreach ($availableSlotsForFri as $slot)

                                                                @if ($slot->order_quantity == 20)

                                                                    <option disabled>{{ $slot->slot_time }} (Slot full)
                                                                    </option>

                                                                @else

                                                                    <option>{{ $slot->slot_time }}</option>

                                                                @endif

                                                            @endforeach


                                                        @endif

                                                    @elseif(((strtotime($secondTimeSlot) / 3600) -
                                                        (strtotime($currentDateTime) / 3600)) < 24) <!-- Display every time
                                                            slot if day has been changed from wednesday: -->

                                                            <script>
                                                                function setCollectionDay() {

                                                                    // Change order summary's collection day:
                                                                    var selectCollectionDay = document.getElementById('select-collection-day');
                                                                    var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                                    const collectionDay = document.querySelector('.collection-day');
                                                                    collectionDay.innerHTML = selectedValue;

                                                                    // If customer changes the day from wednesday to any other days:
                                                                    var selectCollectionTime = document.getElementById('select-collection-time');

                                                                    var wedCollectionDays = {!! json_encode($availableSlotsForWed) !!};
                                                                    var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                    var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                    function updateCollectionTime(dayCollectionTimes, index) {

                                                                        const emptySlots = [];

                                                                        for (let i = 0; i < 3; i++) {

                                                                            selectCollectionTime.options[i].disabled = false;
                                                                            selectCollectionTime.options[i].selected = false;
                                                                            selectCollectionTime.options[i].innerHTML = "";

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                    ' (Slot full)');
                                                                                selectCollectionTime.options[i].disabled = true;

                                                                            } else {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                            }

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                emptySlots.push(i + index);

                                                                            }

                                                                        }

                                                                        if (emptySlots.length) {

                                                                            selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                        }

                                                                    }

                                                                    if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Thursday") {

                                                                        updateCollectionTime(thuCollectionDays, 3);

                                                                        // If wednesday's first and second time slot are disabled and the other slot is full.

                                                                        if (wedCollectionDays[2]['order_quantity'] == 20) {

                                                                            selectCollectionDay.options[0].disabled = true;

                                                                        }

                                                                    } else if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Friday") {

                                                                        updateCollectionTime(friCollectionDays, 6);

                                                                        // If wednesday's first and second time slot are disabled and the other slot is full.

                                                                        if (wedCollectionDays[2]['order_quantity'] == 20) {

                                                                            selectCollectionDay.options[0].disabled = true;

                                                                        }

                                                                    } else {

                                                                        // User changes it back to wednesday:
                                                                        updateCollectionTime(wedCollectionDays, 0);
                                                                        selectCollectionTime.options[0].disabled = true;
                                                                        selectCollectionTime.options[1].disabled = true;
                                                                        selectCollectionTime.options[0].innerHTML = '10-13';
                                                                        selectCollectionTime.options[1].innerHTML = '13-16';


                                                                        if (wedCollectionDays[2]['order_quantity'] != 20) {

                                                                            selectCollectionTime.options[2].selected = true;

                                                                        }

                                                                    }

                                                                    setCollectionTime();

                                                                }
                                                            </script>

                                                            @if ($availableSlotsForWed->count() && !$wedLastSlotFull && !$wedSlotsFull)

                                                                <option disabled>{{ $availableSlotsForWed[0]->slot_time }}
                                                                </option>
                                                                <option disabled>
                                                                    {{ $availableSlotsForWed[1]->slot_time }}</option>


                                                                @for ($i = 2; $i < $availableSlotsForWed->count(); $i++)
                                                                    {

                                                                    @if ($availableSlotsForWed[$i]->order_quantity == 20)

                                                                        <option disabled>
                                                                            {{ $availableSlotsForWed[$i]->slot_time }}
                                                                            (Slot full)</option>

                                                                    @else

                                                                        <option>
                                                                            {{ $availableSlotsForWed[$i]->slot_time }}
                                                                        </option>

                                                                    @endif

                                                                @endfor

                                                            @elseif($availableSlotsForThu->count() && !$thurSlotsFull)

                                                                @foreach ($availableSlotsForThu as $slot)

                                                                    @if ($slot->order_quantity == 20)

                                                                        <option disabled>{{ $slot->slot_time }} (Slot
                                                                            full)</option>

                                                                    @else

                                                                        <option>{{ $slot->slot_time }}</option>

                                                                    @endif

                                                                @endforeach

                                                            @elseif($availableSlotsForFri->count() && !$friSlotsFull)

                                                                @foreach ($availableSlotsForFri as $slot)

                                                                    @if ($slot->order_quantity == 20)

                                                                        <option disabled>{{ $slot->slot_time }} (Slot
                                                                            full)</option>

                                                                    @else

                                                                        <option>{{ $slot->slot_time }}</option>

                                                                    @endif

                                                                @endforeach


                                                            @endif

                                                        @elseif(((strtotime($firstTimeSlot) / 3600) -
                                                            (strtotime($currentDateTime) / 3600)) < 24) <!-- Display every
                                                                time slot if day has been changed from wednesday: -->

                                                                <script>
                                                                    function setCollectionDay() {

                                                                        // Change order summary's collection day:
                                                                        var selectCollectionDay = document.getElementById('select-collection-day');
                                                                        var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                                        const collectionDay = document.querySelector('.collection-day');
                                                                        collectionDay.innerHTML = selectedValue;

                                                                        // If customer changes the day from wednesday to any other days:
                                                                        var selectCollectionTime = document.getElementById('select-collection-time');

                                                                        var wedCollectionDays = {!! json_encode($availableSlotsForWed) !!};
                                                                        var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                        var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                        function updateCollectionTime(dayCollectionTimes, index) {

                                                                            const emptySlots = [];

                                                                            for (let i = 0; i < 3; i++) {

                                                                                selectCollectionTime.options[i].disabled = false;
                                                                                selectCollectionTime.options[i].selected = false;
                                                                                selectCollectionTime.options[i].innerHTML = "";

                                                                            }

                                                                            for (let i = 0; i < 3; i++) {

                                                                                if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                    selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                        ' (Slot full)');
                                                                                    selectCollectionTime.options[i].disabled = true;

                                                                                } else {

                                                                                    selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                                }

                                                                            }

                                                                            for (let i = 0; i < 3; i++) {

                                                                                if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                    emptySlots.push(i + index);

                                                                                }

                                                                            }

                                                                            if (emptySlots.length) {

                                                                                selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                            }

                                                                        }

                                                                        if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Thursday") {

                                                                            updateCollectionTime(thuCollectionDays, 3);

                                                                            // If wednesday's first time slot is disabled and 2 other slots are full.
                                                                            const emptySlots = [];

                                                                            for (let i = 1; i < 3; i++) {

                                                                                if (wedCollectionDays[i]['order_quantity'] != 20) {

                                                                                    emptySlots.push(i);

                                                                                }

                                                                            }

                                                                            if (!emptySlots.length) {

                                                                                selectCollectionDay.options[0].disabled = true;

                                                                            }

                                                                        } else if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Friday") {

                                                                            updateCollectionTime(friCollectionDays, 6);

                                                                            // If wednesday's first time slot is disabled and 2 other slots are full.
                                                                            const emptySlots = [];

                                                                            for (let i = 1; i < 3; i++) {

                                                                                if (wedCollectionDays[i]['order_quantity'] != 20) {

                                                                                    emptySlots.push(i);

                                                                                }

                                                                            }

                                                                            if (!emptySlots.length) {

                                                                                selectCollectionDay.options[0].disabled = true;

                                                                            }

                                                                        } else {

                                                                            // User changes it back to wednesday:
                                                                            updateCollectionTime(wedCollectionDays, 0);
                                                                            selectCollectionTime.options[0].disabled = true;
                                                                            selectCollectionTime.options[0].innerHTML = '10-13';


                                                                            const emptySlots = [];

                                                                            for (let i = 1; i < 3; i++) {

                                                                                if (wedCollectionDays[i]['order_quantity'] != 20) {

                                                                                    emptySlots.push(i);

                                                                                }

                                                                            }

                                                                            if (emptySlots.length) {

                                                                                selectCollectionTime.options[emptySlots[0]].selected = true;

                                                                            }

                                                                        }

                                                                        setCollectionTime();

                                                                    }
                                                                </script>

                                                                @if ($availableSlotsForWed->count() && !$wedLast2SlotsFull && !$wedSlotsFull)

                                                                    <option disabled>
                                                                        {{ $availableSlotsForWed[0]->slot_time }}
                                                                    </option>

                                                                    @for ($i = 1; $i < $availableSlotsForWed->count(); $i++)
                                                                        {

                                                                        @if ($availableSlotsForWed[$i]->order_quantity == 20)

                                                                            <option disabled>
                                                                                {{ $availableSlotsForWed[$i]->slot_time }}
                                                                                (Slot full)</option>

                                                                        @else

                                                                            <option>
                                                                                {{ $availableSlotsForWed[$i]->slot_time }}
                                                                            </option>

                                                                        @endif

                                                                    @endfor

                                                                @elseif($availableSlotsForThu->count() &&
                                                                    !$thurSlotsFull)

                                                                    @foreach ($availableSlotsForThu as $slot)

                                                                        @if ($slot->order_quantity == 20)

                                                                            <option disabled>{{ $slot->slot_time }} (Slot
                                                                                full)</option>

                                                                        @else

                                                                            <option>{{ $slot->slot_time }}</option>

                                                                        @endif

                                                                    @endforeach

                                                                @elseif($availableSlotsForFri->count() &&
                                                                    !$friSlotsFull)

                                                                    @foreach ($availableSlotsForFri as $slot)

                                                                        @if ($slot->order_quantity == 20)

                                                                            <option disabled>{{ $slot->slot_time }} (Slot
                                                                                full)</option>

                                                                        @else

                                                                            <option>{{ $slot->slot_time }}</option>

                                                                        @endif

                                                                    @endforeach


                                                                @endif

                                                            @else

                                                                <script>
                                                                    // Change order summary's collection day:
                                                                    function setCollectionDay() {

                                                                        var selectColelctionDay = document.getElementById('select-collection-day');
                                                                        var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                        const collectionDay = document.querySelector('.collection-day');
                                                                        collectionDay.innerHTML = selectedValue;

                                                                        // If customer changes the day from wednesday to any other days:
                                                                        var selectCollectionTime = document.getElementById('select-collection-time');

                                                                        var wedCollectionDays = {!! json_encode($availableSlotsForWed) !!};
                                                                        var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                        var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                        function updateCollectionTime(dayCollectionTimes, index) {

                                                                            const emptySlots = [];

                                                                            for (let i = 0; i < 3; i++) {

                                                                                selectCollectionTime.options[i].disabled = false;
                                                                                selectCollectionTime.options[i].selected = false;
                                                                                selectCollectionTime.options[i].innerHTML = "";

                                                                            }

                                                                            for (let i = 0; i < 3; i++) {

                                                                                if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                    selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                        ' (Slot full)');
                                                                                    selectCollectionTime.options[i].disabled = true;

                                                                                } else {

                                                                                    selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                                }

                                                                            }

                                                                            for (let i = 0; i < 3; i++) {

                                                                                if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                    emptySlots.push(i + index);

                                                                                }

                                                                            }

                                                                            if (emptySlots.length) {

                                                                                selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                            }

                                                                        }

                                                                        if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Thursday") {

                                                                            updateCollectionTime(thuCollectionDays, 3);

                                                                        } else if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Friday") {

                                                                            updateCollectionTime(friCollectionDays, 6);

                                                                        } else {

                                                                            // User changes it back to wednesday:
                                                                            updateCollectionTime(wedCollectionDays, 0);

                                                                        }

                                                                        setCollectionTime();

                                                                    }
                                                                </script>

                                                                @if ($availableSlotsForWed->count() && !$wedSlotsFull)

                                                                    @foreach ($availableSlotsForWed as $slot)

                                                                        @if ($slot->order_quantity == 20)

                                                                            <option disabled>{{ $slot->slot_time }} (Slot
                                                                                full)</option>

                                                                        @else

                                                                            <option>{{ $slot->slot_time }}</option>

                                                                        @endif

                                                                    @endforeach

                                                                @elseif($availableSlotsForThu->count() &&
                                                                    !$thurSlotsFull)

                                                                    @foreach ($availableSlotsForThu as $slot)

                                                                        @if ($slot->order_quantity == 20)

                                                                            <option disabled>{{ $slot->slot_time }} (Slot
                                                                                full)</option>

                                                                        @else

                                                                            <option>{{ $slot->slot_time }}</option>

                                                                        @endif

                                                                    @endforeach

                                                                @elseif($availableSlotsForFri->count() &&
                                                                    !$friSlotsFull)

                                                                    @foreach ($availableSlotsForFri as $slot)

                                                                        @if ($slot->order_quantity == 20)

                                                                            <option disabled>{{ $slot->slot_time }} (Slot
                                                                                full)</option>

                                                                        @else

                                                                            <option>{{ $slot->slot_time }}</option>

                                                                        @endif

                                                                    @endforeach


                                                                @else

                                                                    <option>10-13</option>
                                                                    <option>13-16</option>
                                                                    <option>16-19</option>

                                                                @endif

                                                @endif

                                            @elseif($currentDateTime->format('l') == "Wednesday")

                                                @if(((strtotime($thirdTimeSlot) / 3600) - (strtotime($currentDateTime) /
                                                3600)) < 24) <!-- Show Friday slots because the thursday will be disabled
                                                    after 4pm -->

                                                    <script>
                                                        var selectCollectionDay = document.getElementById('select-collection-day');
                                                        selectCollectionDay.options[0].disabled = true;
                                                        selectCollectionDay.options[1].disabled = true;
                                                        selectCollectionDay.options[2].selected = true;

                                                        function setCollectionDay() {

                                                            // Change order summary's collection day:
                                                            var selectCollectionDay = document.getElementById('select-collection-day');
                                                            var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                            const collectionDay = document.querySelector('.collection-day');
                                                            collectionDay.innerHTML = selectedValue;

                                                        }
                                                    </script>

                                                    @if ($availableSlotsForFri->count() && !$friSlotsFull)

                                                        @foreach ($availableSlotsForFri as $slot)

                                                            @if ($slot->order_quantity == 20)

                                                                <option disabled>{{ $slot->slot_time }} (Slot full)
                                                                </option>

                                                            @else

                                                                <option>{{ $slot->slot_time }}</option>

                                                            @endif

                                                        @endforeach


                                                    @endif

                                                @elseif(((strtotime($secondTimeSlot) / 3600) -
                                                    (strtotime($currentDateTime) / 3600)) < 24) <!-- Display every time slot
                                                        if day has been changed from Thursday: -->

                                                        <script>
                                                            function setCollectionDay() {

                                                                // Change order summary's collection day:
                                                                var selectCollectionDay = document.getElementById('select-collection-day');
                                                                var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                                const collectionDay = document.querySelector('.collection-day');
                                                                collectionDay.innerHTML = selectedValue;

                                                                // If customer changes the day from wednesday to any other days:
                                                                var selectCollectionTime = document.getElementById('select-collection-time');

                                                                var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                function updateCollectionTime(dayCollectionTimes, index) {

                                                                    const emptySlots = [];

                                                                    for (let i = 0; i < 3; i++) {

                                                                        selectCollectionTime.options[i].disabled = false;
                                                                        selectCollectionTime.options[i].selected = false;
                                                                        selectCollectionTime.options[i].innerHTML = "";

                                                                    }

                                                                    for (let i = 0; i < 3; i++) {

                                                                        if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                            selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                ' (Slot full)');
                                                                            selectCollectionTime.options[i].disabled = true;

                                                                        } else {

                                                                            selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                        }

                                                                    }

                                                                    for (let i = 0; i < 3; i++) {

                                                                        if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                            emptySlots.push(i + index);

                                                                        }

                                                                    }

                                                                    if (emptySlots.length) {

                                                                        selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                    }

                                                                }

                                                                if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Friday") {

                                                                    updateCollectionTime(friCollectionDays, 6);

                                                                    // If wednesday's first and second time slot are disabled and the other slot is full.

                                                                    if (wedCollectionDays[2]['order_quantity'] == 20) {

                                                                        selectCollectionDay.options[0].disabled = true;

                                                                    }

                                                                } else {

                                                                    // User changes it back to wednesday:

                                                                    updateCollectionTime(thuCollectionDays, 3);

                                                                    selectCollectionTime.options[0].disabled = true;
                                                                    selectCollectionTime.options[1].disabled = true;
                                                                    selectCollectionTime.options[0].innerHTML = '10-13';
                                                                    selectCollectionTime.options[1].innerHTML = '13-16';


                                                                    if (thuCollectionDays[5]['order_quantity'] != 20) {

                                                                        selectCollectionTime.options[2].selected = true;

                                                                    }

                                                                }

                                                                setCollectionTime();

                                                            }
                                                        </script>

                                                        @if ($availableSlotsForThu->count() && !$thurSlotsFull && !$thuLastSlotFull)

                                                            <option disabled>{{ $availableSlotsForThu[3]->slot_time }}
                                                            </option>
                                                            <option disabled>{{ $availableSlotsForThu[4]->slot_time }}
                                                            </option>


                                                            @for ($i = 2; $i < $availableSlotsForThu->count(); $i++)
                                                                {

                                                                @if ($availableSlotsForThu[$i + 3]->order_quantity == 20)

                                                                    <option disabled>
                                                                        {{ $availableSlotsForThu[$i + 3]->slot_time }}
                                                                        (Slot full)</option>

                                                                @else

                                                                    <option>
                                                                        {{ $availableSlotsForThu[$i + 3]->slot_time }}
                                                                    </option>

                                                                @endif

                                                            @endfor

                                                        @elseif($availableSlotsForFri->count() && !$friSlotsFull)

                                                            @foreach ($availableSlotsForFri as $slot)

                                                                @if ($slot->order_quantity == 20)

                                                                    <option disabled>{{ $slot->slot_time }} (Slot full)
                                                                    </option>

                                                                @else

                                                                    <option>{{ $slot->slot_time }}</option>

                                                                @endif

                                                            @endforeach


                                                        @endif

                                                    @elseif(((strtotime($firstTimeSlot) / 3600) -
                                                        (strtotime($currentDateTime) / 3600)) < 24) <!-- Display every time
                                                            slot if day has been changed from thursday: -->

                                                            <script>
                                                                function setCollectionDay() {

                                                                    // Change order summary's collection day:
                                                                    var selectCollectionDay = document.getElementById('select-collection-day');
                                                                    var selectedValue = selectCollectionDay.options[selectCollectionDay.selectedIndex].value;
                                                                    const collectionDay = document.querySelector('.collection-day');
                                                                    collectionDay.innerHTML = selectedValue;

                                                                    // If customer changes the day from wednesday to any other days:
                                                                    var selectCollectionTime = document.getElementById('select-collection-time');

                                                                    var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                    var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                    function updateCollectionTime(dayCollectionTimes, index) {

                                                                        const emptySlots = [];

                                                                        for (let i = 0; i < 3; i++) {

                                                                            selectCollectionTime.options[i].disabled = false;
                                                                            selectCollectionTime.options[i].selected = false;
                                                                            selectCollectionTime.options[i].innerHTML = "";

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                    ' (Slot full)');
                                                                                selectCollectionTime.options[i].disabled = true;

                                                                            } else {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                            }

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                emptySlots.push(i + index);

                                                                            }

                                                                        }

                                                                        if (emptySlots.length) {

                                                                            selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                        }

                                                                    }

                                                                    if (selectCollectionDay.options[selectCollectionDay.selectedIndex].value == "Friday") {

                                                                        updateCollectionTime(friCollectionDays, 6);

                                                                        // If thursday's first time slot is disabled and 2 other slots are full.
                                                                        const emptySlots = [];

                                                                        for (let i = 1; i < 3; i++) {

                                                                            if (wedCollectionDays[i]['order_quantity'] != 20) {

                                                                                emptySlots.push(i);

                                                                            }

                                                                        }

                                                                        if (!emptySlots.length) {

                                                                            selectCollectionDay.options[1].disabled = true;

                                                                        }

                                                                    } else {

                                                                        // User changes it back to Thursday:

                                                                        updateCollectionTime(thuCollectionDays, 3);

                                                                        selectCollectionTime.options[0].disabled = true; // Disabling first time slot.
                                                                        selectCollectionTime.options[0].innerHTML = '10-13';

                                                                        const emptySlots = [];

                                                                        for (let i = 1; i < 3; i++) {

                                                                            if (thuCollectionDays[i + 3]['order_quantity'] != 20) {

                                                                                emptySlots.push(i);

                                                                            }

                                                                        }

                                                                        if (emptySlots.length) {

                                                                            selectCollectionTime.options[emptySlots[0]].selected = true;

                                                                        }

                                                                    }

                                                                    setCollectionTime();

                                                                }
                                                            </script>

                                                            @if ($availableSlotsForThu->count() && !$thurSlotsFull && !$thuLast2SlotsFull)

                                                                <option disabled>
                                                                    {{ $availableSlotsForThu[3]->slot_time }}</option>


                                                                @for ($i = 1; $i < $availableSlotsForThu->count(); $i++)
                                                                    {

                                                                    @if ($availableSlotsForThu[$i + 3]->order_quantity == 20)

                                                                        <option disabled>
                                                                            {{ $availableSlotsForThu[$i + 3]->slot_time }}
                                                                            (Slot full)</option>

                                                                    @else

                                                                        <option>
                                                                            {{ $availableSlotsForThu[$i + 3]->slot_time }}
                                                                        </option>

                                                                    @endif

                                                                @endfor

                                                            @elseif($availableSlotsForFri->count() && !$friSlotsFull)

                                                                @foreach ($availableSlotsForFri as $slot)

                                                                    @if ($slot->order_quantity == 20)

                                                                        <option disabled>{{ $slot->slot_time }} (Slot
                                                                            full)</option>

                                                                    @else

                                                                        <option>{{ $slot->slot_time }}</option>

                                                                    @endif

                                                                @endforeach


                                                            @else

                                                                <option>10-13</option>
                                                                <option>13-16</option>
                                                                <option>16-19</option>

                                                            @endif

                                                        @else

                                                            <script>
                                                                // Change order summary's collection day:
                                                                function setCollectionDay() {

                                                                    var selectColelctionDay = document.getElementById('select-collection-day');
                                                                    var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                    const collectionDay = document.querySelector('.collection-day');
                                                                    collectionDay.innerHTML = selectedValue;

                                                                    // If customer changes the day from wednesday to any other days:
                                                                    var selectCollectionTime = document.getElementById('select-collection-time');

                                                                    var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                    var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                    function updateCollectionTime(dayCollectionTimes, index) {

                                                                        const emptySlots = [];

                                                                        for (let i = 0; i < 3; i++) {

                                                                            selectCollectionTime.options[i].disabled = false;
                                                                            selectCollectionTime.options[i].selected = false;
                                                                            selectCollectionTime.options[i].innerHTML = "";

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                    ' (Slot full)');
                                                                                selectCollectionTime.options[i].disabled = true;

                                                                            } else {

                                                                                selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                            }

                                                                        }

                                                                        for (let i = 0; i < 3; i++) {

                                                                            if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                emptySlots.push(i + index);

                                                                            }

                                                                        }

                                                                        if (emptySlots.length) {

                                                                            selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                        }

                                                                    }

                                                                    if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Thursday") {

                                                                        updateCollectionTime(thuCollectionDays, 3);

                                                                    } else if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Friday") {

                                                                        updateCollectionTime(friCollectionDays, 6);

                                                                    }

                                                                    setCollectionTime();

                                                                }
                                                            </script>

                                                            @if ($availableSlotsForThu->count() && !$thurSlotsFull)

                                                                @foreach ($availableSlotsForThu as $slot)

                                                                    @if ($slot->order_quantity == 20)

                                                                        <option disabled>{{ $slot->slot_time }} (Slot
                                                                            full)</option>

                                                                    @else

                                                                        <option>{{ $slot->slot_time }}</option>

                                                                    @endif

                                                                @endforeach

                                                            @elseif($availableSlotsForFri->count() && !$friSlotsFull)

                                                                @foreach ($availableSlotsForFri as $slot)

                                                                    @if ($slot->order_quantity == 20)

                                                                        <option disabled>{{ $slot->slot_time }} (Slot
                                                                            full)</option>

                                                                    @else

                                                                        <option>{{ $slot->slot_time }}</option>

                                                                    @endif

                                                                @endforeach


                                                            @else

                                                                <option>10-13</option>
                                                                <option>13-16</option>
                                                                <option>16-19</option>

                                                            @endif

                                                            @endif

                                                        @elseif($currentDateTime->format('l') == "Thursday")

                                                            @if(((strtotime($secondTimeSlot) / 3600) -
                                                            (strtotime($currentDateTime) / 3600)) < 24) <!-- Display every
                                                                time slot if day has been changed from wednesday: -->

                                                                <script>
                                                                    function setCollectionDay() {

                                                                        // Change order summary's collection day:
                                                                        var selectColelctionDay = document.getElementById('select-collection-day');
                                                                        var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                        const collectionDay = document.querySelector('.collection-day');
                                                                        collectionDay.innerHTML = selectedValue;

                                                                    }
                                                                </script>

                                                                @if ($availableSlotsForFri->count() && !$friSlotsFull && !$friLastSlotFull)

                                                                    <option disabled>
                                                                        {{ $availableSlotsForFri[6]->slot_time }}
                                                                    </option>
                                                                    <option disabled>
                                                                        {{ $availableSlotsForFri[7]->slot_time }}
                                                                    </option>


                                                                    @for ($i = 2; $i < $availableSlotsForFri->count(); $i++)
                                                                        {

                                                                        @if ($availableSlotsForFri[$i + 6]->order_quantity == 20)

                                                                            <option disabled>
                                                                                {{ $availableSlotsForFri[$i + 6]->slot_time }}
                                                                                (Slot full)</option>

                                                                        @else

                                                                            <option>
                                                                                {{ $availableSlotsForFri[$i + 6]->slot_time }}
                                                                            </option>

                                                                        @endif

                                                                    @endfor

                                                                @endif

                                                            @elseif(((strtotime($firstTimeSlot) / 3600) -
                                                                (strtotime($currentDateTime) / 3600)) < 24) <!-- Display
                                                                    every time slot if day has been changed from wednesday:
                                                                    -->

                                                                    <script>
                                                                        function setCollectionDay() {

                                                                            // Change order summary's collection day:
                                                                            var selectColelctionDay = document.getElementById('select-collection-day');
                                                                            var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                            const collectionDay = document.querySelector('.collection-day');
                                                                            collectionDay.innerHTML = selectedValue;

                                                                        }
                                                                    </script>

                                                                    @if ($availableSlotsForFri->count() && !$friSlotsFull && !$friLast2SlotsFull)

                                                                        <option disabled>
                                                                            {{ $availableSlotsForFri[6]->slot_time }}
                                                                        </option>


                                                                        @for ($i = 1; $i < $availableSlotsForFri->count(); $i++)
                                                                            {

                                                                            @if ($availableSlotsForFri[$i + 6]->order_quantity == 20)

                                                                                <option disabled>
                                                                                    {{ $availableSlotsForFri[$i + 6]->slot_time }}
                                                                                    (Slot full)</option>

                                                                            @else

                                                                                <option>
                                                                                    {{ $availableSlotsForFri[$i + 6]->slot_time }}
                                                                                </option>

                                                                            @endif

                                                                        @endfor

                                                                    @endif

                                                                @else

                                                                    <script>
                                                                        // Change order summary's collection day:
                                                                        function setCollectionDay() {

                                                                            var selectColelctionDay = document.getElementById('select-collection-day');
                                                                            var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                            const collectionDay = document.querySelector('.collection-day');
                                                                            collectionDay.innerHTML = selectedValue;

                                                                        }
                                                                    </script>

                                                                    @if ($availableSlotsForFri->count() && !$friSlotsFull)

                                                                        @foreach ($availableSlotsForFri as $slot)

                                                                            @if ($slot->order_quantity == 20)

                                                                                <option disabled>{{ $slot->slot_time }}
                                                                                    (Slot full)</option>

                                                                            @else

                                                                                <option>{{ $slot->slot_time }}</option>

                                                                            @endif

                                                                        @endforeach


                                                                    @else

                                                                        <option>10-13</option>
                                                                        <option>13-16</option>
                                                                        <option>16-19</option>

                                                                    @endif

                                                                    @endif

                                                                @else

                                                                    <script>
                                                                        // Change order summary's collection day:
                                                                        function setCollectionDay() {

                                                                            var selectColelctionDay = document.getElementById('select-collection-day');
                                                                            var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
                                                                            const collectionDay = document.querySelector('.collection-day');
                                                                            collectionDay.innerHTML = selectedValue;

                                                                            // If customer changes the day from wednesday to any other days:
                                                                            var selectCollectionTime = document.getElementById('select-collection-time');

                                                                            var wedCollectionDays = {!! json_encode($availableSlotsForWed) !!};
                                                                            var thuCollectionDays = {!! json_encode($availableSlotsForThu) !!};
                                                                            var friCollectionDays = {!! json_encode($availableSlotsForFri) !!};

                                                                            function updateCollectionTime(dayCollectionTimes, index) {

                                                                                const emptySlots = [];

                                                                                for (let i = 0; i < 3; i++) {

                                                                                    selectCollectionTime.options[i].disabled = false;
                                                                                    selectCollectionTime.options[i].selected = false;
                                                                                    selectCollectionTime.options[i].innerHTML = "";

                                                                                }

                                                                                for (let i = 0; i < 3; i++) {

                                                                                    if (dayCollectionTimes[i + index]['order_quantity'] == 20) {

                                                                                        selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'].concat(
                                                                                            ' (Slot full)');
                                                                                        selectCollectionTime.options[i].disabled = true;

                                                                                    } else {

                                                                                        selectCollectionTime.options[i].innerHTML = dayCollectionTimes[i + index]['slot_time'];

                                                                                    }

                                                                                }

                                                                                for (let i = 0; i < 3; i++) {

                                                                                    if (dayCollectionTimes[i + index]['order_quantity'] != 20) {

                                                                                        emptySlots.push(i + index);

                                                                                    }

                                                                                }

                                                                                if (emptySlots.length) {

                                                                                    selectCollectionTime.options[emptySlots[0] - index].selected = true;

                                                                                }

                                                                            }

                                                                            if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Thursday") {

                                                                                updateCollectionTime(thuCollectionDays, 3);

                                                                            } else if (selectColelctionDay.options[selectColelctionDay.selectedIndex].value == "Friday") {

                                                                                updateCollectionTime(friCollectionDays, 6);

                                                                            } else {

                                                                                // User changes it back to wednesday:
                                                                                updateCollectionTime(wedCollectionDays, 0);

                                                                            }

                                                                            setCollectionTime();

                                                                        }
                                                                    </script>

                                                                    @if ($availableSlotsForWed->count() && !$wedSlotsFull)

                                                                        @foreach ($availableSlotsForWed as $slot)

                                                                            @if ($slot->order_quantity == 20)

                                                                                <option disabled>{{ $slot->slot_time }}
                                                                                    (Slot full)</option>

                                                                            @else

                                                                                <option>{{ $slot->slot_time }}</option>

                                                                            @endif

                                                                        @endforeach

                                                                    @elseif($availableSlotsForThu->count() &&
                                                                        !$thurSlotsFull)

                                                                        @foreach ($availableSlotsForThu as $slot)

                                                                            @if ($slot->order_quantity == 20)

                                                                                <option disabled>{{ $slot->slot_time }}
                                                                                    (Slot full)</option>

                                                                            @else

                                                                                <option>{{ $slot->slot_time }}</option>

                                                                            @endif

                                                                        @endforeach

                                                                    @elseif($availableSlotsForFri->count() &&
                                                                        !$friSlotsFull)

                                                                        @foreach ($availableSlotsForFri as $slot)

                                                                            @if ($slot->order_quantity == 20)

                                                                                <option disabled>{{ $slot->slot_time }}
                                                                                    (Slot full)</option>

                                                                            @else

                                                                                <option>{{ $slot->slot_time }}</option>

                                                                            @endif

                                                                        @endforeach


                                                                    @else

                                                                        <option>10-13</option>
                                                                        <option>13-16</option>
                                                                        <option>16-19</option>

                                                                    @endif

                                                                    @endif

                                            </select>

                                        </div>

                                    </div>

                                    <!-- Payment method select -->
                                    <div class="mb-8">
                                        <div class="mb-8 p-4 bg-gray-100 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">Payment Information</h1>
                                        </div>

                                        <div class="sm:flex">

                                            <label class="mr-2 text-sm w-4/12 font-bold text-gray-700">Payment
                                                Method:</label>

                                            <select name="payment" id="select-payment-method"
                                                class="w-full h-10 sm:w-8/12 px-2 py-1 text-gray-700 bg-gray-200 rounded">

                                                <option>PayPal</option>

                                            </select>

                                        </div>
                                    </div>
                                    


                                </div>

                                <!-- Order Summary. -->

                                <div class="border rounded-md p-4 w-full md:w-6/12">

                                    <h1 class="text-center font-bold text-xl mb-2 uppercase">Order Summary</h1>

                                    <div class="p-4">

                                        <div class="flex justify-between border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Items:</p>
                                            </div>
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">
                                                <p>{{ $cartAndProductRecords->count() }}</p>
                                            </div>
                                        </div>

                                        <div class="flex justify-between border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Items Quantity:</p>
                                            </div>
                                            <div class="lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">
                                                <p>{{ $total_items_quantity }}</p>
                                            </div>
                                        </div>

                                        <div class="flex justify-between border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Payment Method:</p>
                                            </div>
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">
                                                <p class="payment-method">PayPal</p>
                                            </div>
                                        </div>

                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Collection Day:</p>
                                            </div>
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">

                                                @if ($currentDateTime->format('l') == 'Wednesday')
                                                    <p class="collection-day">Thursday</p>
                                                @elseif($currentDateTime->format('l') == 'Thursday')
                                                    <p class="collection-day">Friday</p>
                                                @else
                                                    <p class="collection-day">Wednesday</p>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="flex justify-between pt-4 border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Collection Time:</p>
                                            </div>
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">
                                                <p class="collection-time">10-13</p>
                                            </div>
                                        </div>

                                        <div class="flex justify-between border-b">
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-800">
                                                <p>Order Total</p>
                                            </div>
                                            <div class="text-sm lg:px-4 lg:py-2 m-2 md:text-lg font-bold text-gray-900">
                                                <p>£{{ $total_price }}</p>
                                            </div>
                                        </div>


                                        <p class="text-center my-6 italic">By placing an order, you agree to Sthaniya
                                            Basket's
                                            <span class="underline font-bold">Privacy Policy</span> and
                                            <span class="underline font-bold">Terms of Use.</span>
                                        </p>

                                        <button
                                            class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                            </svg>
                                            <span class="text-sm md:text-lg ml-2 mt-5px">Place your order</span>
                                        </button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </main>

    </div>

    <script>
        // Setting the order summary's value for collection time and collection when page loads.

        var selectCollectionTime = document.getElementById('select-collection-time');
        var selectedValue = selectCollectionTime.options[selectCollectionTime.selectedIndex].value;
        const collectionTime = document.querySelector('.collection-time');
        collectionTime.innerHTML = selectedValue;

        var selectColelctionDay = document.getElementById('select-collection-day');
        var selectedValue = selectColelctionDay.options[selectColelctionDay.selectedIndex].value;
        const collectionDay = document.querySelector('.collection-day');
        collectionDay.innerHTML = selectedValue;

        // Change collection time by the drop down select list:
        function setCollectionTime() {

            var selectCollectionTime = document.getElementById('select-collection-time');
            var selectedValue = selectCollectionTime.options[selectCollectionTime.selectedIndex].value;
            const collectionTime = document.querySelector('.collection-time');
            collectionTime.innerHTML = selectedValue;

        }
    </script>

@endsection
