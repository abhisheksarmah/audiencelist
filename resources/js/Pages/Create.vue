<template>
	<layout>
		<div class="bg-white px-4 pb-4 relative z-20">
			<div class="max-w-6xl mx-auto">
				<link-to
					:to="`/audience?list=${filters.list}&date=${filters.date}`"
					class="mb-2"
					tag="inertia-link"
				>
					<icon name="chevron-left" class="-ml-2"></icon>Back to Audiences
				</link-to>
				<div class="flex w-full justify-between items-center">
					<div class="flex-1">
						<heading size="heading">Create New Audience under {{ event_name }}</heading>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 px-4">
			<div class="max-w-6xl mx-auto">
				<div class="md:flex -mx-4">
					<div class="md:w-2/3 px-4">
						<card>
							<text-input
								v-model="form.name"
								label="Name"
								placeholder="eg. John Doe"
								class="mb-4"
								:errors="errors['name']"
								@keydown="delete errors['name']"
							></text-input>
							<text-input
								v-model="form.ticket_id"
								label="Ticket ID"
								placeholder="eg. KWEJVIGA"
								class="mb-10"
								:errors="errors['ticket_id']"
								@keydown="delete errors['ticket_id']"
							></text-input>
							<loading-button size="small" ref="companySaveButton">Save Audience</loading-button>
						</card>
					</div>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import ListItem from "@/Pages/Attendees/ListItem.vue";
import DashboardCard from "@/Pages/Attendees/DashboardCard.vue";
import {
	Alert,
	TextInput,
	LinkTo,
	Heading,
	Icon,
	LoadingButton
} from "septemberui";
import _ from "lodash";

export default {
	components: {
		Layout,
		Heading,
		Alert,
		ListItem,
		DashboardCard,
		TextInput,
		LinkTo,
		Icon,
		LoadingButton
	},

	props: ["errors", "filters", "event_name"],

	data() {
		return {
			form: {}
		};
	}
};
</script>
