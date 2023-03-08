import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});
// import router from './router'

import ExampleComponent from './components/ExampleComponent.vue';
import VHheader from './components/VHheader.vue';
import VSlider from "./components/VSlider.vue";
import VProducts from "./components/VProducts.vue";
import VProduct from "./components/VProduct.vue";

app.component('example-component', ExampleComponent);
app.component('v-header', VHheader);
app.component('v-slider', VSlider);
app.component('v-products', VProducts);
app.component('v-product', VProduct);

// app.use(router)

app.mount('#app');
