/*Open-Menu*/
const botaoMenu = document.getElementById('btn-menu');
const menuLateral = document.getElementById('menu-lateral');

botaoMenu.addEventListener('click', (event) => {
  event.stopPropagation(); // Evita que o clique no botão feche o menu
  menuLateral.classList.toggle('aberto');
});

// Fecha o menu se clicar fora dele
document.addEventListener('click', (event) => {
  // Se o menu estiver aberto e o clique for fora do menu e do botão
  if (
    menuLateral.classList.contains('aberto') &&
    !menuLateral.contains(event.target) &&
    !botaoMenu.contains(event.target)
  ) {
    menuLateral.classList.remove('aberto');
  }
});

/*Drop Down*/
const btnUser = document.getElementById('btn-user');
const menuUser = document.getElementById('menu-user');

btnUser.addEventListener('click', (event) => {
  event.stopPropagation(); // Evita fechar o menu imediatamente
  menuUser.classList.toggle('ativo');
});

// Fecha o menu se clicar fora dele
document.addEventListener('click', (event) => {
  if (
    menuUser.classList.contains('ativo') &&
    !menuUser.contains(event.target) &&
    !btnUser.contains(event.target)
  ) {
    menuUser.classList.remove('ativo');
  }
});