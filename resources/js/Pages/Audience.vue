<template>
	<layout>
		<div class="container mx-auto">
			<link-to to="/dashboard" class="mb-2" tag="inertia-link">
				<icon name="chevron-left" class="-ml-2"></icon>Back to Dashboard
			</link-to>
			<dashboard-card
				:total="total_attendees"
				:absent="total_absent"
				:present="total_present"
				:yesterday="total_yesterday"
			></dashboard-card>

			<heading size="heading" class="mb-4">
				All Audiences under {{ event_name }} on
				{{ date.formatted }}
			</heading>
			<div class="flex items-center mb-10 justify-between">
				<div class="flex items-center">
					<heading size="large" class="mr-3">Taking Attendence for</heading>
					<date-input readonly v-model="form.date" :min-date="date.range[0]" :max-date="date.range[1]"></date-input>
				</div>
				<div class="flex items-center">
					<search-input
						rounded="large"
						:bordered="false"
						size="small"
						placeholder="Name or Ticket ID ..."
						v-model="form.search"
					></search-input>
					<loading-button
						class="ml-3"
						tag="inertia-link"
						:to="
                            `/audience/create?list=${form.list}&date=${form.date}`
                        "
						size="small"
						v-if="can['create-audience']"
					>Create New Audience</loading-button>
				</div>
			</div>
			<basic-table :headings="tableHeadings" theme="striped" v-if="attendees.data.length">
				<template v-for="(data, dataIndex) in attendees.data">
					<list-item :data="data" :key="dataIndex" :list="form.list" :date="form.date"></list-item>
				</template>
			</basic-table>
			<div v-else class="text-center py-5">
				<empty-state height="330px">
					<div
						class="p-4 inline-flex justify-center items-center bg-blue-100 text-blue-600 rounded-full mb-3"
					>
						<icon name="search" class="w-6 h-6"></icon>
					</div>
					<heading size="large" class="mb-1">No audiences found.</heading>
					<heading class="md:w-2/3 mx-auto">
						We could not find any audiences. Please search
						again with different keywords.
					</heading>
				</empty-state>
			</div>
			<pagination :links="attendees.links" v-if="attendees.data.length > 0" />
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import ListItem from "@/Pages/Attendees/ListItem.vue";
import DashboardCard from "@/Pages/Attendees/DashboardCard.vue";
import Pagination from "@/Shared/tuis/Pagination.vue";
import {
	BasicTable,
	Alert,
	TextInput,
	SearchInput,
	LinkTo,
	EmptyState,
	Heading,
	Icon,
	LoadingButton,
	DateInput
} from "septemberui";
import _ from "lodash";

export default {
	components: {
		Layout,
		Heading,
		BasicTable,
		SearchInput,
		Alert,
		ListItem,
		DashboardCard,
		TextInput,
		LinkTo,
		EmptyState,
		Icon,
		LoadingButton,
		DateInput,
		Pagination
	},

	props: [
		"attendees",
		"total_attendees",
		"total_present",
		"total_absent",
		"total_yesterday",
		"filters",
		"date",
		"event_name",
		"errors",
		"can"
	],

	data() {
		return {
			form: {
				list: this.filters.list,
				date: this.filters.date || this.date.database,
				search: this.filters.search
			},

			tableHeadings: [
				{
					title: "ID",
					type: "text",
					align: "left"
				},
				{
					title: "Name",
					type: "text",
					align: "left"
				},
				{
					title: "Ticket id",
					type: "text",
					align: "left"
				},
				{
					title: "Status",
					type: "text",
					align: "left"
				}
			]
		};
	},
	watch: {
		form: {
			handler: _.throttle(function() {
				let query = _.pickBy(this.form);
				this.$inertia.replace(
					this.route(
						"audience.index",
						Object.keys(query).length
							? query
							: { remember: "forget" }
					)
				);
			}, 150),
			deep: true
		}
	}
};
</script>

<style>
.is-disabled .pika-button,
.is-inrange .pika-button {
	background: #f7fafc;
}
</style>
