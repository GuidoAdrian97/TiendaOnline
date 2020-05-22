const apiproducto = new Vue({
    el: '#apiproducto',
    data: {
        nombre: '',
        slug: '',
        div_mensajeSlug: 'Slug Existe',
        div_class_slug: 'badge badge-success',
        div_aparecer: false,
        des_buton: 1,
        //var precio
        precio_anterior_Pro: 0,
        precio_actual_Pro: 0,
        descuento: 0,
        porcentaje_descuento_Pro: 0,
        descuento_mensaje: '0'
    },
    computed: {
        generarSlug: function() {
            var char = {
                "á": "a",
                "é": "e",
                "í": "i",
                "ó": "o",
                "ú": "u",
                "Á": "A",
                "É": "E",
                "Í": "I",
                "Ó": "O",
                "Ú": "U",
                "Ñ": "N",
                "ñ": "n",
                " ": "-",
                "_": "-",
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ _]/g;
            this.slug = this.nombre.trim().replace(expr, function(e) {
                return char[e];
            }).toLowerCase();
            return this.slug;
        },
        generar_descuento: function() {
            if (this.porcentaje_descuento_Pro > 100 || this.porcentaje_descuento_Pro < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No puede poner un descuento mayor al 100% o menor a 0!',

                })

                this.porcentaje_descuento_Pro = 0;

                this.descuento_mensaje = '0';
                this.precio_actual_Pro = precio_anterior_Pro;
            }



            if (this.porcentaje_descuento_Pro > 0) {
                this.descuento = (this.precio_anterior_Pro * this.porcentaje_descuento_Pro) / 100;
                this.precio_actual_Pro = (this.precio_anterior_Pro - this.descuento);
                if (this.porcentaje_descuento_Pro == 100) {
                    this.descuento_mensaje = 'Este producto es gratis' + this.descuento;
                } else {
                    this.descuento_mensaje = 'Hay un descuento de $' + this.descuento;
                }
                return this.descuento_mensaje;
            } else {
                this.descuento = '';
                this.precio_actual_Pro = this.precio_anterior_Pro;

                this.descuento_mensaje = '';

                return this.descuento_mensaje;
            }


        }

    },
    methods: {
        eliminarimagen(imagen) {
            //
            Swal.fire({
                title: 'Seguro desea eliminar imagen?',
                text: "Si elimina la imagen no la podra recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.value) {

                    let url = '/api/eliminarimagen/'+imagen.id;
                
                axios.delete(url).then(response => {
                    console.log(response.data);
                });


                    var elemento = document.getElementById('idimagen-'+imagen.id);
                    elemento.parentNode.removeChild(elemento);

                    Swal.fire(
                        'Eliminada!',
                        'La imagen se elimino',
                        'success'
                    )
                }
            })
        },

        getProducto() {

            if (this.slug) {
                let url = '/api/producto/' + this.slug;
                
                axios.get(url).then(response => {
                    this.div_mensajeSlug = response.data;
                    if (this.div_mensajeSlug === "Slug Disponible") {
                        this.div_class_slug = "badge badge-success";
                        this.des_buton = 0;
                        
                    } else {
                        this.div_class_slug = "badge badge-danger"
                        this.des_buton = 1;
                        
                    }
                    this.div_aparecer = true
                    if(data.datos.nombre){
                        if(data.datos.nombre===this.nombre){
                        this.des_buton = 0;
                        this.div_mensajeSlug='';
                        this.div_class_slug='';
                        this.div_aparecer = false;
                        }
                    
                    }
                })
            } else {
                this.div_class_slug = "badge badge-danger";
                this.div_mensajeSlug = "Debes scribir un producto";
                this.des_buton = 1;
                this.div_aparecer = true;
            }

        }
    },

    mounted() {

        if (data.editar == 'Si') {
            this.nombre = data.datos.nombre;
            this.precio_anterior_Pro = data.datos.precio_anterior_Pro;
            this.porcentaje_descuento_Pro = data.datos.porcentaje_descuento_Pro;
            this.des_buton = 0;
        }

        console.log(data);
    }
});
