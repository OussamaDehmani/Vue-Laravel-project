<template>
<div ip="app">
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="updateModalLabel">Update Document</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	       		<div class="form-group">
				    <label for="exampleInputEmail1">Title</label>
				    <input type="text" class="form-control" id="Title" v-model="editeddoc.title" aria-describedby="Title" placeholder="Enter Title">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Subtitle</label>
				    <input type="text" class="form-control" id="Subtitle" v-model="editeddoc.subtitle"aria-describedby="Subtitle" placeholder="Enter Subtitle">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Summary</label>
				    <textarea class="form-control" id="Summary" rows="3" v-model="editeddoc.summary"></textarea>
				</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-warning " @click="update(editeddoc.id)" >update </button>
	      </div>
	    </div>
	  </div>
	</div>
</div>

</template>

<script>
    export default {
    props:['editeddoc'],
    data(){
    return{

   		summary:'',
    	title:'',
    	subtitle:''
    	}
    },
    methods:{
    update(){
	   axios.patch('/api/documents/edit/'+this.editeddoc.id,{title:this.editeddoc.title,subtitle:this.editeddoc.subtitle, summary:this.editeddoc.summary,user_id:this.editeddoc.user_id})
	   .then(response=>{this.$emit('docs_added',response)})
	   .catch(error=>{
	   console.log(error);
	   })
	   }
       }
    }
</script>