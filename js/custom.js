jQuery(document).ready(function($){




let user='';

    loginfunc();

function loginfunc(){
    Swal.fire({
        title: 'Agencia de Empleos',
        html: `<input type="text" name="login_username" id="login" class="swal2-input" placeholder="Username">
        <input type="password" name="secretkey" id="password" class="swal2-input" placeholder="Password">`,
        confirmButtonText: 'Iniciar Sesión',
        focusConfirm: false,
        allowOutsideClick:false,
        preConfirm: async () => {
          const login = Swal.getPopup().querySelector('#login').value
          const password = Swal.getPopup().querySelector('#password').value
          if (!login || !password) {
            Swal.showValidationMessage(`Please enter login and password`)
          }

          const formData = new FormData();
          formData.append('login_username',login);
          formData.append('secretkey',password);

         const url ='http://127.0.0.1/Mail/src/redirect.php';

        await fetch(url,{
             method:'POST',
             body: formData
         }).then(response =>{
             console.log('res',response);
             for (var pair of response.headers.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }

             return new Promise((resolve,reject)=>{
                if (response.redirected) {
                    user = login;
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    resolve()
                 }else{
                     reject();
                 }
             })

            
         }).catch(error =>{
            console.log('err',error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salio mal!',
              }).then((result)=>{
                loginfunc();
              })
            

         })
 
        }
      })
      
    }







    $.ajax({
        url: 'portada.html',
    })
    .done(function(html){
        $("#page").empty().append(html);
    })
    

    $("a").click(function(event){
        link=$(this).attr("href");
        $.ajax({
            url: link,
        })
        .done(function(html){
            $("#page").empty().append(html);
            $('form[name="compose"]').attr("action", 'http://127.0.0.1/Mail/src/compose.php')
             $('input[name="send"]').attr("type", 'button');
             $('input[name="send"]').addClass('btn btn-secondary');

            $('input[name="send"]').click( async function(){
                let formData = new FormData();
        
                formData.append('smtoken',$('input[ name="smtoken" ]').val());
                formData.append('startMessage',$('input[ name="startMessage" ]').val());
                formData.append('session',$('input[ name="session" ]').val());
                formData.append('passed_id',$('input[ name="passed_id" ]').val());
                formData.append('send_to',$('input[ name="send_to" ]').val());
                formData.append('send_to_cc',$('input[ name="send_to_cc" ]').val());
                formData.append('send_to_bcc',$('input[ name="send_to_bcc" ]').val());
                formData.append('subject',$('input[ name="subject" ]').val());
                formData.append('request_mdn',$('input[ name="request_mdn" ]').val());
                formData.append('request_dr',$('input[ name="request_dr" ]').val());
                formData.append('sigappend',$('input[ name="sigappend" ]').val());
                formData.append('html_addr_search',$('input[ name="html_addr_search" ]').val());
                
                formData.append('body',$('textarea[ name="body" ]').val());
                formData.append('send',$('input[ name="send" ]').val());
                formData.append('send',$('input[ name="send" ]').val());
                formData.append('MAX_FILE_SIZE',$('input[ name="MAX_FILE_SIZE" ]').val());
                formData.append('attachfile',$('input[ name="attachfile" ]').val());
                formData.append('attach',$('input[ name="attach" ]').val());
                formData.append('username',$('input[ name="username" ]').val());
                formData.append('smaction',$('input[ name="smaction" ]').val());
                formData.append('mailbox',$('input[ name="mailbox" ]').val());
                formData.append('composesession',$('input[ name="composesession" ]').val());
                formData.append('querystring',$('input[ name="querystring" ]').val());
                
                
                
                for (var pair of formData.entries()) {
                    console.log(pair[0]+ ', ' + pair[1]); 
                }
                
                const url ='http://127.0.0.1/Mail/src/compose.php';
                
                await fetch(url,{
                     method:'POST',
                     body: formData
                 }).then(response =>{
                     console.log('res',response.body);
                
                     return new Promise((resolve,reject)=>{
                        if (response.redirected) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Correo Enviado!',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            resolve()
                         }else{
                             reject();
                         }
                     })
                
                    
                 }).catch(error =>{
                    console.log('err',error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mal!',
                        timer: 1500
                      })
                    
                
                 })
            });

        })
        .fail(function(){
            console.log("error");
        })
        .always(function(){
            
            console.log("complete");
        });
        return false
    })





    // $('button[name="send"]').on('click',function(){
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Correo Enviado!',
    //         showConfirmButton: false,
    //         timer: 1500
    //       })
    // })


 



})







