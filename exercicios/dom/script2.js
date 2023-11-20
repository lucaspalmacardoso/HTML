var listaItens = document.getElementById("minhaLista").getElementsByTagName("li");
        
        for (var i = 0; i < listaItens.length; i++) {
            var item = listaItens[i];
            var texto = item.textContent;
            
            if (texto.length <= 10) {
                item.style.color = "blue";
                item.style.fontSize = "2em";
            } else if (texto.length <= 20) {
                item.style.color = "red";
                item.style.fontSize = "1.5em";
            } else {
                item.style.color = "green";
                item.style.fontSize = "0.5em";
            }
        }