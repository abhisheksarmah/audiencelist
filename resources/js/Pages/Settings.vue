<template>
	<layout>
		<div class="bg-white px-4 pb-4 relative">
			<div class="max-w-6xl mx-auto">
				<link-to to="/dashboard" class="mb-4" tag="inertia-link">
					<icon name="chevron-left" class="-ml-2"></icon>Back to
					Dashboard
				</link-to>

				<heading size="heading">Settings</heading>
			</div>
		</div>
		<div class="px-4 lg:px-6 py-5 md:py-10">
			<div class="max-w-6xl mx-auto">
				<!-- <heading size="heading2" class="mb-1">Settings</heading>
                <heading class="mb-10"
                    >Change your profile and account settings</heading
				>-->

				<div class="md:flex md:flex-wrap mb-10 -mx-4">
					<div class="md:w-1/3 px-4">
						<heading size="heading" class="mb-1">Change Password</heading>
						<heading class="mb-4">
							It is not a bad idea to change your password often
							for a more secure account, we recommend that you set
							a strong password that is atleast 8 characters long
							and includes a mix of letters, numbers and symbols.
						</heading>
					</div>
					<div class="md:w-2/3 px-4">
						<card with-footer>
							<text-input class="mb-4" label="Current Password" type="password"></text-input>
							<text-input class="mb-4" label="New Password" type="password"></text-input>
							<text-input label="Confirm New Password" type="password"></text-input>

							<template #footer>
								<loading-button>Update Password</loading-button>
							</template>
						</card>
					</div>
				</div>

				<!-- <div class="md:flex md:flex-wrap mb-10 -mx-4">
                    <div class="md:w-1/3 px-4">
                        <heading size="heading" class="mb-1"
                            >Notifications</heading
                        >
                        <heading class="mb-4">
                            Control the newsletter subscription and email
                            notifications
                        </heading>
                    </div>
                    <div class="md:w-2/3 px-4">
                        <card :is-padding="false" with-footer>
                            <list-group>
                                <div slot="listbody" class="pr-10">
                                    <heading size="large" class="mb-1"
                                        >Email Notifications</heading
                                    >
                                    <heading>
                                        Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Nulla dolorem odit
                                        voluptas, saepe a earum.
                                    </heading>
                                </div>

                                <template slot="listaction">
                                    <switch-input
                                        color="#1abc9c"
                                        v-model="notification"
                                    ></switch-input>
                                </template>
                            </list-group>
                            <list-group class="border-t">
                                <div slot="listbody" class="pr-10">
                                    <heading size="large" class="mb-1"
                                        >Text/SMS Notifications</heading
                                    >
                                    <heading>
                                        Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Nulla dolorem odit
                                        voluptas, saepe a earum.
                                    </heading>
                                </div>

                                <template slot="listaction">
                                    <switch-input
                                        color="#1abc9c"
                                        v-model="notification"
                                    ></switch-input>
                                </template>
                            </list-group>
                            <list-group class="border-t">
                                <div slot="listbody" class="pr-10">
                                    <heading size="large" class="mb-1"
                                        >Slack Notifications</heading
                                    >
                                    <heading>
                                        Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Nulla dolorem odit
                                        voluptas, saepe a earum.
                                    </heading>
                                </div>

                                <template slot="listaction">
                                    <switch-input
                                        color="#1abc9c"
                                        v-model="notification"
                                    ></switch-input>
                                </template>
                            </list-group>

                            <template #footer>
                                <loading-button>Save Settings</loading-button>
                            </template>
                        </card>
                    </div>
				</div>-->
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout.vue";
import {
	Heading,
	Card,
	ListGroup,
	SwitchInput,
	TextInput,
	LoadingButton,
	LinkTo,
	Icon
} from "septemberui";

export default {
	components: {
		Layout,
		Heading,
		Card,
		ListGroup,
		SwitchInput,
		TextInput,
		LoadingButton,
		LinkTo,
		Icon
	},

	data() {
		return {
			notification: true
		};
	}
};
</script>
