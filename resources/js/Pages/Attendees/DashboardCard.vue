<template>
    <div class="md:flex md:flex-1 -mx-4 mb-10">
        <div class="md:w-1/4 px-4 mb-4 md:mb-0">
            <card>
                <div class="flex items-center">
                    <div
                        class="rounded-full bg-blue-100 flex-shrink-0 w-16 h-16 inline-flex items-center justify-center mr-4"
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
                            class="text-blue-600"
                        >
                            <path
                                d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"
                            />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <div>
                        <heading size="small-caps" class="mb-2">Total</heading>
                        <heading size="heading2">{{ total }}</heading>
                    </div>
                </div>
            </card>
        </div>
        <div class="md:w-1/4 px-4 mb-4 md:mb-0">
            <card>
                <div class="flex items-center">
                    <div
                        class="rounded-full bg-blue-100 flex-shrink-0 w-16 h-16 inline-flex items-center justify-center mr-4"
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
                            class="text-blue-600"
                        >
                            <path
                                d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"
                            />
                            <line x1="12" y1="11" x2="12" y2="17" />
                            <line x1="9" y1="14" x2="15" y2="14" />
                        </svg>
                    </div>
                    <div>
                        <heading size="small-caps" class="mb-2"
                            >Present</heading
                        >
                        <heading size="heading2">{{ present }}</heading>
                    </div>
                </div>
            </card>
        </div>
        <div class="md:w-1/4 px-4 mb-4 md:mb-0">
            <card>
                <div class="flex items-center">
                    <div
                        class="rounded-full bg-blue-100 flex-shrink-0 w-16 h-16 inline-flex items-center justify-center mr-4"
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
                            class="text-blue-600"
                        >
                            <path
                                d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"
                            />
                            <line x1="12" y1="11" x2="12" y2="17" />
                            <line x1="9" y1="14" x2="15" y2="14" />
                        </svg>
                    </div>
                    <div>
                        <heading size="small-caps" class="mb-2">Absent</heading>
                        <heading size="heading2">{{ absent }}</heading>
                    </div>
                </div>
            </card>
        </div>
        <div class="md:w-1/4 px-4 mb-4 md:mb-0">
            <card>
                <div class="flex items-center">
                    <div
                        class="rounded-full bg-blue-100 flex-shrink-0 w-16 h-16 inline-flex items-center justify-center mr-4"
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
                            class="text-blue-600"
                        >
                            <path
                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                            />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                            <polyline points="10 9 9 9 8 9" />
                        </svg>
                    </div>
                    <div>
                        <heading size="small-caps" class="mb-2"
                            >Previous</heading
                        >
                        <heading size="heading2">{{ yesterday }}</heading>
                    </div>
                </div>
            </card>
        </div>
    </div>
</template>

<script>
import { Card, Heading } from "septemberui";

export default {
    components: {
        Card,
        Heading
    },
    props: ["total", "absent", "present", "yesterday"]
};
</script>
