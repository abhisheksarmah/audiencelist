<template>
	<main>
		<header class="bg-white shadow-base z-50 relative">
			<div class="px-5 flex justify-between mx-auto items-center">
				<div class="flex items-center">
					<div
						class="inline-block inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full mr-2 cursor-pointer"
						@click="toggleMenu"
						v-if="!isUrl('')"
					>
						<svg
							class="fill-current text-gray-600"
							xmlns="http://www.w3.org/2000/svg"
							width="24"
							height="24"
							viewBox="0 0 24 24"
						>
							<path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
						</svg>
					</div>
					<a href="/" class="inline-flex items-center font-bold text-xl">
						<img src="/sui.svg" alt="septemberui" width="44" title="September UI" class="mr-2" />
						<span class="font-bold text-xl text-gray-700">September UI</span>
					</a>
				</div>
				<div class="text-center hidden sm:flex">
					<inertia-link
						:class="isUrl('') ? 'active text-blue-500' : ''"
						class="font-medium inline-block py-5 px-5"
						href="/"
					>Home</inertia-link>
					<inertia-link
						class="font-medium inline-block py-5 px-5 hover:text-blue-500"
						href="/alert"
					>UI Components</inertia-link>

					<inertia-link
						class="font-medium inline-block py-5 px-5 hover:text-blue-500"
						href="/example-navbar"
					>Examples</inertia-link>
				</div>
				<div>
					<a href="#" class="font-medium inline-block py-5">version v1.0.1</a>
				</div>
			</div>

			<div class="text-center block sm:hidden flex justify-between">
				<inertia-link
					:class="isUrl('') ? 'active text-blue-500' : ''"
					class="font-medium inline-block py-2 px-5"
					href="/"
				>Home</inertia-link>

				<inertia-link
					:class="isUrl('about') ? 'active text-blue-500' : ''"
					class="font-medium inline-block py-2 px-5 hover:text-blue-500"
					href="/about"
				>About</inertia-link>

				<inertia-link
					class="font-medium inline-block py-2 px-5 hover:text-blue-500"
					href="/contact"
				>Examples</inertia-link>

				<inertia-link
					class="font-medium inline-block py-2 px-5 hover:text-blue-500"
					href="/contact"
				>UI Components</inertia-link>
			</div>
		</header>

		<article>
			<div class="flex">
				<div class="h-screen sticky top-0 bg-white w-64 overflow-y-auto" v-if="showNav && !isUrl('')">
					<div class="py-5 mx-2">
						<div class="uppercase tracking-wider text-sm px-5 text-gray-500 mb-1 font-bold">Components</div>
						<inertia-link
							:class="
                                isUrl('alert')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/alert"
						>Alert</inertia-link>

						<inertia-link
							:class="
                                isUrl('avatar')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/avatar"
						>Avatar</inertia-link>

						<inertia-link
							:class="
                                isUrl('badge')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/badge"
						>Badge</inertia-link>

						<inertia-link
							:class="
                                isUrl('button')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/button"
						>Button</inertia-link>

						<inertia-link
							:class="
                                isUrl('card') ? 'text-blue-500 bg-gray-100' : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/card"
						>Card</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Checkbox</inertia-link>

						<inertia-link
							:class="
                                isUrl('datepicker')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/datepicker"
						>Datepicker</inertia-link>

						<inertia-link
							:class="
                                isUrl('dropdown')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/dropdown"
						>Dropdown</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Empty State</inertia-link>

						<inertia-link
							:class="
                                isUrl('heading')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/heading"
						>Heading</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Icon</inertia-link>

						<inertia-link
							:class="
                                isUrl('input')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/input"
						>Input</inertia-link>

						<inertia-link
							:class="
                                isUrl('paragraph')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/paragraph"
						>Paragraph</inertia-link>

						<inertia-link
							:class="
                                isUrl('radio')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/radio"
						>Radio</inertia-link>

						<inertia-link
							:class="
                                isUrl('simple-editor')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/simple-editor"
						>Simple Editor</inertia-link>

						<inertia-link
							:class="
                                isUrl('select')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/select"
						>Select</inertia-link>

						<inertia-link
							:class="
                                isUrl('search')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/search"
						>Search</inertia-link>

						<inertia-link
							:class="
                                isUrl('spinner')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/spinner"
						>Spinner</inertia-link>

						<inertia-link
							:class="
                                isUrl('switch')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/switch"
						>Switch</inertia-link>

						<inertia-link
							:class="
                                isUrl('table')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/table"
						>Table</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Text Editor</inertia-link>

						<inertia-link
							:class="
                                isUrl('toast')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/toast"
						>Toast</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Uploader</inertia-link>
					</div>

					<div class="py-5 mx-2">
						<div class="uppercase tracking-wider text-sm px-5 text-gray-500 mb-1 font-bold">UI Examples</div>
						<inertia-link
							:class="
                                isUrl('example-navbar')
                                    ? 'text-blue-500 bg-gray-100'
                                    : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/example-navbar"
						>Navbar</inertia-link>

						<inertia-link
							:class="isUrl('login') ? 'text-blue-500' : ''"
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/login"
						>Login</inertia-link>

						<inertia-link
							:class="isUrl('register') ? 'text-blue-500' : ''"
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/register"
						>Register</inertia-link>

						<inertia-link
							:class="isUrl('layout-one') ? 'text-blue-500' : ''"
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/layout-one"
						>Example Layout</inertia-link>

						<inertia-link
							:class="isUrl('layout-two') ? 'text-blue-500' : ''"
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/layout-two"
						>Example Layout Two</inertia-link>

						<inertia-link
							:class="
                                isUrl('landing-page') ? 'text-blue-500' : ''
                            "
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/landing-page"
						>Landing Page</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Table</inertia-link>

						<inertia-link
							class="rounded-lg hover:bg-gray-100 text-gray-800 font-medium block py-1 px-5 hover:text-blue-500"
							href="/contact"
						>Modal</inertia-link>
					</div>
				</div>

				<div class="px-6 py-10 flex-1">
					<slot />

					<div class="mt-16 border-t-2 py-6 text-center md:max-w-6xl mx-auto">
						<p class="text-gray-600 text-sm">
							Made with
							<span class="text-red-400">&hearts;</span> in
							Guwahati. Created by
							<a
								href="https://twitter.com/mithicher"
								target="_blank"
								class="text-blue-500 hover:text-blue-700"
							>@mithicher</a>. Built with
							<a
								target="_blank"
								class="text-blue-500 hover:text-blue-700"
								href="https://laravel.com"
							>Laravel</a>,
							<a target="_blank" class="text-blue-500 hover:text-blue-700" href="https://vuejs.org">Vue</a>,
							<a
								target="_blank"
								class="text-blue-500 hover:text-blue-700"
								href="http://inertiajs.com"
							>IntertiaJS</a>
							and
							<a
								target="_blank"
								class="text-blue-500 hover:text-blue-700"
								href="https://tailwindcss.com"
							>TailwindCSS</a>
						</p>
					</div>
				</div>
			</div>
		</article>
	</main>
</template>

<script>
export default {
	data() {
		return {
			showNav: true
		};
	},
	methods: {
		toggleMenu() {
			this.showNav = !this.showNav;
		},
		isUrl(...urls) {
			if (urls[0] === "") {
				return location.pathname.substr(1) === "";
			}
			return urls.filter(url =>
				location.pathname.substr(1).startsWith(url)
			).length;
		}
	}
};
</script>