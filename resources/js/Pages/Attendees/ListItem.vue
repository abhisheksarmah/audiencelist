<template>
    <tr class="focus-within:bg-gray-200 overflow-hidden">
        <td class="border-t">
            <span class="text-gray-700 px-6 py-4 flex items-center">
                {{ data.id }}
            </span>
        </td>
        <td class="border-t">
            <span class="text-gray-700 px-6 py-4 flex items-center">
                {{ data.name }}
            </span>
        </td>
        <td class="border-t">
            <span class="text-gray-700 px-6 py-4 flex items-center">
                {{ data.ticket_id }}
            </span>
        </td>
        <td class="border-t">
            <span class="px-6 py-4 flex items-center">
                <loading-button
                    :variant="data.present == true ? 'danger' : 'primary'"
                    ref="attendenceButton"
                    size="small"
                    @click="submit"
                >
                    <span v-if="data.present == true">Make as Absent</span>
                    <span v-else>Make as Present</span>
                </loading-button>
            </span>
        </td>
    </tr>
</template>

<script>
import { LoadingButton } from "septemberui";
export default {
    components: {
        LoadingButton
    },
    props: ["data", "list", "date"],
    methods: {
        submit() {
            this.$refs.attendenceButton.startLoading();

            this.$inertia
                .post(
                    this.route("change-status"),
                    {
                        id: this.data.id,
                        list: this.list,
                        date: this.date
                    },
                    {
                        preserveScroll: true
                    }
                )
                .then(() => {
                    this.$refs.attendenceButton.stopLoading();
                })
                .catch(() => {
                    this.$refs.attendenceButton.stopLoading();
                });
        }
    }
};
</script>
