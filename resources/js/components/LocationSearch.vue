<template>
    <div class="input-group">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Location</label>
        </div> 
        <input @focus="searching=true" class="form-control" :class="error ? 'is-invalid' :''" type="text" v-model="address" name="location" placeholder="Location Where Needed" autocomplete="off"/> 
        <slot></slot>
        <div class="search-list" v-if="searching">                    
            <a v-for="(result, i) in results" :key="i" @click="choice">{{result.Address}} <hr></a>           
        </div>
    </div>
</template>

<script>
    export default {
        name:'location-search',
        props: ['error', 'old'],        
        data(){
            return{
                searching:false,                
                address:this.old === 'true' ? this.old : '',
                results:[],
            }
        },
        methods:{
            choice:function(e){
                this.address = e.target.innerText;
                this.searching = false;
            }
        },
         watch: {
            address:async function(value){
                if (value === '' || value === ' ') {
                    this.results = [];
                    this.searching = false;     
                } else {                    
                    let {places} = await fetch(`https://barikoi.xyz/v1/api/search/autocomplete/MTQ3MDpHWDU2S1hWVTlY/place?q='${value}'`)
                        .then(response => response.json())
                        .catch(error => console.error('Error:', error));
                    // this.searching = true;
                    let add = places;
                    this.results = [...add];                    
                }
            }
        },
        
    }
</script>

<style>
.search-list{
    position: absolute;
    display: block;
    z-index: 99999;
    border-radius:3px;
    background: #fbfff5;
    box-shadow: 1px 1px 15px 1px rgba(0,0,0,0.1);
    padding: 10px;
    top:42px;
    left: 11%;
    right: 0;
    overflow-y: auto;
}
</style>