<template>
    <div class="car__container container" >
        <div class="car__container__heading card">
            <div class="flex flex-main">
                <div>
                    <div class="flex">
                        <h1>
                            {{ carData.production_year }} {{ carData.marka }} {{ carData.model }}
                        </h1>
                        <div class="badge">
                            {{ carData.selling_branch }}
                        </div>
                    </div>
                    <div class="flex">
                        <h2>
                        <span>Lot number:</span>  {{ carData.run_number }}
                        </h2>
                        <h2>
                        <span>VIN: </span> {{ carData.vin }}
                        </h2>
                    </div>
                </div>
                <button>
                    CLAIM LOT
                </button>
            </div>
        </div>
                    <div class="car__container__content">
            <div class="car__container__content__images">
                <CarSlider :slides="slides"/>
            </div>
            <div class="car__container__content__data">
                <div class="data__box card">
                    <div class="data__box__heading">
                        <img src="/img/Sale-details.svg" alt="">
                        <p>Sale Details</p>
                    </div>
                    <div class="data__box__content">
                        <h3>Final bid: $13.456.00</h3>
                        <p class="highlight">Seller:  <b>Non-Insurence Company</b> </p>
                        <div class="flex">
                            <p>Auction: </p>
                            <div class="badge">{{ carData.selling_branch }}</div> <div class="badge badge--outline">Not Sold</div>
                        </div>
                        <div class="flex-base">
                            <p class="light">Lot number</p><p class="strong">{{ carData.run_number }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Date of sell</p><p class="strong">{{ carData.sold_date }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Documents</p><p class="strong">{{ carData.sold_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="data__box card">
                    <div class="data__box__heading">
                        <img src="/img/Vehicle-details.svg" alt="">
                        <p>Vehicle Details</p>
                    </div>
                    <div class="data__box__content">
                        <div class="flex-base">
                            <p class="light">VIN</p><p class="strong">{{ carData.vin }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Year</p><p class="strong">{{ carData.production_year }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Mileage</p><p class="strong">{{ carData.odometer }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Engine</p><p class="strong">{{ carData.engine }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Transmission</p><p class="strong">{{ carData.transmission }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Run and drive</p><p class="strong">{{ carData.drive_line_type }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Body color</p><p class="strong">{{ carData.odometer }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Drive</p><p class="strong">{{ carData.drive_line_type }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Fuel</p><p class="strong">{{ carData.odometer }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Keys</p><p class="strong">{{ carData.key }}</p>
                        </div>
                    </div>
                </div>
                <div class="data__box card">
                    <div class="data__box__heading">
                        <img src="/img/Condition-details.svg" alt="">
                        <p>Condition Details</p>
                    </div>
                    <div class="data__box__content">
                        <div class="flex-base">
                            <p class="light">Primary damage</p><p class="strong">{{ carData.loss }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Secondary damage</p><p class="strong">{{ carData.primary_damage }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Estimated Retail value</p><p class="strong">{{ carData.odometer }}</p>
                        </div>
                        <div class="flex-base">
                            <p class="light">Estimated repair cost</p><p class="strong">{{ carData.engine }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import CarSlider from '../Components/CarSlider.vue';

    export default {
     props:["id"],
     components:{
        CarSlider,
     },
     data() {
        return {
            carData:null,
        }
     },
     computed: {
        slides(){
            return ["img/base-img.png","img/base-img-2.png","img/base-img-3.png","img/base-img-3.png","img/base-img-3.png","img/base-img-3.png"]
        }
     },
     mounted() {
        this.getCarData()
     },
     methods: {
        getCarData(){
            axios.get(`http://54.36.172.231/api/cars/${this.id}`).then(res=>{
                this.carData = res.data[0]
            }).catch(err=>{
                console.log(err)
            })
        }
     },
    }
</script>

<style lang="scss" scoped>
.car__container{
    &__heading{
        width:100%;
        margin:20px 0;
    }
    &__content{
        display:flex;
        flex-direction: column;
        gap:29px;
        @media(min-width:992px){
                flex-direction: row;;
            }
        &__images{
            flex:1;
            @media(min-width:992px){
                flex:3;
            }
        }
        &__data{
            flex:1;
            width:100%;
            @media(min-width:992px){
                width:unset;
                min-width: 410px;
            }
            display:flex;
            flex-direction: column;
            gap:21px;
            .data__box{
                padding:20px !important;
                &__heading{
                    background: #F8F8F8;
                    display:flex;
                    gap:16px;
                    justify-content: flex-start;
                    align-items: center;
                    img{
                        width:27px;
                        height:27px;
                    }
                    p{
                        font-weight: 700;
                        font-size: 25px;
                        margin:0;
                    }
                }
                &__content{
                 h3{
                    font-weight: 700;
                    font-size: 33px;
                    line-height: 43px;
                    text-align: left;
                 }   
                 .highlight{
                    background: #FFEBB7;
                    border-radius: 3px;
                    width:fit-content;
                 }
                 .flex{
                    display:flex;
                    gap:11px;
                    justify-content: flex-start;
                    align-items: center;
                 }
                 .flex-base{
                    display:flex;
                    justify-content: space-between;
                    border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
                    .light{
                        color: #818181;
                    }
                    .strong{
                        color:black;
                    }
                 }
                }
            }
        }
    }
    .card{
        background: #FFFFFF;
        border: 1px solid #ECF1F9;
        padding:10px;
        border-radius: 8px;
        .flex-main{
            justify-content: space-between;
            flex-wrap: wrap;
            button{
                background: #FFCD1E;
                border-radius: 5px;
                color:white;
                width: fit-content;
                height: fit-content;
                border:none;
                outline: none;
                margin:auto 0;
            }
        }
        h1{
            font-size: 25px;
            line-height: 32px;
            color: #000000;
            margin-right:24px;
        }
        h2{
            &:first-of-type{
                margin-right: 65px;
            }
            font-size: 16px;
            line-height: 21px;
            span{
                color: #818181;
            }
        }
    }
}
</style>