require('./bootstrap');
import "popper.js";
import "bootstrap";

import { createApp } from "vue";
import Timer from "./components/Timer.vue"

const app = createApp({
    components: {
        Timer
    }
});

app.mount("#app")


