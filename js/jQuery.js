$(document).ready(function()
{
	//Abrir Registro
	$('button[id="bRegister"]').click(function()
	{
		$('.login').slideUp('slow');
		$('.register').slideDown('slow');
		$('#bLogin').show();
		$('#bRegister').hide();
	});

	//Abrir Login
	$('button[id="bLogin"]').click(function()
	{
		$('.register').slideUp('slow');
		$('.login').slideDown('slow');
		$('#bRegister').show();
		$('#bLogin').hide();
	});

	//Verificacion Registro Antes de base
	$('form[name="register"]').bind('keyup', function()
	{
		//Contraseña
		if($('input[name="passwordR"]').val().length >= 6)
		{
			if($('input[name="passwordR"]').val() == $('input[name="r-passwordR"]').val())
			{
				$('input[name="passwordR"]').css({
					'border' : '1px solid green',
				});
				$('input[name="r-passwordR"]').css({
					'border' : '1px solid green',
				});
			}
			else
			{
				$('input[name="passwordR"]').css({
					'border' : '1px solid red',
				});
				$('input[name="r-passwordR"]').css({
					'border' : '1px solid red',
				});
			}
		}
		else
		{
			$('input[name="passwordR"]').css({
				'border' : '1px solid red',
			});
			$('input[name="r-passwordR"]').css({
				'border' : '1px solid red',
			});
		}

		//Email
		if($('input[name="emailR"]').val().length > 7)
		{
			$('input[name="emailR"]').css({
				'border' : '1px solid green',
			});
		}
		else
		{
			$('input[name="emailR"]').css({
				'border' : '1px solid red',
			});
		}
	});

	//Registro de Usuario
	$('form[name="register"]').submit(function(l)
	{
		l.preventDefault();

		$.ajax({
			beforeSend: function(){
				$('.resultRegister').html('<img src="./img/load.gif" />');
			},
			type: 'post',
			url: './Kernel/Functions/SignIn.php',
			data: $(this).serialize(),
			success: function(r){
				$('.resultRegister').html(r);
			},
		});
	});

	//Logueo de usuario
	$('form[name="login"]').submit(function(l)
	{
		l.preventDefault();

		$.ajax({
			beforeSend: function(){
				$('form[name="login"]').hide();
				$('.resultLogin').html('<img src="./img/load.gif" />');
			},
			type: 'post',
			url: './Kernel/Functions/LogIn.php',
			data: $(this).serialize(),
			success: function(r){
				$('form[name="login"]').show();
				$('.resultLogin').html(r);
			},
		});
	});

	//Agregar estado
	$('form[name="status"]').submit(function(l)
	{
		l.preventDefault();

		$.ajax({
			type: 'post',
			url: './Kernel/Functions/AddStatus.php',
			data: $(this).serialize(),
			success: function(r){
				if($('input[name="addstatus"]').val().length >= 1)
				{
					$('input[name="addstatus"]').css({
						'border' : '1px solid green',
					});

					$('input[name="addstatus"]').val(null);
				}
				else
				{
					$('input[name="addstatus"]').css({
						'border' : '1px solid red',
					});
				}
			},
		});
	});

	//Carga de Estados
	setInterval(function()
	{
		$('.status').load('./Kernel/Functions/ViewStatus.php');
	}, 5000);

	//Editar Perfil
	$('form[name="editprofile"]').submit(function(l)
	{
		l.preventDefault();

		$.ajax({
			beforeSend: function(){
				$('.resultEdit').html('<img src="./img/load.gif" />');
			},
			type: 'post',
			url: './Kernel/Functions/EditProfile.php',
			data: $(this).serialize(),
			success: function(r){
				$('.resultEdit').html(r);
			},
		});
	});

	//Edicion de contraseña
	$('form[name="editpass"]').submit(function(l)
	{
		l.preventDefault();

		$.ajax({
			beforeSend: function(){
				$('.resultPass').html('<img src="./img/load.gif" />');
			},
			type: 'post',
			url: './Kernel/Functions/EditPass.php',
			data: $(this).serialize(),
			success: function(r){
				$('.resultPass').html(r);
			},
		});
	});
});

//Logout
function OpenAlert(name,id)
{
	$('.bgAlert').load('./Kernel/Tpl/Alerts/'+ name +'.php?id='+ id +'');
	$('.bgAlert').fadeIn('slow');
}

function CloseAlert()
{
	$('.bgAlert').fadeOut();
}

function Search()
{
	$.ajax({
		beforeSend: function(){
			$('.resultSearch').html('<img src="./img/load.gif" />');
		},
		type: 'post',
		url: './Kernel/Functions/Search.php',
		data: $('form[name="sendmessage"]').serialize(),
		success: function(r){
			$('.resultSearch').show();
			$('.resultSearch').html(r);
		},
	});
}

function AddSearch(mail)
{
	$('input[name="form"]').val(''+ mail +'');
	$('.resultSearch').hide();
}