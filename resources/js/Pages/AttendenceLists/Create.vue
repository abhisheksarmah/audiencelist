<template>
	<layout>
		<div class="px-4 pb-4 relative z-20">
			<div class="max-w-6xl mx-auto">
				<div class="md:flex -mx-4 flex-col">
					<div class="flex-col w-2/3 px-4 justify-between items-center">
						<link-to to="/dashboard" class="mb-2" tag="inertia-link">
							<icon name="chevron-left" class="-ml-2"></icon>Back to
							Dashboard
						</link-to>
						<div class="flex-1">
							<heading size="heading" class="mb-4">Create New Audience List</heading>
							<alert>
								<heading>
									Download our sample excel file to get started.
									<link-to to="/test.csv" download>Download Now</link-to>
								</heading>
							</alert>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="pb-10 px-4">
			<div class="max-w-6xl mx-auto">
				<div class="md:flex -mx-4">
					<div class="md:w-2/3 px-4">
						<text-input
							v-model="form.name"
							label="List Name"
							placeholder="eg. NH7 Weekender"
							class="mb-4"
							:errors="errors['name']"
							@keydown="delete errors['name']"
						></text-input>
						<div class="flex mb-4 -mx-4">
							<date-input
								v-model="form.start_date"
								:errors="errors['start_date']"
								label="Start Date"
								class="w-1/2 px-4"
								readonly
							></date-input>
							<date-input
								v-model="form.end_date"
								:errors="errors['end_date']"
								label="End Date"
								class="w-1/2 px-4"
								readonly
							></date-input>
						</div>
						<file-input
							class="mb-10"
							label="Audience List Upload"
							v-model="form.file"
							:errors="errors['file']"
						></file-input>
						<loading-button size="small" ref="attendenceListSaveButton" @click="submit">Save Audience List</loading-button>
					</div>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import {
	Alert,
	TextInput,
	LinkTo,
	Heading,
	Icon,
	LoadingButton,
	DateInput,
	FileInput
} from "septemberui";
import _ from "lodash";

export default {
	components: {
		Layout,
		Heading,
		Alert,
		TextInput,
		LinkTo,
		Icon,
		LoadingButton,
		DateInput,
		FileInput
	},

	props: ["errors", "start_date", "end_date"],

	data() {
		return {
			form: {
				name: null,
				start_date: this.start_date,
				end_date: this.end_date,
				file: null
			}
		};
	},
	methods: {
		submit() {
			this.$refs.attendenceListSaveButton.startLoading();

			let data = new FormData();
			Object.keys(this.form).forEach(key =>
				data.append(key, this.form[key] || "")
			);
			this.$inertia
				.post(this.route("lists.store"), data, {
					preserveScroll: true
				})
				.then(() => {
					this.$refs.attendenceListSaveButton.stopLoading();
				})
				.catch(() => {
					this.$refs.attendenceListSaveButton.stopLoading();
				});
		}
	}
};
</script>
