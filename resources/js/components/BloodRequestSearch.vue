<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="input-group input-group-lg">
                    <input type="text" name="search_request"  class="form-control" v-model="search">
                    <div class="input-group-append">                        
                        <button class="btn btn-sm btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true">Filter </button>
                        <div class="dropdown-menu">                           
                            <span class="dropdown-item"><input type="radio" name="filter" v-model="search_filter" value="blood_group"> Blood Group</span>                        
                            <span class="dropdown-item"><input type="radio" name="filter" v-model="search_filter" value="location"> Location</span>                        
                            <span class="dropdown-item"><input type="radio" name="filter" v-model="search_filter" value="required_date"> Date</span>                        
                        </div>                            
                    </div>
                </div>
                <div class="search-list1" v-if="searching">                    
                    <a :href="'blood_request/'+ result[1].id" v-for="result in results" :key="result[1].id">Need {{result[1].blood_group}} blood in {{result[1].location}} before {{new Date(result[1].required_date).toLocaleDateString()}}. <hr/></a> 
                </div>              
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'blood-search',
        props: ['model'],        
        data(){
            return{
                search:'',
                results:[],
                search_filter:'blood_group',
                searching:false,
            }
        },
         watch: {
            search: function (value) {
                if (value === '' || value === ' ') {
                    this.results = [];            
                } else {                    
                    this.results = [...Object.entries(this.model).filter(blood=>{
                        return !blood[1][this.search_filter].indexOf(value)
                    })];
                    this.searching = true;                 
                }
            },
            results:function(value){
                if (value.length === 0) {
                    this.searching = false;
                }
            }
        },
        
    }
</script>

<style>
.search-list1{
    display: block;
    position: absolute;
    z-index: 99999;
    border-radius:3px;
    background: #fcfcfc;
    box-shadow: 1px 1px 3px 5px rgba(0,0,0,0.1);
    padding: 10px;
    max-height: 280px;
    right: 11%;
    overflow-y: auto;
    left: 2%;
    top: 50px;
}
</style>