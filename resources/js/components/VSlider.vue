<template>
    <swiper
        :slides-per-view="1"
        :space-between="50"
        :loop="true"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
    >

        <div class=""></div>

        <swiper-slide>
            <div class="container">
                <div class="swiper-flex">
                    <div class="swiper-flex__info">
                        <div class="swiper-title">Lorem Lorem Lorem</div>
                        <div class="swiper-desc">Классический текст-«рыба». Является искажённым отрывком из философского
                            трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на
                            латинском языке, обнаружение сходства приписывается Ричарду Макклинтоку
                            <br>
                            <button class="btn btn-green"  data-hystmodal="#myModal">Подробнее</button>
                        </div>
                    </div>
                    <img src="/img/tree.png" alt="">
                </div>
            </div>
        </swiper-slide>


        <swiper-slide>
            <div class="container">
                <div class="swiper-flex">
                    <div class="swiper-flex__info">
                        <div class="swiper-title">Lorem Lorem Lorem</div>
                        <div class="swiper-desc">Классический текст-«рыба». Является искажённым отрывком из философского
                            трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на
                            латинском языке, обнаружение сходства приписывается Ричарду Макклинтоку
                            <br>
                            <button class="btn btn-green">Подробнее</button>
                        </div>
                    </div>
                    <img src="/img/tree.png" alt="">
                </div>
            </div>
        </swiper-slide>

        <swiper-slide>
            <div class="container">
                <div class="swiper-flex">
                    <div class="swiper-flex__info">
                        <div class="swiper-title">Lorem Lorem Lorem</div>
                        <div class="swiper-desc">Классический текст-«рыба». Является искажённым отрывком из философского
                            трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на
                            латинском языке, обнаружение сходства приписывается Ричарду Макклинтоку
                            <br>
                            <button class="btn btn-green">Подробнее</button>
                        </div>
                    </div>
                    <img src="/img/tree.png" alt="">
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script>

import {Swiper, SwiperSlide} from 'swiper/vue';
import 'swiper/css';

export default {
    name: 'v-slider',

    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log('slide change');
        };
        return {
            onSwiper,
            onSlideChange,
        };
    },
};
</script>

<style scoped lang="sass">
.swiper
    padding: 50rem 0

    &-slide
        user-select: none
        //cursor: pointer !important

    &-flex
        display: flex
        justify-content: space-between
        align-items: center
        gap: 80rem

        img
            height: 700rem

        &__info
            display: flex
            flex-direction: column
            gap: 20rem

    &-title
        font-size: 50rem
        font-weight: 600

    &-desc
        font-size: 20rem
        color: #333333

.slider-p
    font-size: 20rem

.btn
    margin-top: 30rem
    font-size: 18rem
    padding: 7rem 35rem
</style>
