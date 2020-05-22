const apicategoria = new Vue({
		el: '#apicategoria',
		data:{
			nombre: '',
            slug: '',
            div_mensajeSlug:'Slug Existe',
            div_class_slug:'badge badge-success',
            div_aparecer:false,
            des_buton:1
		}, 
		computed:{
			generarSlug:function(){
				var char={
				"á":"a","é":"e","í":"i","ó":"o","ú":"u",
					"Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
					"Ñ":"N","ñ":"n"," ":"-","_":"-",
				}
				var expr=/[áéíóúÁÉÍÓÚÑñ _]/g;
				this.slug= this.nombre.trim().replace(expr,function(e){
					return char[e];
				}).toLowerCase();
                return this.slug;
			}
		},
        methods:{
            getCategoria(){

                if(this.slug){
                let url= '/api/categoria/'+this.slug;

                axios.get(url).then(response=>{
                    this.div_mensajeSlug= response.data;
                   if(this.div_mensajeSlug==="Slug Disponible"){
                    this.div_class_slug="badge badge-success";
                    this.des_buton=0;

                   }else{
                    this.div_class_slug="badge badge-danger"
                    this.des_buton=1;

                   }
                   this.div_aparecer=true
               if(document.getElementById('editar')){
                        if(document.getElementById('nombretemp').innerHTML===this.nombre){
                        this.des_buton = 0;
                        this.div_mensajeSlug='';
                        this.div_class_slug='';
                        this.div_aparecer = false;
                        }
                    
                    }
                })
                }
                else{
                    this.div_class_slug="badge badge-danger";
                    this.div_mensajeSlug="Debes scribir categoria";
                    this.des_buton=1;
                     this.div_aparecer=true
                }

            }
        },

        mounted(){
            
            if(document.getElementById('editar')){
                this.nombre=document.getElementById('nombretemp').innerHTML
                this.des_buton=0;
            }
        }
	});