var formulario_contacto = new Vue({
    el:'#formulario_contacto',
    data:{
        contacto:{
            nombre : '',
            apellido : '',
            mail : '',
            phone : '',
            error : ''
        }
    },
    methods:{
        enviar(){
            var formData = this.formData(this.contacto);
            axios
                .post(
                    constants.URL_BASE + "inicio.php", formData
                )
                .then(
                    function(response){
                        if(response.data.success){
                            document.getElementById('modal-mensaje').innerHTML = 'Registro de contacto exitoso';
                            $('#modal_mensaje').modal('show');
                        }else{
                            if('msg' in response.data){
                                document.getElementById('modal-mensaje').innerHTML = response.data.msg;
                            }else{
                                document.getElementById('modal-mensaje').innerHTML = 'Se ha generado un problema, no se completo registro';
                            }
                            $('#modal_mensaje').modal('show');
                        }
                    }
                )
        },
        formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
    }
})