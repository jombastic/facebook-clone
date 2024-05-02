<script setup>
import Magnify from "vue-material-design-icons/Magnify.vue";
import VideoImage from "vue-material-design-icons/VideoImage.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

const searchIcons = [
    { component: VideoImage, size: 23, fillColor: "#050505" },
    { component: Magnify, size: 23, fillColor: "#050505" },
    { component: DotsHorizontal, size: 23, fillColor: "#050505" },
];

const names = [
    { id: 1, name: "Kiril Spasov", picId: 140 },
    { id: 2, name: "Alexa Richardson", picId: 241 },
    { id: 3, name: "Jordan Smith", picId: 342 },
    { id: 4, name: "Samantha Bee", picId: 443 },
    { id: 5, name: "Michael Reeves", picId: 144 },
    { id: 6, name: "Lily Collins", picId: 244 },
    { id: 7, name: "Chris Evans", picId: 343 },
    { id: 8, name: "Emma Watson", picId: 447 },
    { id: 9, name: "Robert Downey", picId: 149 },
    { id: 10, name: "Scarlett Johansson", picId: 249 },
    { id: 11, name: "Tom Holland", picId: 350 },
    { id: 12, name: "Zendaya Coleman", picId: 451 },
    { id: 13, name: "Benedict Cumberbatch", picId: 152 },
    { id: 14, name: "Chris Hemsworth", picId: 253 },
    { id: 15, name: "Mark Ruffalo", picId: 354 },
    { id: 16, name: "Elizabeth Olsen", picId: 455 },
];
</script>

<template>
    <div id="RightSection" class="pl-4 md:block hidden">
        <div class="max-w-[21.25rem] min-w-[15.625rem] mx-auto pt-4">
            <div
                class="flex items-center justify-between border-b border-b-gray-300"
            >
                <div class="font-semibold">Contacts</div>
                <div class="flex items-center">
                    <template v-for="(icon, index) in searchIcons" :key="index">
                        <div
                            class="p-2 hover:bg-gray-300 rounded-full cursor-pointer"
                        >
                            <component
                                :is="icon.component"
                                :size="icon.size"
                                :fillColor="icon.fillColor"
                            />
                        </div>
                    </template>
                </div>
            </div>
            <div class="h-[calc(100vh-7.1875rem)] overflow-auto pt-2">
                <template v-for="person in names" :key="person.id">
                    <div
                        class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md"
                    >
                        <img
                            :src="`https://picsum.photos/id/${person.picId}/300/320`"
                            class="rounded-full ml-1 min-w-[2.375rem] max-h-[2.375rem]"
                        />
                        <div
                            class="text-[0.938rem] text-gray-800 font-extrabold pl-3"
                        >
                            {{ person.name }}
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
