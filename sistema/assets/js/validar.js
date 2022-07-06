
function ValidarCargo() {

    if ($("#crgNome").val().trim() == "") {
        $("#crgNome").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o nome</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;

    }
    else {

        return true;
    }


}
function ValidarDpt() {

    if ($("#dptNome").val().trim() == "") {
        $("#dptNome").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o nome</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;

    } else if ($("#dptDtNasc").val().trim() == "") {
        $("#dptDtNasc").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a data de nascimento</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;

    }
    else {

        return true;
    }


}
function ValidarColaborador() {

    if ($("#clbNome").val().trim() == "") {
        $("#clbNome").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;

    } else if ($("#clbDtNasc").val().trim() == "") {
        $("#clbDtNasc").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo data nascimento</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;


    } else if ($("#clbCPF").val().trim() == "") {
        $("#clbCPF").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cpf.</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;


    } else if ($("#clbEstCivil").val().trim() == "") {
        $("#clbEstCivil").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo estado civil.</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;


    } else if ($("#clbDtAdm").val().trim() == "") {
        $("#clbDtAdm").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo data de admissão.</h3>',
            showConfirmButton: false,
            timer: 2000,

        })
        return false;


    }
    else {

        return true;
    }


}

function SinalizaCampo(div, nome) {
    console.log(nome);//dadosNome

    if ($("#" + nome).val().trim() == "") {
        $("#" + div).addClass("has-error");


    } else {
        $("#" + div).removeClass("has-error").addClass("has-success");

    }

}