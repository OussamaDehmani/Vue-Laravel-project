<template>
<div ip="app">
	<!-- Button trigger modal -->
	<button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal">



	  Add Docs
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add new Document</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	       		<div class="form-group">
				    <label for="exampleInputEmail1">Title</label>
				    <input type="text" class="form-control" id="Title"  v-model="title" aria-describedby="Title" placeholder="Enter Title">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Subtitle</label>
				    <input type="text" class="form-control" id="Subtitle" v-model="subtitle" aria-describedby="Subtitle" placeholder="Enter Subtitle">
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Summary</label>
				    <textarea class="form-control" id="Summary" rows="3" v-model="summary"></textarea>
				</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success" @click="store">Save </button>
	      </div>
	    </div>
	  </div>
	</div>
</div>

</template>

<script>
    export default {
    data(){
    return{
    	summary:'',
    	title:'',
    	subtitle:'',
    	user_id: document.querySelector("meta[name='user-id']").getAttribute('content'),
    	}
       },
   	methods:{
	   store(){
	   axios.post('/api/documents',{title:this.title,subtitle:this.subtitle, summary:this.summary,user_id:this.user_id}).then(response=>{

	   this.$emit('docs_added',response)

	   }).catch(error=>{
	   console.log(error);
	   })
	   }
   	}
    
    }
</script>