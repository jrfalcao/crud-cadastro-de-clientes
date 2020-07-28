$(document).ready(function(){
    $('#table-users').DataTable();
    
    $(".user_delete").click(function(){
        var $this = $(this);
        swal({
        title: "Deseja deletar Usuário?",
            text: "Esta é uma ação irreversível!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim, Deletar usuário!",
            cancelButtonText: "Não, Cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {
                $.post('/user/delete',
                    {id:$this.val()},
                    function(data){
                        if(data){
                            swal("Aguarde...", "Apagando Usuário do sistema", "success");
                            window.location.href = '/user/lista';
                        }else{
                            
                        }
                    }
                );
            } else {
                swal("Cancelado", "Usuário não foi deletado :)", "error");
            }
          });
    });    
    
});

function formValidator(form){
    if(form.name.value.length < 5 ){
        $(".alerta").append(getHTML("O nome deve ter no mínimo 5 caracteres"));
        return false;
    }
    if(!validarCPF(form.cpf.value)){
        $(".alerta").append(getHTML('Insira um cpf válido'));
        return false;
    }
}

function validarCPF(cpf) {	
    cpf = cpf.replace(/[^\d]+/g,'');	
    if(cpf === '') return false;	
    // Valida sequências de mesmo número	
    if (cpf.length !== 11 || 
            cpf === "00000000000" || 
            cpf === "11111111111" || 
            cpf === "22222222222" || 
            cpf === "33333333333" || 
            cpf === "44444444444" || 
            cpf === "55555555555" || 
            cpf === "66666666666" || 
            cpf === "77777777777" || 
            cpf === "88888888888" || 
            cpf === "99999999999")
                    return false;		
    // Valida primeiro digito	
    add = 0;	
    for (i=0; i < 9; i ++)		
            add += parseInt(cpf.charAt(i)) * (10 - i);	
            rev = 11 - (add % 11);	
            if (rev === 10 || rev === 11)		
                    rev = 0;	
            if (rev !== parseInt(cpf.charAt(9)))		
                    return false;		
    // Valida segundo digito	
    add = 0;	
    for (i = 0; i < 10; i ++)		
            add += parseInt(cpf.charAt(i)) * (11 - i);	
    rev = 11 - (add % 11);	
    if (rev === 10 || rev === 11)	
            rev = 0;	
    if (rev !== parseInt(cpf.charAt(10)))
            return false;		
    return true;   
}

function getHTML(msg){
    return `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alerta: !</strong> ${msg}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;
}
