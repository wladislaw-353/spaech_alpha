$(document).ready(function(){
	var view = {

	};

	var core = {
		__construct:function(Method,Class){
			var arrayData = new Object()

			if(Method){
				switch(Method){
					case 'addBasket':
						arrayData.nameProduct = $('.'+init.block+' > td:eq(0)').html()
						arrayData.sku = $("."+init.block+" > td:eq(1)").html()
						arrayData.priceProduct = $("."+init.block+" > td:eq(4)").html()
						arrayData.id = init.block
						arrayData.alias = init.alias
					break

					case 'showTrash':
						arrayData.type = "show"
					break

					case 'showCountTrash':
						arrayData.type = "count"
					break

					case 'DeleteProduct':
						arrayData.idSp = init.IDSpares
						arrayData.id = init.DataID
					break
				}
			}

			core.sendAjax(Method,Class,arrayData)
		},

		sendAjax:function(Method,Class,data,token){
			if(Method && Class){
				var url = '/parts/cart/core/init.php'
				if(token==undefined){
					token = null
				}

				$.ajax({
					url:url,
					type:"POST",
					dataType:"html",
					data:({data:data,method:Method,class:Class,token:token}),
					cache:true,
					success:function(response){
						core.treatment(Method,response)
					},
					error:function(){
						core.sendAjax(Method,Class,data,token)
					}
				})
			}else{
				alert("Что то пошло не так :(")
			}
		},

		treatment: function(Method,response){
			switch(Method){
				case 'addBasket':
					if(response==true){
						$("#"+init.block+"").html("Товар добавлен")
						setTimeout(function(){
							$("#"+init.block+"").html("")
						},500)
						core.__construct("showCountTrash","basket")
					}
				break

				case 'showCountTrash':
					if(response){
						$(".showTrash").html(response)
					}
				break

				case 'showTrash':
					if(response!=""){
						$("#contentTrash").html(response)
					}else{
						$("#contentTrash").html("Корзина пуста")
					}
				break

				case 'DeleteProduct':
					if(response){
						core.__construct("showProductMain","basket")
						core.__construct("showCountTrash","basket")
						core.__construct("showTrash","basket")
					}
				break

				case 'showProductMain':
					if(response){
						$(".product").html(response);
					}
				break
			}
		}
	};

	var init = {
		block:null,

		DataID:null,

		IDSpares:null,

		alias:null,

		check:null,

		one:false,

		two:false,

		three:false,

		constructClick:function(){
			$("body").click(function(event){
				var target = event.target

				if(target.tagName == "BUTTON" || target.tagName=="SPAN" || 
					target.tagName=="DIV" || target.tagName=="A" || target.tagName=="INPUT"){
					var Method = target.getAttribute("method")
					var check = target.getAttribute("ajax-check")
					if(check){
						if(init.check==null){
							init.key()
							init.check = check
						}
					}
					else if(Method){
						init.block = target.getAttribute("data-ajax")
						init.DataID = target.getAttribute("DataID")
						init.IDSpares = target.getAttribute("idspared")
						init.alias = target.getAttribute("alias")
						core.__construct(Method,"basket")
					}
				}
			})
		},

		key:function(){
			$(".dataContacts > input").keyup(function(event){
				var target = event.target
				var ajaxId = target.getAttribute("id")

				switch(ajaxId){
					case 'name':
						var name = $("#"+ajaxId+"").val()
						var replaceName = name.search(/^[A-Za-z А-Яа-я]{3,20}$/) != -1

						if(replaceName==false){
							$("#"+ajaxId+"").animate({borderColor:"red"},50)

							init.one = false
						}else{
							$("#"+ajaxId+"").animate({borderColor:"#65aee6"},50)

							init.one = true
						}
					break
					case 'phone':
						var phone = $("#"+ajaxId+"").val()
						var replacePhone = phone.search(/^[0-9]{10,12}$/) != -1

						if(replacePhone==false){
							$("#"+ajaxId+"").animate({borderColor:"red"},50)

							init.two = false
						}else{
							$("#"+ajaxId+"").animate({borderColor:"#65aee6"},50)

							init.two = true
						}
					break
					case 'email':
						var email = $("#"+ajaxId+"").val()
						var replaceEmail = email.search(/^[A-Za-z 0-9]{1,10}[@]{1}[A-Za-z]{2,8}[.]{1}[A-Za-z]{2,5}$/) != -1

						if(replaceEmail==false){
							$("#"+ajaxId+"").animate({borderColor:"red"},50)

							init.three = false
						}else{
							$("#"+ajaxId+"").animate({borderColor:"#65aee6"},50)

							init.three = true
						}
					break
				}

				init.next()
			})
		},

		next:function(one,two,three){
			if(init.one == true &&  init.two == true && init.three == true){
				$("#next").attr("disabled",false)
			}else{
				$("#next").attr("disabled",true)
			}
		},

		main:function(){
			core.__construct("showProductMain","basket")
			core.__construct("showCountTrash","basket")
			init.constructClick()
		}
	};

	init.main()
});