const apiconfirmareliminar = new Vue({
		el: '#apiconfirmareliminar',
		data:{
			urlaeliminar: ''
            
		}, 

        methods:{
           deseas_eliminar(id){
           	this.urlaeliminar=document.getElementById('urlbase').innerHTML+'/'+id;
           	$('#modal-eliminar').modal('show');
           	
           }
        },
	});