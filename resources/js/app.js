import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});
// import router from './router'

import ExampleComponent from './components/ExampleComponent.vue';
import VHheader from './components/VHheader.vue';
import VSlider from "./components/VSlider.vue";
import VProducts from "./components/VProducts.vue";
import VProduct from "./components/VProduct.vue";
import VProductSlider from "./components/VProductSlider.vue";
import VProductInfo from "./components/VProductInfo.vue";

app.component('example-component', ExampleComponent);
app.component('v-header', VHheader);
app.component('v-slider', VSlider);
app.component('v-products', VProducts);
app.component('v-product', VProduct);
app.component('v-product-slider', VProductSlider);
app.component('v-product-info', VProductInfo);

// app.use(router)

app.mount('#app');
