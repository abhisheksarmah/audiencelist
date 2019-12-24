<template>
	<layout>
		<div class="container mx-auto">
			<!-- <dashboard-card :total="total_attendees" :absent="total_absent" :present="total_present"></dashboard-card> -->

			<div class="flex items-center mb-10 justify-between">
				<heading size="heading" class="mb-4">All Audience Lists</heading>
				<div class="flex items-center">
					<search-input
						rounded="large"
						:bordered="false"
						size="small"
						placeholder="List Name ..."
						v-model="form.search"
					></search-input>
					<loading-button
						class="ml-3"
						tag="inertia-link"
						to="/lists/create"
						size="small"
					>Create New Audience List</loading-button>
				</div>
			</div>
			<basic-table :headings="tableHeadings" theme="striped">
				<tr
					class="focus-within:bg-gray-200 overflow-hidden"
					:key="dataIndex"
					v-for="(data, dataIndex) in lists.data"
				>
					<td class="border-t">
						<link-to
							tag="inertia-link"
							:to="
                                `/audience?list=${data.id}&date=${date.database}`
                            "
							class="inline-block truncate mr-2 mx-6"
						>{{ data.name }}</link-to>
					</td>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.start_date_formatted }}</span>
					</td>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.end_date_formatted }}</span>
					</td>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.created_at_formatted }}</span>
					</td>
				</tr>
			</basic-table>
			<pagination :links="lists.links" v-if="lists.data.length > 0" />
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import ListItem from "@/Pages/Attendees/ListItem.vue";
import DashboardCard from "@/Pages/Attendees/DashboardCard.vue";
import Pagination from "@/Shared/tuis/Pagination.vue";
import {
	Heading,
	BasicTable,
	Alert,
	TextInput,
	SearchInput,
	LoadingButton,
	LinkTo
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
		LoadingButton,
		LinkTo,
		Pagination
	},

	props: ["lists", "filters", "date"],

	data() {
		return {
			form: {
				search: this.filters.search
			},

			tableHeadings: [
				{
					title: "List Name",
					type: "text",
					align: "left"
				},
				{
					title: "Start date",
					type: "text",
					align: "left"
				},
				{
					title: "End date",
					type: "text",
					align: "left"
				},
				{
					title: "Created On",
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
						"lists.index",
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
