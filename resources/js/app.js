import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});
// import router from './router'

import VHheader from './components/VHheader.vue';
import VSlider from "./components/VSlider.vue";
import VProducts from "./components/VProducts.vue";
import VProduct from "./components/VProduct.vue";
import VProductSlider from "./components/VProductSlider.vue";
import VProductInfo from "./components/VProductInfo.vue";
import VProfile from "./components/VProfile.vue";
import VAdminNav from "./components/VAdminNav.vue";
import VUserSearch from "./components/VUserSearch.vue";
import VPrSearch from "./components/VPrSearch.vue";
import VAddImage from "./components/VAddImage.vue";
import VProductsAll from "./components/VProductsAll.vue";

app.component('v-header', VHheader);
app.component('v-slider', VSlider);
app.component('v-products', VProducts);
app.component('v-product', VProduct);
app.component('v-product-slider', VProductSlider);
app.component('v-product-info', VProductInfo);
app.component('v-profile', VProfile);
app.component('v-admin-nav', VAdminNav);
app.component('v-user-search', VUserSearch);
app.component('v-pr-search', VPrSearch);
app.component('v-add-image', VAddImage);
app.component('v-products-all', VProductsAll);

// app.use(router)

app.mount('#app');
