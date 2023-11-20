document.getElementById('cep').addEventListener('change', function () {
    const cep = this.value;
    if (cep.length !== 8) {
      alert('CEP inválido. O CEP deve conter 8 dígitos.');
      return;
    }
  
    const viaCepUrl = `https://viacep.com.br/ws/${cep}/json/`;
  
    fetch(viaCepUrl)
      .then((response) => response.json())
      .then((data) => {
        if (data.erro) {
          alert('CEP não encontrado');
        } else {
          document.getElementById('logradouro').value = data.logradouro;
          document.getElementById('bairro').value = data.bairro;
          document.getElementById('cidade').value = data.localidade;
          document.getElementById('estado').value = data.uf;
        }
      })
      .catch((error) => {
        alert('Ocorreu um erro ao buscar o CEP.');
        console.error(error);
      });
  });
  