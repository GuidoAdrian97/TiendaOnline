const apicategoria = new Vue({
		el: '#apiUsuario',
		data:{
            Correo: '',
            div_mensajeCorreo:'Correo Existe',
            div_class_Correo:'badge badge-success',
            div_aparecer:false,
            des_buton:1
		}, 
		
        methods:{
            getCorreo(){
debugger
                if(this.Correo){
                let url= '/api/Usuario/'+this.Correo;

                axios.get(url).then(response=>{
                    this.div_mensajeCorreo= response.data;
                   if(this.div_mensajeCorreo==="Correo Disponible"){
                    this.div_class_Correo="badge badge-success";
                    this.des_buton=0;

                   }else{
                    this.div_class_Correo="badge badge-danger"
                    this.des_buton=1;

                   }
                   this.div_aparecer=true
               if(document.getElementById('editar')){
                        if(document.getElementById('nombretemp').innerHTML===this.Correo){
                        this.des_buton = 0;
                        this.div_mensajeCorreo='';
                        this.div_class_Correo='';
                        this.div_aparecer = false;
                        }
                    
                    }
                })
                }
                else{
                    this.div_class_Correo="badge badge-danger";
                    this.div_mensajeCorreo="Debes scribir Correo";
                    this.des_buton=1;
                     this.div_aparecer=true
                }

            }
        },

        mounted(){
            
            if(document.getElementById('editar')){
                this.Correo=document.getElementById('nombretemp').innerHTML
                this.des_buton=0;
            }
        }
	});