<script setup>
import { ScheduleXCalendar } from "@schedule-x/vue";
import {
    createCalendar,
    // createViewDay,
    // createViewMonthAgenda,
    createViewMonthGrid,
    // createViewWeek,
} from "@schedule-x/calendar";
import "@schedule-x/theme-default/dist/index.css";
const props = defineProps({
    events: Array,
});
// Do not use a ref here, as the calendar instance is not reactive, and doing so might cause issues
// For updating events, use the events service plugin
const calendarApp = createCalendar({
    selectedDate: new Date().toISOString().slice(0, 10),
    views: [
        // createViewDay(),
        // createViewWeek(),
        createViewMonthGrid(),
        // createViewMonthAgenda(),
    ],
    events: props.events,
});
</script>

<template>
    <div class="px-4 py-2">
        <ScheduleXCalendar :calendar-app="calendarApp"> </ScheduleXCalendar>
    </div>
</template>
