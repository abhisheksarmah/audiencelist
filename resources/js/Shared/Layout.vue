<template>
	<div>
		<div
			class="md:flex items-center justify-between bg-white shadow-base px-4 py-2 relative z-20 md:z-20"
		>
			<div class="flex justify-between md:flex-none items-center">
				<div
					class="inline-block md:hidden inline-flex items-center justify-center w-8 h-8 rounded-full mr-2 cursor-pointer"
					@click="showNav = !showNav"
				>
					<svg
						class="fill-current text-gray-600"
						xmlns="http://www.w3.org/2000/svg"
						width="30"
						height="30"
						viewBox="0 0 24 24"
					>
						<path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
					</svg>
				</div>
				<a href="/" class="inline-flex items-center font-bold text-xl">
					<img src="/ticket_logo.png" alt="septemberui" width="44" title="September UI" />
				</a>

				<div
					class="inline-block inline-flex items-center justify-center w-8 h-8 rounded-full mr-2 cursor-pointer md:hidden"
					@click="showNavbar = !showNavbar"
				>
					<svg
						class="fill-current text-gray-600"
						xmlns="http://www.w3.org/2000/svg"
						width="30"
						height="30"
						viewBox="0 0 24 24"
					>
						<path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
					</svg>
				</div>
			</div>
			<!-- <div class="hidden md:block">
				<search-input rounded="large" :bordered="false" size="small" placeholder="Search..."></search-input>
			</div>-->
			<div class="hidden md:block">
				<dropdown>
					<template #trigger>
						<span
							class="outline-none block inline-flex items-center justify-center h-10 w-10 overflow-hidden rounded-full shadow-inner"
						>
							<img
								src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;q=80"
								alt
								class="h-full w-full object-cover"
							/>
						</span>
					</template>
					<template #dropdown>
						<div class="mt-2 bg-white xl:border rounded-lg w-48 py-1 shadow-xl">
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Notifications</a>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Profile & Account</a>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Help & Feedback</a>
							<div class="border-t my-1"></div>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Admin Panel</a>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Logout</a>
						</div>
					</template>
				</dropdown>
			</div>

			<div class="md:hidden mt-2" v-if="showNavbar">
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Home</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Search</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Schedule</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Events</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Sign up</a>
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Login</a>
			</div>
		</div>

		<div id="siteWrapper" class="lg:mx-0 md:flex" :class="{'opened': showNav == true}">
			<div
				id="sideNavBg"
				class="fixed inset-0 w-full h-full md:hidden"
				:class="{'opened': showNav == true}"
				@click="showNav = !showNav"
				v-if="showNav"
			></div>
			<div
				id="sideNav"
				class="h-screen fixed top-0 md:sticky bg-white w-64 -ml-64 lg:ml-0 overflow-y-auto z-40 md:z-10 shadow-base"
			>
				<div class="py-5 mx-4">
					<inertia-link
						class="mb-1 flex items-center rounded-lg font-medium block py-2 px-5 text-gray-600 hover:text-blue-600 hover:bg-blue-100"
						href="/dashboard"
						:class="isUrl('dashboard') ? 'text-blue-600 bg-blue-100' : 'text-gray-600'"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>Dashboard
					</inertia-link>

					<inertia-link
						class="mb-1 flex items-center rounded-lg hover:bg-blue-100 text-gray-600 font-medium block py-2 px-5 hover:text-blue-600"
						href="/lists"
						:class="isUrl('lists') ? 'text-blue-600 bg-blue-100' : 'text-gray-600'"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="24"
							height="24"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
							<circle cx="9" cy="7" r="4" />
							<path d="M23 21v-2a4 4 0 0 0-3-3.87" />
							<path d="M16 3.13a4 4 0 0 1 0 7.75" />
						</svg>
						Audience Lists
					</inertia-link>

					<!-- <inertia-link
						class="mb-1 flex items-center rounded-lg hover:bg-blue-100 text-gray-600 font-medium block py-2 px-5 hover:text-blue-600"
						href="#"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
							<line x1="4" y1="22" x2="4" y2="15" />
						</svg>Ad Campaigns
					</inertia-link>-->

					<!-- <inertia-link
						class="mb-1 flex items-center rounded-lg hover:bg-blue-100 text-gray-600 font-medium block py-2 px-5 hover:text-blue-600"
						href="#"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
							<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
						</svg>Links
					</inertia-link>-->

					<!-- <inertia-link
						class="mb-1 flex items-center rounded-lg hover:bg-blue-100 font-medium block py-2 px-5 hover:text-blue-600"
						href="/audience"
						:class="isUrl('audience') ? 'text-blue-600 bg-blue-100' : 'text-gray-600'"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
							<circle cx="9" cy="7" r="4" />
							<path d="M23 21v-2a4 4 0 0 0-3-3.87" />
							<path d="M16 3.13a4 4 0 0 1 0 7.75" />
						</svg>Audience
					</inertia-link>-->

					<inertia-link
						class="mb-1 flex items-center rounded-lg hover:bg-blue-100 text-gray-600 font-medium block py-2 px-5 hover:text-blue-600"
						href="/settings"
						:class="isUrl('settings') ? 'text-blue-600 bg-blue-100' : 'text-gray-600'"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							stroke="currentColor"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
							class="mr-3"
						>
							<circle cx="12" cy="12" r="3" />
							<path
								d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
							/>
						</svg>Settings
					</inertia-link>
				</div>
			</div>

			<div class="px-4 lg:px-6 py-10 flex-1">
				<slot />
			</div>
		</div>
	</div>
</template>

<script>
import {
	Heading,
	Dropdown,
	BasicTable,
	Badge,
	Alert,
	SearchInput
} from "septemberui";

export default {
	components: {
		Heading,
		Dropdown,
		BasicTable,
		Badge,
		Alert,
		SearchInput
	},

	props: ["attendees", "total_attendees", "total_present", "total_absent"],

	data() {
		return {
			showNav: false,
			showNavbar: false,

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
					title: "Status",
					type: "text",
					align: "left"
				}
			]
		};
	},
	methods: {
		isUrl(...urls) {
			if (urls[0] === "") {
				return location.pathname.substr(1) === "";
			}

			return urls.filter(
				url =>
					// location.pathname.substr(1).startsWith(url)
					location.pathname.substr(1) == url
			).length;
		}
	}
};
</script> 
 