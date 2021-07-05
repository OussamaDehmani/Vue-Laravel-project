<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">




                <div class="card">

                    <div class="card-header" > <add-docs @docs_added="refrech" style="float:left;"></add-docs></div>

                    <div class="card-body" >
                       <div class="card" v-for="docs in documents">
                          <h5 class="card-header">{{docs.title}}</h5>
                          <div class="card-body">
                            <h5 class="card-title">{{docs.subtitle}}</h5>
                            <p class="card-text">{{docs.summary}}</p>
                           
                            <template v-if="user_id==docs.user_id">
                            <update-docs v-bind:editeddoc="editeddoc"></update-docs>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal" @click="getdoc(docs.id)">
                              Update 
                            </button>
                           
                            <a href="#" class="btn btn-danger" v-on:click="destroy(docs.id)" >Delete</a>
                            </template>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
        return{
            documents:[],
            user_id: document.querySelector("meta[name='user-id']").getAttribute('content'),
            editeddoc:{},
        }

        },
        mounted() {
           this.loadDocs();
        },
        methods:{
        loadDocs:function(){
        axios.get('/api/documents')
        .then((response)=>{
        this.documents=response.data.data;
        })
        .catch(function(error){
        console.log(error);
        })
        },

        destroy: function (id) {
        axios.delete('/api/documents/'+id)
        .then((response)=>{
        this.documents=response.data;
        })
        .catch(function(error){
        console.log(error);
        })
        },
        getdoc(id){

         axios.get('/api/documents/edit/'+id)
         .then(response=>this.editeddoc=response.data)
         .catch(error=>console.log(error));
        },
        refrech(documents) {
        this.documents=documents.data;
        }
        }
    }
</script>

<style>
// Class
.visible {
  visibility: visible;
}
.invisible {
  visibility: hidden;
}
</style>
