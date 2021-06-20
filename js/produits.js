
$(document).ready(function(){
    $(".btnAjouterProduitPanier").click(function(e){
		e.preventDefault();
		var idBouton = this.id;  
		var qteProduit = document.getElementById("qteProduit" + idBouton).value;
		
		//récupère la valeur du stock depuis ce qui est affiché sur la page
		var stockPrdt = document.getElementById("stockProduit" + idBouton).innerText;
		console.log(stockPrdt);
		var stock = stockPrdt.split(":");
		stock = stock[1].trim();
		parseInt(stock);
		

		/*
		var stock = stockPrdt.match(/\d/g);
		console.log(stockPrdt);
		console.log(stock);
		stock = stockPrdt.join("");
		*/
		console.log(stock);
	  
    $.ajax({
		url: "php/ajouterProduitVarSessionPanier.php",  
		data: {idProduit: idBouton, quantiteProduit : qteProduit, stockProduit : stock},
		datatype: "JSON",
        method: "POST",
		success: function(result){
			console.log("L'ajout au panier est un succès !");
        }
		});
  });
});

$(document).ready(function(){
	$(".btnSupprimerProduitPanier").click(function(e){
		e.preventDefault();
		var idBouton = this.id;
		var qteProduit = document.getElementById("qteProduit" + idBouton).value;
		$.ajax({
			url: "php/supprimerProduitVarSessionPanier.php",  
			data: {idProduit: idBouton, quantiteProduit : qteProduit},
			datatype: "JSON",
			method: "POST",
			success: function(result){
				console.log("Opération Effectué avec succès !");
				// }
		}});
	});
});



