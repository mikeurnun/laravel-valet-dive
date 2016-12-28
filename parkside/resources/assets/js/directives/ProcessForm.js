export default {
    bind: function (el) {
        //Return message template
        var msg_tpl = {
          invalid:'<p class="bg-warning">Please correct following:</p>',
          success:'<p class="bg-success">Congratulations! You\'ve been approved!</p>',
          rejected:'<p class="bg-warning">Unfortunately, we must decline your loan request at this time!</p>',
        }

        el.addEventListener( //add submit event listener
            'submit', function(e){
                e.preventDefault();
                let button = el.querySelector('button[type="submit"]');
                button.disabled = true;
                let formData = new FormData(el)

                let formInstance = el
                let method = el.method.toLowerCase();

                Vue.http[method](el.action, formData) //async call
                    .then(function(response){
                        if(response.body.result=='approved')
                        {
                            $(el).html(msg_tpl.success)
                        }else if(response.body.result=='rejected'){
                            $(el).html(msg_tpl.rejected)
                        }
                    }).catch(function(error){ //on error

                        if(error.status==422){
                            Object.keys(error.body).forEach(function(k){ //iterate over form fields & mark errors
                              $('#'+k).parent().addClass('has-error')
                              if(k!='inputSSN'){
                                $('#'+k).val(error.body[k])
                              }else{
                                $('#'+k).parent().prev('label[for="'+k+'"]').text(error.body[k]);
                              }
                            });
                        }
                        button.disabled = false;
                    })
            }
        );
    }
}
