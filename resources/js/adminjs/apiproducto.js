const apiproducto = new Vue({
		el: '#apiproducto',
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
            getProducto(){

                if(this.slug){
                let url= '/api/producto/'+this.slug;
                debugger
                axios.get(url).then(response=>{
                    this.div_mensajeSlug= response.data;
                   if(this.div_mensajeSlug==="Slug Disponible"){
                    this.div_class_slug="badge badge-success";
                    this.des_buton=0;
debugger
                   }else{
                    this.div_class_slug="badge badge-danger"
                    this.des_buton=1;
                 debugger
                   }
                   this.div_aparecer=true
                 debugger
                })
                }
                else{
                    this.div_class_slug="badge badge-danger";
                    this.div_mensajeSlug="Debes scribir un producto";
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